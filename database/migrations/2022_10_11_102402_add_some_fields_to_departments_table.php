<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->unsignedBigInteger('slider_id')->nullable();
            $table->string('location')->nullable();
            $table->string('contact')->nullable();
            $table->bigInteger('sort_order')->nullable();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('profile_id');
            $table->dropColumn('slider_id');
            $table->dropColumn('location');
            $table->dropColumn('contact');
            $table->dropColumn('sort_order');
            $table->dropColumn('status');
        });
    }
}
