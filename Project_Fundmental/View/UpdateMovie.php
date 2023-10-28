<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
require_once '../Controll/ShowMovie.controller.php';

use ShowMovieCont\ShowMovieCont;
?>
<!DOCTYPE html>
<html>
    
    <head>
    <meta charset="utf-8">
    <title> Disney Movie's </title>
    <link rel="stylesheet" type="text/css" href="css/Css.css">
    <link rel="shortcut icon" href="Posters/marvelicon1.png">
    </head>
    
          <body>
        
<?php require_once "up.php";?>  
			   
        <hr><hr><hr>
               <form method="post" action="UpdateMovie1.php">
              
              <p class="hed1"> Update Movie </p>
              <div class="bor">
              
              <p class="im">
            Choose Movie: <br>
            <select name="mid" required > 
			<?php
 $array = ShowMovieCont::ShowMovieCont(0);
              
              
    foreach ($array  as $key => $value) {
      
    

echo "<option value='".$value['ID']."'>".$value['name']."</option>";

}

			?>
			</select> 
            </p>
                   <input type="submit" name="update" value="submit"> <input type="reset" value="clear">
              </div>
              </form>
              
                </body>
    <footer>
    <hr>
    <p style="text-align: center; color: whitesmoke; font-family: monospace; font-size: 18px; font-weight: bold; font-style: italic; text-shadow: -2px 2px 3px whitesmoke;"></p>
    
    </footer>

</html>