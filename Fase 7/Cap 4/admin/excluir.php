<?php include('cabecalho_adm.php');?>

                <div class='col-sm-9'>
                    <h4 class='meu-blog'>exclusão de Post</h4>
                    <?php
                        header("Content-type: text/html; charset=utf-8");	 
                        $servidor = "localhost"; //conexão local
                        $usuario  = "root";      //o usuário administrador
                        $senha    = "";	         //a senha-padrão do XAMPP é vazio
                        $banco    = "blog";      //nome do banco de dados

                        // Captura Id do Post
                        $id = $_GET["id_post"];

                        // Cria a conexão com o banco de dados
                        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

                        //Converte para UTF-8
                        mysqli_set_charset($conexao, 'utf8');

                        // Verifica se tudo está ok
                        if(!$conexao) {
                            //imprimir a mensagem de erro e abortar a execução do restante do código
                            die("PROBLEMA COM A CONEXÃO:" .mysqli_connect_error());
                        }

                        // Cria a consulta no banco de dados
                        $consulta = "DELETE FROM posts WHERE id=$id";

                        // Executa a consulta
                        $resultado =  mysqli_query($conexao,$consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" .mysqli_connect_error());
                        echo '<div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            POST EXCLUIDO COM SUCESSO!
                        </div>
                        <div class="col-md-12 btn-submit text-center">
                            <a href="listar.php"><button type="button" class="btn btn-primary btn-lg">VOLTAR</button></a>
                        </div>';
                    ?>
                </div>
            </div>
            <footer id="sitefooter" class="card-footer container fixed-bottom">
                <p class='text-center'>Endereço da empresa: Av. Heisemberg, 1932 - São Paulo, SP</p>
            </footer>
        </div>
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html>