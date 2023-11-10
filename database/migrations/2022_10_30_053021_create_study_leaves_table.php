<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->datetime('start_by');
            $table->datetime('end_by');
            $table->string('purpose');
            $table->string('passport');
            $table->string('country');
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
        Schema::dropIfExists('study_leaves');
    }
}
