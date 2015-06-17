<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/naoSocio.class.php');
    $objNaoSocio = new NaoSocio();

if($_REQUEST['OPERACAO']== 'CADASTRAR'){
    $objNaoSocio->nome = $_POST['nome'];
    $objNaoSocio->data_nasc = $_POST['data_nasc'];
    $objNaoSocio->cpf = $_POST['cpf'];
    $objNaoSocio->rg = $_POST['rg'];
    $objNaoSocio->est_civil = $_POST['est_civil'];
    $objNaoSocio->email = $_POST['email'];
    $objNaoSocio->rua = $_POST['rua'];
    $objNaoSocio->numero_casa = $_POST['numero_casa'];
    $objNaoSocio->bairro = $_POST['bairro'];
    $objNaoSocio->cep = $_POST['cep'];
    $objNaoSocio->id_cidade =  $_POST['CIDADE'];
    $objNaoSocio->status = 1;
    $objNaoSocio->data_cadastro = $_POST['data_cadastro'];
    $objNaoSocio->inserirPessoa();
    $objNaoSocio->inserirNaoSocio();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objNaoSocio->id_pessoa = $_POST['ID'];
    $objNaoSocio->nome = $_POST['nome'];
    $objNaoSocio->data_nasc = $_POST['data_nasc'];
    $objNaoSocio->cpf = $_POST['cpf'];
    $objNaoSocio->rg = $_POST['rg'];
    $objNaoSocio->est_civil = $_POST['est_civil'];
    $objNaoSocio->email = $_POST['email'];
    $objNaoSocio->rua = $_POST['rua'];
    $objNaoSocio->numero_casa = $_POST['numero_casa'];
    $objNaoSocio->bairro = $_POST['bairro'];
    $objNaoSocio->cep = $_POST['cep'];
    $objNaoSocio->status = (isset($_POST['STATUS']) == true ? 1 : 0);
    $objNaoSocio->data_cadastro = $_POST['data_cadastro'];
    $objNaoSocio->editarPessoa();
    $objNaoSocio->editarNaoSocio();
    
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objNaoSocio->id = $_GET['id'];
    $objNaoSocio->excluirNaoSocio();
}
?>
<script>
   window.location = '../View/naoSocio/lista.php';
</script>