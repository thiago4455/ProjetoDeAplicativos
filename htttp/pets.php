<!DOCTYPE>

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
                        <button class="fas fa-sign-out-alt fa-2x logut iconeVoltar"></button>

                    </ul>
                </div>
            </div>
                <div class="navbar">
                    <button onclick="location.href='cliente.php';">Cliente</button>
                    <button onclick="location.href='funcionario.php';">Funcionario</button>
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
                           <td class="iconesEditar"></td>  
                        </form>                   
                        </tr>
                    </table>
                </div>
            </body>