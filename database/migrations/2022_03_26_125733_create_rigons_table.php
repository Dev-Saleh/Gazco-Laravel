<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRigonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rigons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rigon_name')->unique();
            $table->integer('directorate_id')->unsigned();
            $table->foreign('directorate_id')->references('id')->on('directorates')->onDelete('cascade');
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
        Schema::dropIfExists('rigons');
    }
}
