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
        Schema::create('gazLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty')->nullable();
            $table->integer('dirId')->unsigned();
            $table->integer('rigId')->unsigned();
            $table->integer('staId')->unsigned();
            $table->integer('agentId')->unsigned();
            $table->string('statusBatch')->default('1');
            $table->integer('qtyRemaining')->unsigned();
            $table->longText('notice')->nullable();
            $table->foreign('dirId')->references('id')->on('directorates')->onDelete('cascade');
            $table->foreign('rigId')->references('id')->on('rigons')->onDelete('cascade');
            $table->foreign('staId')->references('id')->on('stations')->onDelete('cascade');
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
        Schema::dropIfExists('locks');
    }
}
