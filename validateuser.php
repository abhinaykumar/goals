<?php
include ('./goals.php'); 
$email=$_POST['email'];
$password=$_POST['password'];

if((($email == 'akshay@jaaga.in') || ($email == 'freeman@jaaga.in')) && (($password =="akshay@jaaga") || ($password == "freeman@jaaga")))
{
  session_start();
  $_SESSION['email'] = $email;
  setcookie("email", "$email", time()+3600, "/","", 0);
  header("location:./admin.php");
}

else
{
$User= userLogin($password,$email);
 
 if(is_numeric($User)){
        $U_id=$User;
        session_start();
	      $_SESSION['email'] = $email;
        setcookie("email", "$email", time()+3600, "/","", 0);
			  //$_SESSION['time'] = time();
        header("location:./userpage.php");
      }
      else{ 
           header("location:./index.php?id=y");
       }
  }     
?>