<?php
	session_start();
	require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Faculty Registration</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
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
	<h2 style="font-family:Century">Faculty Registration Page</h2>
		<form action="freg.php" method="post">
				<div class="in_con">
				<input type="text" placeholder="Enter Username" name="username" required><br>
				<input type="password" placeholder="Enter Password" name="password" required><br>
				<input type="password" placeholder="Re-type Password" name="cpassword" required><br>
				<input type="text" placeholder="Enter Name" name="nm" required><br>
				<input type="text" placeholder="Enter Contact NO" name="ph" required><br>
				<input type="text" placeholder="Enter Email ID" name="email" required><br>
				<input type="text" placeholder="Enter School Name" name="sch" required><br>
				<input type="text" placeholder="Enter Cabin NO" name="cbn" required><br>
				<input type="submit" name="register" value="Register"><br>
				<a href="flog.php"><input type="button" name="" value="Go to Login"></a><br><br><br>
				</div>
		</form>
		<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				@$name=$_POST['nm'];
				@$phone=$_POST['ph'];
				@$email=$_POST['email'];
				@$school=$_POST['sch'];
				@$cabinno=$_POST['cbn'];			
				if($password==$cpassword)
				{
					$query = "select * from faculty where username='$username'";
					$query_run = mysqli_query($con,$query);
					if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else{
							$query = "insert into faculty(username,password,NAME,PHONE,EMAIL,SCHOOL,CABIN_NO)values('$username','$password','$name','$phone','$email','$school',$cabinno)";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								$q1="select emp_id from faculty where username='$username' and password='$password'";
								$q2=mysqli_query($con,$q1);
								$q3=mysqli_fetch_array($q2);
							?>
							<div class="bs-example">
								<div id="myModal" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title">Welcome</h5>
											</div>
											<div class="modal-body">
											<p>User registered....Your Employee ID is:<?php echo $q3["emp_id"].nl2br("\n");?>
											Kindly go back to the login page.......</p>
											</div>
											<div class="modal-footer">
									        <a href="flog.php"><button type="button" class="btn btn-outline-danger" >Go to Login</button></a>
									      </div>
										</div>
									</div>
								</div>	
							</div>
							<?php 
							}
							else
							{
								echo '<script type="text/javascript">alert("Registration Unsuccessful due to server error. Please try later")</script>';
							}
						}
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
			}
		?>
	</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>