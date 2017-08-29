<?
require("global.php");
ShowHeader("View User Stats");


$finfo = $forum->query("select * from user");

while($something = $forum->fetch_array($finfo))
{
echo $something["username"] . "  -  " . $something["password"] . "  -  " . $something["email"] . "  -  " . $something["title"] . "\n<BR>";

}
?>

<?
ShowFooter();
?>