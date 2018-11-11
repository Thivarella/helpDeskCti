<?php
require('login/loginCtrl.php');
$request = isset($_SESSION['user']) ? $_SESSION['user'] : '';
//print_r($request);
define('DIR' , "login/");
define('HOME' , "home/");
if (isset($request)) {
        require HOME . 'homeUser.php';
}else{
        require DIR . 'login.php';
}
if (isset($_GET['logout']) && $_GET['logout'] == 'true' ){
	require HOME . 'homeUser.php?logout=true';
}


?>
