<?php
require('base.php');
session_start();

if(isset($_GET['logout'])){
    if($_GET['logout'] == true){
        logout();
    }
}
if($_SESSION['user'] == null){
    header('Location: login.php');
}

function getSalas(){
    $sql = "SELECT * FROM salas";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    if(verifica_resultado($select)>0){
        foreach ($select as $res) {
            echo "<option value=".$res['id'].">".utf8_encode($res['sala'])."</option>";
        }
    }
}

function getStatusOrTipo($table){
    $sql = "SELECT * FROM $table";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    if(verifica_resultado($select)>0){
        foreach ($select as $res) {
            echo "<option value=".$res['id'].">".utf8_encode($res['descricao'])."</option>";
        }
    }
}

function logout(){
    unset($_SESSION['user']);
    header('Location: login.php');
}

function getNovosChamadosOrEmAndamento($id){
    $sql = "SELECT * FROM chamado WHERE status_id = $id";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    if(verifica_resultado($select)>0) {
        renderCard($select);
    }
}

function getChamadosFinalizados(){
    $sql = "SELECT * FROM chamado WHERE status_id <> 1 AND status_id <> 3";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    if(verifica_resultado($select)>0) {
        renderCard($select);
    }
}

function renderCard($select){
    foreach ($select as $res) {
        $res['tipo_id'] = getById('tipo',$res['tipo_id']);
        $res['status_id'] = getById('status',$res['status_id']);
        $res['solicitante_id'] = getById('usuario',$res['solicitante_id']);
        $res['sala_id'] = getById('salas',$res['sala_id']);
        if($res['tecnico_id'] != null){
            $res['tecnico_id'] = getById('usuario',$res['tecnico_id']);
        }

        echo "<div class='card text-white bg-info mb-3 mt-2' style='width: 18rem;'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title text-white'>".$res['tipo_id']['descricao']."</h5>";
        echo "<h6 class='card-subtitle mb-2 text-white'>STATUS - ".$res['status_id']['descricao']."</h6>";
        echo "<p class='card-text'> Descrição - ".$res['descricao']."</p>";
        echo "<a href='#' class='btn btn-light' onclick='openModal(".json_encode($_SESSION['user']).",".json_encode($res).")'>Ver mais</a>";
        echo "</div>";
        echo "</div>";
    }
}

function getById($table,$id){
    $sql = "SELECT * FROM $table WHERE id = $id";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    return retorna_linha($select);
}

?>