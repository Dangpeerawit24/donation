<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
}
