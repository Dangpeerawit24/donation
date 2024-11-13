<?php

namespace App\Http\Controllers;

use App\Models\campaign_transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // รับค่า campaign_id และ name จาก Query String
        $campaignId = $request->query('campaign_id');
        $name = $request->query('name');

        // ตรวจสอบว่ามี campaign_id และ name
        if (!$campaignId || !$name) {
            return redirect()->back()->with('error', 'ข้อมูลไม่ครบถ้วน');
        }

        // ดึงข้อมูลที่ต้องการ
        $transactions = campaign_transaction::where('campaignsid', $campaignId)
            ->whereIn('status', ['รอดำเนินการ'])
            ->get();

        if ( Auth::user()->role == 1 ) {
            return view('super-admin.campaigns_transaction', compact('transactions', 'name', 'campaignId'));
        }elseif ( Auth::user()->role == 2 ) {
            return view('admin.campaigns_transaction', compact('transactions', 'name', 'campaignId'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['value' => 'required']);
        campaign_transaction::create($request->all());
        return redirect()->back()->with('success', 'เพิ่มข้อมูล หัวข้อกองบุญ เรียบร้อยแล้ว.');
    }

    /**
     * Display the specified resource.
     */
    public function show(campaign_transaction $campaign_transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(campaign_transaction $campaign_transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, campaign_transaction $campaign_transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(campaign_transaction $campaign_transaction)
    {
        //
    }
}
