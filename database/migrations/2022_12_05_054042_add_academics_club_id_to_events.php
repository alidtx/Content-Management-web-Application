<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcademicsClubIdToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->json('faculty_id')->after('event_for')->nullable();
            $table->json('department_id')->after('faculty_id')->nullable();
            $table->unsignedBigInteger('club_id')->after('department_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('faculty_id');
            $table->dropColumn('department_id');
            $table->dropColumn('club_id');
        });
    }
}
