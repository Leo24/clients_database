<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('odometer_reading');
            $table->text('errors_petrol')->nullable();
            $table->text('errors_gas')->nullable();
            $table->text('work_petrol')->nullable();
            $table->text('work_gas')->nullable();
            $table->text('notes')->nullable();
            $table->integer('car_id')->nullable();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
