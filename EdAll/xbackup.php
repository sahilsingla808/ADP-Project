<?php


require 'connect.php' ;
require 'core.php' ;
//session_start();
 if(isset($_GET['q'])&&!empty($_GET['q']))
 		{
 			$cid=$_GET['q'];
 			//echo $cid;
 		}

echo ''.$_SESSION["uname"].'' ;


//$_SESSION["course"]=$_POST['$tmp'];

//$course=$_POST['']
//$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');


//if($db->connect_errno)
//{
  //echo $db->connect_error;
  //die ('Unable to connect to the database ');
//}

$per=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_SESSION["uname"]." && PASSWORD='".$_SESSION["password"]."' ") ;
 
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
	echo '<br>';
   	echo $row['GRADE'];
   	echo '<br> <br>';
   	echo $row['ATTENDANCE']; 
   	$ann=$row['ANNCS'] ;
}

echo '<br>' ;

echo $ann ; 


?>
