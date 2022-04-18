<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaz_Logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty')->nullable();
            $table->integer('directorate_id')->unsigned();
            $table->integer('rigons_id')->unsigned();
            $table->integer('stations_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->boolean('validOfSell')->default('1');
            $table->longText('notice')->nullable();
            $table->foreign('directorate_id')->references('id')->on('directorates')->onDelete('cascade');
            $table->foreign('rigons_id')->references('id')->on('rigons')->onDelete('cascade');
            $table->foreign('stations_id')->references('id')->on('stations')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('locks');
    }
}
