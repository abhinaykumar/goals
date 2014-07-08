<?php
include ('./goals.php'); 
$name = $_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$User= createUser($name,$password,$email);
 
 if(is_numeric($User)){
        $U_id=$User;
        session_start();
	      $_SESSION['email'] = $email;
        setcookie("email", "$email", time()+3600, "/","", 0);
			  //$_SESSION['time'] = time();
        header("location:./userpage.php");
      }
      else{ 
           header("location:./index.php?id=x");
       }
?>