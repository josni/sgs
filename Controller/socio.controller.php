<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/socio.class.php');
    $objSocio = new Socio();
    
if($_REQUEST['OPERACAO']== 'CADASTRAR'){
    $objSocio->nome = $_POST['NOME'];
    $objSocio->data_nasc = $_POST['data_nasc'];
    $objSocio->cpf = $_POST['cpf'];
    $objSocio->rg = $_POST['rg'];
    $objSocio->est_civil = $_POST['est_civil'];
    $objSocio->email = $_POST['email'];
    $objSocio->rua = $_POST['rua'];
    $objSocio->numero_casa = $_POST['numero_casa'];
    $objSocio->bairro = $_POST['bairro'];
    $objSocio->cep = $_POST['cep'];
    $objSocio->id_cidade_pessoa =  $_POST['CIDADE'];
    $objSocio->status_pessoa = 1;
    $objSocio->inserirPessoa();

    $objSocio->data_assoc = $_POST['data_assoc'];
    $objSocio->id_pessoa_socio = $objSocio->getUltimoId(); 
    $objSocio->id_tipo_assoc = $_POST['TIPO_ASSOC'];
    $objSocio->inserirSocio();

    $objSocio->numero = $_POST['numero'];
    $objSocio->id_pessoa_tel = $objSocio->getUltimoId(); 
    $objSocio->id_tipo_tel = $_POST['tipo_tel'];
    $objSocio->inserirTelefone();
    //var_dump($objSocio);

}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objSocio->id_pessoa = $_POST['ID'];
    $objSocio->nome = $_POST['NOME'];
    $objSocio->data_nasc = $_POST['data_nasc'];
    $objSocio->cpf = $_POST['cpf'];
    $objSocio->rg = $_POST['rg'];
    $objSocio->est_civil = $_POST['est_civil'];
    $objSocio->email = $_POST['email'];
    $objSocio->rua = $_POST['rua'];
    $objSocio->numero_casa = $_POST['numero_casa'];
    $objSocio->bairro = $_POST['bairro'];
    $objSocio->cep = $_POST['cep'];
    $objSocio->id_cidade_pessoa =  $_POST['CIDADE'];
    $objSocio->status_pessoa = (isset($_POST['STATUS']) == true ? 1 : 0);
    $objSocio->editarPessoa();  

    $objSocio->data_assoc = $_POST['data_assoc'];
    $objSocio->id_pessoa_socio = $_POST['ID']; 
    $objSocio->id_tipo_assoc = $_POST['TIPO_ASSOC'];
    $objSocio->editarSocio();
    
    $objSocio->id_telefone = $_POST['ID_TEL'];
    $objSocio->numero = $_POST['numero'];
    $objSocio->id_pessoa_tel = $_POST['ID']; 
    $objSocio->id_tipo_tel = $_POST['tipo_tel'];
    $objSocio->editarTelefone();
   
    
    
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objSocio->id_pessoa = $_GET['id'];
    $objSocio->excluirSocio();
}
?>

<script>
  window.location = '../View/socio/lista.php';
</script>


 