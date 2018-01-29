<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('first_name',50)->nullable(false);
            $table->string('last_name',50)->nullable(false);
            $table->date('birth_date');
            $table->string('email',255)->unique();
            $table->string('password',255);
            $table->string('picture',500)->default('link/to/default/pic'); #replace with default picture path
            $table->integer('affiliation_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('reference_link',500)->nullable(false);

            $table->foreign('affiliation_id')->references('id')->on('affiliations'); #foreign for 1-m relation with affiliations table
            $table->foreign('role_id')->references('id')->on('roles'); #foreign for 1-m relation with roles table
            
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
        Schema::dropIfExists('users');
    }
}
