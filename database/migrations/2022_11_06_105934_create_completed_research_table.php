<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_research', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->longText('description')->nullable();
            $table->string('journal_name');
            $table->string('publish_status');
            $table->string('pdf');
            $table->date('date');
            $table->string('journal_index')->nullable();
            $table->string('journal_category')->nullable();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('completed_research');
    }
}
