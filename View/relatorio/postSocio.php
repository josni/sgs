<?php

include('../../config/ssp.class.php');
ini_set("memory_limit","128M");

$table = "socio";
$join = "inner join pessoa on socio.id_pessoa_socio = pessoa.id_pessoa inner join cidade on pessoa.id_cidade_pessoa = cidade.id_cidade inner join estado on cidade.id_estado_cidade = estado.id_estado";

// Table's primary key
$primaryKey = 'id_pessoa_socio';

// Array of database columns which should be read and sent back to DataTables. The `db` parameter represents the column name in the database
//, while the `dt` parameter represents the DataTables column identifier.
$columns = array(
	array( 'db' => 'nome', 'dt' => 0 ),
	array( 'db' => 'cpf', 'dt' => 1 ),
	array( 'db' => 'rg', 'dt' => 2 ),
	array( 'db' => 'rua', 'dt' => 3 ),
	array( 'db' => 'cep', 'dt' => 4 ),
	array( 'db' => 'bairro', 'dt' => 5 ),
	array( 'db' => 'nome_cidade', 'dt' => 6 ),
	array( 'db' => 'uf', 'dt' => 7 ),
	array( 'db' => 'email', 'dt' => 8 ),
	array( 'db' => 'est_civil', 'dt' => 9 ),
	array( 'db' => 'status_pessoa', 'dt' => 10 )
);


	//Parámetros de conexión
include('../../config/conexao.php');

echo json_encode(
 SSP::simple( $_GET, $pg_details, $table, $primaryKey, $columns, $join )
);

?>