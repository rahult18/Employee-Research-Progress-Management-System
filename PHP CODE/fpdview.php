<?php
	session_start();
	require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Faculty Personal Details</title>
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
		<h2 style="font-family:Century">Faculty Personal Details</h2>
		<div class="in_con">
		<?php
		$username=$_SESSION['username'];$empid=$_SESSION['emp_id'];
		$n="select * from faculty where username='$username' and emp_id=$empid";
		$r=mysqli_query($con,$n);
		while($row=mysqli_fetch_assoc($r))
		{
			echo "Employee ID:".$row["emp_id"];
			echo nl2br("\n");
			echo "Name:".$row["NAME"];
			echo nl2br("\n");
			echo "Phone:".$row["PHONE"];
			echo nl2br("\n");
			echo "Email:".$row["EMAIL"];
			echo nl2br("\n");
			echo "School:".$row["SCHOOL"];
			echo nl2br("\n");
			echo "Cabin No:".$row["CABIN_NO"];
			echo nl2br("\n");
		}
		?>
		<a href="fhome.php"> <input type="button" name="" value="<< Go Back"></a>
		</div>
</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>