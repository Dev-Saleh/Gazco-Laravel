<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('obsName')->unique();
            $table->string('obsUserName')->unique();
            $table->string('obsPassword')->unique();
            $table->integer('dirId')->unsigned();
            $table->integer('rigId')->unsigned();
            $table->integer('agentId')->unsigned();
            $table->foreign('dirId')->references('id')->on('directorates')->onDelete('cascade');
            $table->foreign('rigId')->references('id')->on('rigons')->onDelete('cascade');
            $table->foreign('agentId')->references('id')->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('observers');
    }
}
