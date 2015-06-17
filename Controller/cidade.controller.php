<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/cidade.class.php');
$objCidade = new Cidade();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){
    $objCidade->nome_cidade = $_POST['NOME'];
    $objCidade->status_cidade = 1;    
    $objCidade->id_estado_cidade = $_POST['UF_ESTADO'];
    $objCidade->inserirCidade();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objCidade->id_cidade = $_POST['ID'];
    $objCidade->nome_cidade = $_POST['NOME'];
    $objCidade->status_cidade = (isset($_POST['STATUS']) == true ? 1 : 0);
    $objCidade->id_estado_cidade = $_POST['UF_ESTADO'];
    $objCidade->editarCidade();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objCidade->id_cidade = $_GET['id'];
    $objCidade->excluirCidade();
}
?>
<script>
   window.location = '../View/cidade/lista.php';
</script>
