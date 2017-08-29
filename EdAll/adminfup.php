<?php


  require 'connect.php' ;
  require 'core.php' ;

if(!loggedinfac())
  {
    header('Location:facultylogin.php');
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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    </head>
<style>
  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 0;
      width: 100%;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  * {box-sizing:border-box;}

body {font-family: Verdana,sans-serif;
}
input[type=text], input[type=password],input[type=email],input[type="number"] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    text-decoration-color: black;
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
  #section41 {padding-top:50px;height:1000px;color: #fff; background-color: #032F49;}
  #section42 {padding-top:50px;height:1000px;color: #fff; background-color: #075786;}
  #section43 {padding-top:50px;height:500px;color: #fff; background-color: #076BA5;}

  body{
  background:url('51706-brightness-color-texture-background-material.jpg') round ;
}
  </style>
  <body background="51706-brightness-color-texture-background-material.jpg">

<div class="container-fluid" style="background-color: #CEC9C7 ;height:110px;">
<br>
  <img src="download.jpg" height="80" width="80" >
  <img hspace="250">
  <h1 style="display: inline;"><b>EdAll</b></h1>
</div>

<nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
<li >
   <a href="index.html">
          <span title="Home" class="glyphicon glyphicon-home"></span>
        </a></li>
           <li ><a href="gallery.html">Gallery</a></li>
         <li ><a href="vision.html">Vision</a></li>
            <li><a href="history.html">History</a></li>
            <li><a href="admin2.html">Home Page</a></li>
    
            </li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="#"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
  </ul>
</nav>
    
<br>

<div id="section41" class="container-fluid">
  <center>
  <h1>Update Professor Info</h1>

 <?php


    $prof=$db->query("SELECT * fROM PROF WHERE TEACHER_ID=".$_SESSION['unamefac']." ");

  $rows=$prof->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  //echo $row['NAME'] ;
  echo "<form action=\"action_page.php\">
  <div class=\"container\">
    <label><b>Name</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Name\" name=\"name\" value=\" ".$row['NAME']."\" style=\"color: gray;\" required>
    <br>
    <label><b>Teacher's ID</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter ID\" name=\"uname\" value=\" ".$row['TEACHER_ID']  ."   \" style=\"color: gray;\" disabled>
    <br>
     <label><b>Contact Number</b></label>
    <br>
    <input type=\"text\"  placeholder=\"Enter Contact Number\" name=\"cno\"  value=\" ".$row['CONTACT']." \"   style=\"color: gray;\" required>
    <br>
    <label><b>Password</b></label>
    <br>
    <input type=\"password\" placeholder=\"Enter Password\" name=\"psw\"   value=\" ".$row['PASSWORD']." \" style=\"color: gray;\" required>
    <br>
    <label><b>Address</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Address\" name=\"uname\"    value=\" ".$row['ADDRESS']." \" style=\"color: gray;\" required>
    <br>
    <label><b>Info</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Info\" name=\"uname\"    value=\" ".$row['INFO']." \" style=\"color: gray;\" required>
    <br>
    <label><b>Salary</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Salary\" name=\"uname\"    value=\" ".$row['ADDRESS']." \" style=\"color: gray;\" required>
    <br>
    <label><b>Course ID </b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Course ID\" name=\"uname\"    value=\" ".$row['INFO']." \" style=\"color: gray;\" required>
    <br>

    <label><b>Security Answer</b></label>
    <br>
    <input type=\"password\" placeholder=\"Enter Security Answer\" name=\"psw\"   value=\" ".$row['SECURITY_ANSWER']." \" style=\"color: gray;\" required>
    <br>
    <button class=\"button\" type=\"submit\">Submit</button>
    </center></div></form>
    </div></center></div>";
      
      


}
?>




 
<br><br><br><br><br>
</body>
</html>

