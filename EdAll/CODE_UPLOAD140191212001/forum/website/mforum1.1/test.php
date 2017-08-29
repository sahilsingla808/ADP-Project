<HTML>
<BODY>
<?
//$chk;
//$message;
require("global.php");
  if ($chk==1){
    $chk=0;
  }elseif($chk==0){
    $chk=1;
  }

  if ($message!="") {
    echo parsemessage($message,$chk);
    echo "\n<BR>";
  }else{
    echo "<form action=\"test.php\" method=\"post\">";
    echo "<textarea name=\"message\" cols=35 rows=15></textarea><BR>";
    echo "disable smilies: <input type=\"checkbox\" name=\"chk\" value=\"1\"><BR>";
    echo "<input type=\"submit\">";
    echo "<input type=\"reset\">";
    echo "</form>";
  }
?>
</BODY>
</HTML>