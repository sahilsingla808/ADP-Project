<?php

require 'connect.php' ;
require 'core.php' ;
//session_start();
if(loggedin()) header('Location:studentt.php');


//echo ''.$_SESSION["uname"].'' ;
//$db = new MYSQLI('localhost','root','','Project') ; //or die('Error connecting to MySQL server.');

//if($db->connect_errno)
//{
  //echo $db->connect_error;
  //die ('Unable to connect to the database ');
//}
else
{

$per=$db->query("SELECT * FROM Students WHERE ROLLNO=".$_POST['uname']." && PASSWORD='".$_POST['psw']."' ") ;



if (!$per->num_rows)
{ 
$_SESSION['incorrect']=1;  
//die('Username and Password is incorrect ');
 //echo 'Permission granted Enjoy due '  //print_r($per);}
header("Location:studentlogin.php");

}

 else

{
$_SESSION["uname"]= $_POST['uname'];
$_SESSION["password"] = $_POST['psw'];

header('Location:studentt.php');
}
}

?>

