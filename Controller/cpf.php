<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/funcionario.class.php');
$objFuncionario = new Funcionario();
$objCpf = $objFuncionario->getCpf($_POST['cpf']);

if( count($objCpf) == 1 ){
	echo '1';
}else{
	echo '2';
}

?>