<?php 


if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once '../Controll/InsertMovie.controller.php';
use MovieC\MovieController;
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
            
               <?php require_once "up.php";
               
			   MovieController::updateMovie();
	
if(isset($movieDetails)){
	
?>
			   
    
         <form method="post" action="" enctype="multipart/form-data">
    <input name="mid" type="hidden" value="<?php echo htmlspecialchars($movieDetails['ID']); ?>" required />
    <p class="hed1">Update Movie</p>
    <div class="bor">
        <p class="im">
            Movie Name: <br>
            <input name="name" type="text" value="<?php echo htmlspecialchars($movieDetails['name']); ?>" placeholder="Movie Name" required />
        </p>
        <p class="im">
            Category: <br>
            <select name="cid" required>
                <?php
                foreach ($categories as $category) {
                    $selected = ($category['ID'] == $movieDetails['categoryID']) ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($category['ID']) . '" ' . $selected . '>' . htmlspecialchars($category['name']) . '</option>';
                }
                ?>
            </select>
        </p>
        <p class="im">
    Description: <br>
    <textarea name="desc" cols="40" rows="5" maxlength="3000" placeholder="Description" required><?php echo htmlspecialchars($movieDetails['description']); ?></textarea>
</p>

<p class="im">
    Current Logo: <br/>
    <img src="data:image/jpg;base64,<?php echo base64_encode($movieDetails['logo']); ?>" width="100px" height="100px" />
</p>

<p class="im">
    Change Logo: <br/>
    <input name="logo" type="file" placeholder="Poster" />
</p>

<p class="im">
    Release Year: <br>
    <input name="ryear" type="text" value="<?php echo htmlspecialchars($movieDetails['year']); ?>"/>
</p>

<p class="im">
    Movie Language: <br>
    <input name="moviel" type="text" value="<?php echo htmlspecialchars($movieDetails['language']); ?>"/>
</p>

<p class="im">
    Duration: <br>
    <input name="du" type="text" value="<?php echo htmlspecialchars($movieDetails['duration']); ?>"/>
</p>

<p class="im">
    Movie Rating: <br>
    <input name="movier" type="text" value="<?php echo htmlspecialchars($movieDetails['rating']); ?>"/>
</p>

<p class="im">
    Trailer: <br>
    <input name="tr" type="url" value="<?php echo htmlspecialchars($movieDetails['trailer']); ?>"/>
</p>
        <input type="submit" name="update1" value="submit">
        <input type="reset" value="clear">
    </div>
</form>
<?php }?>
              
                </body>
    <footer>
    <hr>
    <p style="text-align: center; color: whitesmoke; font-family: monospace; font-size: 18px; font-weight: bold; font-style: italic; text-shadow: -2px 2px 3px whitesmoke;"></p>
    
    </footer>

</html>