<?php

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/cidade.class.php');
    $objRegiao = new Cidade();
    $listaEstadoCidade = $objRegiao->getEstadoCidade($_GET['cod_estados'] );
    $cidades = array();
    for($i=0; $i<count($listaEstadoCidade); $i++){
        echo "<option value='" . $listaEstadoCidade[$i]['id_cidade'] . "'>" .  $listaEstadoCidade[$i]['nome_cidade'] . "</option>";
    }
