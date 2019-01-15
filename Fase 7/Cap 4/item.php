        <?php include('cabecalho.php');?>
        <?php
            $title = $_GET["title"];
            $category = $_GET["category"];
            $date = $_GET["date"];
            $content = $_GET["content"];
            $image = $_GET["image"];
        ?>
            <main>
                <div class='pagina-atual'>
                    <h3>HOME > <?php echo $category;?></h3>
                </div>
                <div class='row'>
                    <aside role="complementary" class='col-md-3'>
                        <?php echo "<img src='images/$image' width=100% alt='publicidade'>";?>
                    </aside>

                    <div role="main" class='post col-md-9'>
                        <?php echo "<h4>$date - $title</h4>";?>
                        <?php echo $content;?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 btn-submit text-right">
                        <a href="blog.php"><button type="button" class="btn btn-success btn-lg">VOLTAR</button></a>
                    </div>
                </div>
            </main>
            <footer id="sitefooter" class="card-footer container">
                <p class='float-center'>Endereço da empresa: Av. Heisemberg, 1932 - São Paulo, SP</p>
            </footer>
            
        </div>
        <script src="js/bootstrap.min.js"></script>
	</body>
</html>