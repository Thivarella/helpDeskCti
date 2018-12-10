<?php

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

function getNovosChamadosOrEmAndamento($user){
    $sql = "SELECT * FROM chamado ORDER BY data_abertura DESC, status_id ASC, id DESC";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    if(verifica_resultado($select)>0) {
        renderCard($select,$user);
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

function renderCard($select,$user){
    foreach ($select as $res) {
        $res['tipo_id'] = getById('tipo',$res['tipo_id']);
        $res['status_id'] = getById('status',$res['status_id']);
        $res['solicitante_id'] = getById('usuario',$res['solicitante_id']);
        $res['sala_id'] = getById('salas',$res['sala_id']);
        $res['id_prioridade'] = getById('prioridade',$res['id_prioridade']);
        if($res['tecnico_id'] != null){
            $res['tecnico_id'] = getById('usuario',$res['tecnico_id']);
        }

        echo '<div class="panel col-md-12">';
        echo '<div class="panel-heading  col-md-12">';
        echo '<div data-toggle="collapse" class="btn-chamado" data-parent="#accordion" href="#chamado'.$res["id"].'"><div class="col-md-2" style="text-align: left;padding-left: 33px;">'.$res['id'].'</div><div class="col-md-6 text-over ml-0">'.$res['descricao'].'</div><div class="col-md-2" style="text-align: left;margin-left: 0%;"><div class="badge-'.$res['status_id']['cor'].'"></div><text class="pl-20">'.$res['status_id']['descricao'].'</text></div><div class="col-md-2" style="text-align: center;margin-left: 0%;">'.$res['data_abertura'].'<img class="prioridade-icone" src="'.$res["id_prioridade"]["url"].'"></div></div>';
        echo '</div>';
        echo '<div id="chamado'.$res['id'].'" class="panel-collapse collapse">';
        echo '<div class="panel-body-schedule">';
        echo '<div class="container"">
            <div class="card">
                <div class="card-body">
                    <div class="row col-md-12">
                        <form class="col-md-8">
                            <label for="solicitante">Dados do solicitante</label>
                            <div id="solicitante" class="form-row">
                                <div class="col-md-3">RA: '.$res['solicitante_id']['ra'].'</div>
                                <div class="col-md-9 text-over">Nome: '.$res['solicitante_id']['nome'].'</div>
                                <div class="col-md-12">e-mail: '.$res['solicitante_id']['email'].'</div>
                            </div>
                            <label for="descricao">Descrição</label>
                            <div id="descricao" class="form-row">
                                <textarea class="form-control text-description" disabled>'.$res['descricao'].'</textarea>
                            </div>
                            <label for="dadosChamado">Dados do chamado</label>
                            <div id="dadosChamado">
                                <div class="form-row mb-3">
                                    <div class="col-md-5">Técnico: '.$res['tecnico_id']['nome'].'</div>
                                    <div class="col-md-4">Sala: '.$res['sala_id']['sala'].'</div>
                                    <div class="col-md-3">Tipo: '.$res['tipo_id']['descricao'].'</div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">Data do chamado: '.converte_data($res['data_abertura']).'</div>
                                    <div class="col-md-6">Data da Finalização: '.converte_data($res['data_resolucao']).'</div>
                                </div>
                            </div>
                        </form>

                        <div class="col-md-4">
                            <div>Logs</div>
                        </div>
                    </div>';
              if($user['is_cti'] == 1){
                  echo "<a href='#' class='btn btn-info fr' onclick='openModal(".json_encode($_SESSION['user']).",".json_encode($res).")'>Ver mais</a>";
              }
              echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

function getById($table,$id){
    $sql = "SELECT * FROM $table WHERE id = $id";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    return retorna_linha($select);
}

?>