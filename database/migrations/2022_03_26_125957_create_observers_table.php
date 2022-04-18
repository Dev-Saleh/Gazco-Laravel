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
            $table->string('observer_name')->unique();
            $table->string('observer_username')->unique();
            $table->string('observer_password')->unique();
            $table->integer('directorate_id')->unsigned();
            $table->integer('rigons_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->boolean('allowBookig')->default('0');
            $table->integer('numberBatch')->unsigned()->nullable();
            $table->integer('qtyOfSell')->unsigned()->nullable();
            $table->foreign('directorate_id')->references('id')->on('directorates')->onDelete('cascade');
            $table->foreign('rigons_id')->references('id')->on('rigons')->onDelete('cascade');
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
        Schema::dropIfExists('observers');
    }
}
