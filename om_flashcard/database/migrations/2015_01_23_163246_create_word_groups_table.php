<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create word_groups table
        Schema::create('word_groups', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 128);
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
		// drop table
        Schema::drop('word_groups');
    }

}
