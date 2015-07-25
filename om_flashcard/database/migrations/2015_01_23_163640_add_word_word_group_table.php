<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWordWordGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // create word_word_groups table
        Schema::create('word_word_group', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('word_id')->unsigned();
            $table->integer('word_group_id')->unsigned();
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
        // drop word_word_groups table
        Schema::drop('word_word_group');
	}

}
