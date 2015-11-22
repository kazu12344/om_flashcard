<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsParentidAndLangtypeToSentenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create sentences table column
        Schema::table('sentences', function(Blueprint $table)
        {
            $table->integer('parent_sentence_id')->unsigned()->nullable();
            $table->integer('language_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop sentences table column
        Schema::table('sentences', function(Blueprint $table)
        {
            $table->dropColumn('parent_sentence_id');
            $table->dropColumn('language_id');
        });
    }
}
