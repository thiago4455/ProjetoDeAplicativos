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
                    <button class="ativo">Cliente</button>
                    <button onclick="location.href='funcionario.php';">Funcionario</button>
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
                    
                    <tr>
                        <td>CLIC001</td> 
                        <td>07/11/2018</td>                                                  
                        <td>01/01/2000</td>                           
                        <td>Ronie Lima</td>                           
                        <td>ronie@gmail.com</td>                                                                                                 
                        <td>MG8.888.888</td>                                                  
                        <td>(31)8999-9999</td>                                                   
                        <td>Av. Da casa Dele, 355</td>                                                   
                        <td>Centro</td>                                                                        
                        <td>Betim</td>                           
                        <td>MG</td>                           
                        <td>Brasil</td>                           
                    </tr>
                        <tr>
                        <form action="" method="post">
                           <td class="form-group"><input class="form-control iptCod" id="iptCod" name="iptCod" placeholder="Código"></td> 
                           <td class="form-group">14/11/2018</td>                                                  
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
                           <td class="iconesEditar"></td>  
                        </form>                   
                        </tr>
                    </table>
                </div>
            </body>