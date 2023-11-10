<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_orders', function (Blueprint $table) {
            $table->id();
            $table->string('category_type')->nullable(); 
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->unsignedBigInteger('member_id')->nullable(); 
            $table->string('title')->nullable(); 
            $table->date('publish_date')->nullable();  
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('office_orders');
    }
}
