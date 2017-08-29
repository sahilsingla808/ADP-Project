<?php

require 'core.php';
require 'connect.php';
unset($_SESSION['uname']);
unset($_SESSION['password']);
unset($_SESSION['unameadm']);
unset($_SESSION['passwordadm']);
unset($_SESSION['unamefac']);
unset($_SESSION['passwordfac']);
setcookie('us', null, -(86400 * 30), '/');
setcookie('usadm',null,  -(86400 * 30 ),'/');
setcookie('usfac',null,  -(86400 * 30 ),'/');

header("Location:index.html");
//header('Location:index.php');
?>