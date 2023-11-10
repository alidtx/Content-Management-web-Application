<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToOngoingResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ongoing_research', function (Blueprint $table) {
            $table->string('image')->after('status')->nullable();
            $table->string('file')->after('image')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ongoing_research', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('file');
        });
    }
}
