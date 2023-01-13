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
                              <title>Pass an info</title>
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

<!-- FOR CK EDITOR -->
<script src="js/ckeditor.js"></script>
<link href="css/sample.css" rel="stylesheet">

<!-- FOR SUMMERNOTE -->
<link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css"/>

																	   
</head>
<body style="font-family: ok;">


<div class="sidebar">
<section class="s_logs">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>
  
  <a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
  <a href="give.php"><span class="glyphicon glyphicon-share"></span> Schedule an Appointment</a>
  <a href="submitted.php"><span class="glyphicon glyphicon-check"></span> Complain / Questions </a>
  <a class="active" href="info.php"><span class="fa fa-file-text"></span> Pass Information </a>
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

  <a href="submitted.php" class="smoblinks"><li><span class="glyphicon glyphicon-check"></span> Complain / Questions </li></a>
  
  <a href="info.php" class="smoblinks"><li id="act"><span class="fa fa-file-text"></span> Pass Information </li></a>
  <a href="stud.php" class="smoblinks"><li><span class="fa fa-users"></span> Registered Students </li></a>
  <a href="livechat.php" class="smoblinks"><li><span class="fa fa-comments"></span> Livechat </li></a>

  
  <a href="logout.php" class="smoblinks" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->


<div class="content">
  
 <div class="row topcontent ">
 <h2 style="margin-left:10px;"><span class="fa fa-file-text"></span> Pass Information</h2><br>

    <div class="col-md-2"></div>
    <div class="col-md-6">
     <br><br>
     <div class="panel panel-info">
      <div class="panel-heading"><b> <span class="fa fa-file-text"></span> Pass An Information</b></div>
      <div class="panel-body">
<?php

if(isset($_POST["sub"])){

  function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}


      $lev=test_input($_POST["lev"]);
      $program=test_input($_POST["prog"]);
      $sem=test_input($_POST["sem"]);
      $info=test_input($_POST["info"]);
$dg=date("d/M/Y");

      $senddata2 = mysqli_query($con,"insert into info (level,programme,semester,inf,date,lecturer_name) values
    ('".mysqli_real_escape_string($con,$lev)."','".mysqli_real_escape_string($con,$program)."','".mysqli_real_escape_string($con,$sem)."','".mysqli_real_escape_string($con,$info)."',
    '".mysqli_real_escape_string($con,$dg)."','$lect_name')")or die(mysqli_error($con)); 
    

    if(@$senddata2){
        
    echo"<script>alert('Info passed')</script>";
  }
  else{
    echo"<script>alert('Error in passing information')</script>";
  }

}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" >
  
<input type="hidden" name="lev" class="form-control" value="<?php echo $lev; ?>" readonly="readonly"> 
<br>

<input type="hidden" name="prog" class="form-control" value="<?php echo $prog; ?>" readonly="readonly"> 
<br>

<input type="hidden" name="sem" class="form-control" value="<?php echo $sem; ?>" readonly="readonly"> 
<br>

<textarea class="form-control summernote" name="info" id="" placeholder="Enter Message..."  style="resize:none;" required=""></textarea><br>

<button class="btn btn-info" name="sub"><b><i class="fa fa-rocket"></i> Pass Info</b></button>
</form>

      </div>
    </div>
    </div>
    
  </div>


  <div class="row">
    <div class="col-md-1">
      
    </div>

    <div class="col-md-9">

<div class="panel panel-success">
      <div class="panel-heading"><b> <span class="glyphicon glyphicon-calendar"></span> Passed Information</b></div>
      <div class="panel-body">
        
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
       <tr>
       
       <th>Date</th> 
       <th>Info</th>
       <th>Delete</th>            
   </tr>
</thead>
<tbody>
<!-- php here -->
    <?php
          
           $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
   echo "<h2>$lev $prog</h2>";
    while($row2 = mysqli_fetch_object($myquery1)){
      

   ?>
   <tr class="">    
                  <td><?php echo $row2->date; ?></td>
                  <td><p><?php echo $row2->inf; ?></p></td>
                  <td>  
                    <a href="deleteinfo.php?id=<?php echo $row2->id; ?>" onclick="return confirm('Are you sure you want to delete?')" title="delete Information"><span class="glyphicon glyphicon-trash"></span></a>
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

                ClassicEditor
                .create( document.querySelector('#editor'))
                .then( editor => {
                  console.log( editor);
                  
                })
                .catch( error => {
                  console.error(error);
                  
                });
    </script>

<!-- FOR SUMMERNOTE -->
<script src="../assets/bundles/counterup.bundle.js"></script>
<script src="../assets/bundles/apexcharts.bundle.js"></script>
<script src="../assets/bundles/summernote.bundle.js"></script>
<script src="../assets/js/page/index.js"></script>
<script src="../assets/js/page/summernote.js"></script>
<script src="../jquery-easing/jquery.easing.min.js"></script>

	</body>
	</html>																							   
																								   