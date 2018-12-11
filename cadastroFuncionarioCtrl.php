<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once ('base.php');
    $nome = $_POST["inputNomeCadastro"];
    $ra = $_POST["inputRaCadastro"];
    $email = $_POST["inputEmailCadastro"];
    $tipo = 3;
    $senha = $_POST["inputSenhaCadastro"];

    $sql = "INSERT INTO usuario (nome, ra, email, perfil_id, senha, is_cti, is_admin) VALUES ('$nome', '$ra', '$email', '$tipo', '$senha', true, false)";

    $conexao = conectar();

    executar_SQL($conexao, $sql);

    $especialidade = ( isset($_POST["especialidade"]) ) ? $_POST["especialidade"] : null;
    console_log($especialidade);
    foreach ($especialidade as $value) {
        if($value != null) {
            console_log($value);
            $idUsuario = getIdByRa("usuario", $ra);
            $ID = &$idUsuario['id'];

            console_log($value);
            $sql = "INSERT INTO esp_tecnico (id_usuario_tec, id_tipo) VALUES ('$ID', '$value')";

            $conexao = conectar();

            executar_SQL($conexao, $sql);
        }
    }

    header("Location: homeUser.php");
}

function getTipo()
{
    $sql = "SELECT * FROM tipo";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    if (verifica_resultado($select) > 0) {
        foreach ($select as $res) {
            echo "<div class='form-check form-check-inline'>";
            echo "<input class='form-check-input' type='checkbox' name='especialidade[]' value='" . $res['id'] . "' id='especialidade'>";
            echo "<label class='form-check-label' for='especialidade'>";
            echo utf8_encode($res['descricao']);
            echo "</label>";
            echo "</div>";
        }

    }

}

function getIdByRa($table,$ra){
    $sql = "SELECT id FROM $table WHERE ra = $ra";

    $conexao = conectar();

    $select = executar_SQL($conexao, $sql);

    return retorna_linha($select);
}

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

?>