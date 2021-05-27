<?php
require_once('../../databaseconnect.php');

$id = $_POST['id'];
$pdo;
$obj;

class banco{    
    function banco_deleta(){
        global $id, $pdo, $conexao;

    $strcon = mysqli_connect('localhost','root','','paginas') or die('Erro ao conectar ao banco de dados');
    $sql = "DELETE FROM campos WHERE id = '$id'";
    mysqli_query($strcon,$sql) or die("Erro ao tentar deletar registro");
    
    if($sql){
        echo "<script type='text/javascript'>alert('Página deletada com sucesso!'); window.location.href='../../index.php'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Erro ao deletar página!'); window.location.href='../../index.php'</script>";
    }
    mysqli_close($strcon);
        
}
}

$obj = new banco();
$obj->banco_deleta();
