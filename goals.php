<?php 

if(!function_exists('dbopen'))
{
include ('./dbcon.php');
}
function createUser($name,$password, $email)
{
	$db=dbopen();
	$sql="INSERT INTO user (name, password,email)
	VALUES('$name','$password','$email')";
		//$result = $db->query($sql);
         
		if(!$db->query($sql))
		{
			 return ($db->error);
		}
		else
		{   $sql="SELECT * from user where email='$email' and password='$password'";
	        $result= $db->query($sql);
	        $row=mysqli_fetch_array($result);
	        $user_id=$row['user_id']; 
			
            $result->close();
            return ($user_id);
		  }
}

function userLogin($password,$email)
{
	$db = dbopen();
	
    $sql="SELECT * from user where email='$email' and password='$password' ";	
    $result =$db->query($sql);
	$row=mysqli_fetch_array($result); 
	$user_id = $row['user_id'];
	$count = mysqli_num_rows($result);
			if($count==1)
			{
  			return $user_id;
			}
		else
			{
			$InvalidUser="wrong username or password";
			return $InvalidUser;
			}
}

function getUser($email)
{
	$db = dbopen();
	$sql = "SELECT * from user where email= '$email'";
	$result = $db->query($sql);

	$row = mysqli_fetch_array($result);
	return ($row);
}

function updateUserInfo($user_id,$goal4jaaga,$goal4week,$CS_id,$Git_id,$CA_id,$course)
{
	$db = dbopen();
	$sql = "SELECT * from goals where user_id= '$user_id'";
	$result = $db->query($sql);
	$count = mysqli_num_rows($result); 
    
if($count == 1){
	$updates = array();
	if(!empty($user_id)){
	$updates[] = 'user_id="'.$db->real_escape_string($user_id).'"';}

	if (!empty($goal4jaaga)){
    $updates[] = 'goal4jaaga="'.$db->real_escape_string($goal4jaaga).'"';}	
	if (!empty($goal4week)){
    $updates[] = 'goal4week="'.$db->real_escape_string($goal4week).'"';}
    
    
    if (!empty($CS_id)){
    $updates[] = 'CS_id="'.$db->real_escape_string($CS_id).'"';}
    if (!empty($Git_id)){
    $updates[] = 'Git_id="'.$db->real_escape_string($Git_id).'"';}
    if (!empty($CA_id)){
    $updates[] = 'CA_id="'.$db->real_escape_string($CA_id).'"';}
    
    if (!empty($course)){
    $updates[] = 'course="'.$db->real_escape_string($course).'"';}
    
    

    $updates = implode(', ', $updates);
    $sql1 = "UPDATE goals SET $updates where user_id='$user_id'";
    if(!$db->query($sql1))
    {
                die('Error' .$db->error);
    }
}

else
{
   $sql1 = "INSERT INTO goals (user_id,goal4jaaga,goal4week,CS_id,Git_id,CA_id,course) 
   VALUES('$user_id','$goal4jaaga','$goal4week','$CS_id','$Git_id','$CA_id','$course')";
  if (!$db->query($sql1)) 
  {
  	die('Error' .$db->error);
  }
}

        return true;    
}

function getUserInfo($user_id)
{
	$db = dbopen();
	$sql ="SELECT * from goals where user_id= '$user_id'";
	$result =$db->query($sql);
	$row=mysqli_fetch_array($result); 

	return ($row);

}

function userPrework($CS_id,$Git_id,$CA_id)
{

        $CS_url ='https://www.codeschool.com/users/'.$CS_id.'.json';
        $CS_content = file_get_contents($CS_url,0,null,null);
        $CS_output =json_decode($CS_content,true);

        $Git_url = 'http://osrc.dfm.io/'.$Git_id.'.json';
        $Git_content= file_get_contents($Git_url,0,null,null);
        $Git_output=json_decode($Git_content,true);

        

        $CA_url = 'https://codeacademy-json.herokuapp.com/'.$CA_id.'';
        $CA_content= file_get_contents($CA_url,0,null,null);
        $CA_output=json_decode($CA_content,true);

        return [$CS_output,$Git_output,$CA_output];

    }
function get_gravatar($email, $s = 400, $d = 'monsterid', $r = 'g', $img = false, $atts = array() )
    {
        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) 
    {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val ){
            $url .= ' ' . $key . '="' . $val . '"';
    }
        $url .= ' />';
    }

    return $url;

    }
function allUserInfo()
{
    $db = dbopen();
    $sql="SELECT * from user inner join goals WHERE user.user_id = goals.user_id";
    $list = mysqli_query($db,$sql) or die ("couldnt execute");

    while($rows= mysqli_fetch_assoc($list))
        {
            
            $data[] = array('user_id'=>$rows['user_id'],'name'=>$rows['name'],
                'goal4week'=>$rows['goal4week'],'course'=>$rows['course']);
        }
        //var_dump($data);
        return($data);
        //return ($value);
}    


function logout()
    {
        session_destroy();
        setcookie( "email", "", time()- 60, "/","", 0);
    }

?>