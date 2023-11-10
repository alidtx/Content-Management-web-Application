<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_links', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_link')->nullable();
            $table->integer('facebook_status')->default(1);
            $table->string('twitter_link')->nullable();
            $table->integer('twitter_status')->default(1);
            $table->string('instagram_link')->nullable();
            $table->integer('instagram_status')->default(1);
            $table->string('linkedin_link')->nullable();
            $table->integer('linkedin_status')->default(1);
            $table->string('whatsapp_link')->nullable();
            $table->integer('whatsapp_status')->default(1);
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
        Schema::dropIfExists('social_media_links');
    }
}
