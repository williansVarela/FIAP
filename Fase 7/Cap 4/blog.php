        <?php include('cabecalho.php');?>
            <main>
                <div class='pagina-atual'>
                    <h3>HOME > <?php echo "TODOS"?></h3>
                </div>
                <div class='publicacoes row'>
                    <div role="main" class='post col-md-10'>
                        <?php
                            header("Content-type: text/html; charset=utf-8");	 
                            $servidor = "localhost"; //conexão local
                            $usuario  = "root";      //o usuário administrador
                            $senha    = "";	         //a senha-padrão do XAMPP é vazio
                            $banco    = "blog";      //nome do banco de dados
                            
                            // Cria a conexão com o banco de dados
                            $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

                            //Converte para UTF-8
                            mysqli_set_charset($conexao, 'utf8');

                            // Verifica se tudo está ok
                            if(!$conexao) {
                                //imprimir a mensagem de erro e abortar a execução do restante do código
                                die("PROBLEMA COM A CONEXÃO:" .mysqli_connect_error());
                            }

                            //Cria a consulta
                            $consulta = "SELECT id, title, category, date, content, image FROM posts ORDER BY id DESC LIMIT 10";

                            //PASSO 3: Executa a consulta
                            $resultado = mysqli_query($conexao,$consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" .mysqli_connect_error());
                            
                            echo "<br>";
                            while(list($id, $title, $category, $date, $content, $image) = mysqli_fetch_row($resultado)) {
                                echo "<div class='well'>
                                <div class='media'>
                                      <a class='pull-left' href='#'>
                                        <img class='media-object' src='images/$image' >
                                      </a>
                                      <div class='media-body'>
                                        <h4 class='media-heading'>$date - $title</h4>
                                        <p>" . substr($content, 0, 180) . "...</p>
                                        <a href='item.php?title=$title&category=$category&date=$date&content=$content&image=$image' class='float-right'><button type='button' class='btn btn-primary'>LEIA MAIS</button></a>
                                   </div>
                                </div>
                            </div>";
                            }
                        ?>

                    </div>
                    <aside role="complementary" class='col-md-2'>
                        <img src="images/publi.png" width=100% alt="publicidade">
                    </aside>
                </div>
            </main>
            <footer id="sitefooter" class="card-footer container">
                <p class='text-center'>Endereço da empresa: Av. Heisemberg, 1932 - São Paulo, SP</p>
            </footer>
        </div>
        <script src="js/bootstrap.min.js"></script>
	</body>
</html>