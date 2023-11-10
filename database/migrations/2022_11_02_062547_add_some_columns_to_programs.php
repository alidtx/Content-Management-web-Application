<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->longText('outline')->nullable();
            $table->longText('admission_criteria')->nullable();
            $table->longText('general_guidline')->nullable();
            $table->longText('course_list')->nullable();
            $table->string('slider_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('outline');
            $table->dropColumn('admission_criteria');
            $table->dropColumn('general_guidline');
            $table->dropColumn('course_list');
            $table->dropColumn('slider_id');
        });
    }
}
