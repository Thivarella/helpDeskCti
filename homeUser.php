<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="assets/js/homeUser.js"></script>
            <title>HelpDesk - Aluno</title>

</head>
<body>
<?php
    echo '<div class="col-md-12 mt-header" style="display: inline-flex;text-align: center; border-bottom: 1px solid #313234; position: fixed; z-index: 2;background-color: white;border-width: initial;"><div class="col-md-2" style="margin-right: -20px">Chamado</div><div class="col-md-5" style="text-align: left;margin-right: -30px;padding-left: 4.57%;">Descrição</div><div class="col-md-2">Status</div><div class="col-md-2">Última atualização</div></div>';
?>
<?php
require('navbar.php');?>
<div class="container-fluid">
    <div class="row col-md">
        <?php
            echo '<div class="panel-group col-md-11 mt-panel" id="accordion">';
            getNovosChamadosOrEmAndamento($user);
            echo '</div>';
        ?>
    </div>
</div>
<btn class="fab" onclick='openModal(<?php echo json_encode($user) ?>,null)'> +</btn>
<div class="modal fade" data-backdrop="static" id="modalChamado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style="max-width: 60%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chamado</h4>
                <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="homeCtrlPost.php" onsubmit="habiliteToSend()" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                RA
                                <input id="inputRa" name="inputRa" class="form-control" type="text" placeholder="RA" disabled>
                            </div>
                            <div class="col-md-6">
                                Email
                                <input id="inputEmail" name="inputEmail" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" disabled>
                            </div>
                            <div class="col-md">
                                Status
                                <select class="form-control"  id="inputStatus" name="inputStatus">
                                    <option>Selecione</option>
                                    <?php
                                        getStatusOrTipo("status");
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                Numero do Chamado
                                <input id="inputChamado" name="inputChamado" class="form-control" type="text" placeholder="Número do chamado" disabled>
                            </div>
                            <div class="col-md-5">
                                Sala
                                <select class="form-control" id="inputSala" name="inputSala">
                                    <option>Selecione</option>
                                    <?php
                                        getSalas();
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                Tipo
                                <select class="form-control" id="inputTipo" name="inputTipo">
                                    <option>Selecione</option>
                                    <?php
                                        getStatusOrTipo("tipo");
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group mt-2">
                                    <label for="descricao">Descricão</label>
                                    <textarea maxlength="280" class="form-control text-description" id="inputDescricao" name="inputDescricao" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                Solicitante
                                <input id="inputSolicitante" name="inputSolicitante" class="form-control" type="text" placeholder="Nome" disabled>
                            </div>
                            <div class="col-md">
                                Técnico
                                <input id="inputTecnico" name="inputTecnico" class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm">
                                Data do chamado
                                <input class="form-control" id="inputDatachamado" name="inputDatachamado" type="date" disabled>
                            </div>
                            <div class="col-sm">
                                Data finalização
                                <input class="form-control" id="inputDatafinal" name="inputDatafinal" type="date" disabled>
                            </div>
                            <div class="col-md-5">
                                Prioridade
                                <select class="form-control" id="inputPrioridade" name="inputPrioridade" required>
                                    <option selected>Selecione</option>
                                    <?php
                                        getStatusOrTipo("prioridade");
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" id="realizarInsert" class="btn btn-primary">Abrir Chamado</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>