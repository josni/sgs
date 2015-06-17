<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/estado.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/Retorno.class.php');
$objEstado = new Estado();
$retorno = new Retorno();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){
    $objEstado->uf = $_POST['UF'];
    $objEstado->status = 1;
    $retorno = $objEstado->inserirEstado();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objEstado->id_estado = $_POST['ID'];
    $objEstado->status = (isset($_POST['STATUS']) == true ? 1 : 0);
    $objEstado->uf = $_POST['UF'];
    $retorno =  $objEstado->editarEstado();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objEstado->id_estado = $_GET['id'];
    $retorno = $objEstado->excluirEstado();
}

session_start(); 
$_SESSION['retorno'] = $retorno;
header("Location: ../View/estado/lista.php")    
?>