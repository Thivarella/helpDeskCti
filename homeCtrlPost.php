<?php
require('base.php');
session_start();

function getTecnico($data){
    $sql = "SELECT c.tecnico_id, count(c.tecnico_id) FROM chamado c JOIN esp_tecnico e ON e.id_usuario_tec = c.tecnico_id WHERE c.tipo_id = $data AND e.id_tipo = $data GROUP BY c.tecnico_id ORDER BY 2 ASC";

    $conexao = conectar();

    $resultado = executar_SQL($conexao, $sql);

    $id = retorna_linha($resultado);

    if($id == null || $id <= 0){
        $id = getTecnicoByEspecialidade($data);
    }

    return $id['tecnico_id'];
}

function getTecnicoByEspecialidade($data){
    $sql = "SELECT e.id_usuario_tec AS tecnico_id FROM esp_tecnico e WHERE e.id_tipo = $data AND e.id_usuario_tec NOT IN (SELECT DISTINCT c.tecnico_id FROM chamado c)";

    $conexao = conectar();

    $resultado = executar_SQL($conexao, $sql);

    $id = retorna_linha($resultado);

    if($id == null || $id <= 0){
        $id = getTecnicoMenosChamado($data);
    }

    return $id['tecnico_id'];
}

function getTecnicoMenosChamado($data){
    $sql = "SELECT c.tecnico_id, count(c.id) FROM chamado c GROUP BY 1 ORDER BY 2 ASC";

    $conexao = conectar();

    $resultado = executar_SQL($conexao, $sql);

    $id = retorna_linha($resultado);

    return $id['tecnico_id'];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['inputChamado'] == "" || $_POST['inputChamado'] == null) {
        $status = $_POST["inputStatus"];
        $tipo = $_POST["inputTipo"];
        $sala = $_POST["inputSala"];
        $descricao = $_POST["inputDescricao"];
        $solicitante = $_SESSION['user']['id'];
        $dataChamado = $_POST["inputDatachamado"];
        $tecnico = getTecnico($tipo);
        $prioridade = $_POST["inputPrioridade"];

        $sql = "INSERT INTO chamado (status_id, tipo_id, sala_id, descricao, solicitante_id, tecnico_id, data_abertura, id_prioridade) VALUES ('$status', '$tipo', '$sala', '$descricao', '$solicitante', '$tecnico', '$dataChamado','$prioridade')";
    }else{
        $chamado = $_POST['inputChamado'];
        $status = $_POST["inputStatus"];
        $prioridade = $_POST["inputPrioridade"];

        $sql = "UPDATE chamado SET status_id=$status, id_prioridade=$prioridade  WHERE id = $chamado";
        if($_POST['inputDatafinal'] != "" || $_POST['inputDatafinal'] != null){
            $dataFinal = $_POST['inputDatafinal'];
            $sql = "UPDATE chamado SET status_id=$status, id_prioridade=$prioridade, data_resolucao = '$dataFinal' WHERE id = $chamado";
        }
    }

    $conexao = conectar();

    executar_SQL($conexao, $sql);

    header("Location: homeUser.php");
}
?>
