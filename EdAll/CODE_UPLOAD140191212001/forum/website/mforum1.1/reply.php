<HTML>
<HEAD>
<TITLE>Reply</TITLE>
</HEAD>
<BODY>

<?php

require("global.php");
$forum->select_db("forum");

// ############################### start new thread ###############################
if ($action=="newreply") {

 $foruminfo=$forum->query("SELECT title,description FROM forum WHERE forumid='$forumid'");
?>

<FORM ACTION="reply.php?threadid=<? echo $threadid;?>" METHOD="post">
Username: <INPUT TYPE="TEXT" NAME="username"> <BR>
Password: <INPUT TYPE="PASSWORD" NAME="password"> <BR>
Subject:  <INPUT TYPE="TEXT" NAME="subject"> <BR>
Message: <BR>
<TEXTAREA COLS=25 ROWS=10 name="m"></TEXTAREA><BR>
<INPUT TYPE="Submit">

<INPUT TYPE=HIDDEN NAME="action" VALUE="postreply">
</FORM>
<TABLE WIDTH=100% BORDER=1>
Previous Posts(from last to first): <BR>
<?
$counter = 0;
$posts = $forum->query("SELECT * FROM post WHERE threadid=$threadid ORDER BY dateline asc");
while($post=$forum->fetch_array($posts))
{
  $counter++;


  if ($counter%2==0) {
    $backcolor="#D1EFEE";
  } else {
    $backcolor="#EFD1D2";
  }

$username=htmlspecialchars($post["username"]);
$pagetext=$post["pagetext"];
$pagetext=parsemessage($pagetext);

echo "<TR><TD WIDTH=20% BGCOLOR=$backcolor>";
echo $username;
echo "</TD>";
echo "<TD WIDTH=80% BGCOLOR=$backcolor>";
echo $pagetext;
echo "</TD></TR>";
}

?>
</TABLE>
<?
// ############################### start post thread ###############################
}
if ($action=="postreply") {

  // check for message
  if (trim($m)=="") {
    echo "Please enter a subject";
    exit;
  }

  //check valid name
  if ($username=="" or trim($username)=="") {
    echo "Please enter your name in the 'Name' field.";
    exit;
  }
  $uname=$forum->query("SELECT username,password,email FROM user WHERE LCASE(username)='" . strtolower($username) . "'");  
$something = $forum->fetch_array($uname);

$pword = $something["password"];
$email = $something["email"];
$un = strtolower($something["username"]);
$un2 = $something["username"];
  if(strtolower($username) != $un)
  {
    echo "Non existant username";
    exit;
  }

  if($password != $pword) 
  {
   echo "Wrong password";
   exit;
  }

  $foruminfo=$forum->query("SELECT title FROM forum WHERE forumid=$forumid");
  $forumtitle=$foruminfo["title"];

  $qs = "SELECT * FROM thread";
  $q = $forum->query_first($qs);
  $forumid = $q["forumid"];
  // create post
  $forum->query("INSERT INTO post VALUES (NULL,$threadid,'$un2','$email', '$subject',". time().",'$m')");

  // update forum stuff
  $forum->query("UPDATE forum SET replycount=replycount+1,lastpost=".time()." WHERE forumid=$forumid");
  $forum->query("UPDATE thread SET replycount=replycount+1,lastpostuser='$un2',lastpost=".time()." WHERE threadid=$threadid");
  // redirect
  echo "<HTML>\n<HEAD>";
  echo "<meta http-equiv=\"Refresh\" content=\"1; URL=showthread.php?threadid=$threadid\">";
  echo "\n</HEAD>\n<BODY>";
  echo "Thank you for posting, $un2. You will now be taken to your post.";
  echo "\n</BODY>\n</HTML>";
}
?>

</BODY>
</HTML>