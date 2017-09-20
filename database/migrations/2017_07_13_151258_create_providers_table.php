<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->text('address');
            $table->tinyInteger('city_id');
            $table->tinyInteger('state_id');
            $table->tinyInteger('country_id');            
            $table->tinyInteger('specialty_id');
            $table->integer('licence_id');
            $table->string('medical_organization');
            $table->date('licence_expiry_date');
            $table->timestamps();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('providers');
    }
}
