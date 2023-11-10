<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingEventModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_events', function (Blueprint $table) {
            $table->id();
            $table->integer('training_id')->nullable(); 
            $table->integer('member_id')->nullable();
            $table->integer('type')->comment('1=trainer, 2=trainee')->default(2);
            $table->tinyInteger('status')->comment('1=active, 0=inactive')->default(1);
            $table->integer('create_at')->nullable();
            $table->integer('update_at')->nullable();
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
        Schema::dropIfExists('training_event_models');
    }
}
