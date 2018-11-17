<!DOCTYPE>
<?php
// Start the session
session_start();

if ($_SESSION["userId"] == "") {
    header('Location: login.php');
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />

        <link href="assets/css/cssAplicacao.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
                        <li><a href="index.php" accesskey="1" title="">Home</a></li>
                        <li class="current_page_item"><a href="#" accesskey="2" title="">Sistema</a></li>
                        <button class="fas fa-sign-out-alt fa-2x logut iconeVoltar" onclick="window.location.href='login.php'"></button>

                    </ul>
                </div>
            </div>
                <div class="navbar">
                    <button onclick="location.href='cliente.php';">Cliente</button>
                    <?php 
                    if ($_SESSION["userType"] == "1") {
                        echo '<button onclick="location.href='."'funcionario.php'".';">Funcionario</button>';
                    }
                    ?>
                    <button onclick="location.href='pets.php';">Pets</button>
                    <button class="ativo">Serviço</a>
                </div>
                <div class="tamanhoTabela">                  
                    <table class="tab-content" id="styleTable">
                    <thead>
                        <tr class="verde2">
                            <th>Cod Serviço</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Data Prevista</th>
                            <th>Hora Prevista</th>
                            <th>Obs. Agendamento</th>
                            <th>Cod Veterinário</th>
                            <th>Data Execução</th>
                            <th>Hora Execução</th>
                            <th>Obs. Execução</th>                                                                            
                        </tr>
                    </thead>
                    <tr>
                        <td>SER001</td> 
                        <td>Tosa</td>                                                  
                        <td>Cortar o pelo</td>                           
                        <td>R$20,00</td>                           
                        <td>15/11/2018</td>
                        <td>14:00</td>
                        <td>Deixar pelo curto</td>            
                        <td>FUNC001</td>
                        <td>15/11/2018</td>
                        <td>14:00</td>
                        <td>Precisou ser dopado</td>                                                 
                    </tr>
                    <tr>
                        <form action="" method="post">
                           <td class="form-group"><input class="form-control iptCod" id="iptCod" name="iptCod" placeholder="Código"></td>                   
                           <td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome"></td>                           
                           <td class="form-group"><input class="form-control iptDesc" id="iptDesc" name="iptDesc" placeholder="Decrição"></td>                           
                           <td class="form-group"><input class="form-control iptVal" id="iptVal" name="iptVal" placeholder="Valor"></td>                           
                           <td class="form-group"><input class="form-control iptDataPrev" id="iptDataPrev" name="iptDataPrev" placeholder="Data Prevista"></td>                                                  
                           <td class="form-group"><input class="form-control iptHoraPrev" id="iptHoraPrev" name="iptHoraPrev" placeholder="Hora Prevista"></td>                           
                           <td class="form-group"><input class="form-control iptObsA" id="iptObsA" name="iptObsA" placeholder="Observação Agendamento"></td>                                                   
                           <td class="form-group"><input class="form-control iptCodVet" id="iptCodVet" name="iptCodVet" placeholder="Código Vet."></td>                                                   
                           <td class="form-group"><input class="form-control iptDataExec" id="iptDataExec" name="iptDataExec" placeholder="Data Execução"></td>                                                                        
                           <td class="form-group"><input class="form-control iptHoraExec" id="iptHoraExec" name="iptHoraExec" placeholder="Hora Execução"></td>                           
                           <td class="form-group"><input class="form-control iptObsE" id="iptObsE" name="iptObsE" placeholder="Observação Execução"></td>    
                           <td class="iconesInserir"><button class="fas fa-pen btnEdit"><button class="fas fa-trash btnDel"></td>  
                        </form>                   
                        </tr>
                    </table>
                </div>
            </body>