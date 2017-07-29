<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_model_id')->unsigned();
            $table->integer('vehicle_type_id')->unsigned();
            $table->integer('vehicle_colour_id')->unsigned();
            $table->integer('vehicle_transmission_id')->unsigned();
            $table->integer('fuel_type_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->string('usage');
            $table->string('license_plate');
            $table->integer('weight_category')->unsigned();
            $table->integer('seats')->unsigned();
            $table->integer('doors')->unsigned();
            $table->integer('wheels')->unsigned();
            $table->integer('engine_capacity')->unsigned();
            $table->boolean('boot');
            $table->boolean('trailer');
            $table->boolean('hgv');
            $table->boolean('sunroof');
            $table->boolean('gps');
                        
            $table->timestamps();

            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
            $table->foreign('vehicle_colour_id')->references('id')->on('vehicle_colours');
            $table->foreign('vehicle_transmission_id')->references('id')->on('vehicle_transmissions');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types');
            $table->foreign('owner_id')->references('id')->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
