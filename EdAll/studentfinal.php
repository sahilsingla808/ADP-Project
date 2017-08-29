<?php
require 'connect.php' ;
require 'core.php' ;

$cour=$db->query("SELECT * FROM CourseData WHERE STID=".$_SESSION['uname']."");

if (!$cour->num_rows)
{   
die('NO Course to show ');
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{



  

  $cname=$row['Course Name'] ;
  $cid=$row['CID'];
  echo "<a href=x.php?q=$cid>$cname</a>";    


}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

   <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
   
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Attended',     11],
          ['Not Attended',    7]
        ]);

        var options = {
          title: 'Attendance',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
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
<li>
   <a href="index.html">
          <span title="Home" class="glyphicon glyphicon-home"></span>
        </a></li>
           <li ><a href="gallery.html">Gallery</a></li>
         <li ><a href="vision.html">Vision</a></li>
            <li><a href="history.html">History</a></li><li><a href="#"></a></li>
             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#section41">Announcements</a></li>
              <li><a href="#section42">Grades</a></li>
              <li><a href="#section43">Presentations</a></li>
              <li><a href="#section44">Attendance</a></li>
            </ul>
            </li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li>
          <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="#"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            
  </ul>
</nav>
<div id="section41" class="container-fluid">
  <center>
  <h1>Announcements</h1>
    </center></div></form>
</div>
<br><br>
<div id="section42" class="container-fluid">
  <center>
  <h1>Grades</h1>
  
    </center></div>
</div>
<br><br>
<div id="section43" class="container-fluid">
  <center>
  <h1>Presentations</h1>
  
    </center></div>
</div>
<br><br>
<div id="section44" class="container-fluid">
  <center>
  <h1>Attendance</h1>
   <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </center></div>
</div>


<br><br><br><br><br>
</body>
</html>

