<?php
session_start();
include "connect.php";
?>
<!DOCTYPE HTML>

<head>
    <title>Student's Registration</title>
    <link rel="icon" href="img/ginger-star.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
                            
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="edit.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
 
    <script src="jquery-3.2.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
																	   
</head>

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('outputpix');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };</script>

  <script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
   
    $("#naviconshow").show(10);
    $("#naviconhide").hide();	   
  } else {
    x.type = "password";
   
    $("#naviconhide").show(10);
    $("#naviconshow").hide();	   
  }
} 
  </script>




<body>

<div class="cover">
	<br><br><br>
	
<div class="jumbotron jumb">
	<br>
<center>
  <h3><a href="index.php"><i class="fa fa-home"></i> Course Adviser Appointment Scheduling Portal</a></h3><br>
  
  
    <div class="col-sm-4">
    </div>
    
    <div class="container lo col-sm-4">
    <p>Alraedy Created an account??</p>
    <a href="#" data-toggle="modal" data-target="#myModal"><span class="label label-primary lab">Login</span></a>
    </div>

    <div class="col-sm-4">
    </div>

    <h2 class="col-sm-12"><b>Create A Student Account</b></h2><br>
    </center>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">


<?php
             
                 if (isset($_POST['sub'])){
           
           //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends
           
  
   
          
            
      
      $name=test_input($_POST["name"]);
      $level=test_input($_POST["level"]);
      $prog=test_input($_POST["prog"]);
      $sem=test_input($_POST["sem"]);
      $reg=test_input($_POST["reg"]);
      $email=test_input($_POST["email"]);
      $pass=test_input($_POST["pass"]);
      $phone=test_input($_POST["ph"]);

      $duser=$level."/".date("Y")."/";
              $generate=rand(99,9999999);
            $userid=$duser.$generate;


$imgname=$_FILES['ufile']['name'];
$templocation=$_FILES['ufile']['tmp_name'];
$fakepath="students/".$email."/".$imgname; 
$realpath="students/".$email."/".$imgname; 
$num=0;


$check2=mysqli_query($con,"select * from st where email='".mysqli_real_escape_string($con,$email)."' ");

    $row2=mysqli_num_rows($check2);
    
if($row2 > 0 ){
         echo"<script>alert('email already exists')</script>";
         
    }
    elseif (file_exists($realpath)) {
    echo"<script>alert('Change Photo Name')</script>";
    
} 
    
    else{
        if($row2==0){

$cf=mkdir("students/".$email);
$saveimg= move_uploaded_file($templocation,$fakepath);

        $senddata2 = mysqli_query($con,"insert into st (student_id,reg_num,Name,level,programme,semester,picture,assign_num,email,pass_w,phone) values
    ('".mysqli_real_escape_string($con,$userid)."','".mysqli_real_escape_string($con,$reg)."','".mysqli_real_escape_string($con,$name)."',
    '".mysqli_real_escape_string($con,$level)."','".mysqli_real_escape_string($con,$prog)."','".mysqli_real_escape_string($con,$sem)."','".mysqli_real_escape_string($con,$realpath)."',
    '".mysqli_real_escape_string($con,$num)."','".mysqli_real_escape_string($con,$email)."','".mysqli_real_escape_string($con,$pass)."','".mysqli_real_escape_string($con,$phone)."')")or die(mysqli_error($con)); 
  
  $query = "select * from st where  pass_w='".mysqli_real_escape_string($con,$pass)."' AND email='".mysqli_real_escape_string($con,$email)."' ";
                $result = mysqli_query($con,$query)or die(mysqli_error($con));
                                $row = mysqli_fetch_array($result);
    
        }

        else{
            echo"";
        }
}
    if(@$senddata2){
        
    echo"<script>alert('$name, you Registered succesfully')</script>";
  
  $_SESSION['passi']=$row['pass_w'];
                    $_SESSION['mail']=$row['email'];
                    
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['id']=$row['student_id'];
                    $_SESSION['level']=$row['level'];
                    $_SESSION['progr']=$row['programme'];
                    $_SESSION['sem']=$row['semester'];
                    $_SESSION['an']=$row['assign_num'];
                     $_SESSION['pic']=$row['picture'];
                     $_SESSION['reg']=$row['reg_num'];
                     $_SESSION['phone']=$row['phone'];
                    
                    
                    echo "<script> location.replace('students/')</script>";
}

else{
echo"<script>alert('An error occured,please try again..')</script>";    
}


    }


      ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
<img src="img/faceless.png" alt="" class="img-responsive"  align="absmiddle" id="outputpix"/><br />
<input type="file" class=""  name="ufile" id="ufile5" accept="image/*" onchange="loadFile(event)" required="" /><br>

<div class=" form">
    <input type="text" name="name" class="w3-input" required="required">
    <label class="label-name" for="student's full Name">
    <span class="content-name"> student's full Name</span>
    </label>
  </div><br><br>

   <select name="level" class="form-control" required="">
     <option value="">----- Select Level -----</option>
     <option value="ND1">ND1</option>
     <option value="ND2">ND2</option>
     <option value="HND1">HND1</option>
     <option value="HND2">HND2</option>
   </select><br><br>

<select name="prog" class="form-control" required="">
     <option value="">----- Select Programme -----</option>
     <option value="MORNING">MORNING</option>
     <option value="EVENING">EVENING</option>
     <option value="WEEKEND">WEEKEND</option>   
   </select><br><br>
   

   <select name="sem" class="form-control" required="">
     <option value="">----- Select Semester -----</option>
     <option value="First Semester">First Semester</option>
     <option value="Second Semester">Second Semester</option>
   </select><br><br>

   <input type="text" name="reg" class="form-control" placeholder="Reg Number (Optional)">
   <!-- <div class=" form">
    <input type="text" name="reg" class="w3-input">
    <label class="label-name" for="Reg Number">
    <span class="content-name"> Reg Number</span>
    </label>
  </div> -->

  <div class=" form">
    <input type="text" name="ph" class="w3-input" required="required">
    <label class="label-name" for="Phone">
    <span class="content-name"> Phone</span>
    </label>
  </div>


  <div class=" form">
    <input type="email" name="email" class="w3-input" required="required">
    <label class="label-name" for="Email">
    <span class="content-name"> Email</span>
    </label>
  </div>

  <div class=" form">
    <input type="password" name="pass" class="w3-input"  id="myInput" required="required">
    <label class="label-name" for="Password">
    <span class="content-name"> Password</span>

    </label>
    <span class="eye fa fa-eye-slash text-primary" id="naviconhide" onclick="myFunction()"></span>  
    <span class="eye fa fa-eye text-success" style="display:none" id="naviconshow" onclick="myFunction()"></span>
    
  </div><br><br>
  
   <button name="sub" class="btn btn-primary btn-block"><b><i class="fa fa-send"></i> Submit</b></button>
</form>
 </div>
 </div>
</div>

<br><br><br><br>
</div>

<!-- Modal login -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#3399CC;">Student's Login</h4>
        </div>
        <div class="modal-body">

<?php
             
    if (isset($_POST['log'])){
                
            function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

                $mail = test_input($_POST['email'])or die('please enter a valid mail');
                $password = test_input($_POST['pass'])or die('please enter a valid password');
                $query1 = "select * from st where  pass_w='".mysqli_real_escape_string($con,$password)."' AND email='".mysqli_real_escape_string($con,$mail)."' ";
                $result1 = mysqli_query($con,$query1)or die(mysqli_error($con));
                                $row = mysqli_fetch_array($result1);
                $num_row = mysqli_num_rows($result1);
                  
                  if( $num_row > 0 ) {
                    
                    $_SESSION['passi']=$row['pass_w'];
                    $_SESSION['mail']=$row['email'];
                    
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['id']=$row['student_id'];
                    $_SESSION['level']=$row['level'];
                    $_SESSION['progr']=$row['programme'];
                    $_SESSION['sem']=$row['semester'];
                    $_SESSION['an']=$row['assign_num'];
                     $_SESSION['pic']=$row['picture'];
                     $_SESSION['reg']=$row['reg_num'];
                     $_SESSION['phone']=$row['phone'];
                                                            
                                    

                    echo "<script> location.replace('students/')</script>";
                    
                  }
                  else{ 
                echo "<script>alert('Invalid mail or Password!')</script>";
                echo "<p style='color:red;'>Are You Sure you have an account?!</p>";
                }    //form validation to avoid exploit

                }            
    ?>


          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
          
  <div class=" form">
    <input type="email" name="email" class="w3-input" required="required">
    <label class="label-name" for="Email">
    <span class="content-name"><i class="fa fa-envelope"></i> Email</span>
    </label>
  </div>

  <div class=" form">
    <input type="password" name="pass" class="w3-input" required="required">
    <label class="label-name" for="Password">
    <span class="content-name"><i class="fa fa-lock"></i> Password</span>
    </label>
  </div><br>

         <!-- <input type="email" name="email" class="form-control" placeholder="Email" required=""><br>
   <input type="password" name="pass" class="form-control" placeholder="Password" required=""><br> -->
   
   <button name="log" class="btn btn-primary btn-block"><b><i class="fa fa-sign-in"></i> Login</b></button>
   </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<br><br><br>
</div>

















	</body>
	</html>																							   
																								   