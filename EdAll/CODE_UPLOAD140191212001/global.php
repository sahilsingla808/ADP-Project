<?php

//variable declarations and initialization.
$bcolor = "#E4F8EA";
$fcolor = "#5C0004";

/*          Header/Footer Functions          */

function showheader($title)
{
 global $bcolor, $fcolor;

 if($title == "Index")
 {
 addhit("index");
 }

 echo ("<HTML>");
 echo ("\n<HEAD>\n<TITLE>$title</TITLE\n</HEAD>\n");
 echo ("<BODY BGCOLOR=\"$bcolor\" TEXT=\"$fcolor\">");
 echo ("<CENTER>");
 echo ("<H1>$title</H1>");
 echo ("</CENTER>");
 p();
 return;
}

function showfooter($index="no")
{
 echo ("<CENTER>");
 echo ("\n<SMALL>\n");
 if ($index == "yes")
 {
  echo ("There have been " . gethits("index") . " visitors to this page\n");
  br();
 }

 echo ("</CENTER>");
 echo ("\n</BODY>");
 echo ("\n</HTML>"); 

 return;
}

/*          Line Functions          */
/* (<BR>, <P>, \n, etc) */

function br($howmany=1)
{
 echo ("\n");
 for($i = 1; $i <= $howmany; $i++)
 {
  echo ("&nbsp<BR>&nbsp");
 }
 echo ("\n");
 return;
}

function p($howmany=1)
{
 echo ("\n");
 for($i = 1; $i <= $howmany; $i++)
 {
  echo ("&nbsp<P>&nbsp");
 }
 echo ("\n");
 return;
}

function n($howmany=1)
{
 for($i = 1; $i <= $howmany; $i++)
 {
  echo ("\n");
 }
 return;
}

/*          Counter Functions          */

function gethits($logpath)
{
 $hits = 0;
 $logpath = "./hits/".$logpath.".hits";
 If (file_exists($logpath))
 {
  $filenum = fopen($logpath,"r");
  if ($filenum > 0)
  {
   $filesize = filesize($logpath);
   $filesize++;
   $hits = fread($filenum,$filesize);
   fclose($filenum);
  }
 }
 else
 {
  $filenum = fopen($logpath,"w");
  fwrite($filenum,$hits);
  fclose($filenum);
 }
 return $hits;
}

function addhit($logpath)
{
 $hits = 0;
 $logpath = "./hits/".$logpath.".hits";
 If (file_exists($logpath))
 {
  $filenum = fopen($logpath,"r");
  if ($filenum > 0)
  {
   //Get the current file hit count
   $filesize = filesize($logpath);
   $filesize++;
   $hits = fread($filenum,$filesize);
   fclose($filenum);
   //Increment the hit counter
   $hits++;
   $filenum = fopen($logpath,"w");
   fwrite($filenum,$hits);
   fclose($filenum);
  }
 }
 else
 {
  $hits++;
  $filenum = fopen($logpath,"w");
  fwrite($filenum,$hits);
  fclose($filenum);
 }
 return;
}

/*          Forum Functions          */


function parsemessage($message, $smile=1) {
if ($smile==1) {
$message = parsesmile($message);
}
$message = parsebbcode($message);
$message = nl2br($message);
return $message;
}

