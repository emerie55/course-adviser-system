<?php
session_start();
include "session.php";
include"../connect.php";


if (!isset($_SESSION['passiw'])){
  header("location:../lecturer.php");
  exit();
} 

?>
<!DOCTYPE HTML>

             <head>
                              <title>Lecturer Portal</title>
         <link rel="icon" href="../img/ginger-star.png">
<meta charset="utf-8">
   
              <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
                            <link href="../edit.css" rel="stylesheet" media="screen">
                             <link href="nav.css" rel="stylesheet" media="screen">
                             <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
                            <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">

  
     
  <script src="../jquery-3.2.1.min.js"></script> 
<script src="../js/bootstrap.min.js"></script>
<script src="../js/myjs.js"></script>

																	   
</head>
<body>


<div class="sidebar">
<section class="s_logs">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>
  
  <a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
  <a class="active" href="give.php"><span class="glyphicon glyphicon-share"></span> Schedule an Appointment</a>
  <a href="submitted.php"><span class="glyphicon glyphicon-check"></span> Complain / Questions </a>
  <a href="info.php"><span class="fa fa-file-text"></span> Pass Information </a>
  <a href="stud.php"><span class="fa fa-users"></span> Registered Students </a>
  <a href="livechat.php"><span class="fa fa-comments"></span> Livechat </a>
  <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')"><span class="glyphicon glyphicon-off"></span> Logout</a>

</div>
<!--  MOBILE SIDEBAR -->
<div class="smobs">
  
<section class="s_logs">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>  

  <div class="navimg" id="navhide">
    <span class="fa fa-navicon" id="naviconhide"></span>
    <span class="fa fa-list-ul" id="naviconshow"></span>
  </div>  
  
  <ul class="" id="navshows">
  <br><br>
  <a class="smoblinks"  href="index.php"><li><span class="glyphicon glyphicon-home"></span> Dashboard </li></a>

  <a href="give.php" class="smoblinks"><li id="act"><span class="glyphicon glyphicon-share"></span> Schedule an Appointment </li></a>

  <a href="submitted.php" class="smoblinks"><li><span class="glyphicon glyphicon-check"></span> Complain / Questions </li></a>
  
  <a href="info.php" class="smoblinks"><li><span class="fa fa-file-text"></span> Pass Information </li></a>
  <a href="stud.php" class="smoblinks"><li><span class="fa fa-users"></span> Registered Students </li></a>
  <a href="livechat.php" class="smoblinks"><li><span class="fa fa-comments"></span> Livechat </li></a>

  
  <a href="logout.php" class="smoblinks" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->



<div class="content">
  
 <div class="row topcontent ">
 <h2><span class="glyphicon glyphicon-share"></span> Schedule an Appointment</h2><br>

    <div class=""></div>
    <div class="">
     <br><br>
    
      
    <!-- CEARTE A COURSE ADVISER APPOINTMENT -->
    <div class="col-sm-2"></div>
    <div class="col-md-6">
     
     <div class="panel panel-danger">
      <div class="panel-heading" style="font-size:16px;"><b> <span class="fa fa-edit"></span> Schedule a Course Adviser Appointment</b></div>
      <div class="panel-body">

      <?php

if(isset($_POST["apoint"])){

  function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}


      $lev=test_input($_POST["lev"]);
      $prog=test_input($_POST["prog"]);
      $sem=test_input($_POST["sem"]);
      $day=test_input($_POST["day"]);
      $hall=test_input($_POST["hall"]);
      $str=test_input($_POST["str"]);
      $end=test_input($_POST["end"]);

      $check2=mysqli_query($con,"select * from a_point where hall='".mysqli_real_escape_string($con,$hall)."' AND day='".mysqli_real_escape_string($con,$day)."' AND strtime='".mysqli_real_escape_string($con,$str)."' AND endtime='".mysqli_real_escape_string($con,$end)."' ");

    $row2=mysqli_num_rows($check2);
    
if($row2 > 0 ){
         echo"<script>alert('OOps! it seems the hall, day and time already exists, Please Reschedule another Appointment')</script>";       
    }
