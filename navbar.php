<?php
    session_start();
    if($_SESSION['user'] == null){
        header('Location: login.php');
    }
    require "homeCtrl.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : '';

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="homeUser.php">
        HelpDesk
    </a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: left">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="relatorio.php">Relatório <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" data-toggle="modal" data-target="#modalRegistrar">Registrar funcionário <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <div class="dropdown">
            <a class="text-white dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img src="http://www.sixsigmahospital.com/wp-content/uploads/2018/04/person-icon-257x300.png"
                     width="28" height="28" alt=""> <?php echo $user['nome']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="?logout=true" class="dropdown-item">Sair</a>
            </div>
        </div>
    </div>
</nav>

<div class="modal fade" data-backdrop="static" id="modalRegistrar" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" style="max-width: 60%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar funcionário</h4>
                <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="cadastroFuncionarioCtrl.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                RA
                                <input id="inputRa" name="inputRa" class="form-control" type="text"
                                       placeholder="RA">
                            </div>
                            <div class="col-md-9">
                                Nome completo
                                <input id="inputNome" name="inputNome" type="nome"
                                       class="form-control"
                                       aria-describedby="nomeHelp" placeholder="Nome">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                Especialidade
                                <?php
                                require "cadastroFuncionarioCtrl.php";
                                getTipo();
                                ?>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                Email
                                <input id="inputEmail" name="inputEmail" class="form-control"
                                       type="text"
                                       placeholder="Email">
                            </div>
                            <div class="col-md-3">
                                Tipo
                                <select class="form-control" id="inputTipo" name="inputTipo">
                                    <option>Funcionario</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                Senha
                                <input id="inputSenha" name="inputSenha" class="form-control"
                                       type="text"
                                       placeholder="Senha">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" id="realizarInsert" class="btn btn-primary">Cadastrar funcionário</button>
                </div>
            </form>
        </div>
    </div>
</div>