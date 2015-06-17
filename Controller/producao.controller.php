<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/producao.class.php');
$objProducao = new Producao();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){     
    $objProducao->qtd = $_POST['QTD'];
    $objProducao->id_prop = $_POST['PROPRIEDADE']; 
    $objProducao->id_und_prod = $_POST['UNIDADE']; 
    $objProducao->inserirProducao();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objProducao->id_producao = $_POST['ID'];
    $objProducao->qtd = $_POST['QTD'];
    $objProducao->id_prop = $_POST['PROPRIEDADE']; 
    $objProducao->id_und_prod = $_POST['UNIDADE']; 
    $objProducao->editarProducao();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objProducao->id_producao = $_GET['id'];
    $objProducao->excluirProducao();
}
?>
<script>
   window.location = '../View/producao/lista.php';
</script>
