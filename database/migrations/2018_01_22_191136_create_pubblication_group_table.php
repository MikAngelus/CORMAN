<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePubblicationGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pubblication_group', function (Blueprint $table) {

            $table->integer('pubblication_id')->unsigned();;
            $table->integer('group_id')->unsigned();;
            $table->integer('user_id')->unsigned();;

            $table->primary(['pubblication_id', 'group_id']);

            $table->foreign('pubblication_id')->references('id')->on('pubblications');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('pubblication_group');
    }
}
