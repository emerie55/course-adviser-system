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
                              <title>Registered Students</title>
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
  <a href="give.php"><span class="glyphicon glyphicon-share"></span> Schedule an Appointment</a>
  <a  href="submitted.php"><span class="glyphicon glyphicon-check"></span> Complain / Questions </a>
  <a href="info.php"><span class="fa fa-file-text"></span> Pass Information </a>
  <a href="stud.php" class="active"><span class="fa fa-users"></span> Registered Students </a>
  
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

  <a href="give.php" class="smoblinks"><li><span class="glyphicon glyphicon-share"></span> Schedule an Appointment </li></a>

  <a href="submitted.php" class="smoblinks"><li><span class="glyphicon glyphicon-check"></span> Complain / Questions </li></a>
  
  <a href="info.php" class="smoblinks"><li><span class="fa fa-file-text"></span> Pass Information </li></a>
  <a href="stud.php" class="smoblinks"><li  id="act"><span class="fa fa-users"></span> Registered Students </li></a>
  
  <a href="livechat.php" class="smoblinks"><li><span class="fa fa-comments"></span> Livechat </li></a>

  
  <a href="logout.php" class="smoblinks" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->



<div class="content">
  
 

  <div class="row topcontent ">
  <h2><span class="fa fa-users"></span> Registered Students</h2><br>

    <div class="col-md-10" style="overflow-x: scroll">

<div class="panel panel-success">
      <div class="panel-heading"><b> <span class="fa fa-users"></span> Registered Students</b></div>
      <div class="panel-body">

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
       <tr>
        <th>Student's Name</th>
         <th>Reg Number</th>
       <th>Semester</th>
       <th>Programme</th>
       <th>Level</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Delete</th> 
                  
   </tr>
</thead>
<tbody>
<!-- php here -->
    <?php
            
           $mysqli1="select * from st where level='$lev' AND programme='$prog' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
    while($row2 = mysqli_fetch_object($myquery1)){
   ?>
   <tr class="">    
                  <td><?php echo $row2->Name; ?></td>
                  <td><?php echo $row2->reg_num; ?></td>
                  <td><?php echo $row2->semester; ?></td>
                  <td><?php echo $row2->programme; ?></td>
                  <td><?php echo $row2->level; ?></td>
                  <td><?php echo $row2->phone; ?></td>
                  <td><?php echo $row2->email; ?></td>
                  <td>  
                    <a href="deletestud.php?id=<?php echo $row2->id; ?>" onclick="return confirm('Are you sure you want to delete?')" title="delete Student"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                   
                    
                </tr>
               <?php  } ?>

      </tbody>
    </table>
    <!-- two div below is the close the box -->
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

	</body>
	</html>																							   
																								   