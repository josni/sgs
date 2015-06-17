<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

<link rel="stylesheet" type="text/css" href="../../assets/media/css/tableTools.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="../../assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../../assets/media/js/TableTools.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example tfoot th').each( function () {
            var title = $('#example thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" class="input-block-level" placeholder="'+title+'" />' );
        } );
        $('#example').addClass('no-wrap');
        var table = $('#example').DataTable( {
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
            "sSwfPath": "/sgs/assets/media/swf/copy_csv_xls_pdf.swf",
            "aButtons": [ "copy", "csv", "xls", "pdf", "print" ]
            },
            'processing': true,
            'paging': true,
            'serverSide': true,
            'ajax': 'postSocio.php',
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
                    "targets": 10
                }
            ]
        });

        table.columns().every( function () {
            var that = this;
     
            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                    .search( this.value )
                    .draw();
            } );
        } );
    });
</script>
           <h4 class="alert alert-success">Listagem de Associados</h4>
           <table id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">
                <thead>
                    <tr class="alert alert-danger">
                        <th style="text-align:center;">Nome</th>
                        <th style="text-align:center;">Cpf</th>
                        <th style="text-align:center;">Rg</th>
                        <th style="text-align:center;">Endereço</th>
                        <th style="text-align:center;">Cep</th>
                        <th style="text-align:center;">Bairro</th>                        
                        <th style="text-align:center;">Cidade</th>
                        <th style="text-align:center;">Estado</th>
                        <th style="text-align:center;">email</th>
                        <th style="text-align:center;">Estado Civil</th>
                        <th style="text-align:center;">Ativo</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>   
                </tfoot>
            </table>
        </div>
    </body>
</html>