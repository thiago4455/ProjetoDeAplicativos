<!DOCTYPE>
<?php
// Start the session
session_start();

if ($_SESSION["userType"] != "1") {
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
                                <th>Tipo</th>                             
                            </tr>
                        </thead>
                        <?php
                        require_once('class/FuncionarioClass.php');
                        $objFunc = new FuncionarioClass();
                        $tablefuncs = $objFunc->retFuncionarios();
                        $max = sizeof($tablefuncs);

                        $funcionarios = array();

                        for ($i = 0; $i < $max; $i++) {
                            $funcionarios[$i] = new FuncionarioClass();
                            $funcionarios[$i]->setCod($tablefuncs[$i]['codFuncionario']);
                            $funcionarios[$i]->setDataCad($tablefuncs[$i]['dataCadastro']);
                            
                            $funcionarios[$i]->setDataNasc($tablefuncs[$i]['dataNascimento']);
                            $funcionarios[$i]->setNome($tablefuncs[$i]['nome']);
                            $funcionarios[$i]->setEmail($tablefuncs[$i]['email']);
                            $funcionarios[$i]->setSenha($tablefuncs[$i]['senha']);
                            $funcionarios[$i]->setRg($tablefuncs[$i]['rg']);
                            $funcionarios[$i]->setTelefone($tablefuncs[$i]['telefone']);
                            $funcionarios[$i]->setEndereco($tablefuncs[$i]['endereco']);
                            $funcionarios[$i]->setCidade($tablefuncs[$i]['cidade']);
                            $funcionarios[$i]->setEstado($tablefuncs[$i]['estado']);
                            $funcionarios[$i]->setPais($tablefuncs[$i]['pais']);
                            $funcionarios[$i]->setBairro($tablefuncs[$i]['bairro']);
                            $funcionarios[$i]->setTipo($tablefuncs[$i]['codTipo']);

                            echo '<!--'.$funcionarios[$i]->getCod().'_START-->';
                            echo $i % 2 == 0?  '<tr id="'.$funcionarios[$i]->getCod() .'">': '<tr class="even" id="COD'.$i.'">';
                            echo '<form action="" method="post">';
                                echo '<td>'.$funcionarios[$i]->getCod() .'</td>';
                                echo '<td>'.$funcionarios[$i]->getDataCad().'</td>';
                                if (isset($_POST['edit'.$i])) {
                                    echo '<td class="form-group"><input type="date" class="form-control iptNasc" id="iptNasc" max="'.retData().'" name="iptNasc" value="'.str_replace('/','-',$funcionarios[$i]->getDataNasc()).'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome" value="'.$funcionarios[$i]->getNome().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptEmail" id="iptEmail" name="iptEmail" placeholder="Email" value="'.$funcionarios[$i]->getEmail().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptSenha" id="iptSenha" name="iptSenha" placeholder="Senha" value="'.$funcionarios[$i]->getSenha().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptRg" id="iptRg" name="iptRg" placeholder="RG" value="'.$funcionarios[$i]->getRg().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptTelefone" id="iptTelefone" name="iptTelefone" placeholder="(31)9999-9999" value="'.$funcionarios[$i]->getTelefone().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptEndereco" id="iptEndereco" name="iptEndereco" placeholder="Endereço" value="'.$funcionarios[$i]->getEndereco().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptBairro" id="iptBairro" name="iptBairro" placeholder="Bairro" value="'.$funcionarios[$i]->getBairro().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptCidade" id="iptCidade" name="iptCidade" placeholder="Cidade" value="'.$funcionarios[$i]->getCidade().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptEstado" id="iptEstado" name="iptEstado" placeholder="Estado" value="'.$funcionarios[$i]->getEstado().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptPais" id="iptPais" name="iptPais" placeholder="País" value="'.$funcionarios[$i]->getPais().'"></td>';
                                    echo '<td class="form-group"><input class="form-control iptTipo" id="iptTipo" name="iptTipo" placeholder="Tipo" value="'.$funcionarios[$i]->getTipo().'"></td>';
                                    echo '<input type="hidden" name="codFuncionario" value="'.$i .'">';
                                    echo '<input type="hidden" name="codEdit" value="'.$funcionarios[$i]->getCod().'">';
                                    echo '<td class="iconesInserir"><button type="submit" value="submit request" class="fas fa-check btnIns" name="confirmEdit"></td>';
                                }
                                else{
                                echo '<td>'.$funcionarios[$i]->getDataNasc().'</td>';
                                echo '<td>'.$funcionarios[$i]->getNome().'</td>';
                                echo '<td>'.$funcionarios[$i]->getEmail().'</td>';
                                echo '<td>'.$funcionarios[$i]->getSenha().'</td>';
                                echo '<td>'.$funcionarios[$i]->getRg().'</td>';
                                echo '<td>'.$funcionarios[$i]->getTelefone().'</td>';
                                echo '<td>'.$funcionarios[$i]->getEndereco().'</td>';
                                echo '<td>'.$funcionarios[$i]->getBairro().'</td>';
                                echo '<td>'.$funcionarios[$i]->getCidade().'</td>';
                                echo '<td>'.$funcionarios[$i]->getEstado().'</td>';
                                echo '<td>'.$funcionarios[$i]->getPais().'</td>';
                                echo '<td>'.$funcionarios[$i]->getTipo().'</td>';
                                echo '<input type="hidden" name="codFuncionario" value="'.$funcionarios[$i]->getCod() .'">';
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
                    require_once('class/FuncionarioClass.php');

                    if (isset($_POST['delete'])) {
                        if($_POST['codEdit']!=$_SESSION["userId"]){
                        $objFunc = new FuncionarioClass();
                        $codNovo = $objFunc->excluirFuncionario($_POST['codFuncionario']);
                        
                        echo '<meta http-equiv="refresh" content="0">';
                    }
                }
                ?>
                        <tr>
                        <form action="" method="post">
                           <td class="form-group"><?php $objFunc = new FuncionarioClass(); echo $objFunc->retProxCodFunc(); ?></td> 
                           <td class="form-group"><?php echo retData(); ?></td>                                                  
                           <td class="form-group"><input type='date' class="form-control iptNasc" id="iptNasc" name="iptNasc"></td>                           
                           <td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome"></td>                           
                           <td class="form-group"><input class="form-control iptEmail" id="iptEmail" name="iptEmail" placeholder="Email"></td>                           
                           <td class="form-group"><input class="form-control iptSenha" id="iptSenha" name="iptSenha" placeholder="Senha"></td>                           
                           <td class="form-group"><input class="form-control iptRg rg" id="iptRg" name="iptRg" placeholder="RG"></td>                                                  
                           <td class="form-group"><input class="form-control iptTelefone phone" id="iptTelefone" name="iptTelefone" placeholder="(31)9999-9999"></td>                           
                           <td class="form-group"><input class="form-control iptEndereco" id="iptEndereco" name="iptEndereco" placeholder="Endereço"></td>                                                   
                           <td class="form-group"><input class="form-control iptBairro" id="iptBairro" name="iptBairro" placeholder="Bairro"></td>                                                   
                           <td class="form-group"><input class="form-control iptCidade" id="iptCidade" name="iptCidade" placeholder="Cidade"></td>                                                                        
                           <td class="form-group"><input class="form-control iptEstado" id="iptEstado" name="iptEstado" placeholder="Estado"></td>                           
                           <td class="form-group"><input class="form-control iptPais" id="iptPais" name="iptPais" placeholder="País"></td>
                           <td class="form-group"><input class="form-control iptTipo" id="iptTipo" name="iptTipo" placeholder="Tipo"></td>    
                           <td class="iconesInserir"><button type="submit" value="submit request" class="fas fa-check btnIns" name="inserir"></td>            
                        </tr>
                        </form>   
                    </table>
                </div>
                <?php
                    require_once('class/FuncionarioClass.php');
    
                    if (isset($_POST['inserir'])) {

                        if(($_POST['iptNome']=='') || ($_POST['iptNasc']=='') || ($_POST['iptEmail']=='') || ($_POST['iptSenha']=='')|| ($_POST['iptRg']=='') || ($_POST['iptTelefone']=='') || ($_POST['iptEndereco']=='') || ($_POST['iptBairro']=='') || ($_POST['iptEstado']=='') || ($_POST['iptCidade']=='') || ($_POST['iptPais']=='')){
                            echo 'ERRO';
                        }
                        else{
                        $objFunc = new FuncionarioClass();
                        $codNovo = $objFunc->retProxCodFunc();

                        $objFunc->setCod($codNovo);
                        $objFunc->setDataCad(retData());
                        $objFunc->setDataNasc(str_replace('-','/',$_POST['iptNasc']));
                        $objFunc->setNome($_POST['iptNome']);
                        $objFunc->setEmail($_POST['iptEmail']);
                        $objFunc->setSenha($_POST['iptSenha']);
                        $objFunc->setRg($_POST['iptRg']);
                        $objFunc->setTelefone($_POST['iptTelefone']);
                        $objFunc->setEndereco($_POST['iptEndereco']);
                        $objFunc->setBairro($_POST['iptBairro']);
                        $objFunc->setCidade($_POST['iptCidade']);
                        $objFunc->setEstado($_POST['iptEstado']);
                        $objFunc->setPais($_POST['iptPais']);
                        $objFunc->setTipo($_POST['iptTipo']);

                        $objFunc->inserirFuncionario($objFunc);
                        echo '<meta http-equiv="refresh" content="0">';
                        }
                    }

                   
                    if (isset($_POST['confirmEdit'])) {

                        if(($_POST['codEdit']==$_SESSION["userId"]) ||($_POST['iptNome']=='') || ($_POST['iptNasc']=='') || ($_POST['iptEmail']=='') || ($_POST['iptSenha']=='')|| ($_POST['iptRg']=='') || ($_POST['iptTelefone']=='') || ($_POST['iptEndereco']=='') || ($_POST['iptBairro']=='') || ($_POST['iptEstado']=='') || ($_POST['iptCidade']=='') || ($_POST['iptPais']=='')){
                            //echo 'ERRO';
                        }
                        else{
                        $objFunc = new FuncionarioClass();
                        $codNovo = $_POST['codEdit'];

                        $objFunc->setCod($codNovo);
                        $data = retData();
                        $objFunc->setDataCad($data);
                        $objFunc->setDataNasc(str_replace('-','/',$_POST['iptNasc']));
                        $objFunc->setNome($_POST['iptNome']);
                        $objFunc->setEmail($_POST['iptEmail']);
                        $objFunc->setSenha($_POST['iptSenha']);
                        $objFunc->setRg($_POST['iptRg']);
                        $objFunc->setTelefone($_POST['iptTelefone']);
                        $objFunc->setEndereco($_POST['iptEndereco']);
                        $objFunc->setBairro($_POST['iptBairro']);
                        $objFunc->setCidade($_POST['iptCidade']);
                        $objFunc->setEstado($_POST['iptEstado']);
                        $objFunc->setPais($_POST['iptPais']);
                        $objFunc->setTipo($_POST['iptTipo']);

                        $objFunc->editarFuncionario($objFunc);
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
                    
                    $(function () {                        
                        $(".phone").mask("(99) 9999-9999");

                        $(".rg").mask('aa.99-999-999');
                                               
                                        
                        $("input").blur(function () {
                         $("#info").html("Valor sem máscara: " + $(this).mask());
                        });
                    });
                </script>
            </body>