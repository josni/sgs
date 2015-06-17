<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoUnidadeProducao.class.php');
$objtipoDocumento = new TipoUnidadeProducao();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){
    $objtipoDocumento->status = 1;
    $objtipoDocumento->nome_und = $_POST['TIPO'];
    $objtipoDocumento->inserirTipoUnidade();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objtipoDocumento->id_tipo_und = $_POST['ID'];    
    $objtipoDocumento->status = (isset($_POST['STATUS']) == true ? 1 : 0);
    $objtipoDocumento->nome_und = $_POST['TIPO'];
    $objtipoDocumento->editarTipoUnidade();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objtipoDocumento->id_tipo_und = $_GET['id'];
    $objtipoDocumento->excluirTipoUnidade();
}
?>
<script>
  window.location = '../View/tipoUnidadeProducao/lista.php';
</script>
