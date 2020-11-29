<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amigos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('name');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');   

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
        Schema::dropIfExists('amigos');
    }
}
