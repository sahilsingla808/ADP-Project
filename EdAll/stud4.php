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
<li class="active">
   <a href="project1(1).html">
          <span title="Home" class="glyphicon glyphicon-home"></span>
        </a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us <span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li><a href="vision.html">Vision</a></li>
              <li><a href="map.html">Contact Us</a></li>
              <li><a href="logo.html">Logo</a></li>
              <li><a href="campus.html">Campus</a></li>
              
            </ul>
            </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="student2.html">Student Life </a></li>
              <li><a href="student1.html">Student Login </a></li>
              
            </ul>
            </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Faculty <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="faculty1.html">Faculty Login</a></li>
              <li><a href="#section42">Section 4-2</a></li>
            </ul>
            </li>
    
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrator login <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="admin1.html">Administrator login</a></li>
              <li><a href="#section42">Section 4-2</a></li>
            </ul>
            </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#section41">Section 4-1</a></li>
              <li><a href="#section42">Section 4-2</a></li>
            </ul>
            </li>
  </ul>
</nav>
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      

<h3 onclick="myFunction()" style="text-align: center;" title="Click To See The Courses"><a href=""><b>My Courses</b></a></h3>

<div id="myDIV"><b>
This is my DIV element.</b>
</div>

<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>

      <br>

      <h2></h2>
    </div>
    <br><br>

    <div class="col-sm-5" style="background-color:lavenderblush;"> 
    <br><br>
     <iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FCalcutta" style="border-width:0" width="500" height="300" frameborder="0" scrolling="no"></iframe>
    </div>
    
  </div>
</div>
<hr>
  
 
 <div class="container">
  <div class ="row">
    <div class="col-sm-2">
    </div>
  
  <div class="col-sm-8" style="background-color:lavenderblush;">
      <div class="chartWithOverlay" >

   <div id="line-chart" style="width: 700px; height: 500px;"></div>

   <div class="overlay">
    <div style="font-family:'Arial Black'; font-size: 28px;">Time</div>
    <div style="color: #b44; font-family:'Arial Black'; font-size: 39px; letter-spacing: .21em; margin-top:50px; margin-left:5px;">Spent</div>
    
  </div>

 </div>
    </div>
  </div>
</div>

<br><br><br><br><br>
</body>
</html>
