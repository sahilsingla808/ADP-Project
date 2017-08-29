<HTML>
<HEAD>
<TITLE>New Thread</TITLE>
</HEAD>
<BODY>

<?php

require("global.php");
$forum->select_db("forum");
if (isset($action)==0 or $action=="") {
  $action="newthread";
}

// ############################### start new thread ###############################
if ($action=="newthread") {

 $foruminfo=$forum->query("SELECT title,description FROM forum WHERE forumid='$forumid'");
?>

<FORM ACTION="newthread.php?forumid=<? echo $forumid; ?>" METHOD="post">
Username: <INPUT TYPE="TEXT" NAME="username"> <BR>
Password: <INPUT TYPE="PASSWORD" NAME="password"> <BR>
Subject:  <INPUT TYPE="TEXT" NAME="subject"> <BR>
Message: <BR>
<TEXTAREA COLS=25 ROWS=10 name="m"></TEXTAREA><BR>
<INPUT TYPE="Submit">

<INPUT TYPE=HIDDEN NAME="action" VALUE="postthread">
</FORM>

<?
// ############################### start post thread ###############################
}
if ($action=="postthread") {

  // check for subject and message
  if (trim($subject)=="" or trim($m)=="") {
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

  //create new thread
  $qs = "INSERT INTO thread VALUES (NULL,'$subject', " . time() . ",$forumid,0,'$un2', '$un2', " .time(). ")";
  $forum->query($qs);
  $threadid = $forum->insert_id();
  // create first post
  $forum->query("INSERT INTO post VALUES (NULL,$threadid,'$un2','$email', '$subject',". time().",'$m')");

  // update forum stuff
  $forum->query("UPDATE forum SET replycount=replycount+1,threadcount=threadcount+1,lastpost=".time()." WHERE forumid=$forumid");


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