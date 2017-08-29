<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
$a=$_GET['cid'];
$thelist="";  
if ($handle = opendir('Lectures/' .$a. '/')) { //replace 111 by course ID variable
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
	$thelist .= "<li>$file<a href=Lectures/$a/$file><span class=\"glyphicon glyphicon-download-alt\"> </span> </a> </li>";
      }
    }
    closedir($handle);
  }
?>

<h1>List of files:</h1>
<ul><?php echo $thelist; ?></ul>
