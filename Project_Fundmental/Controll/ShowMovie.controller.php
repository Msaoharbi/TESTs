<?php 
namespace ShowMovieCont;
require_once '../Model/ShowMovie.model.php';
use Movie\ShowMovie;
class ShowMovieCont{
    static public function ShowMovieCont($mid){
        $array = ShowMovie::ShowMoviefun();

        return $array;
    }
    static public function ShowCategoryCont(){
        $array = ShowMovie::getCategory();

        return $array;
    }
    

    
    static function getMovieDetailsC($mid){
        return  ShowMovie::getMovieDetails($mid);
    
    
    }
    static function getCategoryNameC($d){

       return ShowMovie::getCategoryName($d);
			
    }
    
}