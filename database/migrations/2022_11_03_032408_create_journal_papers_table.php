<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_papers', function (Blueprint $table) {
            $table->id();
            $table->string('paper_title');
            $table->integer('journal_for');
            $table->integer('ref_id')->nullable();
            $table->longText('description')->nullable();
            $table->string('authors')->nullable();
            $table->string('editor')->nullable();
            $table->string('issn')->nullable();
            $table->longText('research_area')->nullable();
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->string('attachment1')->nullable();
            $table->string('attachment2')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('journal_papers');
    }
}