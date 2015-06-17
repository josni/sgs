<!DOCTYPE html>
<?php 
   session_start(); 
   if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
       unset($_SESSION['login']); 
       unset($_SESSION['senha']); 
       header('location:../sgs/View/login/login.php'); 
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
    <script type="text/javascript" charset="utf8" src="../../assets/js/configDataTable.js"></script>

    <!-- validate !-->
    <script src="../../assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="../../assets/js/validacao.js" type="text/javascript"></script>
    <link href="../../assets/css/css.css" rel="stylesheet" type="text/css"/> 
    <script src="/funcoesGerais.js"></script> 

    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- maps !-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="../../assets/js/map.js"></script>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Sindicatos - SGS</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="/funcoesGerais.js"></script> 
    <script>
        
function cad_socio(){
        $.ajax({
            url: 'View/socio/cadastro.php',
           success: function(data) {
                $('#conteudo').html(data);
           }
        });
    }

function lista_socio(){
    $.ajax({
        url: 'View/socio/lista.php',
       success: function(data) {
            $('#conteudo').html(data);

       }
    });
}
function cad_naoSocio(){
            $.ajax({
                url: 'View/naoSocio/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_naoSocio(){
    $.ajax({
        url: 'View/naoSocio/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
function cad_arquivo(){
            $.ajax({
                url: 'View/arquivo/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_arquivo(){
    $.ajax({
        url: 'View/arquivo/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
function cad_tipoArquivo(){
            $.ajax({
                url: 'View/tipoArquivo/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_tipoArquivo(){
    $.ajax({
        url: 'View/tipoArquivo/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
function cad_documento(){
            $.ajax({
                url: 'View/documento/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_documento(){
    $.ajax({
        url: 'View/documento/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
function cad_tipoDocumento(){
            $.ajax({
                url: 'View/tipoDocumento/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_tipoDocumento(){
    $.ajax({
        url: 'View/tipoDocumento/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
function cad_propriedade(){
            $.ajax({
                url: 'View/propriedade/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_propriedade(){
    $.ajax({
        url: 'View/propriedade/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
function cad_estado(){
            $.ajax({
                url: 'View/estado/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_estado(){
    $.ajax({
        url: 'View/estado/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
function cad_cidade(){
            $.ajax({
                url: 'View/cidade/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_cidade(){
    $.ajax({
        url: 'View/cidade/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
function cad_tipoAssociacao(){
            $.ajax({
                url: 'View/tipoAssociacao/cadastro.php',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

function lista_tipoAssociacao(){
    $.ajax({
        url: 'View/tipoAssociacao/lista.php',
       success: function(data) {
            $('#conteudo').html(data);
       }
    });
}
    </script>
    
              

</head>
<body>
   <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                             <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar collapsed"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="../../index.php" class="brand">SGS</a>
                            <div class="nav-collapse navbar-responsive-collapse collapse">
                                <ul id="menu" class="nav">
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
                                                    <a href="#" onclick="cad_socio()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar sócio</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_socio()"><i class="icon-list">&nbsp;</i>&nbsp;Listar sócio</a>
                                                </li>
                                                 </ul>
                                            </li>
                                             <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Não Socio<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                            
                                                <li>
                                                    <a href="#" onclick="cad_naoSocio()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar não sócio</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_naoSocio()"><i class="icon-list">&nbsp;</i>&nbsp;Listar não sócio</a>
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
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Arquivo<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="cad_arquivo()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Arquivo</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_arquivo()"><i class="icon-list">&nbsp;</i>&nbsp;Listar Arquivo</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="cad_tipoArquivo()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Tipo de Arquivo</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="cad_tipoArquivo()"><i class="icon-list">&nbsp;</i>&nbsp;Listar Tipo de Arquivo</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Documento<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="cad_documento()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Documento</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_documento()"><i class="icon-list">&nbsp;</i>&nbsp;Listar Documento</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="cad_tipoDocumento()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Tipo de Documento</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_tipoDocumento()"><i class="icon-list">&nbsp;</i>&nbsp;Listar Tipo de Documento</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                 <a data-toggle="dropdown" class="dropdown-toggle" href="#">Propridade<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="cad_propriedade()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar Propriedade</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_tipoDocumento()"><i class="icon-list">&nbsp;</i>&nbsp;Listar Propriedade</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Estado<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="cad_estado()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar estado</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_estado()"><i class="icon-list">&nbsp;</i>&nbsp;Listar estado</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Cidade<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="cad_cidade()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar cidade</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_cidade()"><i class="icon-list">&nbsp;</i>&nbsp;Listar cidade</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tipo de Associacao<strong class="caret"></strong></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="cad_tipoAssociacao()"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar tipo de associacao</a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="lista_tipoAssociacao()"><i class="icon-list">&nbsp;</i>&nbsp;Listar tipo de associacao</a>
                                                </li>
                                            </ul>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Relatórios<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav pull-right">
                                    <li class="dropdown">
                                         <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-thumbs-up">&nbsp;</i>&nbsp; <?php echo $nome;?> Bem Vindo!!!</i><strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#"><i class="icon-wrench">&nbsp;</i>&nbsp;Editar Perfil</a></li>
                                            </li>
                                            <li>
                                                <a href="../sgs/View/login/logout.php"><i class="icon-off">&nbsp;</i>&nbsp;Logout</a></li>
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
    </div>