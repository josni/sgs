<?php

include('../../config/ssp.class.php');
ini_set("memory_limit","128M");

$table = "cidade";
$join = "inner join estado on cidade.id_estado_cidade = estado.id_estado";

// Table's primary key
$primaryKey = 'id_cidade';

// Array of database columns which should be read and sent back to DataTables. The `db` parameter represents the column name in the database
//, while the `dt` parameter represents the DataTables column identifier.
$columns = array(
	array( 'db' => 'id_cidade', 'dt' => 0),
	array( 'db' => 'nome_cidade', 'dt' => 1),
	array( 'db' => 'uf', 'dt' => 2 ),
	array( 'db' => 'status_cidade', 'dt' => 3 ),
	array( 'db' => 'id_cidade', 'dt' => 4)
);


	//Parámetros de conexión
include('../../config/conexao.php');

echo json_encode(
 SSP::simple( $_GET, $pg_details, $table, $primaryKey, $columns, $join )
);

?>