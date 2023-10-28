<?php 


class ShowMovieAll{
    static public function ShowMovieAllCont(){
require_once '../Model/ShowAll.Model.php';
        $array = ShowAll::ShowAllM();

        return $array;
    }

}