<?php

var_dump($_GET);

define('DIR' , "/home/thiago/Documentos/DW1/helpDeskCti/chamado/");

switch ($request) {
    case '/' :
        require DIR . 'login.php';
        break;
    default :
        require DIR . 'login.php';
        break;
}

?>