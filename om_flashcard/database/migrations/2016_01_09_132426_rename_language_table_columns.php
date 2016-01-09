<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameLanguageTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('languages', function($table)
        {
            $table->renameColumn('lang_code', 'code');
            $table->renameColumn('lang_string', 'string');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('languages', function($table)
        {
            $table->renameColumn('code', 'lang_code');
            $table->renameColumn('string', 'lang_string');
        });
    }
}
