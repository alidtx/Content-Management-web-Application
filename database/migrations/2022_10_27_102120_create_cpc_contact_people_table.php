<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpcContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpc_contact_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpc_id');
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_form_on')->default(0);
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
        Schema::dropIfExists('cpc_contact_people');
    }
}
