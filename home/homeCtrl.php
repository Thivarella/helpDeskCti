<?php
require('database/base.php');
//session_start();
if(isset($_GET['logout'])){
    if($_GET['logout'] == true){
        logout();
    }
}
if($_SESSION['user'] == null){
    header('Location: login/login.php');
}
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

function logout(){
    unset($_SESSION['user']);
    header('Location: login/login.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $status = $_POST["inputStatus"];
    $tipo = $_POST["inputTipo"];
    $sala = $_POST["inputSala"];
    $descricao = $_POST["inputDescricao"];
    $solicitante = $_SESSION['user']['id'];
    $dataChamado = $_POST["inputDatachamado"];

    $sql = "INSERT INTO chamado (status_id, tipo_id, sala_id, descricao, solicitante_id, data_abertura) VALUES ('$status', '$tipo', '$sala', '$descricao', '$solicitante', '$dataChamado')";
    $conexao = conectar();

    executar_SQL($conexao,$sql);

    header("Location:homeUser.php");
}
?>