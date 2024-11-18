<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $campaigns = DB::table('campaigns')
            ->join('categories', 'campaigns.categoriesID', '=', 'categories.id')
            ->select('campaigns.*', 'categories.name as category_name')
            ->get();

        if (Auth::user()->role == 1) {
            return view('super-admin.campaigns', compact('categories', 'campaigns'));
        } elseif (Auth::user()->role == 2) {
            return view('admin.campaigns', compact('categories', 'campaigns'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoriesID' => 'required|integer',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'details' => 'required',
            'status' => 'required',
            'campaign_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:7048',
        ]);

        $data = $request->all();

        // อัปโหลดรูปภาพ
        if ($request->hasFile('campaign_img')) {
            $fileName = time() . '.' . $request->campaign_img->extension();
            $request->campaign_img->move(public_path('img/campaign/'), $fileName);
            $data['campaign_img'] = $fileName;
        }

        // บันทึกข้อมูล
        $campaign = Campaign::create($data);
        
        if ($campaign->status == "เปิดกองบุญ"){
        // ข้อความ Broadcast
        $lineToken = env('LINE_CHANNEL_ACCESS_TOKEN');
        $linkapp = env('APP_URL');
        // สร้างข้อความสำหรับส่ง
        $message = "🎉 ขอเชิญร่วมกองบุญ 🎉\n" .
            "✨ {$campaign->name}\n" .
            "💰 ร่วมบุญ: {$campaign->price} บาท\n" .
            "📋 " . str_replace("/n", "\n", $campaign->description);

        $message2 = "แสดงหลักฐานการร่วมบุญ\n" .
            "💰 มูลนิธิเมตตาธรรมรัศมี\n" .
            "ธ.กสิกรไทย เลขที่บัญชี 171-1-75423-3\n" .
            "ธ.ไทยพาณิชย์ เลขที่บัญชี 649-242269-4\n\n" .
            "📌 ร่วมบุญผ่านระบบกองบุญออนไลน์ได้ที่: $linkapp";

        $imageUrl = asset('img/campaign/' . $campaign->campaign_img); 
        // $imageUrl = "https://images.unsplash.com/photo-1720048169707-a32d6dfca0b3?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwxfHx8ZW58MHx8fHx8"; 

        // ส่งคำขอไปยัง LINE OA
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $lineToken",
        ])->post('https://api.line.me/v2/bot/message/broadcast', [
            'messages' => [
                [
                    'type' => 'image',
                    'originalContentUrl' => $imageUrl, // รูปภาพ
                    'previewImageUrl' => $imageUrl, // รูปตัวอย่าง
                ],
                [
                    'type' => 'text',
                    'text' => $message, // ข้อความ
                ],
                [
                    'type' => 'text',
                    'text' => $message2, // ข้อความ
                ],
            ],
        ]);

        // ตรวจสอบการส่งข้อความ Broadcast
        if ($response->successful()) {
            return redirect()->back()->with('success', 'เพิ่มกองบุญและส่งข้อความ Broadcast พร้อมรูปภาพเรียบร้อยแล้ว.');
        } else {
            return redirect()->back()->with('success', 'เพิ่มกองบุญสำเร็จ แต่ส่งข้อความ Broadcast ไม่สำเร็จ.');
        }
    } else {return redirect()->back()->with('success', 'เพิ่มกองบุญสำเร็จ');}
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'status' => 'required',
        ]);

        $campaign = Campaign::findOrFail($id);
        $campaign->update($request->all());
        return redirect()->back()->with('success', 'แก้ไขข้อมูลกองบุญ เรียบร้อยแล้ว.');
    }

    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);

        // ลบไฟล์รูปภาพหากมีอยู่
        if ($campaign->campaign_img && file_exists(public_path('img/campaign/' . $campaign->campaign_img))) {
            unlink(public_path('img/campaign/' . $campaign->campaign_img));
        }

        // ลบข้อมูลในฐานข้อมูล
        $campaign->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลกองบุญเรียบร้อยแล้ว.');
    }
}
