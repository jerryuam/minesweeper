<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        $this->objGameLevelsController=new LevelGameController;
    }
    
    public function newGame(Request $request)
    {
        $gameLevelData=$this->objGameLevelsController->show($request->input('game_level_id'));//Load game level data by game level id

        $minesCoordinates=[];//Array for saving de mines coordinates (x,y)
        do{
            $mineCoordinatesUsed=false;//Helper for cheking if there is a x,y coordinates for a mine
            $mineColNumber=rand(0,$gameLevelData->game_level_colums);//x coordinate for a mine
            $mineRowNumber=rand(0,$gameLevelData->game_level_rows);//y coordinate for a mine
            foreach($minesCoordinates as $key => $mineCoordinates){
                if($mineCoordinates==[$mineColNumber,$mineRowNumber]){//x,y coordinates validation, if true there already is a x,y with the same values
                    $mineCoordinatesUsed=true;
                    break;
                }
            }
            if(!$mineCoordinatesUsed){//If x,y coordinates are not used, insert the new coordinates into the array
                $minesCoordinates[]=[$mineColNumber,$mineRowNumber];
            }
        }while(count($minesCoordinates)<$gameLevelData->game_level_mines);

        return var_dump($minesCoordinates);
    }
    
}
