<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/unidadeProducao.class.php');
$objUnidadeProducao = new UnidadeProducao();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){     
    $objUnidadeProducao->nome_und_prod = $_POST['NOME'];
    $objUnidadeProducao->inserirUnidadeProducao();

    $aux = $_POST['UNIDADE'];

    for ($i=0; $i < count($aux); $i++) { 
        $objUnidadeProducao->id_tipo_und = $_POST['UNIDADE'][$i];
        $objUnidadeProducao->id_und_prod_tipo = $objUnidadeProducao->getUltimoId();
        $objUnidadeProducao->inserirUnidadeTipo();
    }
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objUnidadeProducao->id_und_prod = $_POST['ID'];
    $objUnidadeProducao->nome_und_prod = $_POST['NOME'];
    $objUnidadeProducao->editarUnidadeProducao();
    
    $aux = $_POST['UNIDADE'];

    for ($i=0; $i < count($aux); $i++) { 
        $objUnidadeProducao->id_tipo_und = $_POST['UNIDADE'][$i];
        $objUnidadeProducao->id_und_prod_tipo = $_POST['ID'];
        $objUnidadeProducao->inserirUnidadeTipo();
    }
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objUnidadeProducao->id_producao = $_GET['id'];
    $objUnidadeProducao->excluirProducao();
}
?>
<script>
   window.location = '../View/unidadeProducao/lista.php';
</script>
