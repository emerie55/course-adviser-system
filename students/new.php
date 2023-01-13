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
                              <title>Portal: Important Information</title>
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
  
  <a href="marked.php"><span class="glyphicon glyphicon-check"></span> Scheduled Appointments <span class="badge">
    <?php
 $mysqli1="select * from a_point where level='$lev' AND programme='$prog' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span></a>
  
  <a class="active" href="new.php"><span class="glyphicon glyphicon-calendar"></span> Important Information <span class="badge">
     <?php
 $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;
  ?></span></a>
  <a href="profile.php"><span class="fa fa-cogs"></span> Profile </a>
  
  
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
  <a href="submit.php"  class="smoblink"><li><span class="glyphicon glyphicon-share"></span> Complain / Question 
  <span class="badge">
    <?php
  $mysqli1="select * from submit_ted where student_id='$id' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span>
</li></a>
  <a href="marked.php" class="smoblink"><li><span class="glyphicon glyphicon-check"></span> Scheduled Appointments 
  <span class="badge">
    <?php
 $mysqli1="select * from a_point where level='$lev' AND programme='$prog' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span>
</li></a>

  <a href="new.php" class="smoblink"><li id="act"><span class="glyphicon glyphicon-calendar"></span> Important Information 
  <span class="badge">
     <?php
 $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;
  ?></span>
</li></a>
<a href="profile.php" class="smoblink"><li><span class="fa fa-cogs"></span> Profile </li></a>
   
  <a href="logout.php" class="smoblink" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->



<div class="content">
  <div class="row topcontent" style="margin-bottom:50px;">

<h2 class="col-md-6"><center><span class="glyphicon glyphicon-calendar"></span> Important Information</center></h2><br>
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
    <div class="col-md-8">
     
     <div class="panel panel-warning">
      <div class="panel-heading" style="font-size:16px;"><b> <span class="glyphicon glyphicon-calendar"></span> Important Information From the Course Adviser</b></div>
      <div class="panel-body">

  
  <?php
// find out how many rows are in the table.................................. PAY ATTENTION HERE....................... 
$sql = "SELECT COUNT(*) FROM info where level='$lev' AND programme='$prog' AND semester='$sem'";
$result = mysqli_query($con,$sql) or trigger_error("SQL", E_USER_ERROR);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page............................ number of record you want to echo out per page (i use 10 record per page).............
$rowsperpage = 5;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db.........................................................................DIVINE PAY MORE ATTENTION HERE....... 
$sql = "SELECT * FROM info where level='$lev' AND programme='$prog' AND semester='$sem' LIMIT $offset, $rowsperpage";
$result = mysqli_query($con,$sql) ;

// while there are rows to be fetched
while ($list = mysqli_fetch_object($result)) {
   // echo data
   echo @"<p>
   [$list->lecturer_name]
   $list->inf
   <span class='badge'>$list->date</span>
    
  </p>
   ";
} // end while
//.................................................................FORGET THE REST BEFORE YOUR BRAIN EXPLODE..........................
/******  build the pagination links ******/
// range of num links to show


$range = 5;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show  link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1' class='lino'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show  link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage' class='lino'><span>Previous</span></a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " <b class='lin'>$x</b> ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x' class='lin2'>$x</a> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'><span>Next</span></a> ";
   // echo forward link for lastpage

echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
} // end if
/****** end build pagination links ******/
?>

    

      </div>
    </div> 
    </div>
    
  </div>
  
  
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
        include_once('foot.php');
    ?>
 <!-- Livechat end -->

	</body>
	</html>																							   
																								   