<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<link rel="stylesheet" type="text/css" href="../../assets/media/css/tableTools.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="../../assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../../assets/media/js/TableTools.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            responsive: true,
            'processing': true,
            'paging': true,
            'serverSide': true,
            'ajax': 'postMapa.php',
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
            "columns": [
		    null,
		    { className: "prop" },
		    { className: "lat" },
		    { className: "lng" }
		  ]
	});	
});

var map;
var marker;

function initialize() {
   	var mapOptions = {
      center: new google.maps.LatLng(-25.433043, -49.994659),
      zoom: 10,
      mapTypeId: google.maps.MapTypeId.SATELLITE
   	};

   	map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
   	setTimeout(function(){
   	latitudes = $("td.lat");
    longitudes = $("td.lng");
    propriedade = $("td.prop"); 

    var myLatlng;

    var lenthObj = latitudes.length;

    for (var i = 0; i < lenthObj; i++) {
    	myLatlng = new google.maps.LatLng(latitudes[i].innerHTML,longitudes[i].innerHTML);
    	addMarker(myLatlng);
    };
    var prop;
    for (var i = 0; i < propriedade.length; i++) {
        prop = propriedade[i].innerHTML;
    };
    
   },2000);
}

google.maps.event.addDomListener(window, 'load', initialize);

function addMarker(myLatlng){
	var iconBase = '../../assets/maps/';
	var marker = new google.maps.Marker({
	    position: myLatlng,
	    icon: iconBase + 'farm-2.png',
	    title:"propriedade" + propriedade
	});
	marker.setMap(map);
}



</script>
           <h4 class="alert alert-success">Mapa dos Agricultores de STR Palmeira</h4>
           <table id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">
                <thead>
                    <tr class="alert alert-danger">
                        <th style="text-align:center;">Nome</th>
                        <th style="text-align:center;">Propriedade</th>
                        <th style="text-align:center;">Latitude</th>
                        <th style="text-align:center;">Longitude</th>
                    </tr>
                </thead>
            </table>
            <div id="mapa" style="height: 400px; width: auto"></div><br />
        </div>
    </body>
</html>