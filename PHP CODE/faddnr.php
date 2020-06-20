<?php
	session_start();
	require_once('dbconfig/mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Add New Research</title>
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
	<center><h3 style="font-family:Century">Add new research</h3></center>	
<div class="in_con">
	<div class="dropdown">
    	<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">Choose The Type Of Research</button>
    	<div class="dropdown-menu">
      		<a class="dropdown-item" href="ffp.php">Funded Project</a>
      		<a class="dropdown-item" href="fgr.php">Generic Research</a>
    	</div>
   </div>			
	<a href="fhome.php"><input type="button" name="" value="<< Go Back "></a><br><br><br>
</div>
</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>
		