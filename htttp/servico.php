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
        <script src="assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="assets/js/jquery.inputmask.bundle.js"></script>

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
                        </tr>
                    </thead>
                    <?php
                        require_once('class/ServicoClass.php');
                        $objServico = new ServicoClass();
                        $tableServicos = $objServico->retServicos();
                        $max = sizeof($tableServicos);

                        $servicos = array();

                        for ($i = 0; $i < $max; $i++) {
                            $servicos[$i] = new ServicoClass();
                            $servicos[$i]->setCodServico($tableServicos[$i]['codServico']);
                            $servicos[$i]->setNome($tableServicos[$i]['nome']);
                            $servicos[$i]->setDescricao($tableServicos[$i]['descricao']);
                            $servicos[$i]->setValor($tableServicos[$i]['valor']);

                            echo '<!--'.$servicos[$i]->getCodServico().'_START-->';
                            echo $i % 2 == 0?  '<tr id="'.$servicos[$i]->getCodServico() .'">': '<tr class="even" id="COD'.$i.'">';
                            echo '<form action="" method="post">';
                                echo '<td>'.$servicos[$i]->getCodServico() .'</td>';
                                //echo '<td>'.$servicos[$i]->getDataCad().'</td>';
                                if (isset($_POST['edit'.$i])) {
                                    //echo '<td class="form-group"><input type="date" class="form-control iptNasc" id="iptNasc" max="'.retData().'" name="iptNasc" value="'.str_replace('/','-',$clientes[$i]->getDataNasc()).'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome" value="'.$servicos[$i]->getNome().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptDescricao" id="iptDescricao" name="iptDescricao" placeholder="Descrição" value="'.$servicos[$i]->getDescricao().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptValor" id="iptValor" name="iptValor" placeholder="Valor" value="'.$servicos[$i]->getValor().'"></td>';                                    
                                    echo '<input type="hidden" name="codCliente" value="'.$i .'">';
                                    echo '<input type="hidden" name="codEdit" value="'.$clientes[$i]->getCod().'">';
                                    echo '<td class="iconesInserir"><button type="submit" value="submit request" class="fas fa-check btnIns" name="confirmEdit"></td>';
                                }
                                else{                             
                                echo '<td>'.$servicos[$i]->getNome().'</td>';
                                echo '<td>'.$servicos[$i]->getDescricao().'</td>';
                                echo '<td>'.$servicos[$i]->getValor().'</td>';
                                echo '<input type="hidden" name="codServico" value="'.$servicos[$i]->getCodServico() .'">';
                                echo '<input type="hidden" name="codEdit" value="'.$servicos[$i]->getCodServico().'">';
                                echo '<td class="iconesEditar"><button class="fas fa-pen btnEdit"  name="edit'.$i.'"><button class="fas fa-trash btnDel" name="delete"></td>';
                                }
                                echo '<!--EDIT-->';
                                echo '<!--EDIT_END-->';
                            echo '</form>';
                            echo '<tr>';
                            echo '<!--'.$servicos[$i]->getCodServico().'_END-->';
                        }
                    ?>
                    <?php
                    require_once('class/ServicoClass.php');
    
                    if (isset($_POST['delete'])) {
                        $objServico = new ServicoClass();
                        $codNovo = $objServico->excluirServico($_POST['codServico']);
                        echo '<meta http-equiv="refresh" content="0">';
                    }
                    ?>
                    <tr>
                        <form action="" method="post">
                           <td class="form-group"><?php $objCliente = new ClienteClass(); echo $objCliente->retProxCodCliente(); ?></td>                   
                           <td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome"></td>                           
                           <td class="form-group"><input class="form-control iptDescricao" id="iptDescricao" name="iptDescricao" placeholder="Decrição"></td>                           
                           <td class="form-group"><input class="form-control iptValor" id="iptValor" name="iptValor" placeholder="Valor"></td>                                                       
                           <td class="iconesInserir"><button class="fas fa-pen btnEdit"><button class="fas fa-trash btnDel"></td>  
                        </form>                   
                        </tr>
                    </table>
                </div>
                <?php
                    require_once('class/ServicoClass.php');
    
                    if (isset($_POST['inserir'])) {

                        if(($_POST['iptNome']=='') || ($_POST['iptDescricao']=='') || ($_POST['iptValor']=='')){
                            echo 'ERRO';
                        }
                        else{
                        $objServico = new ServicoClass();
                        $codNovo = $objServico->retProxCodServico();

                        $objServico->setCodServico($codNovo);
                        $objServico->setNome($_POST['iptNome']);
                        $objServico->setDescricao($_POST['iptDescricao']);
                        $objServico->setValor($_POST['iptValor']);

                        $objServico->inserirServico($objServico);
                        echo '<meta http-equiv="refresh" content="0">';
                        }
                    }

                   
                    if (isset($_POST['confirmEdit'])) {

                        if(($_POST['iptNome']=='') || ($_POST['iptDescricao']=='') || ($_POST['iptValor']=='')){
                            echo 'ERRO';
                        }
                        else{
                        $objServico = new ServicoClass();
                        $codNovo = $_POST['codEdit'];

                        $objServico->setCodServico($codNovo);                       
                        $objServico->setNome($_POST['iptNome']);
                        $objServico->setDescricao($_POST['iptDescricao']);
                        $objServico->setValor($_POST['iptValor']);

                        $objServico->editarServico($objServico);
                        echo '<meta http-equiv="refresh" content="0">';
                        }
                    }
                ?>
                <script>
                    $('#styleTable tr').mouseenter(function() {
                        $(this).find('td.iconesEditar').addClass('show');
                    });

                    $('#styleTable tr').mouseleave(function() {
                        $(this).find('td.iconesEditar').removeClass('show');
                    });

                </script>
            </body>