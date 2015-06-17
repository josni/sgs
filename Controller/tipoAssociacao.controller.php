<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoAssociacao.class.php');
$objtipoAssociacao = new tipoAssociacao();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){
    $objtipoAssociacao->nome_tipo_assoc = $_POST['TIPO'];
    $objtipoAssociacao->status = 1;
    $objtipoAssociacao->inserirtipoAssociacao();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objtipoAssociacao->id_tipo_assoc = $_POST['ID'];
    $objtipoAssociacao->status = (isset($_POST['STATUS']) == true ? 1 : 0);
    $objtipoAssociacao->nome_tipo_assoc = $_POST['TIPO'];
    $objtipoAssociacao->editartipoAssociacao();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objtipoAssociacao->id_tipo_assoc = $_GET['id'];
    $objtipoAssociacao->excluirtipoAssociacao();
}
?>
<script>
  window.location = '../View/tipoAssociacao/lista.php';
</script>
