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
        $minesweeperBoard=[];//Array for saving de minesweeper game board representation

        do{
            $mineCoordinatesUsed=false;//Helper for cheking if there is a x,y coordinates for a mine
            $mineColNumber=rand(0,$gameLevelData->game_level_colums-1);//x coordinate for a mine
            $mineRowNumber=rand(0,$gameLevelData->game_level_rows-1);//y coordinate for a mine
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

        for($x=0;$x<$gameLevelData->game_level_colums;$x++){//Go over x coordinantes
            $row=[];
            for($y=0;$y<$gameLevelData->game_level_rows;$y++){//Go over y coordinates
                $thereIsAMine=false;//Helper for checking if there is a mine
                foreach($minesCoordinates as $key => $mineCoordinates){//Foreach mine coordinates we check if border coordinate should be flaged with a mine
                    if($mineCoordinates==[$x,$y]){//Theres is a mine in these x,y coordinates!!!
                        $thereIsAMine=true;
                        break;
                    }
                }
                if($thereIsAMine){//If there is a mine it's flaged with M
                    $row[]=["M"];
                }else{//If not it's flaged with x,y coordinates
                    $row[]=[$x,$y];
                }
            }
            $minesweeperBoard[]=$row;//Each row is filled with colums data
        }

        for($xCoordinate=0;$xCoordinate<$gameLevelData->game_level_colums;$xCoordinate++){//Go over x coordinantes
            for($yCoordinate=0;$yCoordinate<$gameLevelData->game_level_rows;$yCoordinate++){//Go over y coordinates
                // $xCoordinate=0;
                // $yCoordinate=0;
                if($minesweeperBoard[$xCoordinate][$yCoordinate][0]!="M"){
                    $minesCounter=0;
                    //x and y-1 case
                    if($yCoordinate>0){
                        if($minesweeperBoard[$xCoordinate][$yCoordinate-1][0]=="M"){
                            $minesCounter++;
                        } 
                    }
                    //x+1 and y case
                    if($xCoordinate<8){
                        if($minesweeperBoard[$xCoordinate+1][$yCoordinate][0]=="M"){
                            $minesCounter++;
                        } 
                    }
                    //x and y+1 case
                    if($yCoordinate<8){
                        if($minesweeperBoard[$xCoordinate][$yCoordinate+1][0]=="M"){
                            $minesCounter++;
                        } 
                    }
                    //x-1 and y case
                    if($xCoordinate>0){
                        if($minesweeperBoard[$xCoordinate-1][$yCoordinate][0]=="M"){
                            $minesCounter++;
                        } 
                    }
    
                    //x-1 and y-1 case
                    if($xCoordinate>0&&$yCoordinate>0){
                        if($minesweeperBoard[$xCoordinate-1][$yCoordinate-1][0]=="M"){
                            $minesCounter++;
                        } 
                    }
                    //x+1 and y-1 case
                    if($xCoordinate<8&&$yCoordinate>0){
                        if($minesweeperBoard[$xCoordinate+1][$yCoordinate-1][0]=="M"){
                            $minesCounter++;
                        } 
                    }
                    //x+1 and y+1 case
                    if($xCoordinate<8&&$yCoordinate<8){
                        if($minesweeperBoard[$xCoordinate+1][$yCoordinate+1][0]=="M"){
                            $minesCounter++;
                        } 
                    }
                    //x-1 and y+1 case
                    if($xCoordinate>0&&$yCoordinate<8){
                        if($minesweeperBoard[$xCoordinate-1][$yCoordinate+1][0]=="M"){
                            $minesCounter++;
                        } 
                    }
                    $minesweeperBoard[$xCoordinate][$yCoordinate]=[$minesCounter];
                }
            }
        }
        
        // foreach ($minesweeperBoard as $key => $minesweeperBoardRow) {
        //     foreach ($minesweeperBoardRow as $key => $cell) {
        //         // print_r($cell);
        //         if($cell[0][0]=="M"){
        //             print_r("-M-|");
        //         } else {
        //             print_r($cell[0].",".$cell[1]."|");
        //         }
        //     }
        //     print_r("\n");
        // }

        return $minesweeperBoard;
    }
    
}
