<?php include('cabecalho_adm.php');?>
                <div class='col-sm-9'>
                    <h4 class='meu-blog'>Inserir novo Post</h4>
                    <?php
                        header("Content-type: text/html; charset=utf-8");	 
                        $servidor = "localhost"; //conexão local
                        $usuario  = "root";      //o usuário administrador
                        $senha    = "";	         //a senha-padrão do XAMPP é vazio
                        $banco    = "blog";     //nome do banco de dados

                        // Cria a conexão com o banco de dados
                        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

                        //Converte para UTF-8
                        mysqli_set_charset($conexao, 'utf8');

                        // Verifica se tudo está ok
                        if(!$conexao) {
                            //imprimir a mensagem de erro e abortar a execução do restante do código
                            die("PROBLEMA COM A CONEXÃO:" .mysqli_connect_error());
                        }

                        //Captura dados do formulário
                        $title = $_POST['title'];
                        $category = $_POST['category'];
                        $date = $_POST['date'];
                        $content = $_POST['content'];
                        $image = $_POST['image'];

                        //Cria a consulta
                        $consulta = "INSERT INTO posts(title, category, date, content, image) VALUES ('$title', '$category', '$date', '$content', '$image')";

                        //PASSO 3: Executa a consulta
                        $resultado = mysqli_query($conexao,$consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" .mysqli_connect_error());
                        echo '<div class="alert alert-success" role="alert">
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            OS DADOS FORAM INSERIDOS COM SUCESSO!
                        </div>
                        <div class="col-md-12 btn-submit text-center">
                            <a href="cadastro.html"><button type="button" class="btn btn-primary btn-lg">NOVO POST</button></a>
                        </div>';
                    ?>
                </div>
            <footer id="sitefooter" class="card-footer container fixed-bottom">
                <p class='text-center'>Endereço da empresa: Av. Heisemberg, 1932 - São Paulo, SP</p>
            </footer>
        </div>
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html> 