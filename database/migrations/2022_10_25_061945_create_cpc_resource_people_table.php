<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpcResourcePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpc_resource_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpc_service_id');
            $table->unsignedBigInteger('profile_id');
            $table->integer('sort');
            $table->integer('post_id');
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
        Schema::dropIfExists('cpc_resource_people');
    }
}
