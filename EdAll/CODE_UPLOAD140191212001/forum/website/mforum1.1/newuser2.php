<?
require("global.php");
ShowHeader("New User");
$qid = 0;
$qid1 = $forum->query_first("SELECT username FROM user WHERE username='$username'");

if (!$qid1)
{
 if ($username != "" || $username != 0)
 {
  if ($password != "" || $password != 0)
  {
   if ($password2 != "" || $password2 != 0)
   {
    if ($password2 == $password)
    {
     if ($email != "" || $email != 0)
     {
      $qid = $forum->query("INSERT INTO user VALUES (NULL,'$username','$password','Person','$email',0)");
      echo "User created successfully";
     } else {echo "Please enter an email address"; br();}
    } else {echo "Passwords Don't match"; br();}
   } else {echo "Please Verify password"; br();}
  } else {echo "Please enter a password"; br();}
 } else {echo "Please enter a username"; br();}
} else {echo "Username already exists";}




?>

<?
ShowFooter();
?>