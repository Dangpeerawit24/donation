<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    /**
     * Handle Webhook Requests.
     */
    public function handleWebhook(Request $request)
    {
        // Log ข้อมูลที่รับมาจาก Webhook
        Log::info('Webhook Received', $request->all());

        // ตัวอย่างการประมวลผลข้อมูล
        if ($request->has('events')) {
            foreach ($request->input('events') as $event) {
                $userId = $event['source']['userId'] ?? null;
                $messageText = $event['message']['text'] ?? null;

                Log::info("User ID: $userId, Message: $messageText");
            }
        }

        // ตอบกลับ HTTP 200 เพื่อยืนยันว่า Webhook ทำงานสำเร็จ
        return response()->json(['status' => 'success'], 200);
    }
}
