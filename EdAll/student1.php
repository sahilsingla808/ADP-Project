<?php

if(loggedin())
{
 header('Location:studentt.php'); 
}
if(isset($_POST['uname'])&&isset($_POST['psw']))
{
  if(!empty($_POST['uname'])&&!empty($_POST['psw']))
  {
    $per=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_POST['uname']." && PASSWORD='".$_POST['psw']."' ") ;



if(isset($_COOKIE['us'])&&!empty($_COOKIE['us']))
{
  $_SESSION["uname"]= $_COOKIE['us'];
  header('Location:studentt.php');
}

if (!$per->num_rows)
{ 
echo 'Username and Password is incorrect ';
}
 
else
{
$_SESSION["uname"]= $_POST['uname'];
$_SESSION["password"] = $_POST['psw'];

if(isset($_POST['rmm'])) setcookie('us',$_POST['uname'], time() + (86400 * 30), "/");

header('Location:studentt.php');
}

  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 0;
      width: 100%;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    
    
    padding: 14px 20px;
    margin: 8px 0;
    
   
    width: 30%;
    padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: white;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}
.button:hover {background-color: #3e8e41}
.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 10%;
    border-radius: 50%;
}

.container {
    text-align: center;
    padding: 16px;
}

span.psw {
    text-align: center;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
body{
  background:url('51706-brightness-color-texture-background-material.jpg') round ;
}
label{
  color: white ;
  font-size: 15px;
}
  </style>
</head>
<body >

<div class="container-fluid" style="background-color: #CEC9C7 ;height:110px;">
<br>
  <img src="download.jpg" height="80" width="80" >
  <img hspace="250">
  <h1 style="display: inline;"><b>EdAll</b></h1>
</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
   <li>
   <a href="index.html">
          <span title="Home" class="glyphicon glyphicon-home"></span>
        </a></li>
    <li ><a href="gallery.html">Gallery</a></li>
         <li ><a href="vision.html">Vision</a></li>
            <li><a href="history.html">History</a></li>
  </ul>
</nav>

<form action="studentlogin.php" method="POST">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar" >
  </div>
  <center>
  <div class="container">
    <label><b>Username</b></label>
    <br>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label><b>Password</b></label>
    <br>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
    <button class="button" type="submit">Login</button>
    </center>
    <hr>
    <img hspace="305">
    <input type="checkbox" checked="checked" style="display: inline; " > <p style=" display: inline;;color: white;">Stay Signed In</p>
  </div>
  <br><br>
  <img hspace="305">
    <span class="psw" title="Get Back Home!" style="color: white">In <a href="index.html">Wrong Place?</a></span>
    <br>
    <br>
    

</form>
<br><br><br>
</body>
</html>

