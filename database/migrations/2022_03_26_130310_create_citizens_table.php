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
            $table->string('citName')->unique();
            $table->string('mobileNum')->unique();
            $table->integer('identityNum')->unsigned();
            $table->string('attachment')->unique();
            $table->string('citPassword')->unique();
            $table->datetime('unblockDate')->nullable();
            $table->boolean('checked')->default('0');
            $table->integer('dirId')->unsigned();
            $table->integer('rigId')->unsigned();
            $table->integer('obsId')->unsigned();
            $table->foreign('dirId')->references('id')->on('directorates')->onDelete('cascade');
            $table->foreign('rigId')->references('id')->on('rigons')->onDelete('cascade');
            $table->foreign('obsId')->references('id')->on('observers')->onDelete('cascade');
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
