<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Chamado</title>
</head>
<body>
<?php
    include "chamadoCtrl.php"
?>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="https://s.yimg.com/ny/api/res/1.2/sr0S8XICX40u13yfFMUBJQ--~A/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9ODAw/http://globalfinance.zenfs.com/en_us/Finance/US_AFTP_PRNEWSWIRE_LIVE/CTI_Industries_Corporation_Board_Approves-c0e544bd85f0b2c1867a6857f49701c5" width="50" height="50" class="d-inline-block align-center" alt="">
        HelpDesk CTI
    </a>
</nav>

<div class=" bg-primary">
    <div class="container bg-white rounded ">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3 ">
                    RA
                    <input class="form-control" type="text" placeholder="RA">
                </div>
                <div class="col-sm">
                    Email
                    <input type="email" class="form-control" id="email_usuario" aria-describedby="emailHelp" placeholder="Email">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mt-4">
                    Numero do Chamado
                    <input class="form-control" type="text" placeholder="Numero do chamado">
                </div>
                <div class="col-md-2 mt-4">
                    Sala
                    <label for="sala"></label>
                    <select class="form-control" id="sala">
                        <option>Selecione</option>
                        <?php
                            getSalas();
                        ?>
                    </select>
                </div>
                <div class="col-md-2 mt-4">
                    Tipo
                    <label for="tipo"></label>
                    <select class="form-control" id="tipo">
                        <option>Selecione</option>
                        <?php
                            getStatusOrTipo("tipo");
                        ?>
                    </select>
                </div>
                <div class="col-md-2 mt-4">
                    Status
                    <label for="status"></label>
                    <select class="form-control" id="status">
                        <option>Selecione</option>
                        <?php
                            getStatusOrTipo("status");
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="form-group mt-2">
                        <label for="descricao">Descricão</label>
                        <textarea class="form-control" id="descricao" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    Solicitante
                    <input class="form-control" type="text" placeholder="Nome">
                </div>
                <div class="col-md">
                    Técnico
                    <input class="form-control" type="text" placeholder="Nome">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm">
                    data abertura
                    <input class="form-control" type="datetime-local" placeholder="data abertura">
                </div>
                <div class="col-sm">
                    data encerramento
                    <input class="form-control" type="datetime-local" placeholder="data encerramento">
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-md order-md-2 mb-4">
                    <h4>Log de Atividades </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"> Nome do Tecnico</h6>
                                <small class="text-muted">Descricao</small>
                            </div>
                            <span class="text-muted">Data</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"> Thiago Varella</h6>
                                <small class="text-muted">Troquei o cabo da rede, e voltou a funcionar</small>
                            </div>
                            <span class="text-muted">03-05-2018</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>