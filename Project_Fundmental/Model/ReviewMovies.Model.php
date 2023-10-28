<?php

            namespace Review;
            require_once 'connection.php';
            use Conn\Connection;
            class ReviewMovies{


            
             
                
       
                static public function InsertReviewModel($mid,$rn,$rb,$rv){
      
                    $conn = Connection::conn();
    
                    $query = "INSERT INTO `review`(`item_id`, `name`, `body`, `rating`) VALUES (?, ?, ?, ?)";
    
                    $stmt = $conn->prepare($query);
                    if ($stmt === false) {
                        // Handle error
                        echo "Error: " . $conn->error;
                        return;
                    }
                
                    $stmt->bind_param("ssss", $mid, $rn, $rb, $rv);
                    if (!$stmt->execute()) {
                        // Handle error
                        echo "Error: " . $stmt->error;
                    }
                }


            static public function ShowReviewModel($mid){
        
                $query = "SELECT * FROM review WHERE item_id = ? ORDER BY ID DESC";
                $conn = Connection::conn();
                $stmt = $conn->prepare($query);
                if ($stmt === false) {
                    error_log("Error: " . $conn->error);
                    return "An error occurred.";
                }
        
                $stmt->bind_param("s", $mid);
                if (!$stmt->execute()) {
                    error_log("Error: " . $stmt->error);
                    return "An error occurred.";
                }
        
                $result = $stmt->get_result();
                $reviews = [];
        
                while ($row = $result->fetch_assoc()) {
                    $reviews[] = $row;
                }
        
                return $reviews;
            
            }

            static public function getReviewDetails( $mid) {
                $conn = Connection::conn();
                $query = "
                    SELECT rating, COUNT(*) as count
                    FROM review
                    WHERE item_id = ?
                    GROUP BY rating
                ";
            
                $stmt = $conn->prepare($query);
                if ($stmt === false) {
                    // Handle error
                    error_log("Error: " . $conn->error);
                    return false;
                }
            
                $stmt->bind_param("s", $mid);
                if (!$stmt->execute()) {
                    // Handle error
                    error_log("Error: " . $stmt->error);
                    return false;
                }
            
                $result = $stmt->get_result();
                $reviewDetails = [
                    'counts' => [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0],
                    'overallRating' => "Not rated yet"
                ];
            
                $totalReviews = 0;
                $ratingSum = 0;
            
                while ($row = $result->fetch_assoc()) {
                    $rating = (int) $row['rating'];
                    $count = (int) $row['count'];
            
                    $reviewDetails['counts'][$rating] = $count;
                    $totalReviews += $count;
                    $ratingSum += $rating * $count;
                }
            
                if ($totalReviews > 0) {
                    $reviewDetails['overallRating'] = $ratingSum / $totalReviews;
                }
            
                return $reviewDetails;
            }
            static public  function getReviewCounts( $movieId) {
                $conn = Connection::conn();
                $query = "SELECT rating, COUNT(*) as count FROM review WHERE item_id = ? GROUP BY rating";
                $stmt = $conn->prepare($query);
                if ($stmt === false) {
                    error_log("Error preparing query: " . $conn->error);
                    return false;
                }
            
                $stmt->bind_param("s", $movieId);
                if (!$stmt->execute()) {
                    error_log("Error executing query: " . $stmt->error);
                    return false;
                }
            
                $result = $stmt->get_result();
                $reviewCounts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
                while ($row = $result->fetch_assoc()) {
                    $rating = (int) $row['rating'];
                    $count = (int) $row['count'];
                    $reviewCounts[$rating] = $count;
                }
            
                return $reviewCounts;
            }
            
            }