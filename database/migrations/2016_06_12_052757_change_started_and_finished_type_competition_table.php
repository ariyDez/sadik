<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStartedAndFinishedTypeCompetitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function(Blueprint $table){
            //$table->dropColumn('started_at');
           // $table->dropColumn('finished_at');
            $table->date('started_at');
            $table->date('finished_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competitions', function(Blueprint $table){
            $table->dropColumn('started_at');
            $table->dropColumn('finished_at');
        });
    }
}
