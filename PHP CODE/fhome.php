<?php
	session_start();
	require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Faculty Home</title>
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
.in_con input[type="button"]{
	border: 2px solid #d63031;
}
.in_con input[type="button"]:hover{
  background: #d63031;
  color:white;
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
		<h2 style="font-family:Century">Faculty Home Page</h2>
		<h3 style="font-family:Century"> Welcome <?php 
		$empid=$_SESSION['emp_id'];
		$n="select name from faculty where emp_id=$empid";
		$r=mysqli_query($con,$n);
		$res=mysqli_fetch_assoc($r);
		echo $res['name'];
		?> </h3>
		<div class="in_con">
		<div class="list-group">
			<a href="fpdview.php" class="list-group-item list-group-item-action">View Personal Details</a>
	    	<a href="frdview.php" class="list-group-item list-group-item-action">View Research Details</a>
	    	<a href="fdetails.php" class="list-group-item list-group-item-action">Update Personal Details</a>
	    	<a href="faddnr.php" class="list-group-item list-group-item-action">Add New Research</a>
	    	<a href="frup.php" class="list-group-item list-group-item-action">Upload Research File</a>
	    	<a href="frlist.php" class="list-group-item list-group-item-action">Update Research Details</a>
        <a href="fstud.php" class="list-group-item list-group-item-action">Number Of Students Registered</a>
		</div>
		<a href="flog.php"><input type="button" name="" value="Log Out"></a>
	</div>
</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>