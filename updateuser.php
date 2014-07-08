<?php
include ('./goals.php');

$user_id = $_POST['user_id'];
$goal4week = $_POST['goal4week'];
$goal4jaaga = $_POST['goal4jaaga'];
$course = $_POST['course'];
$CS_id = $_POST['CS_id'];
$Git_id = $_POST['Git_id'];
$CA_id = $_POST['CA_id'];

if (empty($goal4week) && empty($goal4jaaga) && empty($course) && empty($CS_id) && 
	empty($Git_id) && empty($CA_id))
{ 
 header("location:./userpage.php");
} 
else
{ 
 updateUserInfo($user_id,$goal4jaaga,$goal4week,$CS_id,$Git_id,$CA_id,$course);
 header("location:./userpage.php");
}
 ?>