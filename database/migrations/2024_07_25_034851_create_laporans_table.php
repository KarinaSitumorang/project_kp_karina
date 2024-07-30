<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('test_number');
            $table->integer('virtual_ccu');
            $table->integer('test_time');
            $table->decimal('success_rate', 5, 2);
            $table->decimal('error_rate', 5, 2);
            $table->integer('max_tps');
            $table->integer('total_request');
            $table->json('http_codes')->nullable();
            $table->json('total_errors')->nullable();
            $table->json('labels')->nullable();
            $table->json('values')->nullable();
            $table->integer('request_per_minute')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
