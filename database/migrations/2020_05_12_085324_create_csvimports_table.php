<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvimportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvimports', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->integer('user_id');

            $table->string('version', 32);
            $table->string('title', 128);
            $table->string('genre', 128);
            $table->string('artist', 128);
            $table->smallInteger('number_of_play')->unsigned()->default(0);

            $table->tinyInteger('b_difficulty')->unsigned()->default(0);
            $table->smallInteger('b_ex_score')->unsigned()->default(0);
            $table->smallInteger('b_pgreat')->unsigned()->default(0);
            $table->smallInteger('b_great')->unsigned()->default(0);
            $table->smallInteger('b_miss_count')->unsigned()->default(0);
            $table->string('b_clear_type', 32);
            $table->string('b_dj_level', 4);

            $table->tinyInteger('n_difficulty')->unsigned()->default(0);
            $table->smallInteger('n_ex_score')->unsigned()->default(0);
            $table->smallInteger('n_pgreat')->unsigned()->default(0);
            $table->smallInteger('n_great')->unsigned()->default(0);
            $table->smallInteger('n_miss_count')->unsigned()->default(0);
            $table->string('n_clear_type', 32);
            $table->string('n_dj_level', 4);

            $table->tinyInteger('h_difficulty')->unsigned()->default(0);
            $table->smallInteger('h_ex_score')->unsigned()->default(0);
            $table->smallInteger('h_pgreat')->unsigned()->default(0);
            $table->smallInteger('h_great')->unsigned()->default(0);
            $table->smallInteger('h_miss_count')->unsigned()->default(0);
            $table->string('h_clear_type', 32);
            $table->string('h_dj_level', 4);

            $table->tinyInteger('a_difficulty')->unsigned()->default(0);
            $table->smallInteger('a_ex_score')->unsigned()->default(0);
            $table->smallInteger('a_pgreat')->unsigned()->default(0);
            $table->smallInteger('a_great')->unsigned()->default(0);
            $table->smallInteger('a_miss_count')->unsigned()->default(0);
            $table->string('a_clear_type', 32);
            $table->string('a_dj_level', 4);

            $table->tinyInteger('l_difficulty')->unsigned()->default(0);
            $table->smallInteger('l_ex_score')->unsigned()->default(0);
            $table->smallInteger('l_pgreat')->unsigned()->default(0);
            $table->smallInteger('l_great')->unsigned()->default(0);
            $table->smallInteger('l_miss_count')->unsigned()->default(0);
            $table->string('l_clear_type', 32);
            $table->string('l_dj_level', 4);

            $table->dateTime('last_play_date');

            $table->timestamps();

            //プライマリーキー設定
            $table->primary(['user_id', 'version', 'title']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csvimports');
    }
}
