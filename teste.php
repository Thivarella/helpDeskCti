<!--/*-->
<!--*-->
<!--* Created by PhpStorm.-->
<!--* User: Lellis-->
<!--* Date: 09/12/2018-->
<!--* Time: 20:47-->
<!--*/-->

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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        HelpDesk
    </a>


    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: left">

        <ul class="navbar - nav mr - auto">
            <li class="nav - item active">
                <a class="nav - link" data-toggle="modal" data-target="#modalRegistrar">Cadastrar novo
                    funcionario <span class="sr-only">(current)</span></a>
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
                                                getStatusOrTipo();
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
                                    <button type="submit" id="realizarInsert" class="btn btn-primary">Cadastrar funcionário
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="dropdown">
            <a class="text-white dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img src="http://www.sixsigmahospital.com/wp-content/uploads/2018/04/person-icon-257x300.png"
                     width="28" height="28" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="?logout=true" class="dropdown-item">Sair</a>
            </div>
        </div>
    </div>
</nav>
</body>
</html>