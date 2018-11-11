<?php

    require('../database/base.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        $email = utf8_encode($_POST["inputEmail"]);
        $senha = $_POST["inputPassword"];

        $sql = "SELECT * FROM usuario WHERE email LIKE '$email' AND senha LIKE '$senha'";
        $conexao = conectar();

        $count = executar_SQL($conexao,$sql);
        if(verifica_resultado($count)<=0){
        }else{
            $_SESSION['user'] = retorna_linha($count);
            header("Location:../home/homeUser.php");
        }
    }
?>