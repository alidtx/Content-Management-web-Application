<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialAidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_aids', function (Blueprint $table) {
            $table->id(); 
            $table->text('how_aid_works')->nullable(); 
            $table->text('type_of_aids')->nullable(); 
            $table->text('policies_and_procedures')->nullable(); 
            $table->string('aid_file')->nullable();
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
        Schema::dropIfExists('financial_aids');
    }
}
