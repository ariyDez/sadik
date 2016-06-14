<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaColumnsGardensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gardens', function(Blueprint $table){
            $table->string('meta-head');
            $table->string('meta-key');
            $table->text('meta-desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gardens', function(Blueprint $table){
            $table->dropColumn('meta-head');
            $table->dropColumn('meta-key');
            $table->dropColumn('meta-desc');
        });
    }
}
