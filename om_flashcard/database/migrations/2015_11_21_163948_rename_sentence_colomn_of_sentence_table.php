<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSentenceColomnOfSentenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // rename sentences column
        Schema::table('sentences', function(Blueprint $table)
        {
            $table->renameColumn('sentence', 'text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sentences', function(Blueprint $table)
        {
            $table->renameColumn('text', 'sentence');
        });
    }
}
