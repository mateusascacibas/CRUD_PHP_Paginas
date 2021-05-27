<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" />

    <title>Editar Página</title>
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Editar Página</a>
            <a href="#" data-activates="menu-mobile" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="lib/HTML/criar_pagina.htm">Criar Página</a></li>
                <li><a href="#">Editar Página</a></li>
                <li><a href="lib/HTML/deletar_pagina.htm">Deletar Página</a></li>

            </ul>
            <ul class="side-nav" id="menu-mobile">
                <li><a href="index.php">Home </a></li>
                <li><a href="lib/HTML/criar_pagina.htm">Criar Página</a></li>
                <li><a href="#">Editar Página</a></li>
                <li><a href="lib/HTML/deletar_pagina.htm">Deletar Página</a></li>

            </ul>
        </div>
    </nav>

    <form method="GET" action="">
        <label>Digite o ID para pesquisar: </label><input type='text' name='id' id='id'>
        <input type='submit' name='pesquisar' id='pesquisar' value='Pesquisar' onclick='pesquisar()'>
        <input type='submit' id='b2' name="b2" value="Limpar">

    </form>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
        $(function() {
            $(".button-collapse").sideNav();
        });
    </script>
</body>

</html>

<?php

session_start();
$id;
$conexao = require_once('databaseconnect.php');
$pdo;
$hoje = date('Y/m/d');



function pesquisar()
{
    global $pdo;
    global $id;

    if (isset($_GET['b2'])) {
    } else {

        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * from campos WHERE id = '$id'");

        if ($stmt->execute()) {

            $conta = 1;
            $campo = $stmt->fetch();
            if ($conta > 0) {
                if ($campo == false) {
                    echo "<script type='text/javascript'>alert('ID invalido!');</script>";
                } else {
                    echo "<form method='GET' action=''>
                                <label class='destaque'>ID:</label><input class='conteudo' type='text' name = 'id' id= 'id' value ='$campo[6]' readonly><hr class='hr1'>
                                
                                <label class='destaque'>Titulo:</label><input class='conteudo' type='text' name = titulo_atualizado id= titulo_atualizado value ='$campo[0]'><hr class='hr1'>
                                
                                <label class='destaque'>Slug:</label><input class='conteudo' type='text' name ='slug_atualizado' id= 'slug_atualizado' value ='$campo[1]'><hr class='hr1'>
                                
                                <label class='destaque'>Corpo:</label><input class='conteudo' type='text' name ='corpo_atualizado' id= 'corpo_atualizado' value ='$campo[2]'><hr class='hr1'>
                                
                                <label class='destaque'>Autor:</label><input class='conteudo' type='text' name ='autor_atualizado' id= 'autor_atualizado' value ='$campo[3]'><hr class='hr1'>
                    
                                <input type='submit' name='atualizar' id='atualizar' value='Atualizar' onclick='atualizar()'>
                                
                                </form>";
                }
            }
        } else {
            echo "Erro ao selecionar.";
        }
    }
}

function atualizar()
{
    global $pdo;
    global $hoje;
    global $id;

    $titulo = $_GET['titulo_atualizado'];
    $slug = $_GET['slug_atualizado'];
    $corpo = $_GET['corpo_atualizado'];
    $autor = $_GET['autor_atualizado'];
    $id = $_GET['id'];


    $stmt = $pdo->prepare("UPDATE campos
                SET titulo = '$titulo', slug = '$slug', corpo = '$corpo', autor = '$autor', data_modificacao = '$hoje'
                WHERE id = '$id'; ");
    if ($stmt->execute()) {

        echo "<script type='text/javascript'>alert('Página atualizada!'); window.location.href='index.php'</script>";
    } else {

        echo "<script type='text/javascript'>alert('Erro ao atualizar!');</script>";
    }
}

if (isset($_GET['id'])) {
    pesquisar();
}

if (isset($_GET['titulo_atualizado'])) {
    atualizar();
}

?>