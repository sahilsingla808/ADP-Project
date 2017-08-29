<HTML>
<HEAD><TITLE>Admin Functions</TITLE></HEAD>
<BODY>
<?
require("../global.php");
if ($action != "update")
{
?>

<FORM ACTION="admin.php" METHOD="post">
Which user do you want to make an Admin? <BR>
<INPUT TYPE=TEXT NAME="usertoadmin"> <BR>
Which user do you want to revoke from being an Admin? <BR>
<INPUT TYPE=TEXT NAME="admintouser"> <BR>
Your Username: <INPUT TYPE=TEXT NAME="username"> <BR>
Your Password: <INPUT TYPE=PASSWORD NAME="password"> <BR>
<INPUT TYPE=HIDDEN NAME="action" VALUE="update">
<INPUT TYPE=SUBMIT> <BR>
</FORM>
<?
}
if($action=="update")
{
  $userinfo = $forum->query_first("SELECT * FROM user where LCASE(username)='" . strtolower($username) . "'");
  $usertitle=$userinfo["title"];
  $userpass=strtolower($userinfo["password"]);
  if($password == $userpass)
  {
    if($usertitle=="Admin")
    {
      if($usertoadmin != "" || $usertoadmin != 0)
      {
        $forum->query("UPDATE user set title='Admin' where username='$usertoadmin'");
        echo "Made $usertoadmin into Admin<BR>";
      }
      if($admintouser != "" || $admintouser != 0)
      {
        $forum->query("UPDATE user set title='Person' where username='$admintouser'");
        echo "Made $admintouser into Person<BR>";
      }
    }
  }
}
?>
</BODY>
</HTML>
