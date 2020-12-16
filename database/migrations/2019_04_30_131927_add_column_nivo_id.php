<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNivoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            
            $table->integer('nivo_id')->unsigned()->after('nivo')->default(1);

            $table->foreign('nivo_id')->references('id')->on('docnivos');
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
            
            $table->dropForeign(['nivo_id']);

            $table->dropCulomn('nivo_id');
        });
    }
}
