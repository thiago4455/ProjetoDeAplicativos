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
                                    $animais[$i]->setCodAnimal($tableAnimal[$i]['codAnimal']);
                                    $animais[$i]->setCliente_CodCliente($tableAnimal[$i]['Cliente_codCliente']);                              
                                    $animais[$i]->setNome($tableAnimal[$i]['nome']);
                                    $animais[$i]->setAnoNascimento($tableAnimal[$i]['anoNascimento']);
                                    $animais[$i]->setPeso($tableAnimal[$i]['peso']);
                                    $animais[$i]->setGrupo($tableAnimal[$i]['grupo']);
                                    $animais[$i]->setRaca($tableAnimal[$i]['raca']);
                                    $animais[$i]->setGenero($tableAnimal[$i]['genero']);
                                    $animais[$i]->setVacinacao($tableAnimal[$i]['vacinacao']);
                                    $animais[$i]->setComportamento($tableAnimal[$i]['comportameto']);                                   

                                    echo '<!--'.$animais[$i]->getCodAnimal().'_START-->';
                                    echo $i % 2 == 0?  '<tr id="'.$animais[$i]->getCodAnimal() .'">': '<tr class="even" id="COD'.$i.'">';
                                    echo '<form action="" method="post">';
                                        echo '<td>'.$animais[$i]->getCodAnimal() .'</td>';
                                        //echo '<td>'.$animais[$i]->getDataCad().'</td>';
                                        if (isset($_POST['edit'.$i])) {
                                            //echo '<td class="form-group"><input type="date" class="form-control iptNasc" id="iptNasc" max="'.retData().'" name="iptNasc" value="'.str_replace('/','-',$clientes[$i]->getDataNasc()).'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptCliente_codCliente" id="iptCliente_codCliente" name="iptCliente_codCliente" placeholder="Cod Cliente" value="'.$animais[$i]->getCliente_CodCliente().'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome" value="'.$animais[$i]->getNome().'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptAnoNascimento" id="iptAnoNascimento" name="iptAnoNascimento" placeholder="AnoNascimento" value="'.$animais[$i]->getAnoNascimento().'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptPeso" id="iptPeso" name="iptPeso" placeholder="Peso" value="'.$animais[$i]->getPeso().'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptGrupo" id="iptGrupo" name="iptGrupo" placeholder="Grupo" value="'.$animais[$i]->getGrupo().'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptRaca" id="iptRaca" name="iptRaca" placeholder="Raça" value="'.$animais[$i]->getRaca().'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptGenero" id="iptGenero" name="iptGenero" placeholder="Gênero" value="'.$animais[$i]->getGenero().'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptVacinacao" id="iptVacinacao" name="iptVacinacao" placeholder="Vanicação" value="'.$animais[$i]->getVacinacao().'"></td>';
                                            echo '<td class="form-group"><input class="form-control iptComportamento" id="iptComportamento" name="iptComportamento" placeholder="Comportamento" value="'.$animais[$i]->getComportamento().'"></td>';                                           
                                            echo '<input type="hidden" name="codAnimal" value="'.$i .'">';
                                            echo '<input type="hidden" name="codEdit" value="'.$animais[$i]->getCodAnimal().'">';
                                            echo '<td class="iconesInserir"><button type="submit" value="submit request" class="fas fa-check btnIns" name="confirmEdit"></td>';
                                        }
                                        else{
                                        echo '<td>'.$animais[$i]->getCliente_CodCliente().'</td>';
                                        echo '<td>'.$animais[$i]->getNome().'</td>';
                                        echo '<td>'.$animais[$i]->getAnoNascimento().'</td>';
                                        echo '<td>'.$animais[$i]->getPeso().'</td>';
                                        echo '<td>'.$animais[$i]->getGrupo().'</td>';
                                        echo '<td>'.$animais[$i]->getRaca().'</td>';
                                        echo '<td>'.$animais[$i]->getGenero().'</td>';
                                        echo '<td>'.$animais[$i]->getVacinacao().'</td>';
                                        echo '<td>'.$animais[$i]->getComportamento().'</td>';
                                        
                                        echo '<input type="hidden" name="codAnimal" value="'.$animais[$i]->getCodAnimal() .'">';
                                        echo '<input type="hidden" name="codEdit" value="'.$animais[$i]->getCodAnimal().'">';
                                        echo '<td class="iconesEditar"><button class="fas fa-pen btnEdit"  name="edit'.$i.'"><button class="fas fa-trash btnDel" name="delete"></td>';
                                        }
                                        echo '<!--EDIT-->';
                                        echo '<!--EDIT_END-->';
                                    echo '</form>';
                                    echo '<tr>';
                                    echo '<!--'.$animais[$i]->getCodAnimal().'_END-->';
                                }
                            ?>
                            <?php
                            require_once('class/AnimalClass.php');

                            if (isset($_POST['delete'])) {
                                $objAnimal = new AnimalClass();
                                $codNovo = $objAnimal->excluirAnimal($_POST['codAnimal']);
                                echo '<meta http-equiv="refresh" content="0">';
                            }
                            ?>
                        <tr>
                            
                        <form action="" method="post">
                           <td class="form-group"><?php $objAnimal = new AnimalClass(); echo $objAnimal->retProxCodAnimal(); ?></td>                            
                           <td class="form-group"><input class="form-control iptCliente_codCliente" id="iptCliente_codCliente" name="iptCliente_codCliente" placeholder="Código Cliente"></td>                                     
                           <td class="form-group"><input class="form-control iptNome" id="iptNome" name="iptNome" placeholder="Nome"></td>                                     
                           <td class="form-group"><input class="form-control iptAnoNascimento" id="iptAnoNascimento" name="iptAnoNascimento" placeholder="Ano Nascimento"></td>                              
                           <td class="form-group"><input class="form-control iptPeso" id="iptPeso" name="iptPeso" placeholder="Peso"></td>                           
                           <td class="form-group"><input class="form-control iptGrupo" id="iptGrupo" name="iptGrupo" placeholder="Grupo"></td>                                                  
                           <td class="form-group"><input class="form-control iptRaca" id="iptRaca" name="iptRaca" placeholder="Raça"></td>                           
                           <td class="form-group"><input class="form-control iptGenero" id="iptGenero" name="iptGenero" placeholder="Gênero"></td>                                                   
                           <td class="form-group"><input class="form-control iptVacinacao" id="iptVacinacao" name="iptVacinacao" placeholder="Vacinação"></td>                                                   
                           <td class="form-group"><input class="form-control iptComportamento" id="iptComportamento" name="iptComportamento" placeholder="Comportamento"></td>
                           <td class="iconesInserir"><button type="submit" value="submit request" class="fas fa-check btnIns" name="inserir"></td>
                        </form>                   
                        </tr>
                    </table>
                </div>
                <?php
                    require_once('class/AnimalClass.php');
    
                    if (isset($_POST['inserir'])) {

                        if(($_POST['iptNome']=='') || ($_POST['iptAnoNascimento']=='') || ($_POST['iptPeso']=='') || ($_POST['iptGrupo']=='') || ($_POST['iptRaca']=='') || ($_POST['iptGenero']=='') || ($_POST['iptVacinacao']=='') || ($_POST['iptComportamento']=='')){
                            echo 'ERRO';
                        }
                        else{
                        $objCliente = new AnimalClass();
                        $codNovo = $objAnimal->retProxCodAnimal();

                        $objAnimal->setCodAnimal($codNovo);
                        $objAnimal->setCliente_CodCliente($_POST['iptCliente_codCliente']);
                        $objAnimal->setNome($_POST['iptNome']);
                        $objAnimal->setAnoNascimento($_POST['iptAnoNascimento']);          
                        $objAnimal->setPeso($_POST['iptPeso']);
                        $objAnimal->setGrupo($_POST['iptGrupo']);
                        $objAnimal->setRaca($_POST['iptRaca']);
                        $objAnimal->setGenero($_POST['iptGenero']);
                        $objAnimal->setVacinacao($_POST['iptVacinacao']);
                        $objAnimal->setComportamento($_POST['iptComportamento']);

                        $objAnimal->inserirAnimal($objAnimal);
                        echo '<meta http-equiv="refresh" content="0">';
                        }
                    }

                   
                    if (isset($_POST['confirmEdit'])) {

                        if(($_POST['iptNome']=='') || ($_POST['iptAnoNascimento']=='') || ($_POST['iptPeso']=='') || ($_POST['iptGrupo']=='') || ($_POST['iptRaca']=='') || ($_POST['iptGenero']=='') || ($_POST['iptVacinacao']=='') || ($_POST['iptComportamento']=='')){
                            echo 'ERRO';
                        }
                        else{
                        $objAnimal = new AnimalClass();
                        $codNovo = $_POST['codEdit'];

                        $objAnimal->setCodAnimal($codNovo);                       
                        $objAnimal->setCliente_CodCliente($_POST['iptCliente_codCliente']);
                        $objAnimal->setNome($_POST['iptNome']);
                        $objAnimal->setAnoNascimento(str_replace('-','/',$_POST['iptAnoNascimento']));          
                        $objAnimal->setPeso($_POST['iptPeso']);
                        $objAnimal->setGrupo($_POST['iptGrupo']);
                        $objAnimal->setRaca($_POST['iptRaca']);
                        $objAnimal->setGenero($_POST['iptGenero']);
                        $objAnimal->setVacinacao($_POST['iptVacinacao']);
                        $objAnimal->setComportamento($_POST['iptComportamento']);

                        $objAnimal->editarAnimal($objAnimal);
                        
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