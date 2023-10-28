<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
}?>
<!DOCTYPE html>
<html>
    
    <head>
    <meta charset="utf-8">
    <title> Disney Movie's </title>
    <link rel="stylesheet" type="text/css" href="css/Css.css">
    <link rel="shortcut icon" href="Posters/marvelicon1.png">
    </head>
    
          <body>
            
               <?php include "up.php";
			
			  ?>
        <hr><hr>
            <span style="text-align: center; color: whitesmoke; font-family: fantasy; font-size: 20px; text-shadow: -2px 2px 6px whitesmoke;"><h1> The Movie's List </h1><h3> * Choose Your Movie To Display It's Information * </h3></span>
              
            
			 <?php
                    require_once '../Controll/ShowAll.controller.php';
                    ShowMovieAll::ShowMovieAllCont();
?>
              
    </body>
<footer>
    <hr>
    <p style="text-align: center; color: whitesmoke; font-family: monospace; font-size: 18px; font-weight: bold; font-style: italic; text-shadow: -2px 2px 3px whitesmoke;"></p>
    
    </footer>

</html>