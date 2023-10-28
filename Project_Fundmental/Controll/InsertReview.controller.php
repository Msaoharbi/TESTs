<?php 
	namespace Reviews; 
	require_once '../Model/ReviewMovies.Model.php';
	use Review\ReviewMovies;
if(isset($_GET['mid']))
	$mid=$_GET['mid'];
	
		if(isset($_POST['send'])){
		$rn =$_POST['rn'];
		$rb =$_POST['rb'];
		$rv =$_POST['rv'];
		
			ReviewMovies::InsertReviewModel($mid,$rn,$rb,$rv);

			}

	class ReviewCont{

		public static function ShowReviewCont($mid){
			if (!isset($mid) || !is_numeric($mid) || $mid <= 0) {
				error_log("Invalid movie ID: " . $mid);
				return "Invalid movie ID.";
			}
		return ReviewMovies::ShowReviewModel($mid);
		}

		static function calculateOverallRating($reviewCounts, $totalReviews){

			$totalReviews = array_sum($reviewCounts);
			if ($totalReviews === 0) {
				return "Not rated yet";
			}
			
			$ratingSum = 0;
			foreach ($reviewCounts as $rating => $count) {
				$ratingSum += $rating * $count;
			}
			
			return $ratingSum / $totalReviews;
		}
		static function getReviewCountsC($mid){

			return ReviewMovies::getReviewCounts($mid);
		}
		
	}		

