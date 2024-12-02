<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\LineId;
use Illuminate\Support\Facades\Http;

class WebhookController extends Controller
{
    public function getProfile($userId)
    {
        $channelAccessToken = env('LINE_CHANNEL_ACCESS_TOKEN');

        // เรียก API Get Profile
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $channelAccessToken,
        ])->get("https://api.line.me/v2/bot/profile/{$userId}");

        // ตรวจสอบสถานะการตอบกลับ
        if ($response->successful()) {
            return $response->json();
        }

        return null; // กรณีที่ไม่สำเร็จ
    }

    public function handle(Request $request)
    {
        Log::info('Webhook Received:', $request->all());

        if ($request->has('events')) {
            foreach ($request->input('events') as $event) {
                $userId = $event['source']['userId'] ?? null;

                if ($userId) {
                    // ดึงข้อมูลโปรไฟล์
                    $profile = $this->getProfile($userId);

                    if ($profile) {
                        // เก็บข้อมูลในฐานข้อมูล
                        $user = LineId::Create(
                            ['userid' => $userId],
                            ['name' => $profile['displayName']] // บันทึก displayName
                        );

                        Log::info('User Profile Saved:', ['user' => $user]);
                    }
                }
            }
        }

        return response()->json(['status' => 'success'], 200);
    }
}
