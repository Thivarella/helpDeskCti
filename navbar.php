<html>
<head>
  
</head>
<body>
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
        <!--<img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> !-->
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
</body>
</html>