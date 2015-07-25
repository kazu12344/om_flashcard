<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWordSentenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // create word_sentence table
        Schema::create('word_sentence', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('word_id')->unsigned();
            $table->integer('sentence_id')->unsigned();
            $table->timestamp('created_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop word_sentence table
        Schema::drop('word_sentence');
	}

}
