<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChsrOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chsr_offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chsr_office_category')->comment('1=dean, 2=director, 3=deputy, 3=asst_director, 4=officers');;
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('profile_id');
            $table->string('rank');
            $table->string('email');
            $table->string('room_no');
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by');
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
        Schema::dropIfExists('chsr_offices');
        // $table->dropSoftDeletes();

    }
}
