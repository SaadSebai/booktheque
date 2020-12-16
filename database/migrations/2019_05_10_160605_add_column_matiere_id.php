<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMatiereId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            
            $table->integer('matiere_id')->unsigned()->after('nivo_id');

            $table->foreign('matiere_id')->references('id')->on('matiere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            
            $table->dropForeign(['matiere_id']);

            $table->dropCulomn('matiere_id');
        });
    }
}
