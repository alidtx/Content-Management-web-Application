<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtAGlanceNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_a_glance_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('student_number')->nullable();
            $table->string('faculty_member_number')->nullable();
            $table->string('office_staff_number')->nullable();
            $table->string('member_number')->nullable();
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
        Schema::dropIfExists('at_a_glance_numbers');
    }
}
