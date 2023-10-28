<?php 
namespace MovieC;
require_once '../Model/ShowMovie.model.php';
require_once '../Model/insertMovie.php';
use Movie\ShowMovie;
use InsertMovie\InsertMovie;
if(isset($_POST['add'])){
    $name =$_POST['name'];
    $desc =$_POST['desc'];
    $cid =$_POST['cid'];
    $logo ="";
    $ryear=$_POST['ryear'];
    $moviel=$_POST['moviel'];
    $du=$_POST['du'];
    $movier=$_POST['movier'];
    $tr=$_POST['tr'];
    

   $isTrue =  InsertMovie::InsertMovieCon(    $name,$desc,$cid,$logo,$ryear,$moviel,$du,$movier,$tr);
if(!$isTrue)
die(mysqli_error($conn)); 	
else{  
    
    echo "<center><p style = 'color: black;text-shadow: -2px 2px 3px whitesmoke; font-family: cursive; font-size: 40px; background-color: gray;'>Inserting Complete</p></center>";}

}





class MovieController {


    public static function updateMovie() {
        if (isset($_POST['update1'])) {
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $cid = $_POST['cid'];
            $mid = $_POST['mid'];
            $ryear = $_POST['ryear'];
            $moviel = $_POST['moviel'];
            $du = $_POST['du'];
            $movier = $_POST['movier'];
            $tr = $_POST['tr'];
            $logo = "";

       

            // Call a method in the model to update the movie
            ShowMovie::updateMovie($mid, $name, $desc, $cid, $ryear, $moviel, $du, $movier, $tr, $logo);

            // Redirect or show a success message
            echo "<center><p style='color: black; text-shadow: -2px 2px 3px whitesmoke; font-family: cursive; font-size: 40px; background-color: gray;'>Updating Complete </p></center>";
            header("Location: UpdateMovie.php");
            exit;
        }

        if (isset($_POST['update'])) {
            $mid = $_POST['mid'];
            $movieDetails = ShowMovie::getMovieDetails($mid);
            $categories = ShowMovie::getCategory();
            $categoryName = ShowMovie::getCategoryName($movieDetails['categoryID']);

            // You can now include your view file here or return the data to be used in the view
            require_once '../View/UpdateMovie1.php'; // This should be the path to your view file
        }
    }
}

