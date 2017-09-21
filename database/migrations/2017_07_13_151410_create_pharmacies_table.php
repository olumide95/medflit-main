<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->text('address')->nullable();
            $table->tinyInteger('city_id')->nullable();
            $table->tinyInteger('state_id')->nullable();
            $table->tinyInteger('country_id')->nullable();
            $table->string('business_name')->nullable();
            $table->string('licence_id')->nullable();
            $table->string('affiliation')->nullable();
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
        Schema::drop('pharmacies');
    }
}
