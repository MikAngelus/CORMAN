<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePubblicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pubblications', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('title', 300)->nullable(false);
            $table->enum('type', ['journal','conference','editorship'])->nullable(false);
            $table->string('venue', 200)->nullable(false);
            $table->string('multimedia', 500)->nullable(false);
            $table->boolean('public')->default('1');
            
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
        Schema::dropIfExists('pubblications');
    }
}
