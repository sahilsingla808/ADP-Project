<?php

  require 'connect.php' ;
  require 'core.php' ;

if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }


   if(isset($_GET['sid'])&&!empty($_GET['sid']) && isset($_GET['cid']) && !empty($_GET['cid']))
    {
      $cid=$_GET['cid'];
      $sid=$_GET['sid'];
       //echo $cid;
    }



//echo $_POST['name'];
//echo "$_POST['uname']";


if( isset($_POST['uname'])&&isset($_POST['ca']) && isset($_POST['ctotal']))
{

    if(!empty($_POST['uname'])&& !empty($_POST['ca']) && !empty($_POST['ctotal']) )
  {

    if($_POST['uname']==$sid)
    {
    
    $q ="UPDATE CourseData SET TOTAL_CLASSES=".$_POST['ctotal']." , ATTENDANCE=".$_POST['ca']." WHERE STID=".$sid." && CID=".$cid." ";

    //echo $q;

     $db->query($q);

    if($db->affected_rows > 0)
      echo 'Sucessfully Updated the Attendance';


    else 
      echo "No update Done" ;
  }

  else
    echo 'Student Id of another student entered ';
  }
}


if( isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']))
{

    if(!empty($_POST['q1']) && !empty($_POST['q2']) && !empty($_POST['q3']) )
  {

    if($_POST['uname']==$sid)
    {
    
    $q1 ="UPDATE CourseData SET QUIZ1=".$_POST['q1']." , QUIZ2=".$_POST['q2']." , QUIZ3=".$_POST['q2']."  WHERE STID=".$sid." && CID=".$cid." ";

    //echo $q;

     $db->query($q1);

    if($db->affected_rows > 0)
      echo 'Sucessfully Updated the Quiz Marks';


    else 
      echo "No update Done - " ;
  }

  else
    echo 'Student Id of another student entered ';
  }
}

if( isset($_POST['ann1']) && isset($_POST['ann2']) && isset($_POST['ann3']))
{

    if(!empty($_POST['ann1']) && !empty($_POST['ann2']) && !empty($_POST['ann3']) )
  {

    if(1)
    {
    
    $q2 ="UPDATE CourseData SET ANNCS='".$_POST['ann1']."' , ANNC2='".$_POST['ann2']."' , ANNC3='".$_POST['ann3']."'  WHERE STID=".$sid." && CID=".$cid." ";

    //echo $q;

     $db->query($q2);

    if($db->affected_rows > 0)
      echo 'Sucessfully Updated the Announcements';


    else 
      echo "No update Done - " ;
  }

  else
    echo 'Student Id of another student entered ';
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
  #section41 {padding-top:50px;height:550px;color: #fff; background-color: #032F49;}
  #section42 {padding-top:50px;height:700px;color: #fff; background-color: #075786;}
  #section43 {padding-top:50px;height:500px;color: #fff; background-color: #076BA5;}
  </style>
  <body background="51706-brightness-color-texture-background-material.jpg">

<div class="container-fluid" style="background-color: #CEC9C7 ;height:110px;">
<br>
  <img src="download.jpg" height="80" width="80" >
  <img hspace="250">
  <h1 style="display: inline;"><b>EdAll</b></h1>
</div>

<nav class="navbar navbar-inverse" >
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
              <li><a href="#section41">Edit Announcements</a></li>
              <li><a href="#section42">Edit Quiz Marks</a></li>
              <li><a href="#section43">Attendance</a></li>
            </ul>
            </li>
             <li><a href="facultyy.php">Home Page</a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
  </ul>
</nav>
    
<br>

<br>
<div id="section41" class="container-fluid">
  <center>
  <h1>Edit News</h1>
  </center>
  <?php  
   
   $studd=$db->query("SELECT * fROM CourseData WHERE CID=".$cid." && STID=".$sid." ");

  $rows=$studd->fetch_all(MYSQLI_ASSOC) ;


  foreach($rows as $row)
{
  echo"<form action=\"faculty3.php?sid=$sid&cid=$cid\" method=\"POST\">
  
  <div class=\"container\">
    <label><b>Announcement 1</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Announcement 1\" name=\"ann1\"  value=\"".$row['ANNCS']."\" style=\"color: gray;\" required>
    <br>
     <label><b>Announcement 2</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Announcement 2\" name=\"ann2\" value=\"".$row['ANNC2']."\" style=\"color: gray;\" required>
    <br>
     <label><b>Announcement 3</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Announcement 3\" name=\"ann3\" value=\"".$row['ANNC3']."\" style=\"color: gray;\" required>
    <br>
    <button class=\"button\" type=\"submit\">Submit</button>
   </div></form>
</div>";
}
?>

<br>

<br><br>
<div id="section42" class="container-fluid">
  
  <center>

 <h1>Edit Quiz Marks</h1>
<?php

foreach($rows as $row)
{
  echo "<form action=\"faculty3.php?sid=$sid&cid=$cid\" method=\"POST\">
  <div class=\"container\">
    <label><b>Students Username</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Students Username\" name=\"uname\" value=\" ".$sid."\" style=\"color: gray;\" required>
    <br>
    <label><b>Quiz 1 Marks </b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Quiz 1 Marks\" name=\"q1\" value=\" ".$row['QUIZ1']."  \" style=\"color: gray;\" >
    
    <br>
    <label><b>Quiz 2 Marks</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Quiz 2 Marks\" name=\"q2\" value=\" ".$row['QUIZ2']."   \" style=\"color: gray;\" >
    
    <br>
    <label><b>Quiz 3 Marks</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Quiz 3 Marks\" name=\"q3\" value=\" ".$row['QUIZ3']."   \" style=\"color: gray;\" >
    
    <br>
    <button class=\"button\" type=\"submit\">Submit</button>
    </center></div></form>
    </div></center></div>";
}

?>


    <br><br><br><br>
  <div id="section43" class="container-fluid">
  <center>
 <h1>Attendance</h1>
<?php

foreach($rows as $row)
{
  //echo $row['NAME'] ;
  echo "<form action=\"faculty3.php?sid=$sid&cid=$cid\" method=\"POST\">
  <div class=\"container\">
    <label><b>Student's Username</b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" value=\" ".$sid."\" style=\"color: gray;\" required>
    <br>
    <label><b>Classes Attended </b></label>
    <br>
    <input type=\"text\" placeholder=\"Enter Attended Classes\" name=\"ca\" value=\" ".$row['ATTENDANCE']."   \" style=\"color: gray;\" >
    <br>
     <label><b>Total Classes</b></label>
    <br>
    <input type=\"text\"  placeholder=\"Enter Total Classes\" name=\"ctotal\"  value=\" ".$row['TOTAL_CLASSES']." \"   style=\"color: gray;\" required>
    <br>
    <button class=\"button\" type=\"submit\">Submit</button>
    </center></div></form>
    </div></center></div>";
}
?>
<br><br><br><br><br>
</body>
</html>