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
                        <button class="fas fa-sign-out-alt fa-2x logut iconeVoltar" onclick="window.location.href = 'login.php'"></button>

                    </ul>
                </div>
            </div>
            <div class="navbar">
                <button onclick="location.href = 'cliente.php';">Cliente</button>
                <?php
                if ($_SESSION["userType"] == "1") {
                    echo '<button onclick="location.href=' . "'funcionario.php'" . ';">Funcionario</button>';
                }
                ?>
                <button class="ativo">Pets</button>
                <button onclick="location.href = 'servico.php';">Serviço</button>
            </div>
            <div class="tamanhoTabela">                  
                <table class="tab-content" id="styleTable">
                    <thead>
                        <tr class="verde2">
                            <th>Cod Agendamento</th>
                            <th>Data Prevista</th>
                            <th>Hora Prevista</th>
                            <th>Observações</th>                                                 
                            <th>Cod Animal</th>
                            <th>Cod Serviço</th>
                            <th>Cod Veterinário</th>
                            <th>Data Execução</th>
                            <th>Hora Execução</th>                                                                                      
                        </tr>
                    </thead>
                    <?php
                    require_once('class/AgendaExecClass.php');
                    $objAgendaExec = new AgendaExecClass();
                    $tableAgendaExec = $objAgendaExec->retAgendaExec();
                    $max = sizeof($tableAgendaExec);

                    $agenda = array();

                    for ($i = 0; $i < $max; $i++) {
                        $agenda[$i] = new AgendaExecClass();
                        $agenda[$i]->setCodAgendamento($tableAgendaExec[$i]['codAgendamento']);
                        $agenda[$i]->setDataPrevista($tableAgendaExec[$i]['dataPrevista']);
                        $agenda[$i]->setHoraPrevista($tableAgendaExec[$i]['horaPrevista']);
                        $agenda[$i]->setObs($tableAgendaExec[$i]['observacoes']);
                        $agenda[$i]->setCodAnimal($tableAgendaExec[$i]['codAnimal']);
                        $agenda[$i]->setCodServico($tableAgendaExec[$i]['codServico']);
                        $agenda[$i]->setCodVeterinario($tableAgendaExec[$i]['codVeterinario']);
                        $agenda[$i]->setDataExecucao($tableAgendaExec[$i]['dataExecucao']);
                        $agenda[$i]->setHoraExecucao($tableAgendaExec[$i]['horaExecucao']);

                        echo '<!--' . $agenda[$i]->getCodAgendamento() . '_START-->';
                        echo $i % 2 == 0 ? '<tr id="' . $agenda[$i]->getCodAgendamento() . '">' : '<tr class="even" id="COD' . $i . '">';
                        echo '<form action="" method="post">';
                        echo '<td>' . $agenda[$i]->getCodAgendamento() . '</td>';
                        if (isset($_POST['edit' . $i])) {
                            echo '<td class="form-group"><input class="form-control iptDataPrevista" id="iptDataPrevista" name="iptDataPrevista" placeholder="Data Prevista" value="' . $agenda[$i]->getDataPrevista() . '"></td>';
                            echo '<td class="form-group"><input class="form-control iptHoraPrevista" id="iptHoraPrevista" name="iptHoraPrevista" placeholder="Hora Prevista" value="' . $agenda[$i]->getHoraPrevista() . '"></td>';
                            echo '<td class="form-group"><input class="form-control iptObs" id="iptObs" name="iptObs" placeholder="Observações" value="' . $agenda[$i]->getObs() . '"></td>';
                            echo '<td class="form-group"><input class="form-control iptCodAnimal" id="iptCodAnimal" name="iptCodAnimal" placeholder="Cod Animal" value="' . $agenda[$i]->getCodAnimal() . '"></td>';
                            echo '<td class="form-group"><input class="form-control iptCodServico" id="iptCodServico" name="iptCodServico" placeholder="Cod Serviço" value="' . $agenda[$i]->getCodServico() . '"></td>';
                            echo '<td class="form-group"><input class="form-control iptCodVeterinario" id="iptCodVeterinario" name="iptCodVeterinario" placeholder="Cod Veterinário" value="' . $agenda[$i]->getCodVeterinario() . '"></td>';
                            echo '<td class="form-group"><input class="form-control iptDataExecucao" id="iptDataExecucao" name="iptDataExecucao" placeholder="Data Execução" value="' . $agenda[$i]->getDataExecucao() . '"></td>';
                            echo '<td class="form-group"><input class="form-control iptHoraExecucao" id="iptHoraExecucao" name="iptHoraExecucao" placeholder="Hora Execução" value="' . $agenda[$i]->getHoraExecucao() . '"></td>';
                            echo '<input type="hidden" name="codAgendamento" value="' . $i . '">';
                            echo '<input type="hidden" name="codEdit" value="' . $agenda[$i]->getCodAgendamento() . '">';
                            echo '<td class="iconesInserir"><button type="submit" value="submit request" class="fas fa-check btnIns" name="confirmEdit"></td>';
                        } else {
                            echo '<td>' . $agenda[$i]->getDataPrevista() . '</td>';
                            echo '<td>' . $agenda[$i]->getHoraPrevista() . '</td>';
                            echo '<td>' . $agenda[$i]->getObs() . '</td>';
                            echo '<td>' . $agenda[$i]->getCodAnimal() . '</td>';
                            echo '<td>' . $agenda[$i]->getCodServico() . '</td>';
                            echo '<td>' . $agenda[$i]->getCodVeterinario() . '</td>';
                            echo '<td>' . $agenda[$i]->getDataExecucao() . '</td>';
                            echo '<td>' . $agenda[$i]->getHoraExecucao() . '</td>';

                            echo '<input type="hidden" name="codAgendamento" value="' . $agenda[$i]->getCodAgendamento() . '">';
                            echo '<input type="hidden" name="codEdit" value="' . $agenda[$i]->getCodAgendamento() . '">';
                            echo '<td class="iconesEditar"><button class="fas fa-pen btnEdit"  name="edit' . $i . '"><button class="fas fa-trash btnDel" name="delete"></td>';
                        }
                        echo '<!--EDIT-->';
                        echo '<!--EDIT_END-->';
                        echo '</form>';
                        echo '<tr>';
                        echo '<!--' . $agenda[$i]->getCodAgendamento() . '_END-->';
                    }
                    ?>
                    <?php
                    require_once('class/AgendaExecClass.php');

                    if (isset($_POST['delete'])) {
                        $objAgendaExec = new AgendaExecClass();
                        $codNovo = $objAgendaExec->excluirAgendaExec($_POST['codAgentamento']);
                        echo '<meta http-equiv="refresh" content="0">';
                    }
                    ?>
                    <tr>

                    <form action="" method="post">
                        <td class="form-group"><?php $objAgendaExec = new AgendaExecClass();
                    echo $objAgendaExec->retProxCodAgendamento(); ?></td>                            
                        <td class="form-group"><input class="form-control iptDataPrevista" id="iptDataPrevista" name="iptDataPrevista" placeholder="Data Prevista"></td>';
                        <td class="form-group"><input class="form-control iptHoraPrevista" id="iptHoraPrevista" name="iptHoraPrevista" placeholder="Hora Prevista"></td>';
                        <td class="form-group"><input class="form-control iptObs" id="iptObs" name="iptObs" placeholder="Observações"></td>';
                        <td class="form-group"><input class="form-control iptCodAnimal" id="iptCodAnimal" name="iptCodAnimal" placeholder="Cod Animal"></td>';
                        <td class="form-group"><input class="form-control iptCodServico" id="iptCodServico" name="iptCodServico" placeholder="Cod Serviço"></td>';
                        <td class="form-group"><input class="form-control iptCodVeterinario" id="iptCodVeterinario" name="iptCodVeterinario" placeholder="Cod Veterinário"></td>';
                        <td class="form-group"><input class="form-control iptDataExecucao" id="iptDataExecucao" name="iptDataExecucao" placeholder="Data Execução"></td>';
                        <td class="form-group"><input class="form-control iptHoraExecucao" id="iptHoraExecucao" name="iptHoraExecucao" placeholder="Hora Execução"></td>';                                                                                 
                        <td class="iconesInserir"><button class="fas fa-pen btnEdit"><button class="fas fa-trash btnDel"></td>  
                                    </form>                   
                                    </tr>
                                    </table>
                                    </div>
                                    <?php
                                    require_once('class/AgendaExecClass.php');

                                    if (isset($_POST['inserir'])) {

                                        if (($_POST['iptDataPrevista'] == '') || ($_POST['iptHoraPrevista'] == '') || ($_POST['iptObs'] == '') || ($_POST['iptCodAnimal'] == '') || ($_POST['iptCodServico'] == '') || ($_POST['iptCodVeterinario'] == '') || ($_POST['iptDataExecucao'] == '') || ($_POST['iptHoraExecucao'] == '')) {
                                            echo 'ERRO';
                                        } else {
                                            $objAgendaExec = new AgendaExecClass();
                                            $codNovo = $objAgendaExec->retProxCodAgendamento();

                                            $objAgendaExec->setCodAgendamento($codNovo);
                                            $agenda[$i]->setDataPrevista($tableAgendaExec[$i]['dataPrevista']);
                                            $agenda[$i]->setHoraPrevista($tableAgendaExec[$i]['horaPrevista']);
                                            $agenda[$i]->setObs($tableAgendaExec[$i]['observacoes']);
                                            $agenda[$i]->setCodAnimal($tableAgendaExec[$i]['codAnimal']);
                                            $agenda[$i]->setCodServico($tableAgendaExec[$i]['codServico']);
                                            $agenda[$i]->setCodVeterinario($tableAgendaExec[$i]['codVeterinario']);
                                            $agenda[$i]->setDataExecucao($tableAgendaExec[$i]['dataExecucao']);
                                            $agenda[$i]->setHoraExecucao($tableAgendaExec[$i]['horaExecucao']);

                                            $objAgendaExec->inserirAgendaExec($objAgendaExec);
                                            echo '<meta http-equiv="refresh" content="0">';
                                        }
                                    }


                                    if (isset($_POST['confirmEdit'])) {

                                        if (($_POST['iptDataPrevista'] == '') || ($_POST['iptHoraPrevista'] == '') || ($_POST['iptObs'] == '') || ($_POST['iptCodAnimal'] == '') || ($_POST['iptCodServico'] == '') || ($_POST['iptCodVeterinario'] == '') || ($_POST['iptDataExecucao'] == '') || ($_POST['iptHoraExecucao'] == '')) {
                                            echo 'ERRO';
                                        } else {
                                            $objAgendaExec = new AgendaExecClass();
                                            $codNovo = $_POST['codEdit'];

                                            $objAgendaExec->setCodAgendamento($codNovo);
                                            $agenda[$i]->setDataPrevista($tableAgendaExec[$i]['dataPrevista']);
                                            $agenda[$i]->setHoraPrevista($tableAgendaExec[$i]['horaPrevista']);
                                            $agenda[$i]->setObs($tableAgendaExec[$i]['observacoes']);
                                            $agenda[$i]->setCodAnimal($tableAgendaExec[$i]['codAnimal']);
                                            $agenda[$i]->setCodServico($tableAgendaExec[$i]['codServico']);
                                            $agenda[$i]->setCodVeterinario($tableAgendaExec[$i]['codVeterinario']);
                                            $agenda[$i]->setDataExecucao($tableAgendaExec[$i]['dataExecucao']);
                                            $agenda[$i]->setHoraExecucao($tableAgendaExec[$i]['horaExecucao']);

                                            $objAgendaExec->editarAgendaExec($objAgendaExec);
                                            echo '<meta http-equiv="refresh" content="0">';
                                        }
                                    }
                                    ?>
                                    <script>
                                        $('#styleTable tr').mouseenter(function () {
                                            $(this).find('td.iconesEditar').addClass('show');
                                        });

                                        $('#styleTable tr').mouseleave(function () {
                                            $(this).find('td.iconesEditar').removeClass('show');
                                        });

                                    </script>
                                    </body>
                                    </html>
