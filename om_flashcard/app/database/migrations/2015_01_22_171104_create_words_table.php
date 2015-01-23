<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('words', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name', 128);
            $table->string('mean')->nullable();
            $table->tinyInteger('part_of_speech')->nullable();
            $table->string('variation', 128)->nullable();
            $table->string('phonetic_symbol', 128)->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
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
        Schema::drop('words');
	}

}
