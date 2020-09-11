<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('music_id');
            $table->string('bpm');
            $table->tinyInteger('difficulty');
            $table->tinyInteger('level');
            $table->integer('notes');
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
        Schema::dropIfExists('music_attributes');
    }
}
