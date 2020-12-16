<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnLvrMatiereId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livres', function (Blueprint $table) {
            
            $table->integer('lvr_matiere_id')->unsigned()->after('livr_nom');

            $table->foreign('lvr_matiere_id')->references('id')->on('matiere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('livres', function (Blueprint $table) {
            
            $table->dropForeign(['lvr_matiere_id']);

            $table->dropCulomn('lvr_matiere_id');
            });
    }
}
