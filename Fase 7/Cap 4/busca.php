        <?php include('cabecalho.php');
            $keyword = $_GET["keyword"];
            if(isset($_GET["category"])){
                $cat_post = $_GET["category"];
                $search_by = 'category';
            } else {
                $search_by = 'title';
            }
            $footer_fix = 'fixed-bottom';
        ?>
            <main>
                <div class='pagina-atual'>
                    <h3>HOME > BUSCA</h3>
                </div>
                <div class='publicacoes row'>
                    <div role="complementary" class='resultado-busca col-md-10'>
                        <h1>Resultado da busca por: <?php echo $keyword;?></h1>

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
                            $consulta = "SELECT id, title, category, date, content, image FROM posts WHERE $search_by LIKE '%$keyword%'";

                            //PASSO 3: Executa a consulta
                            $resultado = mysqli_query($conexao,$consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" .mysqli_connect_error());

                            if(mysqli_num_rows($resultado) < 1){
                                echo "<p>Nenhum resultado foi encontrado com a palavra-chave da busca.</p>";
                            } else {
                                while($fetch = mysqli_fetch_assoc($resultado)) {
                                    $id = $fetch['id'];
                                    $title = $fetch['title'];
                                    $category = $fetch['category'];
                                    $date = $fetch['date'];
                                    $content = $fetch['content'];
                                    $image = $fetch['image'];
                                    echo "<div class='well'>
                                        <div class='media'>
                                            <div class='media-body'>
                                                <h4 class='media-heading'>@ $date - $title</h4>
                                                <p>" . substr($content, 0, 180) . "...</p>
                                                <a href='item.php?title=$title&category=$category&date=$date&content=$content&image=$image' class='float-right'><button type='button' class='btn btn-primary'>LEIA MAIS</button></a>
                                        </div>
                                        </div>
                                    </div>";
                                }
                            }
                            if(mysqli_num_rows($resultado) > 1){
                                $footer_fix = "";
                            }
                        ?>

                    </div>

                    <aside role="complementary" class='col-md-2'>
                        <img src="images/publi.png" width=100% alt="publicidade">
                    </aside>
                </div>
            </main>
            <footer id="sitefooter" class="card-footer container <?php echo $footer_fix;?>">
                <p class='text-center'>Endereço da empresa: Av. Heisemberg, 1932 - São Paulo, SP</p>
            </footer>
        </div>
        <script src="js/bootstrap.min.js"></script>
	</body>
</html>