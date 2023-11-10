<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('short_title')->after('program_title')->nullable();
            $table->string('duration')->after('ucam_program_id')->nullable();
            $table->string('total_credit')->after('duration')->nullable();
            $table->date('admission_start_date')->after('total_credit')->nullable();
            $table->date('admission_end_date')->after('admission_start_date')->nullable();
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
            $table->dropColumn('short_title');
            $table->dropColumn('duration');
            $table->dropColumn('total_credit');
        });
    }
}
