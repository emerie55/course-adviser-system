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
        <title>Student Portal</title>
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
        <!-- <link rel="stylesheet" href="../w3/w3.css">		    -->

        <!-- Livechat for this template-->
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- <link href="chat/bootstrap4/css/bootstrap.css" rel="stylesheet" /> -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/chat_style.css" /> 
        <script src="js/jquery-3.3.1.js"></script>
        <script src="bootstrap4/js/bootstrap.js"></script>
        <script src="js/main.js"></script>
        <!-- Livechat end-->

  </head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <section class="s_log">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>
  <a class="active" href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
  <a href="submit.php"><span class="glyphicon glyphicon-share"></span> Complain / Question</a>
  <a href="marked.php"><span class="glyphicon glyphicon-check"></span> Scheduled Appointments </a>

  <a href="new.php"><span class="glyphicon glyphicon-calendar"></span> Important Information </a>
  <a href="profile.php"><span class="fa fa-cogs"></span> Profile </a>
  
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
  <a class="smoblink"  href="index.php"><li id="act"><span class="glyphicon glyphicon-home"></span> Dashboard </li></a>
  <a href="submit.php" class="smoblink"><li><span class="glyphicon glyphicon-share"></span> Complain / Question </li></a>
  <a href="marked.php" class="smoblink"><li><span class="glyphicon glyphicon-check"></span> Scheduled Appointments </li></a>

  <a href="new.php" class="smoblink"><li><span class="glyphicon glyphicon-calendar"></span> Important Information </li></a>
  <a href="profile.php" class="smoblink"><li><span class="fa fa-cogs"></span> Profile </li></a>
  
  <a href="logout.php" class="smoblink" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->


<div class="content">
<div class="row topcontent" style="margin-bottom:50px;">

  <h2 class="col-md-6"><center><span class="glyphicon glyphicon-home"></span> Dashboard</center></h2><br>
  <section class="col-md-6">
  <center>
            <span class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-6 d-none d-lg-inline text-gray-600 large" style="font-weight:bold;"><?php echo $name; ?></span>
                <img  src="../<?php echo $pp; ?>" class="img-profile img-circle" width="40px" style="margin-left:7px;">
              </a>              
            </span>
            </center>
  </section>
</div>


<div class="row">
  <div class="col-md-3">
    <div class="panel panel-primary d_bo">
      <div class="panel-heading">Complain / Question </div>
      <div class="panel-body">
        <center><h1>
           <?php
        $mysqli1="select * from submit_ted where student_id='$id' ";
          $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
          $count=mysqli_num_rows($myquery1); echo $count;
        ?>
        </h1></center>

      </div>
    </div>
    
  </div>

  <div class="col-md-3">
    <div class="panel panel-primary d_bo">
      <div class="panel-heading">Scheduled Appointments</div>
      <div class="panel-body">
        <center><h1>
          <?php
 $mysqli1="select * from a_point where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;
?>
        </h1></center>

      </div>
    </div>
    
  </div>

  <div class="col-md-3">
    <div class="panel panel-primary d_bo">
      <div class="panel-heading">Important Information</div>
      <div class="panel-body">
        <center><h1>
           <?php
 $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;

?>
        </h1></center>

      </div>
    </div>
    
  </div>
  
</div>

<!-- STUDENTS DETAILS -->
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-danger">
      <div class="panel-heading"> <h4><span class="fa fa-user-plus"></span> Student Details </h4></div>
      <div class="panel-body">
        
        <!-- N0 1 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-user"></i> Name:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $name; ?></b>
          </div><br><br>

        <!-- N0 2 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-tags"></i> Reg No:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $reg; ?></b>
          </div><br><br>

          <!-- N0 3 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-level-up"></i> Level:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $lev; ?></b>
          </div><br><br>

          <!-- N0 4 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-book"></i> Programme:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $prog; ?></b>
          </div><br><br>

          <!-- N0 5 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-clock-o"></i> Semester:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $sem; ?></b>
          </div><br><br>

           <!-- N0 6 -->
           <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-envelope"></i> Email:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $mail; ?></b>
          </div><br><br>

          <!-- N0 7 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-phone"></i> Phone:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $phone; ?></b>
          </div><br><br>



      </div>
    </div>
    
  </div>
</div><br><br>
<!-- THE END -->


</div>

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
																								   