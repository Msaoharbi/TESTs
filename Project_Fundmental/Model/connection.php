<?php

namespace Conn;
class Connection{

    static public function conn(){
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Movie";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// Check connection
if(mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
}
return $conn;
}
}
?>