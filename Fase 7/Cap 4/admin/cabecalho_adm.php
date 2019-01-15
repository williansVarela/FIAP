<!doctype html>
<html>
	<head>
        <!--Aluno: Willians T. Varela RM 80587 -->
        <title>Administração do Blog</title>
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <link rel="icon" href="../images/icon.png">
        <!-- IE -->
        <link rel="shortcut icon" type="../images/x-icon" href="../images/icon.png" />
        <!-- Outros navegadores -->
        <link rel="icon" type="../images/x-icon" href="../images/icon.png" />
        <!-- Css -->
        <link rel="stylesheet" href="../CSS/bootstrap.min.css" id="bootstrap-css">
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
        <div class='container'>
            <header>
                <div class='row'>
                    <div class='col-sm-3'>
                        <img src="../images/logo.png" alt="logo" width=100% height=100% class='logo'>
                    </div>
                    <div class='col-sm-6 navbar'>
                        <h2>Gerenciamento do Blog</h2>
                    </div>
                    
                    <div class='col-sm-3' >
                        <?php
                            date_default_timezone_set('America/Sao_Paulo');
                            echo date("d") . " de " . date("M") . " de ". date("Y") . " - " . date("h:ia");
                        ?>
                    </div>
                </div>
            </header>
            <div class='row'>
                <div class='col-sm-3'>
                    <div id="sidebar-wrapper" class="sidebar-toggle">
                        <ul class="sidebar-nav">
                            <li>
                                <a href="../blog.php">MEU BLOG</a>
                            </li>
                            <li>
                                <a href="listar.php">Listar Posts</a>
                            </li>
                            <li>
                                <a href="cadastro.html">Inserir novo Post</a>
                            </li>
                        </ul>
                    </div> 
                </div>