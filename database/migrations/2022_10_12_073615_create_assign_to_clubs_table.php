<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignToClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_to_clubs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_member_id');
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('club_designation_id');
            $table->date('join_date');
            $table->date('expire_date');
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
        Schema::dropIfExists('assign_to_clubs');
    }
}
