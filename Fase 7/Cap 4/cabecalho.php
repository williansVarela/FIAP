<!doctype html>
<html>
	<head>
        <!--Aluno: Willians T. Varela RM 80587 -->
        <title>Blog</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <link rel="icon" href="images/icon.png">
        <!-- IE -->
        <link rel="shortcut icon" type="image/x-icon" href="images/icon.png" />
        <!-- Outros navegadores -->
        <link rel="icon" type="image/x-icon" href="images/icon.png" />
        <!-- Css -->
        <link rel="stylesheet" href="CSS/bootstrap.min.css" id="bootstrap-css">
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <div class='container'>
            <header>
                <div class='row'>
                    <div class='col-sm-3'>
                        <img src="images/logo.png" alt="logo" width=100% height=100% class='logo'>
                    </div>
                    <nav role="navigation" class='navbar col-sm-6'>
                            <a href="blog.php" tabindex="1">TODOS</a> |
                            <a href="busca.php?keyword=Tecnologia&category=Tecnologia" tabindex="2">TECNOLOGIA</a> |
                            <a href="busca.php?keyword=Inovação&category=Inovação" tabindex="3">INOVAÇÃO</a> |
                            <a href="busca.php?keyword=Curiosidade&category=Curiosidade" tabindex="4">CURIOSIDADE</a>
                    </nav>
                    <div class='col-sm-3' >
                        <?php
                            date_default_timezone_set('America/Sao_Paulo');
                            echo date("d") . " de " . date("M") . " de ". date("Y") . " - " . date("h:ia");
                        ?>
                    </div>
                </div>
                

                <form action='busca.php' method="GET" class="card card-sm">
                    <div class="row no-gutters">
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search" name="keyword" placeholder="Digite a palavra-chave para buscar por título">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-lg btn-success" type="submit">Buscar</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form> 
            </header>
