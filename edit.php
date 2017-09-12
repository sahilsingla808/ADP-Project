<!DOCTYPE html>
<html>
<head>
	<title>E-SHOP</title>
</head>
<body>
<center>
<form action="eshop.php">
	<?php
		$db=new MYSQLI('localhost','root','abc808','E-Shop');
		if($db->connect_errno)
		{
		  echo $db->connect_error;
		  die ('Unable to connect to the database ');
		}
		if ((((isset($_GET['cid']))&&!empty($_GET['cid']))||((isset($_GET['pid']))&&!empty($_GET['pid'])))&&(isset($_GET['act']))&&!empty($_GET['act'])) 
		{
			
			$act=$_GET['act'];
			echo $act;
			echo "string";
			if ($act=='cat') 
			{
				$cid=$_GET['cid'];
				$q='SELECT cvalue FROM categ where cid='.$cid.'';
				$result=$db->query($q);
				foreach ($result as $key) 
				{
					$q=$key['cvalue'];
				}

				echo "Enter New Value:<br><input type=\"text\" name=\"ncval\" value=".$q.">
				<input type=\"text\" name=\"cid\" value=".$cid." readonly>";
			}
			if ($act=='pro') 
			{
				$pid=$_GET['pid'];
				echo "string";
				$q='SELECT pvalue FROM product where pid='.$pid.'';
				$result=$db->query($q);
				foreach ($result as $key) 
				{
					$q=$key['pvalue'];
				}

				echo "Enter New Value:<br><input type=\"text\" name=\"npval\" value=".$q.">
				<input type=\"text\" name=\"pid\" value=".$pid." readonly>";
			}
		}
	?><br>
	<button type="submit">SUBMIT</button>
	</form>
</center>
</body>
</html>