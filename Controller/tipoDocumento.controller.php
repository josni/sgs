<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoDocumento.class.php');
$objtipoDocumento = new TipoDocumento();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){
    $objtipoDocumento->nome_tipo_doc = $_POST['TIPO'];
    $objtipoDocumento->status = 1;
    $objtipoDocumento->inserirtipoDocumento();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objtipoDocumento->id_tipo_doc = $_POST['ID'];
    $objtipoDocumento->status = (isset($_POST['STATUS']) == true ? 1 : 0);
    $objtipoDocumento->nome_tipo_doc = $_POST['TIPO'];
    $objtipoDocumento->editartipoDocumento();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objtipoDocumento->id_tipo_doc = $_GET['id'];
    $objtipoDocumento->excluirtipoDocumento();
}
?>
<script>
  window.location = '../View/tipoDocumento/lista.php';
</script>
