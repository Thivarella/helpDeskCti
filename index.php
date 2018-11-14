<?php
require('loginCtrl.php');
$request = isset($_SESSION['user']) ? $_SESSION['user'] : '';
//print_r($request);
define('DIR' , "login/");
define('HOME' , "home/");
if (isset($request)) {
        require 'homeUser.php';
}else{
        require 'login.php';
}
if (isset($_GET['logout']) && $_GET['logout'] == 'true' ){
	require 'homeUser.php';
}


?>
