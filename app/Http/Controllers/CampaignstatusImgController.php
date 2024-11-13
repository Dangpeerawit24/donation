<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignstatusImgController extends Controller
{
    public function campaignstatusimg(Request $request)
    {
        // ตรวจสอบว่ามี session 'profile' หรือไม่
        $userId = $request->query('userId');
        $url_img = $request->query('url_img');
        $campaignsname = $request->query('campaignsname');

        // ส่งข้อมูลไปยัง View
        return view('campaignstatusimg', compact('userId', 'url_img', 'campaignsname'));
    }
}
