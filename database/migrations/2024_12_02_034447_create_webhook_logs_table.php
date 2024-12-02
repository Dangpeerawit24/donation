<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebhookLogsTable extends Migration
{
    public function up()
    {
        Schema::create('webhook_logs', function (Blueprint $table) {
            $table->id();
            $table->text('line_event')->nullable(); // เก็บข้อมูล JSON จาก Webhook
            $table->timestamps(); // เก็บเวลาที่บันทึก
        });
    }

    public function down()
    {
        Schema::dropIfExists('webhook_logs');
    }
}
