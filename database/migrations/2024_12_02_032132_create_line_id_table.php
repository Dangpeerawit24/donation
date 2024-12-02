<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatelineidTable extends Migration
{
    public function up()
    {
        Schema::create('lineid', function (Blueprint $table) {
            $table->id();
            $table->string('userid')->unique(); // เก็บ User ID
            $table->string('name')->nullable(); // ชื่อผู้ใช้ (ถ้ามี)
            $table->timestamps(); // เก็บเวลาสร้างและอัปเดต
        });
    }

    public function down()
    {
        Schema::dropIfExists('lineid');
    }
}
