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
  require('relatorioCtrl.php');?>

<body>
  <div class="input-group">
  <select class="custom-select" id="status" name="status">
    <option selected>Status</option>
    <?php
         getStatusOrTipo("status");
    ?>
  </select>
  <select class="custom-select" id="tipo" name="tipo">
    <option selected>Tipo</option>
    <?php
         getStatusOrTipo("tipo");
    ?>
  </select>
  <input class="form-control" type="date" id="data_inicio" name="data_inicio">
  <input class="form-control" type="date" id="data_fim" name="data_fim">
  <div class="input-group-append">
  <button class="btn-info" onclick='teste()'> Pesquisar</button>
  </div>
</div>
</body>
</html>