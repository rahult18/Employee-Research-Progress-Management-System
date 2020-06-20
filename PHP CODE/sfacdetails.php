<?php
	session_start();
	require_once('mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Faculty Details</title>
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
		<h3 style="font-family:Century">Faculty Details</h3>
		<div class="in_con">
		<table class="table table-bordered table-striped">
    <thead>
    	<tr class="btn-primary">
	    	<th>S.No.</th>
	    	<th>Faculty Name</th>
	    	<th>Faculty Details</th>
	    </tr>
    </thead>
    <tbody>
    	<?php 
    		$sql ="SELECT * FROM faculty";$result = mysqli_query($con,$sql);$sid=$_SESSION['s_id'];$rc=mysqli_num_rows($result);
    		$i=1;
			while($i<=$rc) 
    		{
    			$sql1="select * from workson where emp_id=$i";$resu=mysqli_query($con,$sql1);$row2=mysqli_fetch_array($resu);$rid=$row2["r_id"];
    			$sql2="select * from faculty where emp_id=$i";$resu1=mysqli_query($con,$sql2);$row=mysqli_fetch_array($resu1);
    			$sql3="select * from research_details where r_id=$rid";$resu2=mysqli_query($con,$sql3);$row1=mysqli_fetch_array($resu2);
    	?>
    	<tr>
	    	<td><?php echo $i; ?></td>
	    	<td><?php echo $row['NAME']; ?></td>
	    	<td>
	    	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['emp_id'] ?>">View</button>
			</td>
			
    	</tr>
        <!--modal popup code.........-->
    	<div id="myModal<?php echo $row['emp_id'] ?>" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
			    <div class="modal-content">
					<div class="modal-header">
					    <h4 class="modal-title">Faculty Details</h4>
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
				    </div>
				    <div class="modal-body">
						<p>Name: <?php echo $row["NAME"]; ?></p>
						<p>Phone: <?php echo $row["PHONE"];?></p>
						<p>Email: <?php echo $row["EMAIL"];?></p>
						<p>School: <?php echo $row["SCHOOL"];?></p>
						<p>Cabin No: <?php echo $row["CABIN_NO"];?></p>
						<p>Type Of Research: <?php echo $row1["TYPE"];?></p>
						<p>Research Title: <?php echo $row1["R_TITLE"];?></p>
						<p>Research Status: <?php echo $row1["STATUS"];?></p>
						<p>Research Domain: <?php echo $row1["RESEARCH_DOM"];?></p>
						<p>Research Start Date: <?php echo $row1["START_DATE"];?></p>
						<p>Research End Date: <?php echo $row1["END_DATE"];?></p>
						<p>Research File Name: <?php echo $row1["FILE_NAME"];?></p>
						<p>Research File Download link</p>
						<?php 
						$scan=scandir("ups/");
						//here $scan[$a] gives the name of the file present in the ups folder
						$ms1="select * from workson where emp_id=$i";$ms2=mysqli_query($con,$ms1);$ms3=mysqli_fetch_array($ms2);$reid=$ms3["r_id"];
						$ms4="select * from research_details where r_id=$rid";$ms5=mysqli_query($con,$ms4);$ms6=mysqli_fetch_array($ms5);
						for($a=0;$a<count($scan);$a++)
						{
							if($scan[$a]==$ms6["FILE_NAME"])
							{
								?>
								<a download="<?php echo $scan[$a] ?>" href="ups/<?php echo $scan[$a] ?>"><?php echo $scan[$a] ?></a>
								<?php
							}
						}
						echo nl2br("\n");
						?>
				    </div>
				<div class="modal-footer">
				<a href="sfinreg.php"><button type="button" class="btn btn-outline-danger" >Proceed To Registration</button></a>
				</div>
				</div>
			</div>
		</div><!--// end modal popup code........-->
  	<?php
				$i++;
    		}	 ?>
    </tbody>
</table>
	<a href="shome.php"><input type="button" name="" value="<<Go Back"></a>
	</div>
	</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
</div>
</html>