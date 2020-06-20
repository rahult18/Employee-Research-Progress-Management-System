<?php
	session_start();
	require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Faculty Login</title>
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
#main{
  width: 400px;
  padding: 2px 2px;
  position: absolute;
  top:50%;
  left:50%;
  transform: translate(-50%,-50%);
  background-color:white;
  text-align: center;
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
		<h3 style="font-family:Ostrich Sans">Faculty Login Page</h3>
		<form action="flog.php" method="post">
		<div class="in_con">
			<input type="text" placeholder="Enter Employee ID" name="empid" required><br>
			<input type="text" placeholder="Enter Username" name="username" required><br>
			<input type="password" placeholder="Enter Password" name="password" required><br>
			<input type="submit" name="login" value="Login"><br>
			<a href="freg.php">New here,Please Register !</a>
		</div>
		</form>		
		<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$empid=$_POST['empid'];
				$query = "select * from faculty where password='$password' and emp_id=$empid";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['emp_id']=$empid;
					header( "Location: fhome.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
		?>
</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>