<?php
session_start();
include "session.php";
include"../connect.php";


if (!isset($_SESSION['passi'])){
  header("location:../students.php");
  exit();
} 

if(!isset($_SESSION['cur_user'])){
  $_SESSION['cur_user'] = $_SERVER['REMOTE_ADDR'];
}

?>
<!DOCTYPE HTML>

  <head>
        <title>Profile</title>
        <link rel="icon" href="../img/ginger-star.png">
        <meta charset="utf-8">
   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../edit.css" rel="stylesheet" media="screen">
        <link href="nav.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="../w3.css">
                          
  
     
        <script src="../jquery-3.2.1.min.js"></script> 
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/myjs.js"></script>
        <!-- <link rel="stylesheet" href="../w3/w3.css">		    -->

        <!-- Livechat for this template-->
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="../bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="css/chat_style.css" /> 
        <script src="js/jquery-3.3.1.js"></script>
        <script src="bootstrap4/js/bootstrap.js"></script>
        <script src="js/main.js"></script>
        <!-- Livechat end-->

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('outputpix');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  </script>
    
  <style>
#outputpix{
    width:50%;
    height:150px;
    border-radius:100px;
    margin:10px;
} 

</style>


  </head>
<body style="font-family: ok;">

<!-- SIDEBAR -->
<div class="sidebar">
  <section class="s_log">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>
  <a  href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
  <a href="submit.php"><span class="glyphicon glyphicon-share"></span> Complain / Question</a>
  <a href="marked.php"><span class="glyphicon glyphicon-check"></span> Scheduled Appointments </a>

  <a href="new.php"><span class="glyphicon glyphicon-calendar"></span> Important Information </a>
  <a class="active" href="profile.php"><span class="fa fa-cogs"></span> Profile </a>
  
  <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')"><span class="glyphicon glyphicon-off"></span> Logout</a>

</div>
<!-- END SIDEBAR -->

<!--  MOBILE SIDEBAR -->
<div class="smob">
  
<section class="s_log">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>  

  <div class="navimg" id="navhide">
    <span class="fa fa-navicon" id="naviconhide"></span>
    <span class="fa fa-list-ul" id="naviconshow"></span>
  </div>  
  

  <ul class="" id="navshow">
  <br><br>
  <a class="smoblink"  href="index.php"><li><span class="glyphicon glyphicon-home"></span> Dashboard </li></a>
  <a href="submit.php" class="smoblink"><li><span class="glyphicon glyphicon-share"></span> Complain / Question </li></a>
  <a href="marked.php" class="smoblink"><li><span class="glyphicon glyphicon-check"></span> Scheduled Appointments </li></a>

  <a href="new.php" class="smoblink"><li><span class="glyphicon glyphicon-calendar"></span> Important Information </li></a>
  <a href="profile.php" class="smoblink"><li id="act"><span class="fa fa-cogs"></span> Profile </li></a>
  
  <a href="logout.php" class="smoblink" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->


<div class="content" >
<div class="row topcontent" style="margin-bottom:50px;">
<h2 class="col-md-6"><center><span class="fa fa-cogs"></span> Edit Profile</center></h2><br>
  <section class="col-md-6">
  <center>
            <span class="nav-item">
              <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="" aria-expanded="">
                <span class="mr-6 d-none d-lg-inline text-gray-600 large" style="font-weight:bold;"><?php echo $name; ?></span>
                <img  src="../<?php echo $pp; ?>" class="img-profile img-circle" width="40px" style="margin-left:7px;">
              </a>              
            </span>
            </center>
  </section>
</div>

<!-- EDITING OF PROFILE -->

