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
                    <button class="ativo">Pets</button>
                    <button onclick="location.href='servico.php';">Serviço</button>
                </div>
                <div class="tamanhoTabela">                  
                    <table class="tab-content" id="styleTable">
                    <thead>
                        <tr class="verde2">
                            <th>Cod Animal</th>
                            <th>Cod Cliente</th>
                            <th>Nome</th>
                            <th>Ano Nascimento</th>                                                 
                            <th>Peso</th>
                            <th>Grupo</th>
                            <th>Raça</th>
                            <th>Gênero</th>
                            <th>Vacinação</th>
                            <th>Comportamento</th>                                                               
                        </tr>
                    </thead>
                            <tr>
                                <td>ANI001</td> 
                                <td>CLIC001</td>                                                  
                                <td>Cretácio</td>                           
                                <td>2005</td>                           
                                <td>5KG</td>                                                                                                 
                                <td>Cães</td>                                                  
                                <td>Vira-lata</td>                                                   
                                <td>Macho</td>                                                   
                                <td>1</td>                                                                        
                                <td>Tranquilo</td>                                                      
                            </tr>

                            <?php
                                require_once('class/AnimalClass.php');
                                $objAnimal = new AnimalClass();
                                $tableAnimal = $objAnimal->retAnimais();
                                $max = sizeof($tableAnimal);

                                $animais = array();

                                for ($i = 0; $i < $max; $i++) {
                                    $animais[$i] = new AnimalClass();
                                    $animais[$i]->setCod($tableclientes[$i]['codCliente']);
                                    $animais[$i]->setDataCad($tableclientes[$i]['dataCadastro']);
                                    //PAROU AQUI
                                    $animais[$i]->setDataNasc($tableclientes[$i]['dataNascimento']);
                                    $animais[$i]->setNome($tableclientes[$i]['nome']);
                                    $animais[$i]->setEmail($tableclientes[$i]['email']);
                                    $animais[$i]->setRg($tableclientes[$i]['rg']);
                                    $animais[$i]->setTelefone($tableclientes[$i]['telefone']);
                                    $animais[$i]->setEndereco($tableclientes[$i]['endereco']);
                                    $animais[$i]->setCidade($tableclientes[$i]['cidade']);
                                    $animais[$i]->setEstado($tableclientes[$i]['estado']);
                                    $animais[$i]->setPais($tableclientes[$i]['pais']);
                                    $animais[$i]->setBairro($tableclientes[$i]['bairro']);

                                    echo '<!--'.$clientes[$i]->getCod().'_START-->';
                                    echo $i % 2 == 0?  '<tr id="'.$clientes[$i]->getCod() .'">': '<tr class="even" id="COD'.$i.'">';
                                    echo '<form action="" method="post">';
                                        echo '<td>'.$clientes[$i]->getCod() .'</td>';
                                        echo '<td>'.$clientes[$i]->getDataCad().'</td>';
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
                                            echo '<input type="hidden" name="codEdit" value="'.$clientes[$i]->getCod().'">';
                                            echo '<td class="iconesInserir"><button type="submit" value="submit request" class="fas fa-check btnIns" name="confirmEdit"></td>';
                                        }
                                        else{
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
                                        echo '<input type="hidden" name="codEdit" value="'.$clientes[$i]->getCod().'">';
                                        echo '<td class="iconesEditar"><button class="fas fa-pen btnEdit"  name="edit'.$i.'"><button class="fas fa-trash btnDel" name="delete"></td>';
                                        }
                                        echo '<!--EDIT-->';
                                        echo '<!--EDIT_END-->';
                                    echo '</form>';
                                    echo '<tr>';
                                    echo '<!--'.$clientes[$i]->getCod().'_END-->';
                                }
                    ?>

                        <tr>
                        <form action="" method="post">
                           <td class="form-group"><input class="form-control iptCod" id="iptCod" name="iptCod" placeholder="Código"></td> 
                           <td class="form-group"><input class="form-control iptCodCliente" id="iptCodCliente" name="iptCodCliente" placeholder="Código Cliente"></td>                                     
                           <td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome"></td>                                     
                           <td class="form-group"><input class="form-control iptNasc" id="iptNasc" name="iptNasc" placeholder="Ano Nascimento"></td>                              
                           <td class="form-group"><input class="form-control iptPeso" id="iptPeso" name="iptPeso" placeholder="Peso"></td>                           
                           <td class="form-group"><input class="form-control iptGrupo" id="iptGrupo" name="iptGrupo" placeholder="Grupo"></td>                                                  
                           <td class="form-group"><input class="form-control iptRaca" id="iptRaca" name="iptRaca" placeholder="Raça"></td>                           
                           <td class="form-group"><input class="form-control iptGenero" id="iptGenero" name="iptGenero" placeholder="Gênero"></td>                                                   
                           <td class="form-group"><input class="form-control iptVacina" id="iptVacina" name="iptVacina" placeholder="Vacinação"></td>                                                   
                           <td class="form-group"><input class="form-control iptComportamento" id="iptComportamento" name="iptComportamento" placeholder="Comportamento"></td>
                           <td class="iconesInserir"><button class="fas fa-pen btnEdit"><button class="fas fa-trash btnDel"></td>  
                        </form>                   
                        </tr>
                    </table>
                </div>
            </body>