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
      var data = new google.visualization.arrayToDataTable([
        ['Day', 'Hours'],
        ['1st Nov', 22],
        ['2nd Nov', 12],
        ['3rd Nov', 6],
        ['4th Nov', 24],
        ['5th Nov', 8],
        ['6th Nov', 18]
      ]);

      var options = {
        legend: 'none',
        colors: ['#760946'],
        vAxis: { gridlines: { count: 4 } }
      };

      var chart = new google.visualization.LineChart(document.getElementById('line-chart'));
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
    .box h2{
  font-family: 'Didact Gothic', sans-serif;
  font-weight:normal;
  text-align:center;
  padding-top:60px;
  color:#fff;
}
.box{
  width:90%;
  height:60px;
  
  background-color:white; 
  margin:5px 5px;
  border-radius:5px;
}
.box h2{
  font-family: 'Didact  othic', sans-serif;
  font-weight:normal;
  text-align:center;
  padding-top:20px;
  color:#fff;
}
.box6{
  background-color: #9EB3EB;
}
.shadow6{
  position:relative;
}
.shadow6{
    box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
}
.shadow6:before, .shadow6:after{
  position:absolute;
  content:"";
  top:50px;bottom:5px;left:30px;right:30px;
  z-index:-1;
  box-shadow:0 0 20px 13px #486685;
  border-radius:100px/20px; 
}
   
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
            <li><a href="history.html">History</a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
          <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
  </ul>
</nav>
<center>
<div class="box box6 shadow6">
    <h2>Shadow 6</h2>
  </div>
  </center>
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      
<br><br>
<br><br><br><br>
<a href="editinfo.php"><button type="button" class="btn btn-info" style="width: 400px ">Edit Info</button></a>
<br><br><br><br>
<div class="container">
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="width: 400px ">My Courses</button>
  <div id="demo" class="collapse">
  <div class="w3-container">
    <br>
     <p><button class="w3-btn w3-sand" style="border-radius: 50%;">Sand</button></p>
  </div>
  </div>
</div>

      <br>

      <h2></h2>
    </div>
    <br><br>

    <div class="col-sm-5" > 
    <br>
     <iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FCalcutta" style="border-width:0" width="500" height="300" frameborder="0" scrolling="no"></iframe>
    </div>
    
  </div>
</div>
<hr>
  
 
 

<br><br><br><br><br>
</body>
</html>

