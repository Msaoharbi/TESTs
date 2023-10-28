<?php 
            require_once 'connection.php';
use Conn\Connection;

			
class Login{
    static public function LoginM($un,$password){
       
		$conn = Connection::conn();
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
	$stmt->bind_param('s', $un);
	$stmt->execute();
	
	$result = $stmt->get_result();
	
	if ($result && $result->num_rows > 0) {
		$info = $result->fetch_assoc();
		
		// TODO: Use password_verify() when you start hashing passwords
		if ($password == $info['password']) {
			$_SESSION['login'] = true;
			header("Location: index.php");
			exit;
		}
	}
	

echo '<center><p>Incorrect User name or Password</p></center>';
                   
}
}
  