<!DOCTYPE>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />

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
                    <ul>
                        <li class="current_page_item"><a href="index.php" accesskey="1" title="">Home</a></li>
                        <li><a href="cliente.php" accesskey="2" title="">Sistema</a></li>
                        <li><a href="login.php" accesskey="2" title="">Login</a></li>

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
                        <h2>Área dos animais</h2>
                        <span class="byline"></span> </div>
                    <p>A <strong> PrimoPet</strong> , possui para seus animais de estimação as melhores rações e serviços para manter seu animal bem e saudáveis.</p>
                </div>
                <ul class="actions">
                    <li><a href="animais.php" class="button">Animais</a></li>
                </ul>
            </div>
            <div id="extra">
                <div class="container">
                    <div class="title">
                        <h2>Serviços</h2>
                        <span class="byline"> Informações sobre os serviços da Primo Pet</span> </div>
                    <p align="center">A <strong> PrimoPet</strong> oferece diversos serviços para cuidar do seu pet, seja de maneira estética como também existe veterinários preparados para tratar de qualquer problema. </p>
                </div>
            </div>
            <div>
                <ul class="actions">
                    <li><a href="servico.php" class="button">Consulte na área de serviços</a></li>
                </ul>
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
