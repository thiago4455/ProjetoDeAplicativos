<!DOCTYPE>
<?php
// Start the session
session_start();

$_SESSION["userId"] = "";
$_SESSION["userType"] = "";
?>
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
                    <a href="./"><img width="200px" src="assets/img/logo-primopet.png"/></a>
                </div>
                <div id="menu">
                    <ul>
                        <li><a href="index.php" accesskey="1" title="">Home</a></li>
                        <li class="current_page_item"><a href="#" accesskey="2" title="">Login</a></li>

                    </ul>
                </div>
                <br/><br/><br/>
                <div class='alinharCentro'>
                    <form action="" method="post" class="formLogin">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="Email">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="passwd" name='passwd' placeholder="Senha">
                        </div>

                        <button type="submit" class="btn btn-primary verde" name='enviar'>Logar</button>




                        <?php
                        require_once 'class/FuncionarioClass.php';
                        $objFunc = new FuncionarioClass();

                        if (isset($_POST['enviar'])) {
                            $tablefuncs = $objFunc->retFuncionarios();
                            $max = sizeof($tablefuncs);

                            $_SESSION["userId"] = "";
                            $_SESSION["userType"] = "";
                            for ($i = 0; $i < $max; $i++) {
                                if (($_POST['email'] == $tablefuncs[$i]["email"]) && ($_POST['passwd'] == $tablefuncs[$i]["senha"])) {
                                    $_SESSION["userId"] = $tablefuncs[$i]["codFuncionario"];
                                    $_SESSION["userType"] = $tablefuncs[$i]["codTipo"];
                                }
                            }
                            if ($_SESSION['userId'] != "") {
                                header('Location: index.php');
                            }
                            echo '<p style="color: #fc5050;">Usuário / Senha incorretos<p>';
                        }
                        ?>

                    </form>
                    <div>
                            <p>Esqueceu sua senha? Recupere já <a href='#' onclick="abrirRecuperar()" >clicando aqui</a> </p>
                    </div>

                        <div class="recuperarEmail" id="recuperarEmail" style="display: none;">
                            <div class="msgRecuperarEmail">Insira seu email:</div>
                            <div class="input-group mb-3 botaoRecuperarEmail">
                                <input class="form-control" type="email" id="emailRec" name='emailRec' placeholder="Email">
                                <button style="margin-left: 5%;" class="btn">Enviar</button>
                            </div>
                        </div>
                </div>

            </div>
            <script>

                function abrirRecuperar(){
                    rec = document.getElementById("recuperarEmail");

                    if (rec.style.display == 'none'){
                        rec.style.display = 'block';
                    }
                    else {
                        rec.style.display = 'none';
                    }
                }

            </script>
    </body>