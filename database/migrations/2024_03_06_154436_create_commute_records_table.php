<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commute_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('departure_location'); //出発場所
            $table->string('destination_location'); //到着場所
            $table->string('transportation_mode'); //移動手段
            $table->dateTime('departure_time'); //出発時間
            $table->dateTime('arrival_time'); //到着時間
            $table->integer('diff_time');//移動時間
            $table->string('weather'); //天気
            $table->timestamps();
            // 外部キー制約
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commute_records');
    }
};
