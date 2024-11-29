<?php

namespace App\Http\Controllers;

use App\Models\Campaign_transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        if (Auth::user()->role == 1) {
            return view('super-admin.campaigns_transaction', compact('transactions', 'name', 'campaignId'));
        } elseif (Auth::user()->role == 2) {
            return view('admin.campaigns_transaction', compact('transactions', 'name', 'campaignId'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function success(Request $request)
    {
        // รับค่า campaignId จาก Query String
        $campaignId = $request->query('campaign_id');

        if (!$campaignId) {
            return response()->json(['message' => 'campaign_id is required'], 400);
        }

        // ค้นหาและอัปเดตข้อมูลในตาราง campaign_transactions
        $updatedRows = DB::table('campaign_transactions')
            ->where('campaignsid', $campaignId) // เช็คว่า campaignsid ตรงกับ campaignId
            ->whereIn('form', ['L', 'IB', 'P']) // form ต้องเป็น L, IB, หรือ P
            ->update(['status' => 'ส่งภาพกองบุญแล้ว']); // อัปเดต status

        // ตรวจสอบผลลัพธ์การอัปเดต
        if ($updatedRows > 0) {
            return redirect()->back()->with('success', "Updated $updatedRows เรียบร้อยแล้ว.");
        } else {
            return redirect()->back()->with('success', "Updated $updatedRows เรียบร้อยแล้ว.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|integer',
            'transactionID' => 'required',
            'details' => 'required',
            'lineName' => 'required',
            'form' => 'required',
            'status' => 'required',
            'campaignsid' => 'required',
        ]);
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
