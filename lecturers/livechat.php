<?php
  session_start();
  include "session.php";
  include "../connect.php";

  if (!isset($_SESSION['passiw'])){
    header("location:../login.php");
    exit();
  }  

  if(!isset($_SESSION['cur_user'])){
    $_SESSION['cur_user'] = $_SERVER['REMOTE_ADDR'];
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Admin :: Livechat</title>
    <link rel="icon" href="../img/ginger-star.png">          
    <link href="../edit.css" rel="stylesheet" media="screen">
    <link href="nav.css" rel="stylesheet" media="screen">
    
    <!-- STYLES AND ICONS -->
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../bootstrap4/css/bootstrap.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="css/admin_main.css" /> -->
    <!-- SCRIPTS -->
    <script src="../js/jquery-3.3.1.js"></script> 
    <script src="../bootstrap4/js"></script>
    <script src="../js/myjs.js"></script>

    

  
</head>
<body id="" style="font-family: ok;">
<!-- Page Wrapper -->
<div id="wrapper">


<!-- Sidebar -->
<div class="sidebar">
  <section class="s_logs">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>
  
  <a  href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
  <a href="give.php"><span class="glyphicon glyphicon-share"></span> Schedule an Appointment</a>
  <a href="submitted.php"><span class="glyphicon glyphicon-check"></span> Complain / Questions </a>
  <a href="info.php"><span class="fa fa-file-text"></span> Pass Information </a>
  <a href="stud.php"><span class="fa fa-users"></span> Registered Students </a>
  <a href="livechat.php" class="active"><span class="fa fa-comments"></span> Livechat </a>
  
  <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')"><span class="glyphicon glyphicon-off"></span> Logout</a>

</div>
<!-- End of Sidebar -->

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
  <a class="smoblinks"  href="index.php"><li ><span class="glyphicon glyphicon-home"></span> Dashboard </li></a>
  <a href="submit.php" class="smoblinks"><li><span class="glyphicon glyphicon-share"></span> Complain / Question </li></a>
  <a href="marked.php" class="smoblinks"><li><span class="glyphicon glyphicon-check"></span> Scheduled Appointments </li></a>

  <a href="new.php" class="smoblinks"><li><span class="glyphicon glyphicon-calendar"></span> Important Information </li></a>
  <a href="stud.php" class="smoblinks"><li><span class="fa fa-users"></span> Registered Students </li></a>
  <a href="livechat.php" class="smoblinks"><li id="act"><span class="fa fa-comments"></span> Livechat </li></a>

  
  <a href="logout.php" class="smoblinks" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->


<!-- Main Content -->
<div class="content">

<!-- Website Inner Content Starts Here --> 
            <!-- using bootstrap container class -->
            <div class="container-fluid topcontent">
            <h3><span class="fa fa-comments"></span> Chat with a student</h3><br>

                <div class="row" id="Row1">
                    <div class="col-lg-12">
                            <div class="card">
                            <div class="card-header" style="color:white; font-size:1.0em; background:#66b561;">
                                <i class="fa fa-comments"></i> Live Chats
                            </div>

                                <div class="card-body">
                                    <ul>
                                        <?php
                                            $queryUsers = mysqli_query($con, "SELECT * FROM chatuser");
                                            if($queryUsers->num_rows > 0){
                                                while ($users = $queryUsers->fetch_array()) {
                                        ?>
                                            <li class="users_chat" title="<?php echo $users['user_id'] ?>">
                                                <a href="#">
                                                    <?php echo $users['fullname']; ?>
                                                </a>
                                            </li>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            
                    </div>
                </div>
    
            </div>
            
<!-- Website Inner Content Stops Here -->            
        </div>



  

  

  <!-- Livechat for this template-->

</body>

<!-- Modal Form Comes Here -->
<div class="modal show" id="chatModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style=" color:#fff; background:#66b561;">
                <span><i class="fa fa-user"></i> <span  id="userid">User name</span></span>
                <i class="fa fa-close" id="dismissModal" style="cursor: pointer;"></i>
                <span style="display:none;" id="curUser"></span>
            </div>

            <div class="modal-body">
                <div id="chat_body" style="overflow:auto;">
                </div>
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Message"  id="msgBox"/>
                        <div class="input-group-append">
                            <button class="btn" style="background:#66b561; color:#fff;" id="sendmsg" type="submit">
                                <i class="fa fa-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .users_chat{
        list-style-type:none;
    }
    .users_chat a{
        text-decoration:none;
        color:inherit;
    }
    #dismissModal{
        /* float:right; */
    }
    #chat_body{
        height:300px;
        width:100%;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('li.users_chat').on('click', function(){
            $userid = $(this).attr('title');
            $username = $(this).children('a').html();
            $.ajax({
                type:'post',
                url:'js/viewChat.php',
                data:'userid='+$userid,
                success:function(data){
                    $('#chatModal').show('show.bs.modal', function(){
                        $('#userid').html($username);
                        $('#chat_body').html(data);
                        $('#curUser').html($userid);
                    });
                    $('#chatModal').show('modal');
                }
            });
        });

        $('#dismissModal').on('click', function(){
            $('#chatModal').hide('modal');
        });

        
    $('#sendmsg').on('click', function(){
        $msg = $('#msgBox').val();
        $user = $('#curUser').html();
        $.ajax({
            type:'post',
            data:{'message' : $msg, 'user':$user},
            url:'js/sendChat.php',
            success:function (result) {
                if(result == "sent"){
                    $('#msgBox').val("");
                    displayMsg();
                }
            }
        });
    });

    $('#msgBox').on('keyup', function(e){
        $key = e.keyCode;
        if($key == 13){
            $msg = $('#msgBox').val();
            $user = $('#curUser').html();
            $.ajax({
                type:'post',
                data:{'message' : $msg, 'user':$user},
                url:'ajaxRequests/sendChat.php',
                success:function (result) {
                    if(result == "sent"){
                        $('#msgBox').val("");
                        displayMsg();
                    }
                }
            });
        }
    });
        
    function displayMsg(){
        $user = $('#curUser').html();
        $.ajax({
            type:'post',
            data:{'userid':$user},
            url:'js/viewChat.php',
            success:function (result) {
                $('#chat_body').html(result);
            }
        });
    }

    window.setInterval(function(){
        displayMsg();
    }, 500);

    });
</script>
</html>