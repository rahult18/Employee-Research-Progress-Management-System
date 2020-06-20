<?php
	session_start();
	require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Details</title>
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
		<h2 style="font-family:Century">Student Details</h2>
		<div class="in_con">
		<?php
		$sid=$_SESSION['s_id'];
		$n1="select * from student where s_id=$sid";$n2=mysqli_query($con,$n1);$n3=mysqli_fetch_array($n2);
		echo "Student ID:".$n3["s_id"].nl2br("\n")."Name:".$n3["NAME"].nl2br("\n")."School:".$n3["SCHOOL"].nl2br("\n");
		$fid=$n3["emp_id"];$rid=$n3["r_id"];
		if($fid==null and $rid==null)
		{
			echo "Registered Faculty And Project Details Not Available.".nl2br("\n");
		}
		else
		{
			$n4="select * from faculty where emp_id=$fid";$n5=mysqli_query($con,$n4);$n6=mysqli_fetch_array($n5);
			$n7="select * from research_details where r_id=$rid";$n8=mysqli_query($con,$n7);$n9=mysqli_fetch_array($n8);
			echo "Faculty Registered Under:".$n6["NAME"].nl2br("\n")."Project Registered Under:".$n9["R_TITLE"].nl2br("\n");
		}
		?>
		<a href="shome.php"> <input type="button" name="" value="<< Go Back"></a>
		</div>
</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>