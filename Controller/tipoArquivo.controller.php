<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoArquivo.class.php');
$objtipoArquivo = new TipoArquivo();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){
    $objtipoArquivo->nome_tipo_arq = $_POST['TIPO'];
    $objtipoArquivo->status = 1;
    $objtipoArquivo->inserirtipoArquivo();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objtipoArquivo->id_tipo_arq = $_POST['ID'];
    $objtipoArquivo->status = (isset($_POST['STATUS']) == true ? 1 : 0);
    $objtipoArquivo->nome_tipo_arq = $_POST['TIPO'];
    $objtipoArquivo->editartipoArquivo();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objtipoArquivo->id_tipo_arq = $_GET['id'];
    $objtipoArquivo->excluirtipoArquivo();
}
?>
<script>
  window.location = '../View/tipoArquivo/lista.php';
</script>
