<!DOCTYPE>
<?php
// Start the session
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="assets/css/cssAplicacao.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/bootstrap.min.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>
        <div id="wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <a href="#"><img width="200px" src="assets/img/logo-primopet.png"/></a>
                </div>
                    
                <div id="menu">
                    <ul class="header">
                    <?php 
                    if ($_SESSION["userId"] != "") {
                        echo '<li class="current_page_item"><a href="index.php" accesskey="1" title="">Home</a></li>';
                        echo '<li><a href="cliente.php" accesskey="2" title="">Sistema</a></li>';
                        echo '<button class="fas fa-sign-out-alt fa-2x logut iconeVoltar" onclick="window.location.href='."'login.php'".'"></button>';
                    }
                    else{
                        echo '<li class="current_page_item"><a href="index.php" accesskey="1" title="">Home</a></li>';
                        echo '<li><a href="login.php" accesskey="2" title="">Login</a></li>';
                    }
                    
                    ?>
                    </ul>
                </div>
            </div>
            <div id="banner">;
                <section>
                    <figure class="gif">
                        <img src="assets/img/img1.png"/>
                    </figure> 
                </section>
            </div>

            <div id="featured">
                <div class="container">
                    <div class="title">    
                        <h2>Para seus animais</h2>
                        <span class="byline"></span> </div>
                    <p>A <strong> PrimoPet</strong> , possui para seus animais de estimação as melhores rações e serviços para manter seu animal bem e saudáveis.</p>
                </div>
                
            </div>
            <div id="extra">
                <div class="container">
                    <div class="title">
                        <h2>Nossos serviços</h2>
                        </div>
                    <p align="center">A <strong> PrimoPet</strong> oferece diversos serviços para cuidar do seu pet, seja de maneira estética como também existe veterinários preparados para tratar de qualquer problema. </p>
                </div>
            </div>
            <div>
                
            </div>

        </div>

        <script>
            var imagens = ["assets/img/img1.png", "assets/img/img2.png", "assets/img/img3.png"];
            var imagematual = 0;

            function trocaimagem() {
                imagematual = (imagematual + 1) % 3;
                document.querySelector('.gif img').src = imagens[imagematual];
            }
            setInterval(trocaimagem, 1500);
        </script>
    </body>
</html>
