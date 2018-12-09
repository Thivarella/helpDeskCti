<html>
<body>

<?php

 $sql = "SELECT * FROM chamado";
 $conexao = conectar();
   echo '<table class="table">';
   echo '<thead class="thead-dark">';
   echo '<tr>';
   echo '<th scope="col">ID</th>';
   echo '<th scope="col">Descricao</th>';
   echo '<th scope="col">Status</th>';
   echo '</tr></thead>';
   
   lista_chamado($sql,$conexao);

 function lista_chamado($sql,$conexao){
   $select = executar_SQL($conexao, $sql);
   if(verifica_resultado($select)>0){
     foreach ($select as $res) {
       echo '<tr>';
       echo '<td>'.
         $res['id'].'<td>'.
         $res['descricao'].'<td>'.
         $res['status_id'].'</tr>';   
     }
   }else {
     echo "Não existem registros";
     }
   }  

function filtro_chamado(){
  echo 'FUNCAO FILTRO_CHAMADO';
    $status = 1;
    $tipo = 1;
    $sql = "SELECT * FROM chamado 
              WHERE status_id like $status 
                and tipo_id like $tipo";
                //and data_abertura like $data_inicio
    $conexao = conectar();
    lista_chamado($sql,$conexao);
}
?>
</body>

</html>