function parsebbcode($message, $html=1) {
if ($html==0) {
htmlspecialchars();
}

  $message=eregi_replace(quotemeta("[b]"),quotemeta("<b>"),$message);
  $message=eregi_replace(quotemeta("[/b]"),quotemeta("</b>"),$message);
  $message=eregi_replace(quotemeta("[i]"),quotemeta("<i>"),$message);
  $message=eregi_replace(quotemeta("[/i]"),quotemeta("</i>"),$message);
  $message=eregi_replace(quotemeta("[u]"),quotemeta("<u>"),$message);
  $message=eregi_replace(quotemeta("[/u]"),quotemeta("</u>"),$message);


  // do [url]xxx[/url]
  $message=eregi_replace("\\[url\\]www.([^\\[]*)\\[/url\\]","<a href=\"http://www.\\1\" target=_blank>\\1</a>",$message);
  $message=eregi_replace("\\[url\\]([^\\[]*)\\[/url\\]","<a href=\"\\1\" target=_blank>\\1</a>",$message);

  // do [email]xxx[/email]
  $message=eregi_replace("\\[email\\]([^\\[]*)\\[/email\\]","<a href=\"mailto:\\1\">\\1</a>",$message);

  // do quotes
  $message=eregi_replace("quote\\]","quote]",$message);  // make lower case
  $message=str_replace("[quote]\r\n","<blockquote><smallfont>quote:</smallfont><hr>",$message);
  $message=str_replace("[quote]","<blockquote><smallfont>quote:</smallfont><hr>",$message);
  $message=str_replace("[/quote]\r\n","<hr></blockquote>",$message);
  $message=str_replace("[/quote]","<hr></blockquote>",$message);

  // do codes
  $message=eregi_replace("code\\]","code]",$message);  // make lower case
  $message=str_replace("[code]\r\n","<blockquote><smallfont>code:</smallfont><pre><hr>",$message);
  $message=str_replace("[code]","<blockquote><smallfont>code:</smallfont><hr><pre>\n",$message);
  $message=str_replace("[/code]\r\n","</pre><hr></blockquote>",$message);
  $message=str_replace("[/code]","</pre><hr></blockquote>",$message);

  // do [img]xxx[/img]
  $message=eregi_replace("\\[img\\]([^\\[]*)\\[/img\\]","<img src=\"\\1\" border=0>",$message);



return $message;
}

function parsesmile($message) {
//evil
$message = str_replace(">:)", "<IMG SRC=\"images/emoticons/evil.gif\">", $message);

//smile
$message = str_replace(":)", "<IMG SRC=\"images/emoticons/smile.gif\">", $message);

//mad
$message = str_replace(">:(", "<IMG SRC=\"images/emoticons/mad.gif\">", $message);

//sad
$message = str_replace(":(", "<IMG SRC=\"images/emoticons/sad.gif\">", $message);

//tired
$message = str_replace(":tired", "<IMG SRC=\"images/emoticons/tired.gif\">", $message);

//redface
$message = str_replace(":o", "<IMG SRC=\"images/emoticons/redface.gif\">", $message);

//tounge
$message = str_replace(":p", "<IMG SRC=\"images/emoticons/tounge.gif\">", $message);

//biggrin
$message = str_replace(":D", "<IMG SRC=\"images/emoticons/biggrin.gif\">", $message);

//wink
$message = str_replace(";)", "<IMG SRC=\"images/emoticons/wink.gif\">", $message);

//cool
$message = str_replace(":cool", "<IMG SRC=\"images/emoticons/cool.gif\">", $message);

//rolleyes
$message = str_replace(":roll", "<IMG SRC=\"images/emoticons/rolleyes.gif\">", $message);

//drunk
$message = str_replace(":~", "<IMG SRC=\"images/emoticons/drunk.gif\">", $message);

//eek
$message = str_replace(":eek", "<IMG SRC=\"images/emoticons/eek.gif\">", $message);

//confused
$message = str_replace(":?", "<IMG SRC=\"images/emoticons/confused.gif\">", $message);

//finger
$message = str_replace(":finger", "<IMG SRC=\"images/emoticons/finger.gif\">", $message);

//dunno
$message = str_replace(":dunno", "<IMG SRC=\"images/emoticons/dunno.gif\">", $message);

return $message;
}

//require("admn/configure.php");
//require("admn/db.php");
//initialize the database
//$forum=new DB_Sql_uf;
//$forum->appname="Ultimate Forum";
//$forum->appshortname="Ultimate Forum";
//$forum->database=$dbname;
//$forum->server=$servername;
//$forum->user=$dbusername;
//$forum->password=$dbpassword;
//ok, done initialising, connect
//$forum->connect();
require("admn/global.php");
?>