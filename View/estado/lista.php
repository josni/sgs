<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
<link rel="stylesheet" type="text/css" href="../../assets/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="../../assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').dataTable( {
                responsive: true,
                'processing': true,
                'paging': true,
                'serverSide': true,
                'ajax': 'post.php',
                "aLengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
                "sPaginationType": "full_numbers",
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
            },
            "columnDefs": [ 
                {
                    "render": function (data, type, row) {
                        return (data === true) ? 'Não' : 'Sim';
                    },
                    "targets": 2
                },
                {
                    "render": function (data, type, row) {
                        return "<div class='input-prepend'><a href='cadastro.php?id="+data+"'> <span class='add-on'><i class='icon-search'></i></span></a></div><div class='input-prepend'><a href='cadastro.php?id="+data+"'><span class='add-on'><i class='icon-edit'></i></span></a></div>";
                    },
                    "targets": 3
                }
            ]
        });
    });
</script>
        <table id="example" class="table table-striped table-bordered">
                <div class="input-prepend">
                   <span class="add-on"><i class="icon-plus"></i></span>
                   <input type="button" class="btn btn-success" value="NOVO" onclick="window.location='cadastro.php';" >
                </div>
                <thead>
                    <tr class="alert alert-danger">
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">UF</th>
                        <th style="text-align:center;">Ativo</th>
                        <th style="text-align:center;">Opera&ccedil;&atilde;o</th>
                    </tr>
                </thead>                          
            </table>
        </div>
    </body>
</html>
