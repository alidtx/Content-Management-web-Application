<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->string('bup_no')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('nameBn')->nullable();
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('rank')->nullable();
            $table->string('appointment_type')->nullable();
            $table->text('detail_education')->nullable();
            $table->text('experience')->nullable();
            $table->string('photo_path')->nullable();
            // $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
