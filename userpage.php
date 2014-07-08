<?php
session_start();
if(!isset($_COOKIE['email']))
{
  header("location:./index.php");
}

include ('./goals.php');
$email=$_COOKIE['email'];

$User= getUser($email);


$UserInfo=getUserInfo($User['user_id']);
      $CS_id= $UserInfo['CS_id'];
      $Git_id=$UserInfo['Git_id'];
      $CA_id=$UserInfo['CA_id'];
               
               // GET CODESCHOOL INFORMATION //  
        list($CS_output,$Git_output,$CA_output)= userPrework($CS_id,$Git_id,$CA_id);
        $CS_Username= $CS_output['user']['username'];
        $CS_TotalScore=$CS_output['user']['total_score'];
        $CS_NumOfCourse=count($CS_output['courses']['completed']);

        // GET GITHUB PROFILE //
        $Git_Username= $Git_output['username'];
        $Git_Repo = $Git_output['repositories'];
        $Git_Languages= $Git_output['usage']['languages'];
        $Git_Totalpushes = $Git_output['usage']['total'];
         
         // GET CADECADEMY PROFILE //
        $CA_Username= $CA_id;
        $CA_Totalpoints=$CA_output['points'];
        $CA_Tracks = $CA_output['tracks'];

        //GET GRAVATAR //
        $url=get_gravatar($email); 


?>
<!--HTML PAGE -->

<!DOCTYPE html>
<html>

<head>
	<title>User Dashboard</title>

	<link href="./bootstrap.css" rel="stylesheet">
	<link href="./custom.css" rel="stylesheet" type='text/css'>

  <script language="javascript" src="./jquery-2.1.0.min.js">
  </script>	

	<style>
	 @font-face{
      font-family:'KGSecondChancesSketch'; 
      src:url('./KGSecondChancesSketch.ttf');

     /* font-family: 'CabinSketch';
      src: url('fonts/CabinSketch-Regular.otf');*/
         }
         

    body{
    background: url("./backb.jpg");
    background-repeat:repeat;
    padding-top: 80px;
    }
		#bg{
    	background:url('./chalkboard2.jpg');
    	border: 3 solid /*#33cc33*/#6E8B3D;
		color: #FFFFe0;
		text-align: center;
		}
		.sponsor_data{
		font-family:'Cabin Sketch' cursive;
		font-size: 27px;
		}
	</style>  
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style=" background-color: #25383c; border-color: #25383c;">
      <div class="container">
      
        <div class="navbar-header" style="height: 50px;">
      

          <a class="navbar-brand" href="index.php">
          <h1 style="font-family:'KGSecondChancesSketch' ; margin-top: -9px;color: white;">Goals.4.Jaaga</h1></a>
        </div>

        
        
          <div class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">

                <a href="./logout.php" class="btn btn-danger">LOGOUT</a>
                
                <!--<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Sign in</button> -->

            </div>             
          </div>
          
        </div>
      </div>

    <div class="container" >

    <!-- Social Media, Name & Edit application Row -->
  		<div class="row">

    		<!-- End -->

        <!-- Name of Student -->

    			<div class="col-lg-6">

    				<h1 align="center" style="font-family:'KGSecondChancesSketch' cursive; font-size: 60px; margin-top: 0px;" >
    				<?php echo $User['name']; 
    				?>
    				</h1>
    			</div>
        		
        <!-- End -- >
<div class="col-lg-3"></div>
                  
        <!-- Edit Application Button -->

  			 <div class="col-lg-3 pull-right" > <!--  -->
     <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#appEdit">
    			Update Your Information
  				    </button><!-- button for pop up to edit the contents of the page -->
      				
      			
      	 </div>	
        <!-- End -->
      </div>
    <!-- Row end -->
