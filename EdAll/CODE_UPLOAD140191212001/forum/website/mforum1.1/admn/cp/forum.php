<HTML>
<HEAD><TITLE>Forum Functions</TITLE></HEAD>
<BODY>
<?
require("../global.php");
if ($action != "update")
{
?>

<FORM ACTION="forum.php" METHOD="post">
Whats the name of the forum you want to add? <BR>
<INPUT TYPE=TEXT NAME="forumname"> <BR>
Description: <BR>
<INPUT TYPE=TEXT NAME="forumdesc"><BR>

Which forum do you want to remove? <BR>
<INPUT TYPE=TEXT NAME="deleted"> <BR>
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

  $foruminfo = $forum->query_first("SELECT * FROM forum where title='$deleted'");
  $forumid=$foruminfo["forumid"];

  if(($userinfo["username"] != "") || ($userinfo["username"] != 0))
  {
    if($password == $userpass)
    {
      if($usertitle=="Admin")
      {
        if($forumname != "" || $forumname != 0)
        {
          $forum->query("INSERT INTO forum VALUES(NULL, '$forumname', '$forumdesc',0,0,0,0,0,0)");
          echo "Created forum: $forumname<BR>";
        }
        if($deleted != "" || $deleted != 0)
        {
          $forum->query("delete from forum where forumid=$forumid");
          echo "Deleted forum: $deleted<BR>";
        }
      } else echo "You do not have privelages to do this<BR>";
    } else echo "Wrong password<BR>";
  } else echo "invalid Username<BR>";
}

?>
</BODY>
</HTML>
