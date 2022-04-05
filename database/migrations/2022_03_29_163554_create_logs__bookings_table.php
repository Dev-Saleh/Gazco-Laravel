<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs__bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('booking_date')->nullable();
            $table->date('Reciving_date')->nullable();
            $table->boolean('status_booking');
            $table->integer('citizen_id')->unsigned();
            $table->integer('table_id')->unsigned();
            $table->foreign('citizen_id')->references('id')->on('citizens')->onDelete('cascade');
            $table->foreign('table_id')->references('id')->on('logs__tables')->onDelete('cascade');
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
        Schema::dropIfExists('logs__bookings');
    }
}
