<?php
	session_start();
	require_once('dbconfig/mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Funded Project</title>
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
	<center><h3 style="font-family:Century">Funded Project</h3></center>	
		<div class="in_con">
	<form action="ffp.php" method="post" enctype="multipart/form-data">
		<input type="text" placeholder="Research Title" name="rt"><br>
		<input type="text" placeholder="Status" name="status"><br>
		<input type="text" placeholder="Research Domain" name="rsd"><br>
		<input type="text" placeholder="Start Date(YYYY-MM-DD)" name="sd"><br>
		<input type="text" placeholder="End Date(YYYY-MM-DD)" name="ed"><br>
		<input type="text" placeholder="Amount Granted" name="am"><br>
		<input type="submit" name="addres" value="ADD"><br>
	</form>
	<?php
		if(isset($_POST['addres']))
		{
			$empid=$_SESSION['emp_id'];
			$new=mysqli_query($con,"select * from workson where emp_id=$empid");
			$nr=mysqli_num_rows($new);$new1=mysqli_fetch_array($new);$rid=$new1["r_id"];
			if($nr>2)
			{
				echo '<script type="text/javascript">alert("Research Details Already Added.....")</script>';
			}
			else
			{
				@$rt=$_POST['rt'];@$status=$_POST['status'];@$rsd=$_POST['rsd'];
				@$sd=$_POST['sd'];@$ed=$_POST['ed'];@$am=$_POST['am'];
				$q="insert into research_details (R_TITLE,STATUS,RESEARCH_DOM,START_DATE,END_DATE,TYPE,AMOUNT_GRANTED)values('$rt','$status','$rsd','$sd','$ed','Funded Project',$am)";
				$run=mysqli_query($con,$q);
				$q1=mysqli_query($con,"select * from research_details where R_TITLE='$rt'");$q2=mysqli_fetch_array($q1);
				$rid=$q2["r_id"];
				$q3="insert into workson values($empid,$rid)";$run1=mysqli_query($con,$q3);
				if($run and $run1)
				{
					echo '<script type="text/javascript">alert(" Research Details Added successfully..!")</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("Could not add research details plz try again....!")</script>';
				}
			}
		}	?>
	
<a href="faddnr.php"><input type="button" name="" value="<< Go Back "></a><br><br><br>
</div>
</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>
		