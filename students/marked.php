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
                              <title>Portal: Marked Assignment</title>
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
        <!-- <link href="bootstrap4/css/bootstrap.css" rel="stylesheet" /> -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/chat_style.css" /> 
        <script src="js/jquery-3.3.1.js"></script>
        <script src="bootstrap4/js/bootstrap.js"></script>
        <script src="js/main.js"></script>
        <!-- Livechat end-->

																	   
</head>

<body>


<div class="sidebar">
  <section class="s_log">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>
  <a  href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
  <a  href="submit.php"><span class="glyphicon glyphicon-share"></span> Complain / Question <span class="badge">
    <?php
  $mysqli1="select * from submit_ted where student_id='$id' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span></a>
  
  <a class="active" href="marked.php"><span class="glyphicon glyphicon-check"></span> Scheduled Appointments <span class="badge">
    <?php
 $mysqli1="select * from a_point where level='$lev' AND programme='$prog' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span></a>
  <a href="new.php"><span class="glyphicon glyphicon-calendar"></span> Important Information <span class="badge">
     <?php
 $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;
  ?></span></a>
  
  <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')"><span class="glyphicon glyphicon-off"></span> Logout</a>

</div>


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
  <a class=" smoblink"  href="index.php"><li><span class="glyphicon glyphicon-home"></span> Dashboard </li></a>
  <a href="submit.php"  class="smoblink"><li ><span class="glyphicon glyphicon-share"></span> Complain / Question 
  <span class="badge">
    <?php
  $mysqli1="select * from submit_ted where student_id='$id' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span>
</li></a>
  <a href="marked.php" class="smoblink"><li id="act"><span class="glyphicon glyphicon-check"></span> Scheduled Appointments 
  <span class="badge">
    <?php
 $mysqli1="select * from a_point where level='$lev' AND programme='$prog' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span>
</li></a>

  <a href="new.php" class="smoblink"><li><span class="glyphicon glyphicon-calendar"></span> Important Information 
  <span class="badge">
     <?php
 $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;
  ?></span>
</li></a>
  
  <a href="logout.php" class="smoblink" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->


<div class="content">
  <div class="row topcontent" style="margin-bottom:50px;">
  
  <h2 class="col-md-6"><center><span class="fa fa-file-text"></span> New Scheduled Course Adviser Appointment</center></h2><br>
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
       <th>Course Adviser</th>            
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
                  <td>
                    <?php
                      $sql = "SELECT * FROM a_point where level='$lev' AND programme='$prog' AND semester='$sem' LIMIT  1";
                      $result = mysqli_query($con,$sql) ;
                      
                      // while there are rows to be fetched
                      while ($list = mysqli_fetch_object($result)) {
                         // echo data
                         echo @"<p>
                         [$list->lecturer_name]
                          
                        </p>
                         ";
                      } // end while
                      
                    ?>
                  </td> 

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
  

<script src="../dataTables/jquery.dataTables.js"></script>
    <script src="../dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

        <!-- Livechat for this template-->
<?php
        include_once('foot.php');
    ?>
 <!-- Livechat end -->

	</body>
	</html>																							   
																								   