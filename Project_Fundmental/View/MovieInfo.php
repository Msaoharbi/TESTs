<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once '../Controll/ShowMovie.controller.php';
use Reviews\ReviewCont;
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
            
               <?php include "up.php";  
			   $mid="";
            include '../Controll/InsertReview.controller.php';
            
?>
              <hr><hr><hr>
              
            <div class="bor4"><div class='form'>
                  <form action="" method="post" >
              <h1 style="text-align: center; color: black; font-family: fantasy; font-size: 30px; text-shadow: -2px 2px 6px gray"> Add Review </h1>
              <span style="text-align: center; color: black; font-family: fantasy; font-size: 20px; text-shadow: -2px 2px 6px gray"> Name: </span>
              <input type="text" name="rn" placeholder="Name"><br>
              <span style="text-align: center; color: black; font-family: fantasy; font-size: 20px; text-shadow: -2px 2px 6px gray"> Rating:</span> 
             <select name="rv">
			 <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
			 </select><br><hr>
              <span style="text-align: center; color: black; font-family: fantasy; font-size: 20px; text-shadow: -2px 2px 6px gray"> Review:</span><br>
              <textarea rows="5" col= "30" name="rb" id="bodyText" placeholder="Your review"></textarea><br><hr>
              <input type="submit" id="addComent"  name="send" value="Send" />
			  </form>
              </div>
              
              <div id='container'>
			  <?php
              $reviews = ReviewCont::ShowReviewCont($mid);
              foreach ($reviews as $review): ?>
    <div class="commentBox">
        <div class="leftPanelImg">
            <img style="width: 34px;" src="Posters/user.png" alt="User image" />
        </div>
        <div class="rightPanel">
            <span>Name: <?= htmlspecialchars($review['name']) ?> </span>
            <div class="date">
                <img src="Posters/<?= htmlspecialchars($review['rating']) ?>.png" alt="<?= htmlspecialchars($review['rating']) ?>" />
            </div>
            <p>The Review: <?= htmlspecialchars($review['body']) ?></p>
        </div>
        <div class="clear"></div>
    </div>
<?php endforeach; ?>

	
			
			  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

                  
   
              </div>
			  <?php
			  		  $all=0;	
                        $movieId = $mid;
                        
// $overall_rating="Not rated yet";	

$reviewCounts = Reviewcont::getReviewCountsC( $movieId);
$totalReviews = array_sum($reviewCounts);
$overallRating = $totalReviews > 0 ? Reviewcont::calculateOverallRating($reviewCounts, $totalReviews) : "Not rated yet";

$movieDetails = ShowMovieCont::getMovieDetailsC( $movieId);
if (!$movieDetails) {
    die("Could not fetch movie details");
}

$categoryName = ShowMovieCont::getCategoryNameC( $movieDetails['categoryID']);
?>

<div class="bor3">
    <table class="movie-details">
        <caption style="text-align: center; color: black; font-weight: bold; font-size: 20px; font-family: serif">
            <strong><?= htmlspecialchars($movieDetails['name']) ?></strong>
        </caption>
        <tbody>
            <tr>
                <td><img src="data:image/jpg;base64,<?= base64_encode($movieDetails['logo']) ?>" width="300" height="400" alt="Movie Poster"></td>
                <th>
                    <p style="text-align: center">Trailer :<br> 
                        <a href="<?= htmlspecialchars($movieDetails['trailer']) ?>" target="_blank">
                            <img src="Posters/Trailer.png" width="190" height="200" alt="Trailer">
                        </a>
                    </p>
                    <hr>
                    <span style="text-align: left; font-size: 12px">Description: <hr><?= nl2br(htmlspecialchars($movieDetails['description'])) ?></span>
                </th>
            </tr>
            <tr><th colspan="2">Release year: <?= htmlspecialchars($movieDetails['year']) ?>.</th></tr>
            <tr><th colspan="2">Film language: <?= htmlspecialchars($movieDetails['language']) ?></th></tr>
            <tr><th colspan="2">Category: <?= htmlspecialchars($categoryName) ?> </th></tr>
            <tr><th colspan="2">Duration: <?= htmlspecialchars($movieDetails['duration']) ?></th></tr>
            <tr><th colspan="2">Film rating: <?= htmlspecialchars($movieDetails['rating']) ?></th></tr>
            <tr><th colspan="2">Users rating: <?= htmlspecialchars($overallRating) ?></th></tr>
        </tbody>
    </table>
</div>
              </body>
    <footer>
    <hr>
    <p style="text-align: center; color: whitesmoke; font-family: monospace; font-size: 18px; font-weight: bold; font-style: italic; text-shadow: -2px 2px 3px whitesmoke;"></p>
    </footer>

</html>