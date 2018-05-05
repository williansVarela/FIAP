            var canvas    = document.getElementById("jogo-tela");
            var context   = canvas.getContext("2d");

            var clockGame = 0;


            //Nave
            var shipImgRight   = new Image(128, 68);
            shipImgRight.src   = 'imagens/space_ship_right.png';
            var shipImgLeft    = new Image(128, 68);
            shipImgLeft.src    = 'imagens/space_ship_left.png';
            var shipImgUp      = new Image(68, 128);
            shipImgUp.src      = 'imagens/space_ship_up.png';
            var shipImgDown    = new Image(68, 128);
            shipImgDown.src    = 'imagens/space_ship_down.png';

            var x_ship         = 50;
            var y_ship         = 150;
            var shipWidth      = 75;
            var shipHeight     = 40;
            var shipSpeed      = 20;
            
            context.drawImage(shipImgRight, x_ship, y_ship, shipWidth, shipHeight);
            
            //Controle e movimentação da Nave
                requestAnimationFrame(gameloop);

                window.onkeydown = controlShip;

                var shipRight = true;
                var shipLeft  = false;
                var shipUp    = false;
                var shipDown  = false;

                function controlShip(tecla) {
                    if(tecla.keyCode == 38  ) {
                        if(y_ship > 10) {
                            y_ship = y_ship - shipSpeed; //diminuir y tem o efeito de subida
                        };
                        shipRight = false;
                        shipLeft  = false;
                        shipUp    = true;
                        shipDown  = false;
                        freeze10s = 0;                   //Zera contador tempo parado
                    };

                    if(tecla.keyCode == 40  ) {
                        if(y_ship < 340) {
                            y_ship = y_ship + shipSpeed; //Aumentar y tem o efeito de descer
                        };
                        shipRight = false;
                        shipLeft  = false;
                        shipUp    = false;
                        shipDown  = true;
                        freeze10s = 0;                   //Zera contador tempo parado
                    };

                    if(tecla.keyCode == 39  ) {
                        if(x_ship < 710) {
                            x_ship = x_ship + shipSpeed; //Aumentar o x tem o efeito de ir para a direita
                        };
                        shipRight = true;
                        shipLeft  = false;
                        shipUp    = false;
                        shipDown  = false;
                        freeze10s = 0;                   //Zera contador tempo parado
                    };

                    if(tecla.keyCode == 37  ) {
                        if(x_ship > 10) {
                            x_ship = x_ship - shipSpeed; //Diminuir o x tem o efeito de ir para a esquerda
                        };
                        //Orientação da nave(Cima, baixo, direita, esquerda)
                        shipRight = false;
                        shipLeft  = true;
                        shipUp    = false;
                        shipDown  = false;
                        freeze10s = 0;                   //Zera contador tempo parado

                    };
                };
            //Fim Controle da nave


            //Algoritmo de colisão
            var collisionShip = false;
            function detectarColisao(x_obj, y_obj, width, height) {
                if( ( (x_ship + shipWidth) >  x_obj && x_ship < (x_obj + 
            width) ) && ( (y_ship + shipHeight) > y_obj && y_ship < (y_obj + height) ) ) {
                    //interrompe o game loop parando a movimentação dos quadrados
                    clearTimeout();
                    collisionShip = true;
                    gameoverScreen()
                    console.log("Colisão detectada");
                };
            };

            function gameoverScreen() {  //Tela de gameover ao colidir
                context.font      = "bold 50px Courier";
                context.fillStyle = "red";
                context.fillText("GAME OVER", 250, 200, 300);
            };
            //FIM Algaritmo de colisão


            function gameloop() {
                spaceShip(x_ship, y_ship); //Chama a nave na tela

                //Desenha os asteroides na tela
                asteroidCall(x_asteroid, y_asteroid);
                asteroidCall02(x_asteroid02, y_asteroid02);
                asteroidCall03(x_asteroid03, y_asteroid03);

                //Placar de pontuação
                scoreCall(); //Chama o placar de pontuação na tela

                //Chama cometa
                if(score > 40) {       //Chama cometa ao alcançar 40 pontos
                    cometaCall(x_cometa, y_cometa);
                };
                if(clockGame == 90) { //Chama cometa aos 90s de jogo
                    x_cometa    = 1200;
                    y_cometa    = RandomPosition(250);
                    cometaSpeed = 40;
                };
                

                //Penalidade por ficar 10s parado
                if(freeze10s == 10) { //Realiza penalidade na pontuação SE 10s parado
                    var punishButton = setTimeout(punishScore, 500);
                    freeze10s = 0;
                };
                //console.log("Tempo parado: " + freeze10s);
                //FIM Penalidade

                //Testa colisão e chama novamente o ciclo da animação
                detectarColisao(x_asteroid, y_asteroid, asteroidSize, asteroidSize);         //Asteroide 01
                detectarColisao(x_asteroid02, y_asteroid02, asteroidSize02, asteroidSize02); //Asteroide 02
                detectarColisao(x_asteroid03, y_asteroid03, asteroidSize03, asteroidSize03); //Asteroide 03
                detectarColisao(x_cometa, y_cometa, cometaSize, 168);                        //Cometa
                if(collisionShip == false) {
                    requestAnimationFrame(gameloop); //chama novamente o ciclo da animação
                };
            };

            function spaceShip(x, y) {
                context.clearRect(0, 0, 800, 400); //limpa o canvas
                //Desenha a nave
                if(shipRight == true) {   //Projeta nave na posição para direita
                    shipWidth  = 75;
                    shipHeight = 40;
                    context.drawImage(shipImgRight, x, y, shipWidth, shipHeight);
                };
                if(shipLeft == true) {    //Projeta nave na posição para esquerda
                    shipWidth  = 75;
                    shipHeight = 40;
                    context.drawImage(shipImgLeft, x, y, shipWidth, shipHeight);
                };
                if(shipUp == true) {      //Projeta nave na posição para cima
                    shipWidth  = 40;
                    shipHeight = 75;
                    context.drawImage(shipImgUp, x, y, shipWidth, shipHeight);
                };
                if(shipDown == true) {    //Projeta nave na posição para baixo
                    shipWidth  = 40;
                    shipHeight = 75;
                    context.drawImage(shipImgDown, x, y, shipWidth, shipHeight);
                };
                //console.log("Nave X:" + x_ship, "Nave Y:" + y_ship);
            };

            


            //Gerador de número aleatório
            function RandomPosition(max) {              //"max" denifine limite. ex max 100 = número de 0 á 100
                return Math.floor(Math.random() * max); //retorna número aleatório
            }




            //Asteroide 01
            var asteroidImg     = new Image(137, 109);
            asteroidImg.src     = 'imagens/asteroid.png';
            var x_asteroid      = 920;
            var y_asteroid      = RandomPosition(300);
            var asteroidSize    = 137;
            var asteroidSpeed   = 1; //Velocidade dos asteroides

            //Asteroide 02
            var x_asteroid02    = 1200;
            var y_asteroid02    = RandomPosition(300);
            var asteroidSize02  = 75;

            //Asteroide 03
            var x_asteroid03    = 1600;
            var y_asteroid03    = RandomPosition(300);
            var asteroidSize03  = 75;

            //Cometa
            var cometaImg       = new Image(285, 168);
            cometaImg.src       = 'imagens/cometa.png';
            var x_cometa        = 1200;
            var y_cometa        = RandomPosition(250);
            var cometaSize      = 256;
            var cometaSpeed     = 30; //Controla velocidade do cometa


            //Chama Asteroides Aleatórios
            function asteroidCall(x, y) {
                //context.clearRect(0, 0, 800, 400); //limpa o canvas
                context.drawImage(asteroidImg, x, y, asteroidSize, asteroidSize);

                if(x_asteroid < -150) {
                    y_asteroid   = RandomPosition(300);
                    x_asteroid   = RandomPosition(600) + 1000;
                    asteroidSize = RandomPosition(200) + 10;
                };
                x_asteroid = x_asteroid - asteroidSpeed; //movimenta asteroid
                //console.log("Asteroide X: " + x_asteroid, "Asteroide Y: " + y_asteroid);
            };

            function asteroidCall02(x, y) {

                context.drawImage(asteroidImg, x, y, asteroidSize02, asteroidSize02);
                if(x_asteroid02 < -150) {
                    y_asteroid02   = RandomPosition(300);
                    x_asteroid02   = RandomPosition(500) + 900;
                    asteroidSize02 = RandomPosition(150) + 10;
                };

                x_asteroid02 = x_asteroid02 - asteroidSpeed; //movimenta asteroid
                //console.log("Asteroide X: " + x_asteroid02, "Asteroide Y: " + y_asteroid02);
            };

            function asteroidCall03(x, y) {

                context.drawImage(asteroidImg, x, y, asteroidSize03, asteroidSize03);
                if(x_asteroid03 < -150) {
                    y_asteroid03   = RandomPosition(300);
                    x_asteroid03   = RandomPosition(700) + 1100;
                    asteroidSize03 = RandomPosition(100) + 10;
                };

                x_asteroid03 = x_asteroid03 - asteroidSpeed; //movimenta asteroid
                //console.log("Asteroide X: " + x_asteroid03, "Asteroide Y: " + y_asteroid03);
            };

            //Chama Cometa
            function cometaCall(x, y) {
                context.drawImage(cometaImg, x, y, cometaSize, 168);
                if(x_cometa > -300) {
                    x_cometa = x_cometa - cometaSpeed; //movimenta asteroid
                };
                //console.log(x_cometa, y_cometa);
            };

            //Aumenta velocidade do asteroid continuamente
            var myVar = setInterval(speedUp, 8000);

            function speedUp() {
                asteroidSpeed = asteroidSpeed + 1;
            };

            //FIM Asteroides Aleatórios




            //Contador de pontos
            function scoreCall() {
                context.font      = "bold 30px Courier";
                context.fillStyle = "red";
                context.fillText("SCORE: " + score, 615, 30);
            };

            var score = 0;
            var myScore = setInterval(scoreAdd, 1000);
            function scoreAdd() { // adiciona +1 na pontuação
                score++;
                clockGame++;
                if(clockGame == 60) { // Aumenta velocidade da nave ao alcançar 60s de jogo
                    shipSpeed = shipSpeed + 30;
                    console.log("Velocidade da Nave aumentada");
                };
            };
            //Fim Contador de pontos




            //Penalidade por ficar parado
            var freeze10s = 0;
            var freezePosition = setInterval(freezeTimer, 1000);
            function freezeTimer() {
                freeze10s++;
            };
            function punishScore() {
                score = score - 10;
            };
            //Fim Penalidade

            //Muda cor da borda do canvas
            var corMudou = 0;
            var setBordaCanvas = setInterval(mudaCorBorda, 500);

            function mudaCorBorda() {
                if(corMudou == 0) {
                    document.getElementById("jogo-tela").style.borderColor = "yellow";
                    corMudou = 1;
                } else {
                document.getElementById("jogo-tela").style.borderColor = "red";
                corMudou = 0;
                };
            };