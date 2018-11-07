<?php
$request = $_SERVER['REDIRECT_URL'];

    $DIR = "/home/thiago/Documentos/DW1/helpDeskCti/views/";
switch ($request) {
    case '/' :
        require $DIR.'login.php';
        break;
    case '' :
        require $DIR.'login.php';
        break;
}

?>