<?php
    require('../database/base.php');

    function getPerfil(){
        $sql = "SELECT * FROM perfil_usuario";

        $conexao = conectar();

        $select = executar_SQL($conexao, $sql);

        if(verifica_resultado($select)>0){
            foreach ($select as $res) {
                echo "<option value=".$res['id'].">".utf8_encode($res['perfil'])."</option>";
            }
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = $_POST["inputNome"];
        $ra = $_POST["inputRa"];
        $email = $_POST["inputEmail"];
        $perfil = $_POST["inputPerfil"];
        $senha = $_POST["inputPassword"];

        $sql = "INSERT INTO usuario (nome, ra, email, perfil_id, senha, is_cti) VALUES ('$nome', '$ra', '$email', '$perfil', '$senha', false)";

        $conexao = conectar();

        executar_SQL($conexao, $sql);

        header("Location:../login/login.php");
    }
?>