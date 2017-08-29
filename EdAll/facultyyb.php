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
  #section41 {padding-top:50px;height:350px;color: #fff; background-color: #032F49;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #075786;}
  #section43 {padding-top:50px;height:500px;color: #fff; background-color: #076BA5;}
  #section44 {padding-top:50px;height:500px;color: #fff; background-color: #0E7F95;}

  textarea {
    width: 50%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}

  </style>
  <body background="51706-brightness-color-texture-background-material.jpg">

<div class="container-fluid" style="background-color: #CEC9C7 ;height:110px;">
<br>
  <img src="download.jpg" height="80" width="80" >
  <img hspace="250">
  <h1 style="display: inline;"><b>EdAll</b></h1>
</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
<li >
   <a href="index.html">
          <span title="Home" class="glyphicon glyphicon-home"></span>
        </a></li>
           <li ><a href="gallery.html">Gallery</a></li>
         <li ><a href="vision.html">Vision</a></li>
            <li><a href="history.html">History</a></li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Details <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#section41">Edit News</a></li>
              <li><a href="#section42">Edit Grades</a></li>
              <li><a href="#section43">Attendance</a></li                                         <li><a href="#section44">Upload Pdfs</a></li>

            </ul>
            </li>
            
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
  </ul>
</nav>
    
<br>
<div class="container">
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="width: 400px">Students</button>
  <div id="demo" class="collapse">
  <div class="w3-container">
    <br>
    <p>dwcrevwqcevrrt v4rergt4v24rerev</p>
  </div>
  </div>
</div>

<br>

<div id="section41" class="container-fluid">
  <center>
  <h1>Edit News</h1>
  </center>
  <form action="action_page.php">
  
  <div class="container">
    <label><b>Annuncements</b></label>
    <br>
    <input type="text" placeholder="Enter Annuncements" name="uname" style="color: gray;" required>
    <br>
    <button class="button" type="submit">Submit</button>
   </div></form>
</div>
<br><br><br><br>
<div id="section42" class="container-fluid">
  
   <center>
 <h1>Edit Grade</h1>
  <form action="action_page.php">
     

  <div class="container">
    <label><b>Students Username</b></label>
    <br>
    <input type="text" placeholder="Enter Username" name="uname" style="color: gray;" required>
    <br>
   
    <label><b>Grade</b></label>
    <br>
    <input type="number"  max ="10" placeholder="Enter Grade" name="cno" style="color: gray;" required>
    <br>
    <button class="button" type="submit">Submit</button>
    </div></form></center>
</div>
    </div>
    <br><br><br><br>
  <div id="section43" class="container-fluid">
  <center>
 <h1>Attendance</h1>
  <form action="action_page.php">
  
  <div class="container">
    <label><b>Student's Username</b></label>
    <br>
    <input type="text" placeholder="Enter Username" name="uname" style="color: gray;" required>
    <br>
    <label><b>Attended Classes</b></label>
    <br>
    <input type="number" placeholder="Attended Classes" name="uname" style="color: gray;" required>
    <br>
    <label><b>Total Classes</b></label>
    <br>
    <input type="number" placeholder="Total Classes" name="uname" style="color: gray;" required>
    <br>
    <button class="button" type="submit" >Submit</button>
</center>
    </div></form>
</div>

    <br><br>

    
<hr>
 
 <br><br>
<div id="section44" class="container-fluid">
<center>
 <form method="post" action="upload.php" enctype="multipart/form-data">
    <p>File :</p>
     <input type="file" name="Filename">
     <hr> 
    <p>Description:</p>
    <textarea rows="10" cols="35" name="Description" style="color: gray"></textarea>
    <br/>
<button class="button" type="submit" >Upload</button>
</form>
</center>
</div>
<br><br><br><br><br>
</body>
</html>

