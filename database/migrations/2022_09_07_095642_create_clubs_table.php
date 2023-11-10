<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->longText('description')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->text('motto')->nullable();
            $table->dateTime('establish_date');
            $table->string('url')->nullable();
            $table->string('banner')->nullable()->default('ban.jpg');
            $table->string('member_list')->nullable()->default('lift.pdf');
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
        Schema::dropIfExists('clubs');
    }
}
