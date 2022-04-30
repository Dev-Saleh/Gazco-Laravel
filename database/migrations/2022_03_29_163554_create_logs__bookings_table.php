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
        Schema::create('logbookings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('recivingDate')->nullable();
            $table->boolean('statusBooking');
            $table->integer('citId')->unsigned();
            $table->integer('numBatch')->unsigned();
            $table->foreign('citId')->references('id')->on('citizens')->onDelete('cascade');
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
