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
  <title>Student List</title>
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
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url(icon-search-grey@1x.png);
  background-position: 3px 3px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;

}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
body{
  background:url('51706-brightness-color-texture-background-material.jpg') round;
}
  </style>
  <body >

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
             
              <li><a href="#section42">Add</a></li>
              <li><a href="#section43">Delete</a></li>
            </ul>
            </li><li><a href="adminn.php">Home Page</a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="#"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
  </ul>
</nav>
    <?php

if( isset($_POST['uname'])&&isset($_POST['psw']) && isset($_POST['info'])&&isset($_POST['name']) &&isset($_POST['address']) &&isset($_POST['cno']) )
{

    if(!empty($_POST['uname'])&& !empty($_POST['psw']) && !empty($_POST['name'])&& !empty($_POST['info']) && !empty($_POST['address'])&& !empty($_POST['cno']) )
  {

    $quer=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_POST['uname']."");
    
    if(!$quer->num_rows)
    {

    //echo '1';
    
    $q ="INSERT INTO Students (NAME,PASSWORD,CONTACT,INFO,ADDRESS,ROLLNO) VALUES ('".$_POST['name']."' ,'".$_POST['psw']."',".$_POST['cno'].",'".$_POST['info']."','".$_POST['address']."' ,".$_POST['uname'].") ";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h3 style=\"color:white\">Sucessfully Added the Student Record!</h3></center>";


    else 
      echo "<center><h3 style=\"color:white\">Student record was not inserted into the database!</h3></center>" ;
    }

  else
    echo "<center><h3 style=\"color:white\">Student ID already exists!</h3></center> ";


  }

}

?>



    <?php

if( isset($_POST['unamedel'])&&isset($_POST['namedel']))
{

    if(!empty($_POST['unamedel']) && !empty($_POST['namedel']))
  {

    $querm=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_POST['unamedel']."");
    
    if($querm->num_rows)
    {

    //echo '1';
    
    $q ="DELETE FROM Students WHERE ROLLNO=".$_POST['unamedel']." && NAME='".$_POST['namedel']."' ";

    //echo $q ;

     $db->query($q);

    if($db->affected_rows > 0)
      echo "<center><h3 style=\"color:white\">Sucessfully Deleted the Student Record!</h3><center>";


    else 
      echo "<center><h3 style=\"color:white\">Student record was not deleted from the database!</h3><center>" ;
    }

  else
    echo "<center><h3 style=\"color:white\">Student ID does not exists! </h3><center>";


  }

}

?>


<br>
<br><div class="container">
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="width: 400px">Students</button>
  <div id="demo" class="collapse">
  <div class="w3-container">
    <br>
 <input type="text" id="myInput" onkeyup="myFunction2()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">


  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Student ID</th>
  </tr>
 
  <?php

    $stud = "SELECT * FROM Students ";

    $students=$db->query($stud);
    

  if (!$students->num_rows)
  {   
    echo ('NO Student to show ');
  }         
          //$att=$db->result($cour,0,'ATTENDANCE');
    else
    {

           // echo '1';
          $rows=$students->fetch_all(MYSQLI_ASSOC);
          

          foreach($rows as $row)
          {

            //$q="SELECT NAME FROM Students WHERE ROLLNO=".$row['STID'].""; 
            //$name=$db->query($q);
            //$sname=$name->fetch_all(MYSQLI_ASSOC);
            //foreach($sname as $name)
            //{
              //$studentname =$name['NAME']; 
            //}          
            
            echo "
            <td style=\"color:red;\"> ".$row['NAME']."</td>
            <td style=\"color:red;\"> ".$row['ROLLNO']."</td>
            </tr>
              ";
          }
  
    }


   ?>

  
  
  </table>
  </div>
  </div>
</div>
<script>
function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<br><br>

<br><br>
<div id="section42" class="container-fluid">
  
  <center>
 <h1>Add Student</h1>


  <form action="admin3.php" method="POST">
  
  <div class="container">
    <label><b>Name</b></label>
    <br>
    <input type="text" placeholder="Enter Name" name="name" style="color: gray;" required>
    <br>
    <label><b>Student ID</b></label>
    <br>
    <input type="text" placeholder="Enter Student ID" name="uname" style="color: gray;" required>
    <br>
    <label><b>Contact Number</b></label>
    <br>
    <input type="text" placeholder="Enter Contact Number" name="cno" style="color: gray;" required>
    <br>
    <label><b>Password</b></label>
    <br>
    <input type="password" placeholder="Enter Password" name="psw" style="color: gray;" required>
    <br>
    <label><b>Address</b></label>
    <br>
    <input type="text" placeholder="Enter Address" name="address" style="color: gray;" required>
    <br>
    <label><b>Info</b></label>
    <br>
    <input type="text" placeholder="Enter Info" name="info" style="color: gray;" required>
    <br>
    <button class="button" type="submit">Submit</button>
    </center></div></form>
</div>
    </div>
    <br><br><br><br>
  <div id="section43" class="container-fluid">
  <center>
 <h1>Delete Student</h1>


  <form action="admin3.php" method="POST">
  
  <div class="container">
    <label><b>Name</b></label>
    <br>
    <input type="text" placeholder="Enter Name" name="namedel" style="color: gray;" required>
    <br>
    <label><b>Student ID</b></label>
    <br>
    <input type="text" placeholder="Enter Student ID" name="unamedel" style="color: gray;" required>
    <br>
    <button class="button" type="submit" onclick="myFunction()">Submit</button>

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

