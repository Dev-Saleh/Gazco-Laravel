<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('citizen_name')->unique();
            $table->integer('mobile_num')->unsigned();
            $table->integer('identity_num')->unsigned();
            $table->string('attachment')->unique();
            $table->string('citizen_password')->unique();
            $table->string('Booking')->nullable();
            $table->boolean('checked')->default('0');
            $table->integer('directorate_id')->unsigned();
            $table->integer('rigons_id')->unsigned();
            $table->integer('observer_id')->unsigned();
            $table->foreign('directorate_id')->references('id')->on('directorates')->onDelete('cascade');
            $table->foreign('rigons_id')->references('id')->on('rigons')->onDelete('cascade');
            $table->foreign('observer_id')->references('id')->on('observers')->onDelete('cascade');
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
        Schema::dropIfExists('citizens');
    }
}
