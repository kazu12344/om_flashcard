<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSentencesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // screate entences table
        Schema::create('sentences', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('sentence');
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
        // drop sentences table
        Schema::drop('sentences');
    }

}