</div>
    <br>
   
    <!-- Student Image & Sponsored Details -->
      <div class="row">

        <!-- Image of Student -->
        <div class="col-md-7"  text-align="justify">
  				<img src="<?php echo $url;?>" width="100%" height="400px">
  		 		

  				
  		 		<div class="well" width="100%">
  		 		<h3 style="font-family:'KGSecondChancesSketch' cursive;">MY Goal.4.Jaaga</h3>

          			<br>

          			<p style="text-align:justify"><?php echo $UserInfo['goal4jaaga']; ?>
  					</p>
      			</div>
  			</div>
        <!-- End -->

  		  <!-- Donation Details -->
  		  <div class="col-md-5"> 

  				<div class="well" style="background-color:#33cc66; height:400px" id="bg" >
  			     <h3 style="font-family:'KGSecondChancesSketch' cursive;">MY Goal.4.Week</h3>	
  			     <p style="text-align:justify"><?php echo $UserInfo['goal4week']; ?>
  			     </p>
  				</div>

  				<br>

  				<div class="well" style="background-color:#; height:450px; margin-top: -20px; text-align: justify;">

  				<!--<a class="edit"href="#">

                		<span class="glyphicon glyphicon-edit"  style="font-size:24px;"></span>
          
          		</a>-->

  					<h3 style="font-family:'KGSecondChancesSketch' cursive;">I am Taking This Course or Using these Materials</h3>
  					<p><?php echo $UserInfo['course']; ?></p>
  				</div>
  			</div>
        <!-- End -->
      </div>
    <!-- Row End -->

    <h3 align="center" style="font-family:'KGSecondChancesSketch';">PreWork Status</h3>
      	
    <!-- Codeschool Row Begin -->
        <div class="row">

          <!-- CodeSchool Profile -->
          
            <div class="col-md-6"  >
            
      				<div class="panel panel-info">

      				  <div class="panel-heading">My Codeschool Profile</div>
                  <div class="panel-body">
                	  <img src="./codeschool_logo.png" alt="CodeSchoolProfile" style="Height:80px" align="right"> 				
                    <ul>
                        <li>
                          <em>Username:</em>
                          <strong><?php echo $CS_Username; ?></strong>
                        </li>

                        <li>
                          <em>Course Completed:</em>
                          <strong><?php echo $CS_NumOfCourse; ?></strong>
                        </li>

                        <li>
                          <em>Total Points:</em>
                          <strong><?php echo $CS_TotalScore; ?></strong>
                        </li>
                    </ul>
      					  </div>	 
              </div>
            </div>  
          
          <!-- End -->

          <!-- Codeschool Badges -->
            <div class="col-md-6">
                <div class="panel panel-info">

                  <div class="panel-heading">Codeschool Badges</div>
                    <div class="panel-body"><?php
                           foreach($CS_output['badges'] as $value){

                            ?>
       
                            <img src="<?php echo $value['badge']; ?>" width="10%" height="50px">
                           <?php 
                           }
                            ?>
                    </div>
                  
                </div>		
      	    </div>
          <!-- End -->
        </div>
    <!-- Codeschool Row End -->

    <br>

    <!-- GitHub Row Begin -->
        <div class="row">

          <!-- Github Profile -->
            <div class="col-md-6">
                <div class="panel panel-info">
               
                  <div class="panel-heading">My GITHUB Profile</div>
                    <div class="panel-body">
                      <img src="./github_logo.png" alt="GithubProfile" align="right" style="Height:70px">
                      <ul>
                        <li>
                          <em>Username:</em>
                          <strong><?php echo $Git_Username; ?></strong>
                        </li>
                        <li>
                          <em>Total Pushes:</em>
                          <strong><?php echo $Git_Totalpushes; ?></strong>
                        </li>
                        <li>
                          <em>Repositories Worked:</em><br>
                          <ol>
                          <?php
                              foreach($Git_Repo as $repo){
                                ?>
                                <strong><li>
                                <?php echo $repo['repo']; ?></li>
                          </strong><?php } ?>
                          </ol>
                        </li>
                      </ul>
                    </div>
                  
                </div>
            </div>
          <!--End-->

          <!-- Github Languages & Pushes -->
            <div class="col-md-6">
                <div class="panel panel-info">

                  <div class="panel-heading">Languages and Total Pushes:</div>
                    <div class="panel-body">
                      <?php
                        
                        foreach ($Git_Languages as $language ) { 
                      ?><em>Language:</em>
                      <strong><?php echo $language['language']; ?></strong>
                      <em>Total Pushes: </em>
                      <strong><?php echo $language['count']; ?></strong><br>
                      <?php } ?>
                    </div>
                  
                </div>
            </div>
          <!-- End -->
        </div>
    <!-- GitHub Row End -->

    <br>

    <!-- Codeacademy Row Begin -->
    <div class="row">

        <!-- Codeacademy Profile -->
        <div class="col-md-6">
          <div class="panel panel-info">
               
            <div class="panel-heading">My Codecademy Profile</div>
              <div class="panel-body">
                <img src="./codecademy_logo.png" alt="CodecademyProfile" align="right" style="Height:80px">
                <ul>
                  <li>
                    <em>Username:</em>
                    <strong><?php echo $CA_Username; ?></strong>
                  </li>
                  <li>
                      <em>TotalPoints:</em>
                      <strong><?php echo $CA_Totalpoints; ?></strong>
                  </li>
                </ul>
              </div>
            
          </div>
        </div>
        <!-- End -->
      
        <!-- Codeacademy Tracks -->
        <div class="col-md-6">
          <div class="panel panel-info">
            <div class="panel-heading">Codecademy Tracks</div>
              <div class="panel-body">
                      
                      
                <em>Tracks:</em>
                   <?php 
                    foreach ($CA_Tracks as $tracks){ ?>
                      <ul>
                      <li>
                        <strong><?php echo $tracks['title']; ?></strong>
                      </li>
                      </ul>
                      <?php } ?>
                   </div>
                     
                   </div> 
    
              </div>

            
          </div>
        

    <br>


  
    <!-- End -->
      <!--</div>-->

  	
      <!--
  	  <footer class="footer" style="text-align:center">
    		<nav>
      		<ul>
      			<a href="index.php">Home </a> |
      			<a href= "aboutus.php">About Us</a> |
        			<a href= "#hiw">How It Works</a> |
        			<a href="#faq">FAQ</a> |
        			<a href="#contact">Contact</a>  

      		</ul>
    		</nav> 
  	  </footer>-->




      <!-- Edit Information modal -->
  	  <div class="modal fade" id="appEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    		<div class="modal-dialog">
      		<div class="modal-content">
        			<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          				<h4 class="modal-title" id="myModalLabel">Edit your Information</h4>
        			</div>
        			<div class="modal-body">
    <!--Form Starts Here -->    				
