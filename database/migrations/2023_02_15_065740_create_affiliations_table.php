<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliations', function (Blueprint $table) {
            $table->id();
            $table->integer('inst_id')->nullable();
            $table->string('inst_name')->nullable();
            $table->longText('inst_description')->nullable();
            $table->string('institution_type')->nullable(); 
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->tinyInteger('is_featured')->default(0);
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
        Schema::dropIfExists('affiliations');
    }
}
