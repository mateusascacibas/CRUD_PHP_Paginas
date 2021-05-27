<?php
$conexao = require_once('../../databaseconnect.php');

$titulo = $_POST['titulo'];
$slug = $_POST['slug'];
$corpo = $_POST['corpo'];
$autor = $_POST['autor'];
$pdo;
$obj;
$hoje = date('Y/m/d');

class banco{    
    function banco_cadastra(){
        global $titulo, $slug, $corpo, $autor, $hoje, $pdo, $conexao;

    $strcon = mysqli_connect('localhost','root','','paginas') or die('Erro ao conectar ao banco de dados');
    $sql = "INSERT INTO campos (titulo, slug, corpo, autor, data_criacao, data_modificacao)
    VALUES ";
    $sql .= "('$titulo', '$slug', '$corpo', '$autor', '$hoje', '$hoje')"; 
    
    mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
    
    if($sql){
        echo "<script type='text/javascript'>alert('Página cadastrada com sucesso!'); window.location.href='../../index.php'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Erro ao cadastrar página!'); window.location.href='../../index.php'</script>";
    }
    mysqli_close($strcon);
    
        
}
}

$obj = new banco();
$obj->banco_cadastra();
