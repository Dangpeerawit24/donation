<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\WebhookLog;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log ข้อมูล Webhook ที่ได้รับ
        Log::info('LINE Webhook Received:', $request->all());

        // เก็บข้อมูลลงในฐานข้อมูล
        WebhookLog::create([
            'line_event' => json_encode($request->all()), // แปลงข้อมูลเป็น JSON
        ]);

        // ตอบกลับ LINE เพื่อยืนยันว่า Webhook ทำงานสำเร็จ
        return response()->json(['status' => 'success'], 200);
    }
}
