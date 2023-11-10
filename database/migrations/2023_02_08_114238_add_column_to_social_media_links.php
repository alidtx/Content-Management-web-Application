<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSocialMediaLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_media_links', function (Blueprint $table) {
            $table->string('google_scholar_link')->nullable();
            $table->integer('google_scholar_status')->default(1);
            $table->string('research_gate_link')->nullable();
            $table->integer('research_gate_status')->default(1);
            $table->string('website_link')->nullable();
            $table->integer('website_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_media_links', function (Blueprint $table) {
            $table->dropColumn('google_scholar_link');
            $table->dropColumn('google_scholar_status');
            $table->dropColumn('research_gate_link');
            $table->dropColumn('research_gate_status');
            $table->dropColumn('website_link');
            $table->dropColumn('website_status');
        });
    }
}
