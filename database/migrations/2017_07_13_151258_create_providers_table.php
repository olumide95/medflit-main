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
            $table->text('address')->nullable();
            $table->tinyInteger('city_id')->nullable();
            $table->tinyInteger('state_id')->nullable();
            $table->tinyInteger('country_id')->nullable();            
            $table->tinyInteger('specialty_id')->nullable();
            $table->string('licence_id')->nullable();
            $table->string('medical_organization')->nullable();
            $table->date('licence_expiry_date')->nullable();
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
