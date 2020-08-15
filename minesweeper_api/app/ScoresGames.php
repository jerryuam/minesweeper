<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoresGames extends Model
{
    protected $fillable=[
        'score_game_time',
        'score_game_comment',
        'game_level_id',
        'player_id'
    ];
}
