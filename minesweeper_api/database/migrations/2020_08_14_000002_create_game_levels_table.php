<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_levels', function (Blueprint $table) {
            $table->id();
            $table->string('game_level_name');
            $table->integer('game_level_colums');
            $table->integer('game_level_rows');
            $table->integer('game_level_mines');
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
        Schema::dropIfExists('game_levels');
    }
}
