<?php
	session_start();
	require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Registered Students</title>
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
	<h2 style="font-family:Century">Details Of Students Registered</h2>
	<div class="in_con">
		<table class="table table-bordered table-striped">
	    <thead>
	    	<tr class="btn-primary">
		    	<th>Registered Student ID</th>
		    	<th>Student Name</th>
		    	<th>Project Registered Under</th>
		    </tr>
	    </thead>
	    <tbody>
	    	<?php 
	    		$empid=$_SESSION['emp_id'];
				$n="select * from student where emp_id=$empid";
				$r=mysqli_query($con,$n);
				while($row = mysqli_fetch_assoc($r)) 
	    		{
	    	?>
	    	<tr>
		    	<td><?php echo $row["s_id"]; ?></td>
		    	<td><?php echo $row["NAME"]; ?></td>
		    	<?php
		    		$rid=$row["r_id"];
		    		$n1=mysqli_query($con,"select * from research_details where r_id=$rid");$n2=mysqli_fetch_array($n1);
		    	?>
		    	<td><?php echo $n2["R_TITLE"];?></td>
			</tr>
	    	<?php 
	    		}
	    	?>
	    </tbody>
		</table>
		<a href="fhome.php"> <input type="button" name="" value="<< Go Back"></a>
	</div>		
</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>