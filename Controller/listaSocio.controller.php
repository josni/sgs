<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/dependente.class.php');
    $objDependente = new Dependente();
    
    
$id = $_GET['id'];
$objDependente->setDependentePessoa($_GET['id']);
$teste =   $objDependente->getDependentePessoa();




?>



 