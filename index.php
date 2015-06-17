<!DOCTYPE html>
<?php 
   session_start(); 
   if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) { 
       unset($_SESSION['login']); 
       unset($_SESSION['senha']); 
       header('location:View/login/login.php'); 
   }else{ 
   $logado = $_SESSION['login'];
   $nome = $_SESSION['nome'];
   $admin = $_SESSION['admin'];
   $usuario = $_SESSION['id_pessoa'];
   }

?>
<html lang="pt">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Sindicatos - SGS</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="assets/media/css/tableTools.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="assets/js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="assets/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.responsive.css">
<script type="text/javascript" charset="utf-8" src="assets/media/js/TableTools.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable( {
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                "sSwfPath": "/sgs/assets/media/swf/copy_csv_xls_pdf.swf",
                "aButtons": [ "copy", "csv", "xls", "pdf", "print" ]
                },
                'processing': true,
                'paging': true,
                "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'TUDO']],
                "sPaginationType": "full_numbers",
                "aaSorting": [[1, "asc" ]],
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            } );
        });
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                             <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar collapsed"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="index.php" class="brand">SGS</a>
                            <div class="nav-collapse navbar-responsive-collapse collapse">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-plus">&nbsp;</i>Cadastros<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="View/tipoAssociacao/cadastro.php"><i class="icon-plus">&nbsp;</i>&nbsp;Cadastrar tipo de associacao</a>
                                            </li>
                                            <li>
                                                <a href="View/socio/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar S&oacute;cio</a>
                                            </li>
                                            <li>
                                                <a href="View/naoSocio/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar N&atilde;o S&oacute;cio</a>
                                            </li>
                                            <?php if($admin == true){?>
                                            <li>
                                                <a href="View/funcionario/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar Funcion&aacute;rio</a>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a href="View/estado/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar Estado</a>
                                            </li>
                                            <li>
                                                <a href="View/cidade/cadastro.php"><i class="icon-plus">&nbsp;</i>Cadastrar Cidade</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav">
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list">&nbsp;</i>Listagem<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">  
                                            <li>
                                                <a href="View/tipoAssociacao/lista.php"><i class="icon-list">&nbsp;</i>Listar tipo de associacao</a>
                                            </li>                                                                                
                                            <li>
                                                <a href="View/socio/lista.php"><i class="icon-list">&nbsp;</i>Listar S&oacute;cio</a>
                                            </li>
                                            <?php if($admin == true){?>
                                            <li>
                                                <a href="View/funcionario/lista.php"><i class="icon-list">&nbsp;</i>Listar Funcion&aacute;rio</a>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a href="View/naoSocio/lista.php"><i class="icon-list">&nbsp;</i>Listar N&atilde;o S&oacute;cio</a>
                                            </li>
                                            <li>
                                                <a href="View/cidade/lista.php"><i class="icon-list">&nbsp;</i>Listar Cidade</a>
                                            </li>
                                            <li>
                                                <a href="View/estado/lista.php"><i class="icon-list">&nbsp;</i>Listar Estado</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav">
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-filter">&nbsp;</i>Relatórios<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">  
                                            <li>
                                                <a href="View/relatorio/listaSocio.php"><i class="icon-filter">&nbsp;</i>Associados</a>
                                            </li>                                                                                
                                            <li>
                                                <a href="View/relatorio/listaNaoSocio.php"><i class="icon-filter">&nbsp;</i>Não sócios</a>
                                            </li>
                                            <li>
                                                <a href="View/relatorio/mapa.php"><i class="icon-filter">&nbsp;</i>Mapa</a>
                                            </li>
                                            <li>
                                                <a href="View/relatorio/evolucao.php"><i class="icon-filter">&nbsp;</i>Evolução dos Associados</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                 <ul class="nav pull-right">
                                    <li class="dropdown">
                                         <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-thumbs-up">&nbsp;</i>&nbsp; <?php echo $nome;?> Bem Vindo!!!<strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="View/funcionario/perfil.php?id=<?php echo $usuario; ?>"><i class="icon-wrench"> </i> Editar Perfil</a></li>
                                            </li>
                                            <li>
                                                <a href="View/login/logout.php"><i class="icon-off">&nbsp;</i>&nbsp;Logout</a>
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
<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/relatorio.class.php');
    $objRelatorio = new Relatorio();
    $listaAniversariante = $objRelatorio->getAniversariante();
    $listaAssociados = $objRelatorio->getNovosAssociados();
?>
<div style="padding-top: 50px">
    <h2 class="alert alert-success">Aniversariantes próximos 7 dias</h2>
        <table id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">
            <thead>
                <tr class="alert alert-danger">
                    <th style="text-align:center;">Nome</th>
                    <th style="text-align:center;">Data</th>
                    <th style="text-align:center;">Idade</th>
                    <th style="text-align:center;">Localidade</th>
                </tr>
            </thead>                
            <tbody>
            <?php for($i=0; $i<count($listaAniversariante); $i++){?>
                <tr>
                    <td style="text-align:center;"><?php echo $listaAniversariante[$i]['nome']; ?></td>
                    <td style="text-align:center;"><?php $aux = $listaAniversariante[$i]['prox_aniver']; $data = explode(' ', $aux); echo $data[0]; ?></td>
                    <td style="text-align:center;"><?php echo $listaAniversariante[$i]['idade']; ?></td>
                    <td style="text-align:center;"><?php echo $listaAniversariante[$i]['bairro']; ?></td>
                </tr>
            <?php } ?>
            </tbody>               
        </table>
</div>
    </body>
</html>
