<?php
	session_start();
	require_once('dbconfig/mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Faculty Research Details</title>
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
		<h2 style="font-family:Century">Faculty Research Details</h2>
		<div class="in_con">
		<?php
		$empid=$_SESSION['emp_id'];
		$r=mysqli_query($con,"select * from workson where emp_id=$empid");
		while($row1=mysqli_fetch_assoc($r))
		{
			$rid=$row1["r_id"];
			$r1=mysqli_query($con,"select * from research_details where r_id=$rid");
			$row=mysqli_fetch_array($r1);
			echo "Type of Research:".$row["TYPE"].nl2br("\n");
			echo "Research ID:".$row["r_id"].nl2br("\n");
			echo "Research Title:".$row["R_TITLE"].nl2br("\n");
			echo "Status:".$row["STATUS"].nl2br("\n");
			echo "Research Domain:".$row["RESEARCH_DOM"].nl2br("\n");
			echo "Start Date:".$row["START_DATE"].nl2br("\n");
			echo "End Date:".$row["END_DATE"].nl2br("\n");
			echo "Amount Granted:".$row["AMOUNT_GRANTED"].nl2br("\n");
			echo "Hypothesis:".$row["HYPOTHESIS"].nl2br("\n");
			echo "Article Referred:".$row["ARTICLE_REFFERED"].nl2br("\n");
			echo "Research File".nl2br("\n");
		}	?>
		<?php 
			$scan=scandir("ups/");$flag=0;
			$r00=mysqli_query($con,"select * from workson where emp_id=$empid");
			while($r01=mysqli_fetch_assoc($r00))
			{
				$reid=$r01["r_id"];
				$r02=mysqli_query($con,"select * from research_details where r_id=$rid");
				$r03=mysqli_fetch_array($r02);
				for($a=0;$a<count($scan);$a++)
				{
				if($scan[$a]==$r03["FILE_NAME"])
				{
					?>
					<a download="<?php echo $scan[$a] ?>" href="ups/<?php echo $scan[$a] ?>"><?php echo $scan[$a] ?></a>
					<?php
				}
				else
				{
					$flag++;
				}
				}	
			}
			//here $scan[$a] gives the name of the file present in the ups folder
			if($flag==count($scan))
			{
				echo "File not Found";
			}
		echo nl2br("\n");
		?>
		<a href="fhome.php"> <input type="button" name="" value="<< Go Back"></a><br><br><br>
	</div>
	</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
</html>