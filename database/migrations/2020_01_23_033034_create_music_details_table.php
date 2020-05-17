<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('music_id');

            $table->smallInteger('number_of_play')->unsigned()->default(0);
            $table->smallInteger('ex_score')->unsigned()->default(0);
            $table->smallInteger('pgreat')->unsigned()->default(0);
            $table->smallInteger('great')->unsigned()->default(0);
            $table->smallInteger('miss_count')->unsigned()->default(0);
            $table->tinyInteger('clear_type')->unsigned()->default(0);
            $table->tinyInteger('dj_level')->unsigned()->default(0);
            $table->dateTime('last_play_date');

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
        Schema::dropIfExists('music_details');
    }
}
