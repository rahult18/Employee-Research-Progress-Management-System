<?php
  session_start();
  require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Update Research Details</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color:black;
  color: white;
  text-align: center;
  height:50px;
}
body{
  background-image:url('5.jpg');
  background-size: cover;
  background-repeat: no-repeat;
}
</style>
</head>
<body bgcolor="#95a5a6">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Employee Research Management System</a>  
    <ul class="navbar-nav">
        <li class="nav-item"> <a class="nav-link" href="mainpg.php">Home</a> </li>
        <li class="nav-item"> <a class="nav-link" href="slog.php">Student Login</a> </li>
        <li class="nav-item"> <a class="nav-link" href="flog.php">Faculty Login</a> </li> 
      </ul>
</nav>
<div id="main">
    <h2 style="font-family:Century">Update Research Details</h2>
    <h3 style="font-family:Century"> Welcome <?php echo $_SESSION['username']; ?> </h3>
    <div class="in_con">
      <p> Choose the following buttons to update the required fields</p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_s">Status</button></p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_des">Research Domain</button></p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_sd">Start Date</button></p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_ed">End Date</button></p>
      <!--status popup code-->
          <div id="myModal_s" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-body">
                  <form action="frlist.php" method="post">
                    <input type="text" name="rid" placeholder="Enter Research ID">
                    <input type="text" name="st" placeholder="Status"><br>
                    <input type="submit" name="up_s" value="UPDATE">  
                  </form>              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
      <!-- end of ststus popup code-->
      <!-- description popup code-->
        <div id="myModal_des" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-body">
                  <form action="frlist.php" method="post">
                    <input type="text" name="rid" placeholder="Enter Research ID">
                    <input type="text" name="rd" placeholder="Research Domain"><br>
                    <input type="submit" name="up_rd" value="UPDATE">
                  </form>             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
        <!--end of description popup code-->
        <!-- start date popup code-->
          <div id="myModal_sd" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-body">
                  <form action="frlist.php" method="post">
                   <input type="text" name="sd" placeholder="Start Date">
                   <input type="text" name="rid" placeholder="Enter Research ID"><br>
                   <input type="submit" name="up_sd" value="UPDATE">
                </form>            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
        <!--end start date popup code-->
        <!--end date popup code-->
         <div id="myModal_ed" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-body">
                  <form action="frlist.php" method="post">
                  <input type="text" name="rid" placeholder="Enter Research ID">
                  <input type="text" name="ed" placeholder="End Date"><br>
                  <input type="submit" name="up_ed" value="UPDATE">
                </form>             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
        <!--end of end date popup code-->
        <?php 
        if(isset($_POST['up_s']))
        {
          $empid=$_SESSION['emp_id'];@$status=$_POST['st'];@$rid=$_POST['rid'];
          $q="update research_details set STATUS='$status' where r_id=$rid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("Research Status Updated successfully..!")</script>';
          }
          else
          {
            echo '<script type="text/javascript">alert("Could not update, plz try again..!")</script>';
          }
        }
        if(isset($_POST['up_rd']))
        {
          $empid=$_SESSION['emp_id'];@$rd=$_POST['rd'];@$rid=$_POST['rid'];
          $q="update research_details set RESEARCH_DOM='$rd' where r_id=$rid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("Research Description Updated successfully..!")</script>';
          }
          else
          {
            echo '<script type="text/javascript">alert("Could not update, plz try again..!")</script>';
          }
        }
         if(isset($_POST['up_sd']))
        {
          $empid=$_SESSION['emp_id'];@$sd=$_POST['sd'];@$rid=$_POST['rid'];
          $q="update research_details set START_DATE='$sd' where r_id=$rid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("Research Start Date Updated successfully..!")</script>';
          }
          else
          {
            echo '<script type="text/javascript">alert("Could not update, plz try again..!")</script>';
          }
        }
         if(isset($_POST['up_ed']))
         {
          $empid=$_SESSION['emp_id'];@$ed=$_POST['ed'];@$rid=$_POST['rid'];
          $q="update research_details set END_DATE='$ed' where r_id=$rid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("Research End Date Updated successfully..!")</script>';
          }
          else
          {
            echo '<script type="text/javascript">alert("Could not update, plz try again..!")</script>';
          }
        }
        ?>
  <a href="fhome.php"><input type="button" name="" value="<< Go Back">
  </div>
</div>
</body>
<div class="footer">
    <p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p> 
  </div>
</html>