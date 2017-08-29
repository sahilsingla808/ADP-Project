<?
require("global.php");
if(isset($forumid))
$qs = $forum->query_first("select forumid, title FROM forum WHERE forumid=$forumid");
ShowHeader($qs["title"], $qs["title"]);
$thread = $forum->query("select threadid, title, lastpost, forumid, replycount, lastpostuser, postusername, dateline from thread where forumid=$forumid ORDER BY dateline DESC");
echo "<TABLE WIDTH=100% BORDER=2>";
echo "<TR BGCOLOR=lightgreen>";

echo "<TD WIDTH=30%>";
echo "Title:";
echo "</TD>";
echo "<TD WIDTH=20%>";
echo "Poster";
echo "</TD>";
echo "<TD WIDTH=10%>";
echo "Replies";
echo "</TD>";
echo "<TD WIDTH=40%>";
echo "Last Post";
echo "</TD>";
echo "</TR>";
while($something = $forum->fetch_array($thread))
{

echo "<TR BGCOLOR=lightblue>";
echo "<TD WIDTH=30%>";
echo "<A HREF=\"showthread.php?threadid=" . $something["threadid"] . "\">" . $something["title"] . "</A>";
echo "</TD>";
echo "<TD WIDTH=20%>";
echo $something["postusername"];
echo "</TD>";
echo "<TD WIDTH=10%>";
echo $something["replycount"];
echo "</TD>";
echo "<TD WIDTH=40%>";
echo date("m/d/y g:i:s A",$something["lastpost"]);
echo " posted by " . $something["lastpostuser"];
echo "</TD>";
echo "</TR>";
}


echo "</TABLE>";
echo "<P>";
echo "<A HREF=newthread.php?forumid=" . $qs["forumid"] . ">New Thread</A>";
ShowFooter();
?>