<form action="./updateuser.php" class="form-horizontal"  method="post" autocomplete="on" role="form" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $User['user_id']; ?>">
            
            <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Your Goal.4.Week:*</label>  
            <div class="col-md-6">
            <textarea rows="4" cols="9" placeholder="Whats Your Goal for this Week" class="form-control" name="goal4week"></textarea>
            </div>
             </div>  
            
            <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Your Goal.4.Jaaga:*</label>  
            <div class="col-md-6">
            <textarea rows="4" cols="9" placeholder="Whats Your Goal for Jaaga" class="form-control" name="goal4jaaga"></textarea>
            </div>
             </div>

             <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Course Taking:*</label>  
            <div class="col-md-6">
            <textarea rows="4" cols="9" placeholder="Which Course You are taking" class="form-control" name="course"></textarea>
            </div>
             </div>  
              
            
         <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">CodeSchool ID:</label>
         <div class="col-md-6">
         <input name="CS_id" type="text" placeholder="Codeschool Username" class="form-control"> 
         </div>
         </div>
         
         <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">CodeAcademy ID:</label>
         <div class="col-md-6">
         <input name="CA_id" type="text" placeholder="CodeAcademy username" class="form-control"> 
         </div>      
         </div>

         <div class="form-group">
         <label class="col-md-4 control-label" for="textinput">Github ID:</label>
         <div class="col-md-6">
         <input name="Git_id" type="text" placeholder="Github username" class="form-control"> 
         </div>
         </div>             
<br><br><br>
              <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <input class="btn btn-success" type="submit" value="Save Changes"></button>          

              </div>
            </form>
            </div>
        </div>
   </div>
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

  <script type="text/javascript" src="./jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="./bootstrap.min.js"></script>
</body>

</html>

