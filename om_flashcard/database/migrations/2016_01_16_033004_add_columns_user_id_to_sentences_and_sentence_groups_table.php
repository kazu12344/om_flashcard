<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUserIdToSentencesAndSentenceGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sentences', function(Blueprint $table)
        {
            $table->integer('user_id')->after('id');
        });

        Schema::table('sentence_groups', function(Blueprint $table)
        {
            $table->integer('user_id')->after('id');
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
            $table->dropColumn('user_id');
        });

        Schema::table('sentence_groups', function(Blueprint $table)
        {
            $table->dropColumn('user_id');
        });
    }
}
