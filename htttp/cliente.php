<!DOCTYPE>
<?php
// Start the session
session_start();

if ($_SESSION["userId"] == "") {
    header('Location: login.php');
}

function  retData(){
    $today = getdate();
    return $today['mday'].'/'.$today['mon'].'/'.$today['year'];
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
                    <button class="ativo">Cliente</button>
                    <?php 
                    if ($_SESSION["userType"] == "1") {
                        echo '<button onclick="location.href='."'funcionario.php'".';">Funcionario</button>';
                    }
                    ?>
                    <button onclick="location.href='pets.php';">Pets</button>
                    <button onclick="location.href='servico.php';">Serviço</button>
                </div>
                <div class="tamanhoTabela">                  
                    <table class="tab-content" id="styleTable">
                    <thead>
                        <tr class="verde2">
                            <th>Codígo</th>
                            <th>Data Cadastro</th>
                            <th>Data Nasc</th>
                            <th>Nome</th>
                            <th>Email</th>                                                 
                            <th>RG</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>País</th>                                
                        </tr>
                    </thead>

                    <?php
                        require_once('class/ClienteClass.php');
                        $objCliente = new ClienteClass();
                        $tableclientes = $objCliente->retClientes();
                        $max = sizeof($tableclientes);

                        $clientes = array();

                        for ($i = 0; $i < $max; $i++) {
                            $clientes[$i] = new ClienteClass();
                            $clientes[$i]->setCod($tableclientes[$i]['codCliente']);
                            $clientes[$i]->setDataCad($tableclientes[$i]['dataCadastro']);
                            $clientes[$i]->setDataNasc($tableclientes[$i]['dataNascimento']);
                            $clientes[$i]->setNome($tableclientes[$i]['nome']);
                            $clientes[$i]->setEmail($tableclientes[$i]['email']);
                            $clientes[$i]->setRg($tableclientes[$i]['rg']);
                            $clientes[$i]->setTelefone($tableclientes[$i]['telefone']);
                            $clientes[$i]->setEndereco($tableclientes[$i]['endereco']);
                            $clientes[$i]->setCidade($tableclientes[$i]['cidade']);
                            $clientes[$i]->setEstado($tableclientes[$i]['estado']);
                            $clientes[$i]->setPais($tableclientes[$i]['pais']);
                            $clientes[$i]->setBairro($tableclientes[$i]['bairro']);

                            echo '<!--'.$clientes[$i]->getCod().'_START-->';
                            echo $i % 2 == 0?  '<tr id="COD'.$i.'">': '<tr class="even" id="COD'.$i.'">';
                            echo '<form action="" method="post">';
                                echo '<td>'.$clientes[$i]->getCod() .'</td>';
                                echo '<td>'.$clientes[$i]->getDataCad().'</td>';
                                echo '<td>'.$clientes[$i]->getDataNasc().'</td>';
                                echo '<td>'.$clientes[$i]->getNome().'</td>';
                                echo '<td>'.$clientes[$i]->getEmail().'</td>';
                                echo '<td>'.$clientes[$i]->getRg().'</td>';
                                echo '<td>'.$clientes[$i]->getTelefone().'</td>';
                                echo '<td>'.$clientes[$i]->getEndereco().'</td>';
                                echo '<td>'.$clientes[$i]->getBairro().'</td>';
                                echo '<td>'.$clientes[$i]->getCidade().'</td>';
                                echo '<td>'.$clientes[$i]->getEstado().'</td>';
                                echo '<td>'.$clientes[$i]->getPais().'</td>';
                                echo '<input type="hidden" name="codCliente" value="'.$clientes[$i]->getCod() .'">';
                                echo '<td class="iconesEditar"><button class="fas fa-pen btnEdit" name="edit"><button class="fas fa-trash btnDel" name="delete"></td>';
                                echo '<!--EDIT-->';
                                echo '<!--EDIT_END-->';
                            echo '</form>';
                            echo '<tr>';
                            echo '<!--'.$clientes[$i]->getCod().'_END-->';
                        }
                    ?>
                    <?php
                    require_once('class/ClienteClass.php');
    
                    if (isset($_POST['delete'])) {
                        $objCliente = new ClienteClass();
                        $codNovo = $objCliente->excluirCliente($_POST['codCliente']);
                        echo '<meta http-equiv="refresh" content="0">';
                    }
                ?>
                        <tr>
                        <form action="" method="post">
                           <td class="form-group"><?php $objCliente = new ClienteClass(); echo $objCliente->retProxCodCliente(); ?></td> 
                           <td class="form-group"><?php echo retData(); ?></td>                                                  
                           <td class="form-group"><input type='date' class="form-control iptNasc" id="iptNasc" name="iptNasc"></td>                           
                           <td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome"></td>                           
                           <td class="form-group"><input class="form-control iptEmail" id="iptEmail" name="iptEmail" placeholder="Email"></td>                           
                           <td class="form-group"><input class="form-control iptRg" id="iptRg" name="iptRg" placeholder="RG"></td>                                                  
                           <td class="form-group"><input class="form-control iptTelefone" id="iptTelefone" name="iptTelefone" placeholder="(31)9999-9999"></td>                           
                           <td class="form-group"><input class="form-control iptEndereco" id="iptEndereco" name="iptEndereco" placeholder="Endereço"></td>                                                   
                           <td class="form-group"><input class="form-control iptBairro" id="iptBairro" name="iptBairro" placeholder="Bairro"></td>                                                   
                           <td class="form-group"><input class="form-control iptCidade" id="iptCidade" name="iptCidade" placeholder="Cidade"></td>                                                                        
                           <td class="form-group"><input class="form-control iptEstado" id="iptEstado" name="iptEstado" placeholder="Estado"></td>                           
                           <td class="form-group"><input class="form-control iptPais" id="iptPais" name="iptPais" placeholder="País"></td>    
                           <td class="iconesInserir"><button type='submit' value='submit request' class="fas fa-check btnIns" name="inserir"></td>
                        </form>
                        </tr>
                    </table>
                </div>

                <?php
                    require_once('class/ClienteClass.php');
    
                    if (isset($_POST['inserir'])) {

                        if(($_POST['iptNome']=='') || ($_POST['iptNasc']=='') || ($_POST['iptEmail']=='') || ($_POST['iptRg']=='') || ($_POST['iptTelefone']=='') || ($_POST['iptEndereco']=='') || ($_POST['iptBairro']=='') || ($_POST['iptEstado']=='') || ($_POST['iptCidade']=='') || ($_POST['iptPais']=='')){
                            echo 'ERRO';
                        }
                        else{
                        $objCliente = new ClienteClass();
                        $codNovo = $objCliente->retProxCodCliente();

                        $objCliente->setCod($codNovo);
                        $objCliente->setDataCad(retData());
                        $objCliente->setDataNasc(str_replace('-','/',$_POST['iptNasc']));
                        $objCliente->setNome($_POST['iptNome']);
                        $objCliente->setEmail($_POST['iptEmail']);
                        $objCliente->setRg($_POST['iptRg']);
                        $objCliente->setTelefone($_POST['iptTelefone']);
                        $objCliente->setEndereco($_POST['iptEndereco']);
                        $objCliente->setBairro($_POST['iptBairro']);
                        $objCliente->setCidade($_POST['iptCidade']);
                        $objCliente->setEstado($_POST['iptEstado']);
                        $objCliente->setPais($_POST['iptPais']);

                        $objCliente->inserirCliente($objCliente);
                        echo '<meta http-equiv="refresh" content="0">';
                        }
                    }
                ?>

                <script>

                    var max=<?php
                        require_once('class/ClienteClass.php');
                        $objCliente = new ClienteClass();
                        $tableclientes = $objCliente->retClientes();
                        $max = sizeof($tableclientes);
                        echo $max;
                    ?>;

                    $('#styleTable tr').mouseenter(function() {
                        $(this).find('td.iconesEditar').addClass('show');
                    });

                    $('#styleTable tr').mouseleave(function() {
                        $(this).find('td.iconesEditar').removeClass('show');
                    });

                </script>
            </body>