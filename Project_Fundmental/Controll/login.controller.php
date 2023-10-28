<?php 
	require_once '../Model/login.model.php';
if(isset($_POST['login'])){
    $un=$_POST["UserName"];
    $password=$_POST["Password"];
  
    $textresonn = Login::LoginM($un,$password);

    if(!empty($textresonn)){
        echo $textresonn;
    }
}