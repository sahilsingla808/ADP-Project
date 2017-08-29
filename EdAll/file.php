<?php

  require 'connect.php' ;
  require 'core.php' ;

if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }

   if(isset($_GET['q'])&&!empty($_GET['q']))
    {
      $cid=$_GET['q'];
      //echo $cid;
    }


?>




<!DOCTYPE html>
<html>
<head>
  <title>Faculty Courses</title>
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
  background:url('51706-brightness-color-texture-background-material.jpg') round ;
}
  </style>
  <body >

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
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Details <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#section41">Edit News</a></li>
               <li><a href="#section44">Upload Files</a></li>

            </ul>
            </li>
            <li><a href="facultyy.php">Home Page</a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
			<li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
  </ul>
</nav>
    
<br>
<div class="container">
<a href="show_and_create_topics.php?cid=<?php echo $cid."&uname=".$_SESSION['uname'];?>"> <button type="button" class="btn btn-info" style="width: 400px ">Disscussion Forum</button></a>
<br><br>
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="width: 400px">Students</button>
  <div id="demo" class="collapse">
  <div class="w3-container">
    <br>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Student ID</th>
  </tr>

<tbody>
  
    <?php
    $stud = "SELECT * FROM CourseData WHERE CID = ".$cid." ";

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

            $q="SELECT NAME FROM Students WHERE ROLLNO=".$row['STID'].""; 
            $name=$db->query($q);
            $sname=$name->fetch_all(MYSQLI_ASSOC);
            foreach($sname as $name)
            {
              $studentname =$name['NAME']; 
            }          
            echo "<tr>
            <td style=\"color:red;\"> <a href=faculty3.php?sid=".$row['STID']."&cid=".$row['CID'].">".$studentname."</a></td>
            <td style=\"color:red;\">".$row['STID']."</td>
            </tr>
              ";
            
          }
  
    }


   ?>
</tbody>
  


  </table>
  </div>
  </div>
</div>
<script>
function myFunction() {
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
<br>


    
 
 <br><br>
<div id="section44" class="container-fluid">
<center>
<h2>Upload File</h2>
 <form method="POST" action="upload.php?cid=<?php echo $cid;?>" enctype="multipart/form-data">
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

