<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeanStaffListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dean_staff_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dean_information_id')->nullable(); 
            $table->string('name')->nullable();
            $table->string('image')->nullable(); 
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->string('rank')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('phone')->nullable();
            $table->string('appointment_type')->nullable();
            $table->string('website')->nullable();
            $table->text('details_education')->nullable();
            $table->text('experience')->nullable(); 
            $table->text('publications')->nullable(); 
            $table->softDeletes();
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
        Schema::dropIfExists('dean_staff_lists');
    }
}
