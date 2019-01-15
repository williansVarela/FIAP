<?php include('cabecalho_adm.php');?>

                <div class='col-sm-9'>
                    <h4 class='meu-blog'>Lista de Posts</h4>
                    <table id='tabela-posts'>
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
                            $consulta = "SELECT id, title, category FROM posts ORDER BY id LIMIT 10 ";

                            //PASSO 3: Executa a consulta
                            $resultado = mysqli_query($conexao,$consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" .mysqli_connect_error());
                            
                            echo "<tr>
                                <th>Código</th>
                                <th>Título do Post</th>
                                <th>Categoria</th>
                                <th>Editar</th>
                                <th>Remover</th>
                            </tr>";
                            while(list($id, $title, $category) = mysqli_fetch_row($resultado)) {
                                echo "<tr>
                                <td>$id</td>
                                <td>$title</td>
                                <td>$category</td>                                
                                <td><a href='alterar.php?id_post=$id'><button type='button' class='btn btn-primary'>EDITAR</button></a></td>
                                <td><a href='excluir.php?id_post=$id'><button type='button' class='btn btn-danger'>REMOVER</button></a></td>
                            </tr>";
                            }
                        ?>
                    </table>
                    

                </div>
            </div>
            <footer id="sitefooter" class="card-footer container fixed-bottom">
                <p class='text-center'>Endereço da empresa: Av. Heisemberg, 1932 - São Paulo, SP</p>
            </footer>
        </div>
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html>