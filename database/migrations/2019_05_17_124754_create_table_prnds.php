<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrnds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prnds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user2_id')->unsigned()->nullable();
            $table->foreign('user2_id')->references('id')->on('users');
            $table->integer('livre_id')->unsigned();
            $table->foreign('livre_id')->references('id')->on('livres');
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
        $table->dropForeign(['user1_id']);

        $table->dropForeign(['user2_id']);

        $table->dropForeign(['livre_id']);

        Schema::dropIfExists('prnds');
    }
}
