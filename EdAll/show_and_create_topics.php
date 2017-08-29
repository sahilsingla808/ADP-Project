<?php

require 'connect.php';
require 'core.php';

//  user name and course id are inputs
/*  here first we show topics under a course each having a link which shows posts in that topic
    then if required topic is not present then we give an option to create that topic */
    $cr_id=$_GET['cid'];
    //echo $cr_id;
    /*if(loggedin())
    {
      $u_name=$_SESSION['uname'];
    }

    else if(loggedinfac())
    {
      $u_name=$_SESSION['unamefac'];
    }
    */
    $u_name=$_GET['uname'];
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
   body{
  background:url('51706-brightness-color-texture-background-material.jpg') round ;
} 
}
  
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
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li>
            <li title="Log Out"><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            
  </ul>
</nav>



  <?php


    echo '<center>
<div class="box box6 shadow6">
    <h2>Created topics under this course for discussion are:</h2>
  </div>
  </center>';
/*if($_SESSION['signed_in'] == false)
{
    //the user is not signed in
    echo "Sorry, you have to be signed in to create a topic or participate in discussion";
}

else
{*/
	$sql = "SELECT
                    forum_id,
                    forum_name,
                    forum_description
                FROM
                    table_forum
                WHERE course_id=".$cr_id."";
         
        $result = $db->query($sql);
        
    if (!$result->num_rows)
  {   
    echo ('NO topics are created under this course ');
  }   


   else
    {
           
           // echo '1';
          $rows=$result->fetch_all(MYSQLI_ASSOC);
          

          foreach($rows as $row)
          {

            $q="SELECT * FROM table_forum WHERE  forum_id=".$row['forum_id']." "; 
            $name=$db->query($q);
		if(!$name->num_rows)
			echo 'query works';
            $sname=$name->fetch_all(MYSQLI_ASSOC);
           
		//echo '2';
		
	    foreach($sname as $sn)
            {
		echo "<center>
            <td><div style=\" background-color: #faebd7;
    width: 400px;
    border: 5px solid pink;
    padding: 5px;
    margin: 5px;
    height: 40px\"><center> <a href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']."&uname=".$u_name." > ".$sn['forum_name']."</a></center></div></td></center>
            
              ";
		echo "</br>";
	     }
          }


       }


    /* now we create option to start new discussion under this course......<td>".$row['STID']."</td>
            </tr>*/
//$uname="atharva";    
//echo $u_name;
    echo "<center><form method='POST' action='c_topic.php?uname=".$u_name."&cid=".$cr_id."'>
        <p style=\"color:white\">Topic name: </p><input type='text' name='forum_name' /><br><br>
        <p style=\"color:white\">Topic description:</p> <textarea name='forum_description' /></textarea><br><br>
        <input type='submit' value='Create Topic' />
     </form></center>";   



  


?>


<br><br><br><br><br>
</body>
</html>

