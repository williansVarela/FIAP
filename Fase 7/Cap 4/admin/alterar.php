<?php include('cabecalho_adm.php');?>

                <?php
                    header("Content-type: text/html; charset=utf-8");	 
                    $servidor = "localhost"; //conexão local
                    $usuario  = "root";      //o usuário administrador
                    $senha    = "";	         //a senha-padrão do XAMPP é vazio
                    $banco    = "blog";      //nome do banco de dados
                    
                    // Cria a conexão com o banco de dados
                    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

                    //Confirma se o post foi alterado com sucesso
                    $post_alterado = False;

                    //Converte para UTF-8
                    mysqli_set_charset($conexao, 'utf8');

                    // Verifica se tudo está ok
                    if(!$conexao) {
                        //imprimir a mensagem de erro e abortar a execução do restante do código
                        die("PROBLEMA COM A CONEXÃO:" .mysqli_connect_error());
                    }
                    
                    //Se o botão não for pressionado, é porque é preciso preencher o form
                    if(! isset($_POST["btn-atualizar"])) {
                        $id = $_GET["id_post"];
                            
                        //PASSO 2: Criar a consulta (desta vez, é uma única disciplina)
                        $consulta = "SELECT id, title, category, date, content, image FROM posts WHERE id=$id";
                        //PASSO 3: Executar a consulta
                        $resultado = mysqli_query($conexao,$consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" .mysqli_connect_error());
                        //PASSO 4: Formatar o resultado obtido - não precisa de laço por ser uma só
                        list($id, $title, $category, $date, $content, $image) = mysqli_fetch_row($resultado);
                    }

                    //Se o botão for pressionado, é preciso atualizar os dados no banco
                    else {
                    //Capturar os valores do formulário
                    $id = $_POST['id'];    
                    $title = $_POST['title'];
                    $category = $_POST['category'];
                    $date = $_POST['date'];
                    $content = $_POST['content'];
                    $image = $_POST['image'];
                    //PASSO 2: Criar a consulta (uso do UPDATE)
                    $consulta = "UPDATE posts SET title='$title', category='$category', date='$date', content='$content', image='$image' WHERE id=$id";
                    //PASSO 3: Executar a consulta
                    $resultado = mysqli_query($conexao,$consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA LINHA 47" .mysqli_connect_error());  
                    $post_alterado = True;
                    }	   
                            
                ?>
                
                <div class='col-sm-9'>
                    <h4 class='meu-blog'>Alterar Post</h4>

                    <?php
                        if($post_alterado) {
                            echo '<div class="alert alert-success" role="alert">
                                POST ALTERADO COM SUCESSO!
                            </div>';
                        };
                    ?>

                    <form class="form-horizontal" name="formulario" action="" method="POST">
                        <fieldset>
                            <!-- Titulo input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="title">Título do post</label>
                                <div class="col-md-9">
                                    <input id="title" name="title" type="text" placeholder="Digite o título" class="form-control" value="<?php echo $title; ?>" required>
                                </div>
                            </div>
                    
                            <!-- categoria input-->
                            <div class="form-group">
                            <label class="col-md-3 control-label" for="category">Categoria do Post</label>
                                <div class="col-md-9">
                                    <input id="category" list="opcoes-categoria" name="category" type="text" placeholder="Selecione a categoria do post" class="form-control" value="<?php echo $category; ?>" required>
                                    <datalist id="opcoes-categoria">
                                        <option value="Tecnologia">Tecnologia</option>
                                        <option value="Robótica">Robótica</option>
                                        <option value="Inovação">Inovação</option>
                                        <option value="Curiosidade">Curiosidade</option>
                                    </datalist>
                                </div>
                            </div>

                            <!-- Data e hora input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="date">Data da publicação</label>
                                <div class="col-md-9">
                                    <input id="date" name="date" type="date" class="form-control" value="<?php echo $date; ?>" required>
                                </div>
                            </div>
                    
                            <!-- Conteúdo do post input -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="content">Conteúdo</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="content" name="content" placeholder="Digite o conteúdo do post aqui" rows="5" required><?php echo $content; ?></textarea>
                                </div>
                            </div>

                            <!-- Imagem input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="image">Imagem</label>
                                <div class="col-md-9">
                                    <input id="image" name="image" type="text" placeholder="Digite o endereço da imagem" class="form-control" value="<?php echo $image; ?>" required>
                                    <input name="id" type="hidden"  class="form-control" value="<?php echo $id; ?>">
                                </div>
                            </div>
                    
                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 btn-submit text-left">
                                    <button type="submit" name="btn-atualizar" class="btn btn-primary btn-lg">ATUALIZAR</button>
                                </div>
                            </div>
                            
                        </fieldset>
                    </form>
                </div>
            </div>
            <footer id="sitefooter" class="card-footer container">
                <p class='text-center'>Endereço da empresa: Av. Heisemberg, 1932 - São Paulo, SP</p>
            </footer>
        </div>
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html>