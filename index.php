<!DOCTYPE html>
<html lang="en">
  
<head>
  <title>Signup / Login</title>
  <link href="./bootstrap.css" rel="stylesheet">
  <link href="./custom.css" rel="stylesheet">
</head>
  
<style>

  @font-face{
      font-family:'KGSecondChancesSketch'; 
      src:url('./KGSecondChancesSketch.ttf');

     /* font-family: 'CabinSketch';
      src: url('fonts/CabinSketch-Regular.otf');*/
  }

  body{
    background: url("./backb.png");
    background-repeat:repeat;
    padding-top: 60px; }

  }


  h2{
      font-family:'Cabin Sketch' cursive;
    font-size: 40px;
    text-align:left;
  }  
</style>

<body>


    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style=" background-color: #25383c; border-color: #25383c;">
      <div class="container">
    
        <div class="navbar-header" style="height: 50px;">
    
          
              <a class="navbar-brand" href="index.php"><h1 style="font-family:'KGSecondChancesSketch' ; margin-top: -9px; color: white;">Goals.4.Jaaga<h1></a>
          </div>    
            </div><!--/.navbar-collapse -->
          </div>
      </div>
    </div>



  

  <!--Form starts here-->
<div class="container" > <!-- style="padding:80px 170px 0 170px;" -->
	<div class="row" style="padding-top: 20px; padding-bottom:20px; margin-left: auto;margin-right: auto;">
		<!--<div class="well" style="background-color: rgba(144,144,144,1);">-->
 <?php   
 if ($_GET['id']== 'y') 
 {
   $wrong = "Email or Password is wrong";
 }
 elseif ($_GET['id']== 'x') 
 {
    $exists= "User Already exists";

 }
?>
    
			<div class="col-md-4">
				<div class="well">
					<h2>Login</h2>
					Please login to continue

					<br>
          <br>
          <form action="./validateuser.php" method="post" data-toggle="validator" role="form"> 
            <div class="form-group">
              <label class="control-label" for="textinput" style="color:black;">Email:</label>  
            <input  name="email" type="email" placeholder="Username" class="form-control input-md" 
            data-error="Invalid Email Address" required>
            <div class="help-block with-errors"></div>
            <span style="color:crimson;"><?php echo $wrong; ?></span>
            </div>
        
            <div class="form-group">
            <label class="control-label" for="textinput" style="color:black;">Password:</label>       
              <input name="password" type="password" placeholder="Password" 
              class="form-control input-md" required>
              <span class="help-block with-errors"></span>
            </div>

  					<div class="form-group">
       			<label class="control-label" for="singlebutton"></label>
        		<button id="singlebutton" type="submit" name="singlebutton" class="btn btn-success btn-md">Log In</button>	
  					</div>

            </form>
        </div>
      </div>

      <div class="col-md-4">
          <div class="well">
          <h2>New User ?</h2>
          You need to have an account to continue
          <br>
          <br>
          <form action="./createuser.php" method="post" data-toggle="validator" role="form">
          <div class="form-group">
            <label class="control-label" for="textinput" style="color:black;">Your Name:</label> 
              <input name="name" type="text" placeholder="Full Name" 
              class="form-control input-md"
               pattern="([A-z ]){1,}"
            data-error="Please use only alphabets">
            <div class="help-block with-errors"></div>

          </div>

          <!-- ^([_A-z0-9]){3,}$ -->


          <div class="form-group">
            <label class="control-label" for="textinput" style="color:black;">Email:</label>  
              
            <input  name="email" type="email" placeholder="Username" class="form-control input-md" 
            data-error="Invalid Email Address" required>

            <div class="help-block with-errors"></div>
            <span style="color:crimson;"><?php echo $exists; ?></span>
          </div>

          <!--<div class="form-group">
            <label class="control-label" for="textinput" style="color:black;">Confirm Email</label>  
              
            <input  name="email" type="text" placeholder="Confirm Username" class="form-control input-md">
                
          </div>-->

            
          <div class="form-group">
           <label class="control-label" for="textinput" style="color:black;">Password:</label> 
            <input name="password" type="password" placeholder="Password" class="form-control input-md"
            data-toggle="validator" data-minlength="6" id="inputToMatch" required>
              <span class="help-block with-errors">Minimum of 6 characters</span>
          </div>

          <div class="form-group">
            <label class="control-label" for="textinput" style="color:black;">Confirm Password:</label> 

              <input name="password" type="password" placeholder="Password" class="form-control input-md" 
              data-toggle="validator" data-minlength="6" data-match="#inputToMatch" data-error="Password Mismatch">
              <span class="help-block with-errors"></span>

          </div>

            <div class="form-group">
                <label class="control-label" for="singlebutton"></label>
                <button type="submit" name="singlebutton" class="btn btn-success btn-lg">Sign Up</button> 
            </div>
            </form>


          </div>
      </div>

      <div class="col-md-4">
       <div class="well">
       <h2>Social Media Login</h2>
      
       Alternatively use your social media account to Login
        <br>
        <br>
        <div class="form-group">
            <label class="control-label" for="singlebutton"></label>
            <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-success btn-md">Facebook</button>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label" for="singlebutton"></label>
            <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-success btn-md">Google+</button>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label" for="singlebutton"></label>
            <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-success btn-md">Twitter</button>
        </div>
        </div>
      </div>  
    
    

      

    </div>

<script type="text/javascript" src="./jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="./bootstrap.min.js"></script>
<script type="text/javascript" src="./validator.js"></script>

</div>
<!-- Footer Begin -->
    <div class="row well" style="margin:0px -50px -50px -50px;">
        <div class="col-lg-4">

          <h3 style="font-family:'KGSecondChancesSketch'; text-align:center">Get in Touch</h3>
          <p style="text-align:center"> <strong>Contact Address</strong></br>
          1, Penthouse 01<br>
          Rich Homes<br>
          Richmond Road<br>
          Bangalore - 560025<br>
          INDIA<br>
          <br>

         <strong> Email: </strong><a href="mailto:contact@learnem.com">contact@learnem.com</a><br>
         <strong>Phone no.</strong>+91 986-654-6356
          </p>

          <br>
           
        </div>      
        <!--</div>-->
        <div class="col-lg-4">
         <h3 style="font-family:'KGSecondChancesSketch'; text-align:center">Reach Us</h3>
          <iframe width="300px" height="200px" frameborder="0" scrolling="no" 
          marginheight="0" marginwidth="0" style ="margin-left:30px" src="http://bit.ly/1fKde81">

          </iframe> 
        </div>
    </div>
    
<!-- Footer End -->
</body>

</html>
