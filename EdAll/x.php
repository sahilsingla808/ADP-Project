<?php


require 'connect.php' ;
require 'core.php' ;
//session_start();
 if(isset($_GET['q'])&&!empty($_GET['q']))
    {
      $cid=$_GET['q'];
      //echo $cid;
    }


?>   


<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');    
            data.addColumn('number', 'Slices');
            <?php

             $cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION["uname"]." && CID=".$cid." ");
            //echo $cid;
if (!$cour->num_rows)
{   
echo 'NO Course to show ';
}         
          //$att=$db->result($cour,0,'ATTENDANCE');

          $rows=$cour->fetch_all(MYSQLI_ASSOC);
          foreach($rows as $row)
{
    $att= $row['ATTENDANCE'] ;
    $atttotal= $row['TOTAL_CLASSES'];
}

           echo" data.addRows([
              ['Attended', $att],
              ['Not Attended', $atttotal-$att],
              
            ])";

            ?>
            // Create the data table.
          
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Quiz');
            data3.addColumn('number', 'Highest');
            data3.addColumn('number', 'Average');
            data3.addColumn('number', 'User Marks');
            
            data3.addRows([
              ['Quiz 1', 25,14,24],
              ['Quiz 2', 25,13,22],
              ['Quiz 3', 50,26,42],
            ]);

            

            // Set chart options
            var options = {'title':'Attendance Record',
                           'width':600,
                           'height':500};
            // Set chart options
           
            // Set chart options
            var options3 = {'title':'Marks Sheet',
                           'width':600,
                           'height':400};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            
            var chart3 =  new google.visualization.ColumnChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);

          }
        </script>
    </head>

  <style>
  .w3-btn {width:150px;}
  #myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    margin-top:20px;
}
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
  
    .chartWithOverlay {
           position: relative;
           width: 700px;
    }
    .overlay {
           width: 200px;
           height: 200px;
           position: absolute;
           top: 60px;   /* chartArea top  */
           left: 180px; /* chartArea left */
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
.box{
  width:90%;
  height:70px;
  
  background-color:white; 
  margin:25px 15px;
  border-radius:5px;
}
.box h2{
  font-family: 'Didact  othic', sans-serif;
  font-weight:normal;
  text-align:center;
  padding-top:20px;
  color:#fff;
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

<nav class="navbar navbar-inverse" >
  <ul class="nav navbar-nav">
<li>
   <a href="index.html">
          <span title="Home" class="glyphicon glyphicon-home"></span>
        </a></li>
           <li ><a href="gallery.html">Gallery</a></li>
         <li ><a href="vision.html">Vision</a></li>
            <li><a href="history.html">History</a></li><li><a href="#"></a></li>
             
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li>
          <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            
  </ul>
</nav>
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      
<br><br>
<br><br>

<center>
<h2 style="font-family:Cooper Black;color: white"><b><i>Attendance</i></b></h2>
<div id="chart_div"></div>
        
        
      <br>

<h2 style="font-family:Cooper Black;color: white"><b><i>Marks</i></b></h2>
      <div id="chart_div3"></div>
    </div>
    <br><br></center>

    <div class="col-sm-5" > 
    <br>
    <div style=" background-color: #faebd7;
    width: 400px;
    border: 5px solid pink;
    padding: 5px;
    margin: 5px;
    height: 400px">
    <center>
     <h2>Announcements</h2></center>

     <h3 style="font-family: 'Playfair Display', serif;"><?php

/*echo ''.$_SESSION["uname"].'' ;*/


//$_SESSION["course"]=$_POST['$tmp'];

//$course=$_POST['']
//$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');


//if($db->connect_errno)
//{
  //echo $db->connect_error;
  //die ('Unable to connect to the database ');
//}
//echo $_SESSION["uname"]  ;
//$_SESSION["password"];
$per=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_SESSION["uname"]." ") ;
 
if (!$per->num_rows)
{   
die('Username and Password is incorrect ');
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}



$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION["uname"]." && CID=$cid ");

if (!$cour->num_rows)
{   
die('NO Course to show ');
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;
  

foreach($rows as $row)
{
    echo '<br>' ;
    echo '<br>' ;
    echo'1.';
    echo $row['ANNCS'] ;
    echo '<br>' ;
    echo '<br>' ;
    echo'2.';
    echo $row['ANNC2'] ;
    echo '<br>' ;
    echo '<br>' ;
    echo'3.';
    echo $row['ANNC3'] ;
    echo '<br>' ;
    //echo $cid;
}



//echo $ann ; 


?></h3><br><br>
     
     
<br><br><br><br><br><br><br>
    <div class="container">
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="width: 400px">Lectures</button>
  <div id="demo" class="collapse">
  <div class="w3-container">
    <br></div>
     <p>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div style=" background-color: #faebd7;
    width: 400px;
    border: 5px solid pink;
    padding: 5px;
    margin: 5px;
    height: 400px">
<?php
//$a=$_GET['cid'];
$thelist="";  
if ($handle = opendir('Lectures/' .$cid. '/')) { //replace 111 by course ID variable
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
  $thelist .= "<li>$file<a href=Lectures/$cid/$file><span class=\"glyphicon glyphicon-download-alt\"> </span> </a> </li>";
      }
    }
    closedir($handle);
  }
?>

<h1>List of files:</h1>
<ul><?php echo $thelist; ?></ul>


     </p></div>
  </div>
  </div>
</div><center>
<a href="show_and_create_topics.php?cid=<?php echo $cid?>&uname=<?php echo $_SESSION['uname']?>" > <button type="button" class="btn btn-info" style="width: 400px ">Disscussion Forum</button></a>
    </div>
    
  </div>
</div>


</center>
<br><br><br><br><br>
</body>
</html>