<div class="col-xl-8 col-lg-6">
        <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $name."'s"; ?> Profile</h6>
                  <!-- <div class="dropdown no-arrow"><span class="fa fa-user"></span></div> -->
                </div>
                <!-- Card Body -->
                <div class="card-body">
				<div style="">
				<center>
				<table class="table table-responsive">
				<?php
				 $mysqli1="select * from st where student_id='".$id."'";
	            $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
	            while($fetch=mysqli_fetch_assoc($myquery1)){
				
				?>
        <tr>
          <img  src="../<?php echo $pp; ?>" class="img-profile rounded-circle" style="width:200px; height:200px">
          <span onclick="document.getElementById('id01').style.display='block'" title="Edit profile picture" class="" style=" background:none; color:#f63; border:none; cursor: pointer; display:block; padding:10px;">
          <b>Edit <span class="fa fa-camera"></b></span>
          </span>
            <!-- ============**************** profile pic ============**************** -->
            <div id="id01" class="w3-modal w3-padding" style="z-index:1000;">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:30px;">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <h2 style="color:#f63; text-decoration:underline;"> <span class="fa fa-camera"></span> Change Profile Picture</h2>
            </div>


  <?php
       if (isset($_POST['pic'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
			      
$imgname=$_FILES['ufile']['name'];
$templocation=$_FILES['ufile']['tmp_name'];
$fakepath="../students/".$email."/".$imgname; 
$realpath="students/".$email."/".$imgname; 

    if (file_exists($realpath)) {
    echo"<script>alert('Image already Exist')</script>";  
} 
    else{
$saveimg= move_uploaded_file($templocation,$fakepath);

        $senddata2 = mysqli_query($con,"UPDATE st SET picture = '".mysqli_real_escape_string($con,$realpath)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");
        
  }
    if(@$senddata2){
    echo"<script>alert('Image Was Updated succesfully')</script>";
                    
                    $_SESSION['passi']=$row['pass_w'];
                    $_SESSION['mail']=$row['email'];
                    $_SESSION['pic']=$row['picture'];					
										
					echo "<script> location.replace('profile.php')</script>";
  }    
}
    ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								<center>
                <img src="../img/faceless.png" alt="" class="img-responsive"  align="absmiddle" id="outputpix"/><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                
                <input type="file" class="form-control"  name="ufile" id="ufile5" accept="image/*" onchange="loadFile(event)" required="required"/><br>
                </center>
								
				<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
				<button type="submit" name="pic" class=" trans_200 form-control btn-primary w3-text-white"><b>Update Picture</b></button><br><br>
	    </form>      
      <div class="w3-container w3-border-top w3-padding-16" style="background:;">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->			
        </tr><br>

				<tr>
				<th class="text-primary">Name</th>
				<th><?php echo $fetch['Name']; ?>&nbsp;&nbsp;
        <span onclick="document.getElementById('id02').style.display='block'" title="Edit Name"     class="" style=" background:none; color:#f63; border:none; cursor: pointer;">
          Edit <span class="fa fa-edit"></span>
          </span>

          <!-- ============**************** Fullname ============**************** -->
<div id="id02" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:0px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:#60c; text-decoration:underline;" class="fonti"> <span class="fa fa-edit"></span> Change Name</h2>
      </div><br>


  <?php
       if (isset($_POST['nam'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
$sname=test_input($_POST["sname"]); 

        $senddata2 = mysqli_query($con,"UPDATE st SET Name = '".mysqli_real_escape_string($con,$sname)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");

        if(@$senddata2){
    echo"<script>alert('Name Was Updated succesfully')</script>";
                    
                    // $_SESSION['passi']=$row['pass_w'];
                    // $_SESSION['mail']=$row['email'];
		 							
					echo "<script> location.replace('profile.php')</script>";
                    
           }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								
                  <input type="text" placeholder="Enter Name" name="sname" class="comment_input form-control" required="required"><br>
									
				<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
				<button type="submit" name="nam" class=" trans_200 form-control btn-primary w3-text-white" ><b>Update Name</b></button><br><br>
				</form>      
      <div class="w3-container w3-padding-16" style="background:;">
        <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->			

        </th>
				</tr>
				
				<tr>
				<th class="text-primary">Reg Number</th>
				<th><?php echo $fetch['reg_num']; ?>&nbsp;&nbsp;
        <span onclick="document.getElementById('id04').style.display='block'" title="Edit Reg Number"     class="" style=" background:none; color:#f63; border:none; cursor: pointer;">
          Edit <span class="fa fa-tags"></span>
          </span>

          <!-- ============**************** Reg Number ============**************** -->
<div id="id04" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:0px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:#60c; text-decoration:underline;"> <span class="fa fa-edit"></span> Change Reg Number</h2>
      </div><br>


  <?php
       if (isset($_POST['regnum'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
$reg=test_input($_POST["reg"]); 

        $senddata2 = mysqli_query($con,"UPDATE st SET reg_num = '".mysqli_real_escape_string($con,$reg)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");

        if(@$senddata2){
    echo"<script>alert('Reg Number Was Updated succesfully')</script>";
                    
                    // $_SESSION['passi']=$row['pass_w'];
                    // $_SESSION['mail']=$row['email'];
		 							
					echo "<script> location.replace('profile.php')</script>";
                    
           }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								
                  <input type="text" placeholder="Enter Reg Number" name="reg" class="comment_input form-control" required="required"><br>
									
				<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
				<button type="submit" name="regnum" class=" trans_200 form-control btn-primary w3-text-white" ><b>Update Reg Number</b></button><br><br>
				</form>      
      <div class="w3-container w3-padding-16" style="background:;">
        <button onclick="document.getElementById('id04').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->			

        </th>
				</tr>

				<tr>
				<th class="text-primary">Email</th>
				<th><?php echo $fetch['email']; ?></th>
				</tr>
				<tr>
				<th class="text-primary">Level</th>
				<th><?php echo $fetch['level']; ?></th>
				</tr>
				<tr>
				<th class="text-primary">Programme</th>
				<th><?php echo $fetch['programme']; ?></th>
				</tr>

                <tr>
				<th class="text-primary">Semester</th>
				<th><?php echo $fetch['semester']; ?></th>
				</tr>
				
				<tr>
				<th class="text-primary">Phone</th>
				<th><?php echo $fetch['phone']; ?>&nbsp;&nbsp;
        <span onclick="document.getElementById('id03').style.display='block'" title="Edit Phone Number"     class="" style=" background:none; color:#f63; border:none; cursor: pointer;">
          Edit <span class="fa fa-phone"></span>
          </span>

  <!-- ============**************** Phone ============**************** -->
  <div id="id03" class="w3-modal w3-padding" style="z-index:1000;">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px; padding:0px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <h2 style="color:lime; text-decoration:underline;" class="fonti"> <span class="fa fa-phone"></span> Change Phone Number</h2>
      </div><br>


  <?php
       if (isset($_POST['pho'])){
					 
					 //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

$email=test_input($_POST["email"]);
$phone=test_input($_POST["phone"]);

        $senddata2 = mysqli_query($con,"UPDATE st SET phone = '".mysqli_real_escape_string($con,$phone)."'  where email ='".mysqli_real_escape_string($con,$email)."' ");

        if(@$senddata2){
    echo"<script>alert('Phone Number Was Updated succesfully')</script>";
                    
                    // $_SESSION['passi']=$row['pass_w'];
                    // $_SESSION['mail']=$row['email'];
		 							
          // echo "<script> location.replace('profile.php')</script>";
          echo "<meta http-equiv='Refresh' content='0; url=profile.php'>";
                    
           }    
}
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="col-md-6">
								
                  <input type="text" placeholder="Phone Number" name="phone" class="comment_input form-control" required="required" min="11" max="11"><br>
                              
				<input type="email" value="<?php echo $mail; ?>" name="email" class="comment_input form-control" required="required" readonly="readonly" style="display:none;"><br>
									
				<button type="submit" name="pho" class=" trans_200 form-control btn-primary w3-text-white" ><b>Update Phone Number</b></button><br><br>
	</form> 

      <div class="w3-container w3-padding-16" style="background:;">
        <button onclick="document.getElementById('id03').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  </div>

    </div>
  </div>
<!-- THE END -->			

        </th>
				</tr>

				
				<?php } ?>
				</table>
				</center>
				  </div>
				  <br>
				 
                 
                </div>
              </div>
            </div>
			
          </div>

<!-- END OF EDITING OF PROFILE -->
</div>
<!-- END OF CONTENT -->
<script src="../dataTables/jquery.dataTables.js"></script>
    <script src="../dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

<!-- Livechat for this template-->
<?php
        include 'foot.php';
    ?>
 <!-- Livechat end -->


	</body>
	</html>																							   
																								   