<?php
    require('../database/base.php');

    function getSalas(){
        $sql = "SELECT * FROM salas";
        $conexao = conectar();

        $select = executar_SQL($conexao,$sql);

        if(verifica_resultado($select)>0){
            foreach ($select as $res) {
                echo "<option value=".$res['id'].">".utf8_encode($res['sala'])."</option>";
            }
        }
    }

    function getStatusOrTipo($table){
        $sql = "SELECT * FROM $table";

        $conexao = conectar();

        $select = executar_SQL($conexao,$sql);

        if(verifica_resultado($select)>0){
            foreach ($select as $res) {
                echo "<option value=".$res['id'].">".utf8_encode($res['descricao'])."</option>";
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = $_POST["inputNome"];
        $email = $_POST["inputEmail"];
        $perfil = $_POST["inputPerfil"];
        $senha = $_POST["inputPassword"];

        $sql = "INSERT INTO usuario (nome, email, perfil_id, senha, is_cti) VALUES ('$nome', '$email', '$perfil', '$senha', false)";
        $conexao = conectar();

        executar_SQL($conexao,$sql);
    }
?>