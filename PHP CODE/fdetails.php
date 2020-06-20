<?php
	session_start();
	require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Update Personal Details</title>
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
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Employee Research Management System</a>  
    <ul class="navbar-nav">
        <li class="nav-item"> <a class="nav-link" href="mainpg.php">Home</a> </li>
        <li class="nav-item"> <a class="nav-link" href="slog.php">Student Login</a> </li>
        <li class="nav-item"> <a class="nav-link" href="flog.php">Faculty Login</a> </li> 
      </ul>
</nav>
<div id="main">
		<h2 style="font-family:Century">Update Personal Details</h2>
		<h3 style="font-family:Century"> Welcome <?php echo $_SESSION['username']; ?> </h3>
		<div class="in_con">
			<p> Choose the following buttons to update the required fields</p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_p">Phone No</button></p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_e">Email</button></p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_cbn">Cabin No</button></p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_rd">Research Domain</button></p>
      <p><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal_s">School</button></p>
      <!--phone popup code-->
          <div id="myModal_p" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
              <div class="modal-body">
                  <form action="fdetails.php" method="post">
                    <input type="text" name="ph" placeholder="Phone Number">
                    <input type="submit" name="up_p" value="UPDATE">  
                  </form>              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
      <!-- end of phone popup code-->
      <!-- email popup code-->
        <div id="myModal_e" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
              <div class="modal-body">
                  <form action="fdetails.php" method="post">
                    <input type="text" name="em" placeholder="Email">
                    <input type="submit" name="up_e" value="UPDATE">
                  </form>             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
        <!--end of email popup code-->
        <!-- cabin no popup code-->
          <div id="myModal_cbn" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
              <div class="modal-body">
                  <form action="fdetails.php" method="post">
                  <input type="text" name="cbn" placeholder="Cabin No">
                  <input type="submit" name="up_cbn" value="UPDATE">
                </form>            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
        <!--end of cabin no popup code-->
        <!--research domain popup code-->
         <div id="myModal_rd" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
              <div class="modal-body">
                  <form action="fdetails.php" method="post">
                  <input type="text" name="rd" placeholder="Research Domain">
                  <input type="submit" name="up_rd" value="UPDATE">
                </form>             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
        <!--end of rd popup code-->
        <!--school popup code-->
           <div id="myModal_s" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
              <div class="modal-body">
                 <form action="fdetails.php" method="post">
                  <input type="text" name="sch" placeholder="School">
                  <input type="submit" name="up_s" value="UPDATE">
                 </form>            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>           
            </div>
            </div>
          </div>
        </div>
        <!--end of school popup code-->
        <?php 
        if(isset($_POST['up_p']))
        {
          $username=$_SESSION['username'];$empid=$_SESSION['emp_id'];@$phone=$_POST['ph'];
          $q="update faculty set PHONE='$phone' where username='$username' and emp_id=$empid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("Phone No Updated successfully..!")</script>';
          }
          else
          {
            echo '<script type="text/javascript">alert("Could not update, plz try again..!")</script>';
          }
        }
        if(isset($_POST['up_cbn']))
        {
          $username=$_SESSION['username'];$empid=$_SESSION['emp_id'];@$cabin=$_POST['cbn'];
          $q="update faculty set CABIN_NO='$cabin' where username='$username' and emp_id=$empid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("Cabin No Updated successfully..!")</script>';
          }
          else
          {
            echo '<script type="text/javascript">alert("Could not update, plz try again..!")</script>';
          }
        }
         if(isset($_POST['up_rd']))
        {
          $username=$_SESSION['username'];$empid=$_SESSION['emp_id'];@$rd=$_POST['rd'];
          $q="update faculty set RESEARCH_DOM='$rd' where username='$username' and emp_id=$empid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("Research Domain Updated successfully..!")</script>';
          }
          else
          {
            echo '<script type="text/javascript">alert("Could not update, plz try again..!")</script>';
          }
        }
         if(isset($_POST['up_s']))
        {
          $username=$_SESSION['username'];$empid=$_SESSION['emp_id'];@$school=$_POST['sch'];
          $q="update faculty set SCHOOL='$school' where username='$username' and emp_id=$empid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("School Updated successfully..!")</script>';
          }
          else
          {
            echo '<script type="text/javascript">alert("Could not update, plz try again..!")</script>';
          }
        }
        if(isset($_POST['up_e']))
        {
          $username=$_SESSION['username'];$empid=$_SESSION['emp_id'];@$email=$_POST['em'];
          $q="update faculty set EMAIL='$email' where username='$username' and emp_id=$empid";
          $r=mysqli_query($con,$q);
          if($r)
          {
            echo '<script type="text/javascript">alert("Email Updated successfully..!")</script>';
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