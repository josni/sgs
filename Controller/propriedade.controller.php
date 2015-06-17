<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/propriedade.class.php');
$objPropriedade = new Propriedade();
$teste = $_POST['IDSOCIO'];

if($_REQUEST['OPERACAO'] == 'CADASTRAR'){
    $objPropriedade->nome_prop = $_POST['NOME'];
    $objPropriedade->ccir = $_POST['CCIR'];
    $objPropriedade->itr = $_POST['ITR'];
    $objPropriedade->longitude = $_POST['lng'];
    $objPropriedade->latitude = $_POST['lat'];
    $objPropriedade->id_pessoa_prop = $_POST['IDSOCIO'];
    $objPropriedade->inserirPropriedade();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objPropriedade->id_prop = $_POST['ID'];
   $objPropriedade->nome_prop = $_POST['NOME'];
    $objPropriedade->ccir = $_POST['CCIR'];
    $objPropriedade->itr = $_POST['ITR'];
    $objPropriedade->longitude = $_POST['lng'];
    $objPropriedade->latitude = $_POST['lat'];
    $objPropriedade->id_pessoa_prop = $_POST['IDSOCIO'];
    $objPropriedade->editarPropriedade();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objPropriedade->id_prop = $_GET['id'];
    $objPropriedade->excluirPropriedade();

}
 //var_dump($objPropriedade);

header("Location: /sgs/View/socio/listaSocio.php?id=$teste");

?>
