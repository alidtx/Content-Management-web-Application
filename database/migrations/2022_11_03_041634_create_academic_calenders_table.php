<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicCalendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_calenders', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->integer('faculty_id');
            $table->integer('department_id');
            $table->integer('program_id');
            $table->string('session');
            $table->string('title');
            $table->string('file');
            $table->integer('status');
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
        Schema::dropIfExists('academic_calenders');
    }
}
