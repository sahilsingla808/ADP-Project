<?php
require("global.php");
ShowHeader("Index");
?>
<A HREF="newuser.php">Register</A>
<P>
<TABLE WIDTH=100% BORDER=0>
<TR BGCOLOR="#00C088">
<TD WIDTH=20%>
Forum Name
</TD>
<TD WIDTH=35%>
Description
</TD>
<TD WIDTH=10%>
Last post
</TD>
<TD WIDTH=5%>
Posts
</TD>
<TD WIDTH=5%>
Threads
</TD>
</TR>
<?
$finfo = $forum->query("select forumid, title, description, replycount, lastpost, threadcount FROM forum");

while($something = $forum->fetch_array($finfo))
{
$forumid = $something["forumid"];
$title = $something["title"];
$description = $something["description"];
$replycount = $something["replycount"];
$lastpost = $something["lastpost"];
$threadcount = $something["threadcount"];

echo "<TR><TD WIDTH=20% BGCOLOR=\"lightgreen\">";
echo "<A HREF=\"forum.php?forumid=$forumid\">$title</A>";
echo "</TD>";
//br();
echo "<TD WIDTH=35% BGCOLOR=\"#5BDAFF\">";
echo "$description";
echo "</TD>";
echo "<TD WIDTH=10% BGCOLOR=\"#FFBF5B\">";
echo date("m/d/y g:i:s a", $lastpost);;
echo "</TD>";
echo "<TD WIDTH=5% BGCOLOR=\"#FFEA5B\">";
echo "$replycount";
echo "</TD>";
echo "<TD WIDTH=5% BGCOLOR=\"#D86360\">";
echo "$threadcount";
echo "</TD></TR>";
//p();
}
?>
</TABLE>
<?
p(2);
ShowFooter("yes");
?>