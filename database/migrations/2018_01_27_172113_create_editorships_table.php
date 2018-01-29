<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editorships', function (Blueprint $table) {
            $table->integer('pubblication_id')->unsigned();
            
            $table->text('abstract');
            $table->string('volume',255);
            $table->string('publisher',255);
            $table->date('year');
            
            $table->string('key',255)->nullable(true);
            $table->string('doi',255)->nullable(true);
            $table->string('ee',255)->nullable(true);
            $table->string('url',255)->nullable(true);

            $table->foreign('pubblication_id')->references('id')->on('pubblications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editorships');
    }
}
