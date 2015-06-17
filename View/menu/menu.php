<!DOCTYPE html>
<?php 
   session_start(); 
   if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
       unset($_SESSION['login']); 
       unset($_SESSION['senha']); 
       header('location:../login/login.php'); 
   }else{ 
   $logado = $_SESSION['login'];
   $nome = $_SESSION['nome'];
   $admin = $_SESSION['admin'];
   }

?>
<html lang="pt">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Sindicatos - SGS</title>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../../assets/css/font-awesome.css" rel="stylesheet">

    <!--data table!-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="../../assets/js/jquery.dataTables.js"></script>  
    <script type="text/javascript" charset="utf8" src="../../assets/js/funcaoForm.js"></script>

    <!-- validate !-->
    <script src="../../assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="../../assets/js/validacao.js" type="text/javascript"></script>
    <link href="../../assets/css/css.css" rel="stylesheet" type="text/css"/> 

    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- maps !-->
   

</head>
<body>

<div class="row-fluid">
            <div class="span12">
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                             <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar collapsed"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="../../index.php" class="brand">SGS</a>
                            <div class="nav-collapse navbar-responsive-collapse collapse">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="../../index.php">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-plus">&nbsp;</i>Cadastros<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="../../View/tipoAssociacao/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar tipo de associacao</a>
                                            </li>
                                            <li>
                                                <a href="../../View/socio/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar S&oacute;cio</a>
                                            </li>
                                            <li>
                                                <a href="../../View/naoSocio/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar N&atilde;o S&oacute;cio</a>
                                            </li>
                                            <?php if($admin == true){?>
                                            <li>
                                                <a href="../../View/funcionario/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar Funcion&aacute;rio</a>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a href="../../View/estado/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar Estado</a>
                                            </li>
                                            <li>
                                                <a href="../../View/cidade/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar Cidade</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav">
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list">&nbsp;</i>Listagem<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">  
                                            <li>
                                                <a href="../../View/tipoAssociacao/lista.php"><i class="icon-list">&nbsp;</i>Listar tipo de associacao</a>
                                            </li>                                                                                
                                            <li>
                                                <a href="../../View/socio/lista.php"><i class="icon-list">&nbsp;</i>Listar S&oacute;cio</a>
                                            </li>
                                            <?php if($admin == true){?>
                                            <li>
                                                <a href="../../View/funcionario/lista.php"><i class="icon-list">&nbsp;</i>Listar Funcion&aacute;rio</a>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a href="../../View/naoSocio/lista.php"><i class="icon-list">&nbsp;</i>Listar N&atilde;o S&oacute;cio</a>
                                            </li>
                                            <li>
                                                <a href="../../View/cidade/lista.php"><i class="icon-list">&nbsp;</i>Listar Cidade</a>
                                            </li>
                                            <li>
                                                <a href="../../View/estado/lista.php"><i class="icon-list">&nbsp;</i>Listar Estado</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav">
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-filter">&nbsp;</i>Relatórios<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">  
                                            <li>
                                                <a href="../../View/relatorio/listaSocio.php"><i class="icon-filter">&nbsp;</i>Associados</a>
                                            </li>                                                                                
                                            <li>
                                                <a href="../../View/relatorio/listaNaoSocio.php"><i class="icon-filter">&nbsp;</i>Não sócios</a>
                                            </li>
                                            <li>
                                                <a href="../../View/relatorio/mapa.php"><i class="icon-filter">&nbsp;</i>Mapa</a>
                                            </li>
                                            <li>
                                                <a href="../../View/relatorio/evolucao.php"><i class="icon-filter">&nbsp;</i>Evolução dos Associados</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav pull-right">
                                    <li class="dropdown">
                                         <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-thumbs-up">&nbsp;</i>&nbsp; <?php echo $nome;?> Bem Vindo!!!<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#"><i class="icon-wrench">&nbsp;</i>&nbsp;Editar Perfil</a>
                                            </li>
                                            <li>
                                                <a href="../../View/login/logout.php"><i class="icon-off">&nbsp;</i>&nbsp;Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>                        
                        </div>
                    </div>                
                </div>
            </div>
        </div>



<!--     
   <div id="menu" class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="navbar navbar-fixed-top" >
                    <div class="navbar-inner">
                        <div class="container-fluid">
                             <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar collapsed"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="../../index.php" class="brand">SGS</a>
                            <div class="nav-collapse navbar-responsive-collapse collapse">
                                <ul class="nav">
                                    <li>
                                        <a href="../../index.php">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Cadastros<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                             <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Socio<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                            
                                                <li>
                                                    <a href="../../View/socio/cadastro.php" id="cadastro"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar sócio</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/socio/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar sócio</a>
                                                </li>
                                                 </ul>
                                            </li>
                                             <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Não Socio<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                            
                                                <li>
                                                    <a href="../../View/naoSocio/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar não sócio</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/naoSocio/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar não sócio</a>
                                                </li>
                                                 </ul>
                                            </li>
                                            <?php if($admin == true){?>
                                            <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Funcionario<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="../../View/funcionario/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar funcionário</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/funcionario/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar funcionário</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <?php } ?>
                                            <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dependente<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="../../View/dependente/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Dependente</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/dependente/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Dependente</a>
                                                </li>
                                            </ul>
                                            </li>
                                             <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Arquivo<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="../../View/arquivo/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Arquivo</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/arquivo/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Arquivo</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/tipoArquivo/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Tipo de Arquivo</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/tipoArquivo/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Tipo de Arquivo</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Documento<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="../../View/documento/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Documento</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/documento/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Documento</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/tipoDocumento/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Tipo de Documento</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/tipoDocumento/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Tipo de Documento</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Propridade<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="../../View/propriedade/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Propriedade</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/propriedade/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Propriedade</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Produção<strong class="caret"></strong></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="../../View/producao/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Produção</a>
                                                    </li>
                                                    <li>
                                                        <a href="../../View/producao/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Produção</a>
                                                    </li>
                                                    <li>
                                                        <a href="../../View/unidadeProducao/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Unidade de Produção</a>
                                                    </li>
                                                    <li>
                                                        <a href="../../View/unidadeProducao/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Unidade Produção</a>
                                                    </li>
                                                    <li>
                                                        <a href="../../View/tipoUnidadeProducao/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Tipo de Unidade de Produção</a>
                                                    </li>
                                                    <li>
                                                        <a href="../../View/tipoUnidadeProducao/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar Tipo de Unidade de Produção</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Estado<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="../../View/estado/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar estado</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/estado/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar estado</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Cidade<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="../../View/cidade/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar cidade</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/cidade/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar cidade</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tipo de Associacao<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="../../View/tipoAssociacao/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar tipo de associacao</a>
                                                </li>
                                                <li>
                                                    <a href="../../View/tipoAssociacao/lista.php"><i class="icon-list">&nbsp;</i>&nbsp;Listar tipo de associacao</a>
                                                </li>
                                            </ul>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Relatórios<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                 <a href="#"><i class="icon-list">&nbsp;</i>&nbsp;Socio</a>
                                            </li>
                                            <li>
                                                 <a href="#"><i class="icon-list">&nbsp;</i>&nbsp;N&atilde;o Socio</a>
                                            </li>
                                            <li>
                                                 <a href="#"><i class="icon-list">&nbsp;</i>&nbsp;Dependentes</a>
                                            </li>
                                            <li>
                                                 <a href="#"><i class="icon-list">&nbsp;</i>&nbsp;Evolu&ccedil;&atilde;o dos Socios</a>
                                            </li>
                                           
                                        </ul>
                                    </li>
                                </ul>
                                
                                    <ul class="nav pull-right">
                                    <li class="dropdown">
                                         <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-thumbs-up">&nbsp;</i>&nbsp; <?php echo $nome;?> Bem Vindo!!!<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="../funcionario/perfil.php"><i class="icon-wrench">&nbsp;</i>&nbsp;Editar Perfil</a>
                                            </li>
                                            <li>
                                                <a href="../login/logout.php"><i class="icon-off">&nbsp;</i>&nbsp;Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>                        
                        </div>
                    </div>                
                </div>
            </div>
        </div> -->