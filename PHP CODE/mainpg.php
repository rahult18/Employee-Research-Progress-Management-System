<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<meta charset="utf-8">
<link rel="stylesheet" href="testcss.css">
<style>
.text{
  position: absolute;
  top:50%;
  left:50%;
  transform: translate(-50%,-50%);
  width: 50%;
  padding:40px 0;
  text-align:center;
  border-top-left-radius: 70px;
  border-bottom-right-radius: 80px;
  box-shadow: 0 5px 15px rgba(0,0,0,3.5);
  overflow: hidden;
  color:#130f40;
  border:10px;
}
body{
  background-image:url('5.jpg');
  background-size: cover;
  background-repeat: no-repeat;
}
a{
  position: relative;
  display:inline-block;
  padding:15px 30px;
  color:#2196f3;
  text-decoration: none;
  overflow: hidden;
  background: #130f40;
  text-transform: uppercase;
  letter-spacing: 2px;
  transition: 0.2s;
}
a span{
  position: absolute;
  display: block;
}
a span:nth-child(1){
  top:0;
  left:-100%;
  width:100%;
  height:2px;
  background: linear-gradient(90deg,transparent,#2196f3);
}
a:hover span:nth-child(1){
  left:100%;
  transition:1s;
}
a span:nth-child(3){
  bottom:0;
  right:-100%;
  width:100%;
  height:2px;
  background: linear-gradient(270deg,transparent,#2196f3);
}
a:hover span:nth-child(3){
  right:100%;
  transition:1s;
}
a span:nth-child(2){
  right:0;
  top:-100%;
  height:100%;
  width:2px;
  background: linear-gradient(180deg,transparent,#2196f3);
}
a:hover span:nth-child(2){
  top:100%;
  transition:1s;
}
a span:nth-child(4){
  left:0;
  bottom:-100%;
  height:100%;
  width:2px;
  background: linear-gradient(360deg,transparent,#2196f3);
}
a:hover span:nth-child(4){
  bottom:100%;
  transition:1s;
}
a:hover{
  color:white;
  background: #2196f3;
  transition-delay: 0.25s;
}
</style>
</head>
<body>
<div class="image">
<div class="text">
<h1 style="font-family:Garamond">Employee Research Progress Management System</h1>
<p style="font-family:Ostrich Sans;font-size:20px">
    Employee research managment system is a platform where the faculty under an authorised ID can provide the progress of their research status.
    On addition to this final year students are provided a portal where they can choose the faculty as their research guides and can also register under them.This management system provides a simple bridge of communication between employee and the students.
</p>  
<a href="flog.php">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Faculty Portal
</a>
<a href="slog.php">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Student Portal
</a>
</div>
</div>
</body>
</html>
