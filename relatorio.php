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
    <title>Relatorio</title>
</head>
<?php
require('navbar.php');

function lista_chamado($sql){
    if($sql == null){
        $sql = "SELECT * FROM chamado";
    }
    $conexao = conectar();
    $select = executar_SQL($conexao, $sql);
    if(verifica_resultado($select)>0){
        foreach ($select as $res) {
            $res['status_id'] = getById("status",$res['status_id']);
            echo '<tr>';
            echo '<td class="col-md-3">'.$res['id'].'</td>';
            echo '<td class="col-md-6" style="word-break: break-word;">'.$res['descricao'].'</td>';
            echo '<td class="col-md-3">'.$res['status_id']['descricao'].'</td></tr>';
        }
    }else {
        echo "Não existem registros";
    }
}

?>

<body>
<form class="mb-0" style="position: fixed; top: 56px; width: 100%;" action="relatorio.php" method="post">
    <div class="input-group">
        <select class="custom-select" id="status" name="status" required>
            <?php
                getStatusOrTipo("status");
            ?>
        </select>
        <select class="custom-select" id="tipo" name="tipo" required>
            <?php
                getStatusOrTipo("tipo");
            ?>
        </select>
        <input class="form-control" type="date" id="data_inicio" name="data_inicio" required>
        <input class="form-control" type="date" id="data_fim" name="data_fim" required>
        <div class="input-group-append">
            <button class="btn-info" type="submit"> Pesquisar</button>
        </div>
    </div>
</form>


    <table class="table" style="table-layout: fixed;position: fixed; table-layout: fixed;top: 14%;">
        <tr class="thead-dark">
            <th style="width: 100px;">Chamado</th>
            <th>Descricao</th>
            <th style="width: 200px;">Status</th>
        </tr>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $status = $_POST["status"];
                $tipo = $_POST["tipo"];
                $inicio = $_POST["data_inicio"];
                $final = $_POST["data_fim"];

                $sql = "SELECT * FROM chamado WHERE status_id LIKE $status AND tipo_id LIKE $tipo and data_abertura >= '$inicio' AND data_abertura <= '$final'";
                $conexao = conectar();
                lista_chamado($sql,$conexao);
            } else {
                lista_chamado(null);
            } ?>
    </table>

</body>
</html>
