<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('version');
            $table->string('title');
            $table->string('csv_title');
            $table->string('genre');
            $table->string('artist');
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
        Schema::dropIfExists('music_lists');
    }
}
