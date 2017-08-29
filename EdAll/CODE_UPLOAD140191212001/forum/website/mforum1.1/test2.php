<?
require("global.php");
$forum->select_db("forum");

  //create new thread
$qs = "INSERT INTO thread VALUES (NULL,'test', " . time() . ",2,0,'Dennis Wrenn', " .time(). ")";
  $forum->query($qs);
  $threadid = $forum->insert_id();
echo $threadid;
  // create first post
  $forum->query("INSERT INTO post VALUES (NULL,$threadid,'Dennis Wrenn','denniswrenn@yahoo.com', 'test',". time().",'this is a test')");
echo mysql_error();

  // update forum stuff
  $forum->query("UPDATE forum SET replycount=replycount+1,threadcount=threadcount+1,lastpost=".time()." WHERE forumid=2");

?>