<?php
  session_start();
  require_once('dbconfig/mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Final Registration</title>
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){$("#myModal").modal('show');});
</script>
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
    <h3 style="font-family:Century">Final Registration Page</h3>
    <div class="in_con">
      <p>Please enter the details to finish your registration</p>
    <form method="post" action="sfinreg.php">
      <input type="text" name="fn" placeholder="Enter the Faculty Name"><br>
      <input type="text" name="rt" placeholder="Enter the Research Project Title"><br>
      <input type="submit" name="reg" value="Register">
    </form>
    <?php
    if(isset($_POST["reg"]))
      {
        @$fn=$_POST['fn'];@$rt=$_POST['rt'];$sid=$_SESSION['s_id'];
        $f1="select * from faculty where NAME='$fn'";$f2=mysqli_query($con,$f1);$f3=mysqli_fetch_array($f2);
        $s1="select * from student where s_id=$sid";$s2=mysqli_query($con,$s1);$s3=mysqli_fetch_array($s2);
        $fid=$f3["emp_id"];#faculty table
        $w1="select * from research_details where R_TITLE='$rt'";$w2=mysqli_query($con,$w1);$w3=mysqli_fetch_array($w2);
        $rid=$w3["r_id"];#research_details table
        $facid=$s3["emp_id"];$srid=$s3["r_id"];#student table
        if($facid==null and $srid==null)
          { 
            $reg="update student set emp_id=$fid,r_id=$rid where s_id=$sid";
            $final=mysqli_query($con,$reg);
            if($final)
              {
                echo '<script type="text/javascript">alert("You have successfully registered under your respected faculty.....")</script>';
              }
          }
        else
        {
          echo '<script type="text/javascript">alert("You have already registered under a faculty.....")</script>';
        }
      }
    ?>
      <a href="sfacdetails.php"><input type="button" name="" value="<<Go Back"></a>
      </div>
  </div>
</body>
<div class="footer">
    <p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p> 
</div>
</html>