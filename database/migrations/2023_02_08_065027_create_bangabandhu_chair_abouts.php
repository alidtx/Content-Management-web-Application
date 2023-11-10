<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBangabandhuChairAbouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangabandhu_chair_abouts', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id')->nullable();
            $table->longText('message')->nullable();
            // $table->string('image')->nullable();
            $table->integer('slider_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bangabandhu_chair_abouts');
    }
}
