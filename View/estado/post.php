<?php

include('../../config/ssp.class.php');
ini_set("memory_limit","128M");

$table = "estado";
// Table's primary key
$primaryKey = 'id_estado';
$join = "";

// Array of database columns which should be read and sent back to DataTables. The `db` parameter represents the column name in the database
//, while the `dt` parameter represents the DataTables column identifier.
$columns = array(
	array( 'db' => 'id_estado', 'dt' => 0),
	array( 'db' => 'uf', 'dt' => 1 ),
	array( 'db' => 'status', 'dt' => 2 ),
	array( 'db' => 'id_estado', 'dt' => 3)
);


	//Parámetros de conexión
include('../../config/conexao.php');

echo json_encode(
 SSP::simple( $_GET, $pg_details, $table, $primaryKey, $columns, $join)
);

?>