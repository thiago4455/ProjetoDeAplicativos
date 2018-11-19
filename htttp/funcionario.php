<!DOCTYPE>
<?php
// Start the session
session_start();

if ($_SESSION["userType"] != "1") {
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
                    <button class="ativo">Funcionario</button>
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
                                <th>Senha</th>
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
                        require_once('class/FuncionarioClass.php');
                        $objFunc = new ClienteClass();
                        $tablefuncs = $objFunc->retFuncionarios();
                        $max = sizeof($tablefuncs);

                        $funcionarios = array();

                        for ($i = 0; $i < $max; $i++) {
                            $funcionarios[$i] = new ClienteClass();
                            $funcionarios[$i]->setCod($tablefuncs[$i]['codCliente']);
                            $funcionarios[$i]->setDataCad($tablefuncs[$i]['dataCadastro']);
                            $funcionarios[$i]->setDataNasc($tablefuncs[$i]['dataNascimento']);
                            $funcionarios[$i]->setNome($tablefuncs[$i]['nome']);
                            $funcionarios[$i]->setEmail($tablefuncs[$i]['email']);
                            $funcionarios[$i]->setRg($tablefuncs[$i]['rg']);
                            $funcionarios[$i]->setTelefone($tablefuncs[$i]['telefone']);
                            $funcionarios[$i]->setEndereco($tablefuncs[$i]['endereco']);
                            $funcionarios[$i]->setCidade($tablefuncs[$i]['cidade']);
                            $funcionarios[$i]->setEstado($tablefuncs[$i]['estado']);
                            $funcionarios[$i]->setPais($tablefuncs[$i]['pais']);
                            $funcionarios[$i]->setBairro($tablefuncs[$i]['bairro']);

                            echo '<!--'.$funcionarios[$i]->getCod().'_START-->';
                            echo $i % 2 == 0?  '<tr id="'.$funcionarios[$i]->getCod() .'">': '<tr class="even" id="COD'.$i.'">';
                            echo '<form action="" method="post">';
                                echo '<td>'.$funcionarios[$i]->getCod() .'</td>';
                                echo '<td>'.$funcionarios[$i]->getDataCad().'</td>';
                                if (isset($_POST['edit'.$i])) {
                                    echo '<td class="form-group"><input type="date" class="form-control iptNasc" id="iptNasc" max="'.retData().'" name="iptNasc" value="'.str_replace('/','-',$clientes[$i]->getDataNasc()).'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome" value="'.$clientes[$i]->getNome().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptEmail" id="iptEmail" name="iptEmail" placeholder="Email" value="'.$clientes[$i]->getEmail().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptRg" id="iptRg" name="iptRg" placeholder="RG" value="'.$clientes[$i]->getRg().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptTelefone" id="iptTelefone" name="iptTelefone" placeholder="(31)9999-9999" value="'.$clientes[$i]->getTelefone().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptEndereco" id="iptEndereco" name="iptEndereco" placeholder="Endereço" value="'.$clientes[$i]->getEndereco().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptBairro" id="iptBairro" name="iptBairro" placeholder="Bairro" value="'.$clientes[$i]->getBairro().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptCidade" id="iptCidade" name="iptCidade" placeholder="Cidade" value="'.$clientes[$i]->getCidade().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptEstado" id="iptEstado" name="iptEstado" placeholder="Estado" value="'.$clientes[$i]->getEstado().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptPais" id="iptPais" name="iptPais" placeholder="País" value="'.$clientes[$i]->getPais().'"></td>';
                                    echo '<input type="hidden" name="codCliente" value="'.$i .'">';
                                    echo '<input type="hidden" name="codEdit" value="'.$funcionarios[$i]->getCod().'">';
                                    echo '<td class="iconesInserir"><button type="submit" value="submit request" class="fas fa-check btnIns" name="confirmEdit"></td>';
                                }
                                else{
                                echo '<td>'.$funcionarios[$i]->getDataNasc().'</td>';
                                echo '<td>'.$funcionarios[$i]->getNome().'</td>';
                                echo '<td>'.$funcionarios[$i]->getEmail().'</td>';
                                echo '<td>'.$funcionarios[$i]->getRg().'</td>';
                                echo '<td>'.$funcionarios[$i]->getTelefone().'</td>';
                                echo '<td>'.$funcionarios[$i]->getEndereco().'</td>';
                                echo '<td>'.$funcionarios[$i]->getBairro().'</td>';
                                echo '<td>'.$funcionarios[$i]->getCidade().'</td>';
                                echo '<td>'.$funcionarios[$i]->getEstado().'</td>';
                                echo '<td>'.$funcionarios[$i]->getPais().'</td>';
                                echo '<input type="hidden" name="codCliente" value="'.$funcionarios[$i]->getCod() .'">';
                                echo '<input type="hidden" name="codEdit" value="'.$funcionarios[$i]->getCod().'">';
                                echo '<td class="iconesEditar"><button class="fas fa-pen btnEdit"  name="edit'.$i.'"><button class="fas fa-trash btnDel" name="delete"></td>';
                                }
                                echo '<!--EDIT-->';
                                echo '<!--EDIT_END-->';
                            echo '</form>';
                            echo '<tr>';
                            echo '<!--'.$funcionarios[$i]->getCod().'_END-->';
                        }
                    ?>
                    <?php
                    require_once('class/ClienteClass.php');
    
                    if (isset($_POST['delete'])) {
                        $objFunc = new ClienteClass();
                        $codNovo = $objFunc->excluirFuncionario($_POST['codFuncionario']);
                        echo '<meta http-equiv="refresh" content="0">';
                    }
                ?>
                        <tr>
                        <form action="" method="post">
                           <td class="form-group"><input class="form-control iptCod" id="iptCod" name="iptCod" placeholder="Código"></td> 
                           <td class="form-group">14/11/2018</td>                                                  
                           <td class="form-group"><input type='date' class="form-control iptNasc" id="iptNasc" name="iptNasc"></td>                           
                           <td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome"></td>                           
                           <td class="form-group"><input class="form-control iptEmail" id="iptEmail" name="iptEmail" placeholder="Email"></td>                           
                           <td class="form-group"><input class="form-control iptSenha" id="iptSenha" name="iptSenha" placeholder="Senha"></td>                           
                           <td class="form-group"><input class="form-control iptRg" id="iptRg" name="iptRg" placeholder="RG"></td>                                                  
                           <td class="form-group"><input class="form-control iptTelefone" id="iptTelefone" name="iptTelefone" placeholder="(31)9999-9999"></td>                           
                           <td class="form-group"><input class="form-control iptEndereco" id="iptEndereco" name="iptEndereco" placeholder="Endereço"></td>                                                   
                           <td class="form-group"><input class="form-control iptBairro" id="iptBairro" name="iptBairro" placeholder="Bairro"></td>                                                   
                           <td class="form-group"><input class="form-control iptCidade" id="iptCidade" name="iptCidade" placeholder="Cidade"></td>                                                                        
                           <td class="form-group"><input class="form-control iptEstado" id="iptEstado" name="iptEstado" placeholder="Estado"></td>                           
                           <td class="form-group"><input class="form-control iptPais" id="iptPais" name="iptPais" placeholder="País"></td>    
                           <td class="iconesInserir"><button class="fas fa-pen btnEdit"><button class="fas fa-trash btnDel"></td>              
                        </tr>
                        </form>   
                    </table>
                </div>
            </body>