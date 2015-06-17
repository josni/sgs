<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
<link rel="stylesheet" type="text/css" href="../../assets/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="../../assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').dataTable( {
            responsive: true,
            'processing': true,
            'searching': false,
            'paging': false,
            "aLengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
            "sPaginationType": "full_numbers",
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "",
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
    });
});
</script>

<script src="../../assets/js/Chart.min.js"></script>
    <style type="text/css">
        .box-chart {
            width: 70%;
            margin: 0 auto;
            padding: 10px;
        }
    </style>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/relatorio.class.php');
    $objRelatorio = new Relatorio();
    $listaEvolucao = $objRelatorio->getEvolucao();
    $intAno1 = date('Y');
    $intAno2 = $intAno1-1;
    $intAno3 = $intAno1-2;
    $ano1 = $objRelatorio->getAssociadosAno($intAno1);
    $ano2 = $objRelatorio->getAssociadosAno($intAno2);
    $ano3 = $objRelatorio->getAssociadosAno($intAno3);
?>
           <h4 class="alert alert-success">Evolução do Sócios</h4>
           <table id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">
                <thead>
                    <tr class="alert alert-danger">
                        <th style="text-align:center;">Ano</th>
                        <th style="text-align:center;">Jan</th>
                        <th style="text-align:center;">Fev</th>
                        <th style="text-align:center;">Mar</th>
                        <th style="text-align:center;">Abr</th>
                        <th style="text-align:center;">Mai</th>                        
                        <th style="text-align:center;">Jun</th>
                        <th style="text-align:center;">Jul</th>
                        <th style="text-align:center;">Ago</th>
                        <th style="text-align:center;">Set</th>
                        <th style="text-align:center;">Out</th>
                        <th style="text-align:center;">Nov</th>
                        <th style="text-align:center;">Dez</th>
                        <th style="text-align:center;">Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i=0; $i<count($listaEvolucao); $i++){?>
                    <tr>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['ano']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['jan']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['fev']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['mar']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['abr']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['mai']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['jun']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['jul']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['ago']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['set']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['out']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['nov']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['dez']; ?></td>
                        <td style="text-align:center;"><?php echo $listaEvolucao[$i]['total']; ?></td>
                    </tr>
                <?php } ?>  
                </tbody>
            </table>
           <h4 class="alert alert-success">Total de associados por período</h4>
            <div class="box-chart">
                <canvas id="GraficoLine" style="width:100%;"></canvas>
                <script type="text/javascript">
                    var options = {
                        responsive:true
                    };
                    var data = {
                        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                            datasets: [
                                {
                                    label: "<?php echo $intAno1;?>",
                                    fillColor: "rgba(151,187,205,0)",
                                    strokeColor: "rgba(151,187,205,1)",
                                    pointColor: "rgba(151,187,205,1)",
                                    pointStrokeColor: "151,187,205,1",
                                    pointHighlightFill: "151,187,205,1",
                                    pointHighlightStroke: "rgba(151,187,205,1)",
                                    data: [<?php for($i=0; $i<count($ano1); $i++){
                                        echo 
                                        $ano1[$i]['jan'] . ',' . 
                                        $ano1[$i]['fev'] . ',' . 
                                        $ano1[$i]['mar']. ',' . 
                                        $ano1[$i]['abr'] . ',' . 
                                        $ano1[$i]['mai'] . ',' . 
                                        $ano1[$i]['jun'] . ',' . 
                                        $ano1[$i]['jul'] . ',' . 
                                        $ano1[$i]['ago'] . ',' . 
                                        $ano1[$i]['set'] . ',' . 
                                        $ano1[$i]['out'] . ',' . 
                                        $ano1[$i]['nov'] . ',' . 
                                        $ano1[$i]['dez']; }?>]                               
                                },
                                {
                                    label: "<?php echo $intAno2;?>",
                                    fillColor: "rgba(255,0,0,0)",
                                    strokeColor: "rgba(255,0,0,1)",
                                    pointColor: "rgba(255,0,0,1)",
                                    pointStrokeColor: "255,0,0,1",
                                    pointHighlightFill: "255,0,0,1",
                                    pointHighlightStroke: "rgba(255,0,0,1)",
                                    data: [<?php for($i=0; $i<count($ano1); $i++){
                                        echo 
                                        $ano2[$i]['jan'] . ',' . 
                                        $ano2[$i]['fev'] . ',' . 
                                        $ano2[$i]['mar']. ',' . 
                                        $ano2[$i]['abr'] . ',' . 
                                        $ano2[$i]['mai'] . ',' . 
                                        $ano2[$i]['jun'] . ',' . 
                                        $ano2[$i]['jul'] . ',' . 
                                        $ano2[$i]['ago'] . ',' . 
                                        $ano2[$i]['set'] . ',' . 
                                        $ano2[$i]['out'] . ',' . 
                                        $ano2[$i]['nov'] . ',' . 
                                        $ano2[$i]['dez']; }?>]                               
                                },{
                                    label: "<?php echo $intAno3;?>",
                                    fillColor: "rgba(0,255,0,0)",
                                    strokeColor: "rgba(0,255,0,1)",
                                    pointColor: "rgba(0,255,0,1)",
                                    pointStrokeColor: "0,255,0,1",
                                    pointHighlightFill: "0,255,0,1",
                                    pointHighlightStroke: "rgba(0,255,0,1)",
                                    data: [<?php for($i=0; $i<count($ano1); $i++){
                                        echo 
                                        $ano3[$i]['jan'] . ',' . 
                                        $ano3[$i]['fev'] . ',' . 
                                        $ano3[$i]['mar']. ',' . 
                                        $ano3[$i]['abr'] . ',' . 
                                        $ano3[$i]['mai'] . ',' . 
                                        $ano3[$i]['jun'] . ',' . 
                                        $ano3[$i]['jul'] . ',' . 
                                        $ano3[$i]['ago'] . ',' . 
                                        $ano3[$i]['set'] . ',' . 
                                        $ano3[$i]['out'] . ',' . 
                                        $ano3[$i]['nov'] . ',' . 
                                        $ano3[$i]['dez']; }?>]                               
                                },

                            ]
                    };           
                    window.onload = function(){

                        var ctx = document.getElementById("GraficoLine").getContext("2d");
                        var LineChart = new Chart(ctx).Line(data, options);
                    }  
                </script>
            </div>
        </div>
    </body>
</html>