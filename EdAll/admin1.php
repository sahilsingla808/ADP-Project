

<?php

require 'connect.php' ;
require 'admin.php';


if(loggedin())
{
 header('Location:adminfinal.php'); 
}


$admin=$_POST['uname'];    //starting the session for user profile page
$psw=$_POST['psw'];

echo $admin;
echo '<br>';
echo $psw;

//$db=new mysqli('localhost','root','','Project') ;

//if ($db->connect_errno)
  //      die("Failed to connect to SQL DB: ");
 
$sql = "SELECT *  FROM ADMIN where NAME = '".$admin."' && PASSWORD ='".$psw."'";

$db->query($sql);



if ($db->affected_rows > 0 )
    {
      $_SESSION['uname'] =$admin;
      $_SESSION['password']=$psw;

     echo 'YOU ARE LOGGED IN ';
     header('Location:adminfinal.php');
  }

else
        echo 'Incorrect Email id and Password';


?>


