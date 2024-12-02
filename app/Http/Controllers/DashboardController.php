<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลจากฐานข้อมูล
        $total_value_month = DB::table('campaign_transactions as trans')
            ->join('campaigns as camp', 'trans.campaignsid', '=', 'camp.id')
            ->whereMonth('trans.created_at', date('m')) // เฉพาะเดือนปัจจุบัน
            ->whereYear('trans.created_at', date('Y')) // เฉพาะปีปัจจุบัน
            ->select(DB::raw('COALESCE(SUM(trans.value * camp.price), 0) AS total_value')) // รวมยอดทั้งหมด
            ->value('total_value');

        $total_value_year = DB::table('campaign_transactions as trans')
            ->join('campaigns as camp', 'trans.campaignsid', '=', 'camp.id')
            ->whereYear('trans.created_at', date('Y')) // เฉพาะปีปัจจุบัน
            ->select(DB::raw('COALESCE(SUM(trans.value * camp.price), 0) AS total_value')) // รวมยอดทั้งหมด
            ->value('total_value');

        $total_campaign_month = DB::table('campaigns')
            ->whereMonth('created_at', date('m')) // เฉพาะแถวที่เพิ่มในเดือนปัจจุบัน
            ->whereYear('created_at', date('Y')) // เฉพาะแถวที่เพิ่มในปีปัจจุบัน
            ->count(); // นับจำนวนแถว


        $total_campaign_year = DB::table('campaigns')
            ->whereYear('created_at', date('Y')) // กรองเฉพาะข้อมูลที่ถูกเพิ่มในปีปัจจุบัน
            ->count(); // นับจำนวนแถว

        if (Auth::user()->role == 1) {
            return view('super-admin.dashboard', compact('total_value_month', 'total_value_year', 'total_campaign_month', 'total_campaign_year'));
        } elseif (Auth::user()->role == 2) {
            return view('admin.dashboard', compact('total_value_month', 'total_value_year', 'total_campaign_month', 'total_campaign_year'));
        } else {
            abort(403, 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้'); // สำหรับ role อื่นๆ หรือไม่มีสิทธิ์
        }
    }

    public function getDashboardData()
    {
        $total_value_month = DB::table('campaign_transactions as trans')
            ->join('campaigns as camp', 'trans.campaignsid', '=', 'camp.id')
            ->whereMonth('trans.created_at', date('m'))
            ->whereYear('trans.created_at', date('Y'))
            ->sum(DB::raw('trans.value * camp.price'));

        $total_value_year = DB::table('campaign_transactions as trans')
            ->join('campaigns as camp', 'trans.campaignsid', '=', 'camp.id')
            ->whereYear('trans.created_at', date('Y'))
            ->sum(DB::raw('trans.value * camp.price'));

        $total_campaign_month = DB::table('campaigns')
            ->whereMonth('created_at', date('m')) // เฉพาะแถวที่เพิ่มในเดือนปัจจุบัน
            ->whereYear('created_at', date('Y')) // เฉพาะแถวที่เพิ่มในปีปัจจุบัน
            ->count(); // นับจำนวนแถว


        $total_campaign_year = DB::table('campaigns')
            ->whereYear('created_at', date('Y')) // กรองเฉพาะข้อมูลที่ถูกเพิ่มในปีปัจจุบัน
            ->count(); // นับจำนวนแถว


        return response()->json([
            'total_value_month' => $total_value_month,
            'total_value_year' => $total_value_year,
            'total_campaign_month' => $total_campaign_month,
            'total_campaign_year' => $total_campaign_year,
        ]);
    }

    public function getActiveCampaigns()
    {
        $campaigns = DB::table('campaigns')
            ->leftJoin('campaign_transactions', 'campaigns.id', '=', 'campaign_transactions.campaignsid')
            ->select(
                'campaigns.id',
                'campaigns.name',
                'campaigns.stock',
                DB::raw('COALESCE(SUM(campaign_transactions.value), 0) as total_donated'),
                DB::raw('campaigns.stock - COALESCE(SUM(campaign_transactions.value), 0) as remaining_stock')
            )
            ->where('campaigns.status', 'เปิดกองบุญ')
            ->groupBy('campaigns.id', 'campaigns.name', 'campaigns.stock')
            ->get();

        return response()->json($campaigns);
    }

    public function getActiveuser(Request $request)
    {
        $filter = request('filter', 'month'); // ค่าเริ่มต้นเป็น 'month'

        $query = DB::table('campaign_transactions')
            ->join('campaigns', 'campaign_transactions.campaignsid', '=', 'campaigns.id')
            ->leftJoin('line_users', 'campaign_transactions.lineId', '=', 'line_users.user_id')
            ->select(
                DB::raw('COALESCE(line_users.display_name, campaign_transactions.lineName) as display_name'),
                DB::raw('SUM(campaign_transactions.value) as value'),
                DB::raw('SUM(campaign_transactions.value * campaigns.price) as total_amount')
            )
            ->groupBy(DB::raw('COALESCE(line_users.display_name, campaign_transactions.lineName)'));


        // กรองข้อมูลตามตัวเลือก
        if ($filter === 'month') {
            $query->whereBetween('campaign_transactions.created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ]);
        } elseif ($filter === 'year') {
            $query->whereBetween('campaign_transactions.created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ]);
        }

        // หากเลือก "all" ไม่ต้องกรองวันที่

        $users = $query->orderBy('total_amount', 'desc')->get();

        return response()->json($users);
    }
}
