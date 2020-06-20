<?php
	session_start();
	require_once('dbconfig/mainphp.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Upload Research File</title>
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
	<center><h3 style="font-family:Century">Upload Research File</h3></center>	
	<div class="in_con">
		<form action="frup.php" method="post" enctype="multipart/form-data">
			<input type="text" name="rid" placeholder="Enter Research ID"><br>
			<label>File upload </label>
				<input type="File" name="file"><br>
				<input type="submit" name="upload" value="UPLOAD FILE">
		</form>	
	<a href="fhome.php"><input type="button" name="" value="<< Go Back "></a><br><br><br>
	</div>
</div>
</body>
<div class="footer">
		<p style="font-family:Freestyle Script;font-size:33px">Developed By:Rahul and Vineeth</p>	
	</div>
<?php
	if(isset($_POST['upload']))
	{
		$empid=$_SESSION['emp_id'];@$rid=$_POST['rid'];
		$file_name=$_FILES['file']['name'];
		$new_name=$empid.$rid.$file_name;
		//gives a new name for the uploaded file i.e we're adding the emp_id to the beggining of the file to be uploaded
		$file_tmp=$_FILES['file']['tmp_name'];
		$upload_dir="ups/";
		move_uploaded_file($file_tmp,$upload_dir.'/'.$new_name);
		$q="update research_details set FILE_NAME='$new_name' where r_id=$rid";
		$res=mysqli_query($con,$q);
		if($res)
		{
			echo '<script type="text/javascript">alert("File Uploaded successfully..!")</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Could not upload file, plz try again.....")</script>';
		}
	} ?>
</html>