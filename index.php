<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" />

    <title>Index</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Home</a>
            <a href="#" data-activates="menu-mobile" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Home </a></li>
                <li><a href="lib/HTML/criar_pagina.htm">Criar Página</a></li>
                <li><a href="editar_pagina.php">Editar Página</a></li>
                <li><a href="lib/HTML/deletar_pagina.htm">Deletar Página</a></li>

            </ul>
            <ul class="side-nav" id="menu-mobile">
                <li><a href="#">Home </a></li>
                <li><a href="lib/HTML/criar_pagina.htm">Criar Página</a></li>
                <li><a href="editar_pagina.php">Editar Página</a></li>
                <li><a href="lib/HTML/deletar_pagina.htm">Deletar Página</a></li>
            </ul>
        </div>
    </nav>

    <form action='' method='GET'>
        <label>Digite o ID para pesquisar: </label><input type='text' name='id' id='id'>
        <input type='submit' name='pesquisar' id='pesquisar' value='Pesquisar' onclick='pesquisar()'>
        <input type='submit' id='b2' name="b2" value="Limpar">
    </form>


    <?php
    $conexao = require_once('databaseconnect.php');
    $pdo;

    function pesquisar()
    {
        global $pdo;

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

                        echo "<h5 class='destaque'>Titulo:</h5><p class='conteudo'>$campo[0]</p><hr class='hr1'>";
                        echo "<h5 class='destaque'>Slug:</h5><p class='conteudo'>$campo[1]</p><hr class='hr1'>";
                        echo "<h5 class='destaque'>Corpo:</h5><p class='conteudo'>$campo[2]</p><hr class='hr1'>";
                        echo "<h5 class='destaque'>Autor:</h5><p class='conteudo'>$campo[3]</p><hr class='hr1'>";
                        echo "<h5 class='destaque'>Data de criação:</h5><p class='conteudo'>$campo[4]</p><hr class='hr1'>";
                        echo "<h5 class='destaque'>Data de modificação:</h5><p class='conteudo'>$campo[5]</p><hr class='hr1'>";
                    }
                }
            } else {
                echo "Erro ao selecionar.";
            }
        }
    }

    if (isset($_GET['id'])) {
        pesquisar();
    }


    ?>



    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
        $(function() {
            $(".button-collapse").sideNav();
        });
    </script>

</body>

</html>