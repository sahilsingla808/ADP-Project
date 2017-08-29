<?
require("global.php");
$threadinfo=$forum->query("SELECT title,forumid,lastpost,replycount+1 AS posts FROM thread WHERE threadid=$threadid");
$ti = $forum->fetch_array($threadinfo);

$title = $ti["title"];
ShowHeader($title);

$counter=0;
$posts=$forum->query("SELECT dateline,postid,pagetext,title,username,email FROM post WHERE threadid=$threadid ORDER BY dateline");
echo "<TABLE BORDER=1 WIDTH=100%><TR><TD WIDTH=20%>Author</TD><TD WIDTH=*>Post</TD></TR>";
while ($post=$forum->fetch_array($posts)) {
  $counter++;

  $postid=$post["postid"];

  if ($counter%2==0) {
    $backcolor="#D1EFEE";
  } else {
    $backcolor="#EFD1D2";
  }

//  $postdate=date($dateformat,$post[dateline]+($timeoffset*3600));
// $posttime=date($timeformat,$post[dateline]+($timeoffset*3600));

$postitle=htmlspecialchars($post["title"]);
$username=htmlspecialchars($post["username"]);

$userqs = $forum->query_first("SELECT title FROM user WHERE username='$username'");
$usertitle = $userqs["title"];
$pagetext=$post["pagetext"];
$pagetext=parsemessage($pagetext);

echo "<TR><TD WIDTH=20% BGCOLOR=$backcolor>";
echo "Username: $username";
echo "<BR>";
echo "Title: $usertitle";
echo "</TD>";
echo "<TD WIDTH=* BGCOLOR=$backcolor>";
if($counter!=1)
{
echo "<STRONG>$postitle</STRONG><P>";
}
echo $pagetext;
echo "</TD></TR>";
}
echo "</TABLE>";
echo "<A HREF=\"reply.php?threadid=$threadid&action=newreply\">Post Reply</A>";
ShowFooter();
?>
 