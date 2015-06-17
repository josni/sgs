<?php

include('../../config/ssp.class.php');
ini_set("memory_limit","128M");

$table = "propriedade";
$join = "inner join socio on propriedade.id_pessoa_prop = socio.id_pessoa_socio inner join pessoa on socio.id_pessoa_socio = pessoa.id_pessoa";

// Table's primary key
$primaryKey = 'id_prop';

// Array of database columns which should be read and sent back to DataTables. The `db` parameter represents the column name in the database
//, while the `dt` parameter represents the DataTables column identifier.
$columns = array(
	array( 'db' => 'nome', 'dt' => 0 ),
	array( 'db' => 'nome_prop', 'dt' => 1 ),
	array( 'db' => 'latitude', 'dt' => 2 ),
	array( 'db' => 'longitude', 'dt' => 3 )
);


	//Parámetros de conexión
include('../../config/conexao.php');

echo json_encode(
 SSP::simple( $_GET, $pg_details, $table, $primaryKey, $columns, $join )
);

?>