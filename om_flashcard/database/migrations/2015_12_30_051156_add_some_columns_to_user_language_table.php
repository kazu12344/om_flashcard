<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsToUserLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_language', function(Blueprint $table)
        {
            $table->boolean('is_native_language');
            $table->tinyInteger('disp_order', false, true);
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_language', function(Blueprint $table)
        {
            $table->dropColumn('is_native_language');
            $table->dropColumn('disp_order');
            $table->dropColumn('updated_at');
        });
    }
}
