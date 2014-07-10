<?php
session_start();
$email = $_COOKIE['email'];
if(!($email == 'akshay@jaaga.in' || $email == 'freeman@jaaga.in')){
     
    header("location:./index.php?id=y"); 
}
include ('./goals.php');

$users = allUserInfo();

if($email == 'akshay@jaaga.in'){
	$name = "Akshay";
}
elseif ($email == 'freeman@jaaga.in') {
	$name = "Freeman";
}
else{
	header("location:./index.php?id=y"); 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <link href="./bootstrap.css" rel="stylesheet">
  <link href="./custom.css" rel="stylesheet" type='text/css'>
  <!-- <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch' rel='stylesheet' type='text/css'>-->
   <script language="javascript" src="./jquery-2.1.0.min.js">
  </script>
  
  <style type="text/css">
    @font-face{
      font-family:'KGSecondChancesSketch'; 
      src:url('fonts/KGSecondChancesSketch.ttf');

     /* font-family: 'CabinSketch';
      src: url('fonts/CabinSketch-Regular.otf');*/
    }
  
    body{
      background: url("./backb.jpg");
      background-repeat:repeat;
      padding-top: 80px;

    }
    
    /*img {
    position: relative;
    float:left;
    }*/

    img {
    float:left;
    height: auto;
    width: auto;
    max-width: 94%;
    max-height: 600px;
    margin:10px; 
    margin-right:30px;
    }
  </style>
</head>

<body>

	
	<!-- Navbar section -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style=" background-color: #25383c; border-color: #25383c;">
    	<div class="container">
    
    		<div class="navbar-header" style="height: 50px;">
    
          

   		<a class="navbar-brand" href="index.php"><h1 style="font-family:'KGSecondChancesSketch';
   		 margin-top: -9px;color: white;">Goals.4.Jaaga</h1></a>

        </div>

        <div class="collapse navbar-collapse">
            	
              <div class="navbar-collapse collapse">
          <div class="navbar-form navbar-right">
  <a href="./logout.php" class="btn btn-danger">LOGOUT</a>
               
              <!--<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Sign in</button> -->

              </div><!--/.navbar-collapse -->
            </div>
        </div><!--/.navbar-collapse -->
      </div>      	
  </div> 

		
  

  	
     <div class="container">
        <div class="row" style="margin-left: auto; margin-right: auto; padding-bottom: 20px;">
     	<h1 style="text-align:center; font-family:'KGSecondChancesSketch' cursive;">
        Hello <?php echo $name; ?>,Nice to see you.
      </h1>
       
    </div>
    </div>
    <div class="container">
	  
 	  <div class="row" align="center">
 	  <div class="col-lg-2"></div>
    	<div class="col-lg-8" >
      
     		<div class="well">
        		<iframe src="//www.ustream.tv/embed/18452104?wmode=direct" style="border: 0 none
        		 transparent;" frameborder="no" width="600" height="400"></iframe>
        		<br />
      	</div>
    	</div>
    </div>
  </div>
  
<div class="container">
<div class="row">    
    <?php foreach($users as $user): ?>
    
       <div class="col-lg-3">
        	<div class="well admin" >
        	   <!-- style="width: 340px;"--> 
          	 <h3><?php echo $user['name'];?></h3>
          	 <p><?php echo $user['course'];?> </p>
          	</div>
     	</div>
    	
       <?php endforeach; ?>
</div>       
</div>    
</body>
</html>