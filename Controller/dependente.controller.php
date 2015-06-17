<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/dependente.class.php');
    $objDependente = new Dependente();
    
    
if(isset($_REQUEST['OPERACAO'])== 'CADASTRAR'){
    $objDependente->nome = $_POST['NOME'];
    $objDependente->data_nasc = $_POST['data_nasc'];
    $objDependente->cpf = $_POST['cpf'];
    $objDependente->rg = $_POST['rg'];
    $objDependente->est_civil = $_POST['est_civil'];
    $objDependente->email = $_POST['email'];
    $objDependente->rua = $_POST['rua'];
    $objDependente->numero_casa = $_POST['numero_casa'];
    $objDependente->bairro = $_POST['bairro'];
    $objDependente->cep = $_POST['cep'];
    $objDependente->id_cidade_pessoa =  $_POST['CIDADE'];
    $objDependente->status_pessoa = 1;
    $objDependente->inserirPessoa();

    $objDependente->numero = $_POST['numero'];
    $objDependente->id_pessoa_tel = $objDependente->getUltimoId(); 
    $objDependente->id_tipo_tel = $_POST['tipo_tel'];
    $objDependente->inserirTelefone();

    $objDependente->id_pessoa_dep = $objDependente->getUltimoId(); 
    $objDependente->id_tipo_dep = $_POST['TIPO_DEP'];
    $objDependente->id_pessoa_socio = $_POST['IDSOCIO'];
    $objDependente->inserirDependente();
    
    //var_dump($objDependente);
    

}
elseif(isset($_REQUEST['OPERACAO']) == 'EDITAR'){
    $objDependente->id_pessoa = $_POST['ID'];
    $objDependente->nome = $_POST['NOME'];
    $objDependente->data_nasc = $_POST['data_nasc'];
    $objDependente->cpf = $_POST['cpf'];
    $objDependente->rg = $_POST['rg'];
    $objDependente->est_civil = $_POST['est_civil'];
    $objDependente->email = $_POST['email'];
    $objDependente->rua = $_POST['rua'];
    $objDependente->numero_casa = $_POST['numero_casa'];
    $objDependente->bairro = $_POST['bairro'];
    $objDependente->cep = $_POST['cep'];
    $objDependente->id_cidade_pessoa =  $_POST['CIDADE'];
    $objDependente->status_pessoa = (isset($_POST['STATUS']) == true ? 1 : 0);
   // $objDependente->editarPessoa();  
    
    $objDependente->id_telefone = $_POST['ID_TEL'];
    $objDependente->numero = $_POST['numero'];
    $objDependente->id_pessoa_tel = $_POST['ID']; 
    $objDependente->id_tipo_tel = $_POST['tipo_tel'];
    //$objDependente->editarTelefone();

    $objDependente->id_pessoa_dep = $_POST['ID']; 
    $objDependente->id_tipo_dep = $_POST['TIPO_DEP'];
    //$objDependente->editarDependente();

    //var_dump($objDependente);
   
    
    
}
elseif(isset($_REQUEST['OPERACAO']) == 'EXCLUIR'){
    $objDependente->id_pessoa = $_GET['id'];
    $objDependente->excluirDependente();
}

?>

<script>

  //window.location = '../View/dependente/lista.php';
</script>


 