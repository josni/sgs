<?php

include('../../config/ssp.class.php');
ini_set("memory_limit","128M");

$table = "nao_socio";
$join = "inner join pessoa  on  nao_socio.id_pessoa_nao_socio = pessoa.id_pessoa";

// Table's primary key
$primaryKey = 'id_pessoa_nao_socio';

// Array of database columns which should be read and sent back to DataTables. The `db` parameter represents the column name in the database
//, while the `dt` parameter represents the DataTables column identifier.
$columns = array(
	array( 'db' => 'id_pessoa_nao_socio', 'dt' => 0),
	array( 'db' => 'nome', 'dt' => 1),
	array( 'db' => 'bairro', 'dt' => 2 ),
	array( 'db' => 'data_cadastro', 'dt' => 3 ),
	array( 'db' => 'id_pessoa_nao_socio', 'dt' => 4)
);


	//Parámetros de conexión
include('../../config/conexao.php');

echo json_encode(
 SSP::simple( $_GET, $pg_details, $table, $primaryKey, $columns, $join )
);

?>