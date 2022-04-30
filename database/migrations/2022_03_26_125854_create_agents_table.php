<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agentName')->unique();
            $table->string('agentPassword')->unique()->nullable();
            $table->string('Photo');
            $table->integer('dirId')->unsigned();
            $table->integer('rigId')->unsigned();
            $table->foreign('dirId')->references('id')->on('directorates')->onDelete('cascade');
            $table->foreign('rigId')->references('id')->on('rigons')->onDelete('cascade');
         
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
        Schema::dropIfExists('agents');
    }
}
