<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/css.css">
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

</head>
<body>
<?php
    session_start();
    if($_SESSION['user'] == null){
        header('Location:../login/login.php');
    }
    require "homeCtrl.php";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <!--<img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> !-->
        HelpDesk
    </a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link text-white" href="#">Em andamento</a>
            </li>

            <li class="nav-item text-white">
                <a class="nav-link text-white" href="#">Resolvidos</a>
            </li>

        </ul>
        <div class="dropdown">
            <a class="text-white dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img src="http://www.sixsigmahospital.com/wp-content/uploads/2018/04/person-icon-257x300.png"
                     width="28" height="28" alt=""> Nome Usuario
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="homeCtrl.php?logout=true" class="dropdown-item">Sair</a>
            </div>
        </div>
    </div>
</nav>
<btn data-toggle="modal" data-target="#modalChamado" class="fab"> +</btn>
<div class="modal fade" data-backdrop="static" id="modalChamado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style="max-width: 60%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chamado</h4>
                <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="homeCtrl.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                RA
                                <input id="inputRa" name="inputRa" class="form-control" type="text" placeholder="RA">
                            </div>
                            <div class="col-md-6">
                                Email
                                <input id="inputEmail" name="inputEmail" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="col-md">
                                Status
                                <label for="status"></label>
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
                                <input id="inputChamado" name="inputChamado" class="form-control" type="text" placeholder="Numero do chamado">
                            </div>
                            <div class="col-md-5">
                                Sala
                                <label for="sala"></label>
                                <select class="form-control" id="inputSala" name="inputSala">
                                    <option>Selecione</option>
                                    <?php
                                        getSalas();
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                Tipo
                                <label for="tipo"></label>
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
                                    <textarea class="form-control" id="inputDescricao" name="inputDescricao" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                Solicitante
                                <input id="inputSolicitante" name="inputSolicitante" class="form-control" type="text" placeholder="Nome">
                            </div>
                            <div class="col-md">
                                Técnico
                                <input id="inputTecnico" name="inputTecnico" class="form-control" type="text" placeholder="Nome">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm">
                                Data do chamado
                                <input class="form-control" id="inputDatachamado" name="inputDatachamado" type="date">
                            </div>
                            <div class="col-sm">
                                Data finalização
                                <input class="form-control" id="inputDatafinal" name="inputDatafinal" type="date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Abrir Chamado</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>