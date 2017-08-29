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
  <title>Admin Access</title>
  <meta charset="utf-8">
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
        ['1st Nov', 7],
        ['2nd Nov', 12],
        ['3rd Nov', 6],
        ['4th Nov', 4],
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
    h3 {
    background-color: lightgrey;
    width: 500px;
    border: 5px solid green;
    padding: 20px;
    margin: 20px;
    border-radius: 20px;
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

/*body {
  background: #fff;
  color: #666;
  font: 90%/180% Arial, Helvetica, sans-serif;
  width: 800px;
  max-width: 96%;
  margin: 0 auto;
}*/
a {
  color: #69C;
  text-decoration: none;
}
a:hover {
  color: #F60;
}
h1 {
  font: 1.7em;
  line-height: 110%;
  color: #000;
}
p {
  margin: 0 0 20px;
}


input {
  outline: none;
}
input[type=search] {
  -webkit-appearance: textfield;
  -webkit-box-sizing: content-box;
  font-family: inherit;
  font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button {
  display: none; 
}


input[type=search] {
  background: #ededed url(http://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
  border: solid 1px #ccc;
  padding: 9px 10px 9px 32px;
  width: 55px;
  
  -webkit-border-radius: 10em;
  -moz-border-radius: 10em;
  border-radius: 10em;
  
  -webkit-transition: all .5s;
  -moz-transition: all .5s;
  transition: all .5s;
}
input[type=search]:focus {
  width: 130px;
  background-color: #fff;
  border-color: #66CC75;
  
  -webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
  -moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
  box-shadow: 0 0 5px rgba(109,207,246,.5);
}


input:-moz-placeholder {
  color: #999;
}
input::-webkit-input-placeholder {
  color: #999;
}

/* Demo 2 */
#demo-2 input[type=search] {
  width: 15px;
  padding-left: 10px;
  color: transparent;
  cursor: pointer;
}
#demo-2 input[type=search]:hover {
  background-color: #fff;
}
#demo-2 input[type=search]:focus {
  width: 130px;
  padding-left: 32px;
  color: #000;
  background-color: #fff;
  cursor: auto;
}
#demo-2 input:-moz-placeholder {
  color: transparent;
}
#demo-2 input::-webkit-input-placeholder {
  color: transparent;
}body{
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
<li >
   <a href="index.html">
          <span title="Home" class="glyphicon glyphicon-home"></span>
        </a></li>
           <li ><a href="gallery.html">Gallery</a></li>
         <li ><a href="vision.html">Vision</a></li>
            <li><a href="history.html">History</a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
           
</nav>

<?php
echo"
<center>

<div class=\"box box6 shadow6\">
    <h2> ".$_SESSION['unameadm']."</h2>
  </div>

  </center>
  ";
  ?>

<div class="container">
  <div class="row">
    <div class="col-sm-7">
      
<br>
<h3 style="text-align: center;"><a href="admin3.php">Student List</a></h3>
<h3 style="text-align: center;"><a href="admin4.php">Faculty List</a></h3>
<h3 style="text-align: center;"><a href="edit.php">Edit Courses</a></h3>


      <br>

      <h2></h2>
    </div>
    <br><br>

    <div class="col-sm-5" > 
    
     <iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FCalcutta" style="border-width:0" width="500" height="300" frameborder="0" scrolling="no"></iframe>
    </div>
    
  </div>
</div>
<hr>
  


<br><br><br><br><br>
</body>
</html>

