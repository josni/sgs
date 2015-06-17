<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/telefone.class.php');
$objTelefone = new Telefone();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){     
    $objTelefone->numero = $_POST['NUMERO'];
    $objTelefone->id_tipo_tel = $_POST['TIPO'];
    $objTelefone->inserirTelefone();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objDocumento->id_telefone = $_POST['ID'];
       $objTelefone->numero = $_POST['NUMERO'];
    $objTelefone->id_tipo_tel = $_POST['TIPO'];
    $objTelefone->editarTelefone();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objTelefone->id_telefone = $_GET['id'];
    $objTelefone->excluirTelefone();
}
?>
<script>
   window.location = '../View/telefone/lista.php';
</script>