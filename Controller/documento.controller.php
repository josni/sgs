<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/documento.class.php');
$objDocumento = new Documento();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){   
    $objDocumento->area = $_POST['AREA'];    
    $objDocumento->numero = $_POST['NUMERO'];
    $objDocumento->id_tipo_doc = $_POST['TIPO'];
    $objDocumento->id_prop = $_POST['PROPRIEDADE']; 
    $objDocumento->inserirDocumento();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objDocumento->id_documento = $_POST['ID'];
     $objDocumento->area = $_POST['AREA'];    
    $objDocumento->numero = $_POST['NUMERO'];
    $objDocumento->id_tipo_doc = $_POST['TIPO'];
    $objDocumento->id_prop = $_POST['PROPRIEDADE'
    $objDocumento->editarDocumento();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objDocumento->id_documento = $_GET['id'];
    $objDocumento->excluirDocumento();
}
?>
<script>
   //window.location = '../View/documento/lista.php';
</script>
