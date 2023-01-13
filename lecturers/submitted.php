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
                              <title>Submitted: Complains / Questions</title>
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
  <a class="active" href="submitted.php"><span class="glyphicon glyphicon-check"></span> Complain / Questions </a>
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

  <a href="give.php" class="smoblinks"><li><span class="glyphicon glyphicon-share"></span> Schedule an Appointment </li></a>

  <a href="submitted.php" class="smoblinks"><li  id="act"><span class="glyphicon glyphicon-check"></span> Complain / Questions </li></a>
  
  <a href="info.php" class="smoblinks"><li><span class="fa fa-file-text"></span> Pass Information </li></a>
  <a href="stud.php" class="smoblinks"><li><span class="fa fa-users"></span> Registered Students </li></a>
  <a href="livechat.php" class="smoblinks"><li><span class="fa fa-comments"></span> Livechat </li></a>

  
  <a href="logout.php" class="smoblinks" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->



<div class="content">
  
 


  <div class="row topcontent ">
  <h2><span class="glyphicon glyphicon-check"></span> Submitted Complains / Questions</h2><br>

    <div class="col-md-10">

<div class="panel panel-success">
      <div class="panel-heading"><b> <span class="glyphicon glyphicon-calendar"></span> Submitted Complains / Questions</b></div>
      <div class="panel-body">

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
       <tr>
        <th>Student's Name</th>
         <th>Status</th>
       <th>Title</th>
       <th>Complain / Question</th>
       <th>Date Submitted</th>
       <th>View / Delete</th> 
                  
   </tr>
</thead>
<tbody>
<!-- php here -->
    <?php
            
           $mysqli1="select * from submit_ted where level='$lev' AND programme='$prog' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
echo "<h3>$sem $lev $prog </h3>";
    while($row2 = mysqli_fetch_object($myquery1)){
   ?>
   <tr class="">    
                  <td><?php echo $row2->sname; ?></td>
                  <td><?php echo $row2->status; ?></td>
                  <td><?php echo $row2->assign_name; ?></td>
                  <td><?php echo $row2->upload; ?></td>
                  <td><?php echo $row2->date; ?></td>
                  <td>
                  <?php
                    if ($row2->status == "Replied"){
                    echo  "<a href='view.php?id=$row2->id' target='_blank' title='view document'><span class='fa fa-eye text-success'></span></a>";
                    }
                    else{
                      echo  "<a href='view.php?id=$row2->id' target='_blank' title='view document'><span class='fa fa-eye text-danger'></span></a>";
                      
                    }
                  
                  ?>
                  
                  &nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <a href="deletedoc.php?id=<?php echo $row2->id; ?>" onclick="return confirm('Are you sure you want to delete this document?')" title="delete document"><span class="glyphicon glyphicon-trash"></span></a>
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
																								   