<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once '../Controll/ShowMovie.controller.php';

use ShowMovieCont\ShowMovieCont;?>
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
			   
	include '../Controll/InsertMovie.controller.php';

    ?>
			   
        <hr><hr><hr>
             <form method="post" action="" enctype="multipart/form-data" >
              
              <p class="hed1"> Insert Movie </p>
              <div class="bor">
              
              <p class="im">
            Movie Name: <br>
            <input name="name" type="text" placeholder="Movie Name" required /> 
            </p>
              
            
              
              <p class="im">
            Category: <br>
			<select name="cid" required> 
			<?php
		$array = ShowMovieCont::ShowCategoryCont(0);
              
    
              
              foreach ($array  as $key => $value) {
                
              

	echo "<option value='".$value['ID']."'>".$value['name']."</option>";


}

			?>
			</select> 
            
              </p>
                
                  <p class="im">
            Release year: <br>
            <input name="ryear" type="text" placeholder="Releas Year"/> 
              </p>
              
                <p class="im">
            Movie language: <br>
            <input name="moviel" type="text" placeholder="Movie language"/> 
              </p>
                  <p class="im">
            Duration: <br>
            <input name="du" type="text" placeholder="Duration"/> 
              </p>
            
              
              <p class="im">
            Movie rating: <br>
            <input name="movier" type="text" placeholder="Movie rating"/> 
              </p>
                  <p class="im">
            Trailer: <br>
            <input name="tr" type="url" placeholder="Traile"/> 
              </p>
                  <p class="im">
            Desciption: <br>
			 <textarea name="desc" cols="30" rows="4" maxlength="3000" placeholder="Desciption"  required ></textarea>
            
              </p>
                   <p class="im">
            Logo: <br>
            <input name="logo" type="file" placeholder="Poster" required/> 
              </p>
                  
            
              <input type="submit" name="add" value="submit"> <input type="reset" value="clear">
              
            </div>  
			</form>
			</body>
              <footer>
    <hr>
    <p style="text-align: center; color: whitesmoke; font-family: monospace; font-size: 18px; font-weight: bold; font-style: italic; text-shadow: -2px 2px 3px whitesmoke;"></p>
    
    </footer>

</html>