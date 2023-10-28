<?php
			namespace Movie;
            require_once 'connection.php';
            use Conn\Connection;

            class ShowMovie{
                static public function ShowMoviefun(){
                   
                    $conn = Connection::conn();
        
                    $query = "SELECT * FROM item";
                
                    if (!$result = mysqli_query($conn, $query)) {
                        die(mysqli_error($conn));
                    }
                
                    $array = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $array[] = array('ID' => $row['ID'], 'name' => $row['name']);
                    }
                    return $array;

                }
                static public function getCategory() {
                    $conn = Connection::conn();
                    $query = "SELECT * FROM category";
                 
                    if (!$result = mysqli_query($conn, $query)) {
                        die(mysqli_error($conn));
                    }
                
                    $array = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $array[] = array('ID' => $row['ID'], 'name' => $row['name']);
                    }
                    return $array;
                   
                }
            
                       static public function getMovieDetails($mid) {
                    $conn = Connection::conn();
                    $query = "SELECT * FROM item WHERE ID = ?";
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
                    return $result->fetch_assoc();
                }


                       static public function getCategoryName( $categoryId) {
                    $conn = Connection::conn();
                    $query = "SELECT name FROM category WHERE ID = ?";
                    $stmt = $conn->prepare($query);
                    if ($stmt === false) {
                        // Handle error
                        error_log("Error: " . $conn->error);
                        return false;
                    }
                
                    $stmt->bind_param("s", $categoryId);
                    if (!$stmt->execute()) {
                        // Handle error
                        error_log("Error: " . $stmt->error);
                        return false;
                    }
                
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    return $row['name'] ?? 'Unknown Category';
                }
                public static function updateMovie($mid, $name, $desc, $cid, $ryear, $moviel, $du, $movier, $tr, $logo) {
                    $conn = Connection::conn();

                    if (isset($_FILES['logo']) && $_FILES['logo']['name'] != "") {
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        if (strpos(finfo_file($finfo, $_FILES['logo']['tmp_name']), "image") === 0) {
                            $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                        }
                    }
                    if ($logo == "") {
                        $query = "UPDATE `item` SET 
                            `name` = ?, `description` = ?, `categoryID` = ?, 
                            `year` = ?, `language` = ?, `duration` = ?, 
                            `rating` = ?, `trailer` = ?
                            WHERE ID = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("ssssssssi", $name, $desc, $cid, $ryear, $moviel, $du, $movier, $tr, $mid);
                    } else {
                        
                        $query = "UPDATE `item` SET 
                            `name` = ?, `description` = ?, `categoryID` = ?, 
                            `year` = ?, `language` = ?, `duration` = ?, 
                            `rating` = ?, `trailer` = ?, `logo` = ?
                            WHERE ID = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("ssssssssbi", $name, $desc, $cid, $ryear, $moviel, $du, $movier, $tr, $logo, $mid);
                    }
            
                    if ($stmt->execute()) {
                        echo "<center><p style='color: black; text-shadow: -2px 2px 3px whitesmoke; font-family: cursive; font-size: 40px; background-color: gray;'>Updating Complete </p></center>";
                        header("Location: UpdateMovie.php");
                        exit;
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                }
            }






            