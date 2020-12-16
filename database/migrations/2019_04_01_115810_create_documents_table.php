<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {

            $table->increments('id');
            $table->string('fnom');
            $table->string('nivo');
            $table->string('doc_type');
            $table->string('description');
            $table->string('fileplc')->nullable();
            $table->integer('val')->default(0);
            $table->datetime('deleted_at')->nullable();
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
            
            Schema::dropIfExists('documents');
    }
}