else{

      $senddata2 = mysqli_query($con,"insert into a_point (level,programme,semester,day,hall,strtime,endtime,lecturer_name) values
    ('".mysqli_real_escape_string($con,$lev)."','".mysqli_real_escape_string($con,$prog)."','".mysqli_real_escape_string($con,$sem)."','".mysqli_real_escape_string($con,$day)."','".mysqli_real_escape_string($con,$hall)."','".mysqli_real_escape_string($con,$str)."',
    '".mysqli_real_escape_string($con,$end)."','$lect_name')")or die(mysqli_error($con)); 
    

    if(@$senddata2){
        
    echo"<script>alert('Appointment has been scheduled')</script>";
  }
  else{
    echo"<script>alert('An Error occured in Appointment scheduling')</script>";
  }

}

}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
  
      <input type="text" name="lev" class=" col-sm-4" value="<?php echo $lev; ?>" required="required" readonly="readonly" style="padding:5px; background:#ccc; border:1px solid #999;">

      <input type="text" name="prog" class=" col-sm-4" value="<?php echo $prog; ?>" required="required" readonly="readonly" style="padding:5px; background:#ccc; border:1px solid #999;">

      <input type="text" name="sem" class=" col-sm-4" value="<?php echo $sem; ?>" required="required" readonly="readonly" style="padding:5px; background:#ccc; border:1px solid #999;"><br><br><br>

      <select name="day" class=" col-sm-6" required="" style="padding:6px; border:1px solid #ccc;">
      <option value="">----- Select Day -----</option>
      <option value="Monday">Monday</option>
      <option value="Tuesday">Tuesday</option>
      <option value="Wednesday">Wednesday</option>
      <option value="Thursday">Thursday</option>
      <option value="Friday">Friday</option>
      </select>
      
      <select name="hall" class=" col-sm-6" required="" style="padding:6px; border:1px solid #ccc;">
      <option value="">----- Select Hall -----</option>
      <option value="Hall 1">Hall 1</option>
      <option value="Hall 2">Hall 2</option>
      <option value="Hall 3">Hall 3</option>
      <option value="Hall 4">Hall 4</option>
      <option value="Hall 5">Hall 5</option>
      </select><br><br><br>

      <select name="str" class=" col-sm-6" required="" style="padding:6px; border:1px solid #ccc;">
      <option value="">----- Start Time -----</option>
      <option value="8 A.M">8 A.M</option>
      <option value="9 A.M">9 A.M</option>
      <option value="10 A.M">10 A.M</option>
      <option value="11 A.M">11 A.M</option>
      <option value="12 P.M">12 P.M</option>
      <option value="1 P.M">1 P.M</option>
      <option value="2 P.M">2 P.M</option>
      <option value="3 P.M">3 P.M</option>
      <option value="4 P.M">4 P.M</option>
      <option value="5 P.M">5 P.M</option>
      </select>
      
      <select name="end" class=" col-sm-6" required="" style="padding:6px; border:1px solid #ccc;">
      <option value="">----- End Time -----</option>
      <option value="9 A.M">9 A.M</option>
      <option value="10 A.M">10 A.M</option>
      <option value="11 A.M">11 A.M</option>
      <option value="12 P.M">12 P.M</option>
      <option value="1 P.M">1 P.M</option>
      <option value="2 P.M">2 P.M</option>
      <option value="3 P.M">3 P.M</option>
      <option value="4 P.M">4 P.M</option>
      <option value="5 P.M">5 P.M</option>
      <option value="6 P.M">6 P.M</option>
      </select><br><br><br>

      <button name="apoint" class="btn btn-danger col-sm-6"><b><i class="fa fa-send"></i> Schedule an Appointment </b></button>
</form>

      </div>
    </div> 
    </div>
<!-- THE END -->

  </div>
  <!-- Main end -->

  
    <div class="col-md-9">
<div class="panel panel-success">
      <div class="panel-heading"><b> <span class="fa fa-file-text"></span> New Scheduled Course Adviser Appointment</b></div>
      <div class="panel-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
       <tr>
        <th>Day</th>
       <th>Venue</th>
       <th>Start Time</th>
       <th>End Time</th>
       <th>Delete</th>            
   </tr>
</thead>
<tbody>
<!-- php here -->
    <?php
           $mysqli1="select * from a_point where programme='$prog' AND level='$lev' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
    while($row2 = mysqli_fetch_object($myquery1)){
   ?>
   <tr class="">  
    <td><?php echo $row2->day; ?></td>  
                  <td><?php echo $row2->hall; ?></td>
                  <td><?php echo $row2->strtime; ?></td>
                 <td><?php echo $row2->endtime; ?></td>
                  <!-- <td><a href="../lecturers/<?php //echo $row2->upload; ?>"><span class="glyphicon glyphicon-download"></span> Download</a></td> -->
                  <td><a onclick="return confirm('Are you sure you want to delete?')" href="deleteapoint.php?id=<?php echo $row2->id; ?>"><span class="fa fa-trash" style="font-size:20px;"></span></a></td> 

                </tr>
                <?php
              }
                ?>

      </tbody>
    </table>
    <!-- two div below is the close the box -->
 </div>
    </div>
      
    </div>
<!-- the end -->

    
  
  


</div>
<script src="../dataTables/jquery.dataTables.js"></script>
    <script src="../dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

	</body>
	</html>																							   
																								   