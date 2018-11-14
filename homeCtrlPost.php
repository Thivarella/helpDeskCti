<?php
require('base.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['inputChamado'] == "" || $_POST['inputChamado'] == null) {
        $status = $_POST["inputStatus"];
        $tipo = $_POST["inputTipo"];
        $sala = $_POST["inputSala"];
        $descricao = $_POST["inputDescricao"];
        $solicitante = $_SESSION['user']['id'];
        $dataChamado = $_POST["inputDatachamado"];

        $sql = "INSERT INTO chamado (status_id, tipo_id, sala_id, descricao, solicitante_id, data_abertura) VALUES ('$status', '$tipo', '$sala', '$descricao', '$solicitante', '$dataChamado')";
    }else{
        $chamado = $_POST['inputChamado'];
        $status = $_POST["inputStatus"];
        $tecnico = $_SESSION['user']['id'];

        $sql = "UPDATE chamado SET status_id=$status, tecnico_id=$tecnico WHERE id = $chamado";
    }

    $conexao = conectar();

    executar_SQL($conexao, $sql);

    header("Location: homeUser.php");
}

?>