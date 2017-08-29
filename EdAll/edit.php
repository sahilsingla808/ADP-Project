 <?php


  require 'connect.php' ;
  require 'core.php' ;
if(!loggedinadm())
  {
    header('Location:adminloginpage.php');
  }

?>


<!DOCTYPE html>
<html>
<head>
  <title>Add or Remove Course</title>
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
  #section41 {padding-top:50px;height:600px;color: #fff; background-color: #032F49;}
  #section42 {padding-top:50px;height:600px;color: #fff; background-color: #075786;}
  #section43 {padding-top:50px;height:500px;color: #fff; background-color: #076BA5;}
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
              <li><a href="#section41">Add</a></li>
              <li><a href="#section42">Delete</a></li>
             
            </ul>
            </li> </li><li><a href="adminn.php">Home Page</a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="#"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
  </ul>
</nav>
    
<br>
<br>
<?php

if( isset($_POST['cnamen'])&&isset($_POST['cidn']) && isset($_POST['tidn'])&&isset($_POST['des']))
{
   if(!empty($_POST['cnamen'])&& !empty($_POST['cidn']) && !empty($_POST['tidn'])&& !empty($_POST['des']))
   {


    $quer=$db->query("SELECT * FROM SEM_COURSES WHERE COURSE_ID=".$_POST['cidn']."");
    
    if(!$quer->num_rows)
    {

    //echo '1';
    
    $q ="INSERT INTO  SEM_COURSES (NAME,COURSE_ID,TEACHER_ID,DESCRIPTION) VALUES ('".$_POST['cnamen']."' ,".$_POST['cidn'].",".$_POST['tidn']." ,'".$_POST['des']."' )";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
    {
      echo "<center><h3 style=\"color:white\">Sucessfully Added the Course Record!</h3></center>";
      mkdir("/opt/lampp/htdocs/ADP Project/academic-education/Lectures/".$_POST['cidn']."",0777 );
    }


    else 
      echo "<center><h3 style=\"color:white\">Course record was not inserted into the database!</h3></center>" ;
    }

  else
    echo "<center><h3 style=\"color:white\">Course ID already exists!</h3></center> ";


   }
}


?>


<?php

if( isset($_POST['cidd'])&&isset($_POST['tidd']))
{

    if(!empty($_POST['cidd']) && !empty($_POST['tidd']))
  {

    $querm=$db->query("SELECT * FROM SEM_COURSES WHERE COURSE_ID=".$_POST['cidd']."");
    
    if($querm->num_rows)
    {

    //echo '1';
    
    $q ="DELETE FROM SEM_COURSES WHERE COURSE_ID=".$_POST['cidd']." && TEACHER_ID=".$_POST['tidd']." ";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h3 style=\"color:white\">Sucessfully Deleted the Course Record!</h3><center>";


    else 
      echo "<center><h3 style=\"color:white\">Course record was not deleted from the database!</h3><center>" ;
    }

  else
    echo "<center><h3 style=\"color:white\">Course ID does not exists! </h3><center>";


  }

}

?>



<div id="section41" class="container-fluid">
  <center>
  <h1>Add Courses</h1>
  <form action="edit.php" method="POST">
  
  <div class="container">
    <label><b>Course ID</b></label>
    <br>
    <input type="number" placeholder="Enter Course ID" name="cidn" style="color: gray;" required>
    <br>
    <label><b>Course Name</b></label>
    <br>
    <input type="text" placeholder="Enter Course Name" name="cnamen" style="color: gray;" required>
    <br>
    <label><b>Teacher ID</b></label>
    <br>
    <input type="number" placeholder="Enter Teacher ID" name="tidn" style="color: gray;" required>
    <br>
    <label><b>Description</b></label>
    <br>
    <input type="text" placeholder="Enter Description" name="des" style="color: gray;" required>
    <br>
    <button class="button" type="submit">Submit</button>
    </center></div></form>
</div>
<br><br><br><br>
<div id="section42" class="container-fluid">
  
  <center>
 <h1>Drop Course</h1>
  <form action="edit.php" method="POST">
  
  <div class="container">
    <label><b>Username</b></label>
    <br>
    <label><b>Course ID</b></label>
    <br>
    <input type="number" placeholder="Enter Course ID" name="cidd" style="color: gray;" required>
    <br>
    <label><b>Teacher ID</b></label>
    <br>
    <input type="number" placeholder="Enter Teacher ID" name="tidd" style="color: gray;" required>
    <br>
    <button class="button" type="submit">Submit</button>
    </center></div></form>
</div>
    </div>
    <center>

    </center></div></form>
</div>

    <br><br>

    
<hr>
  <script>
function myFunction() {
    var x;
    if (confirm("Are You Sure To Delete!") == true) {
        x = "You pressed OK!";
    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
</script>
 


<br><br><br><br><br>
</body>
</html>

