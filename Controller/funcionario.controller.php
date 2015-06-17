<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/funcionario.class.php');
    $objFuncionario = new Funcionario();

if($_REQUEST['OPERACAO']== 'CADASTRAR'){
    $objFuncionario->nome = $_POST['nome'];
    $objFuncionario->data_nasc = $_POST['data_nasc'];
    $objFuncionario->cpf = $_POST['cpf'];
    $objFuncionario->rg = $_POST['rg'];
    $objFuncionario->est_civil = $_POST['est_civil'];
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->numero = $_POST['numero'];
    $objFuncionario->rua = $_POST['rua'];
    $objFuncionario->numero_casa = $_POST['numero_casa'];
    $objFuncionario->bairro = $_POST['bairro'];
    $objFuncionario->cep = $_POST['cep'];
    $objFuncionario->id_cidade_pessoa =  $_POST['CIDADE'];
    $objFuncionario->status_pessoa = 1;
    $objFuncionario->inserirPessoa();
    
    $objFuncionario->numero = $_POST['numero'];
    $objFuncionario->id_pessoa_tel = $objFuncionario->getUltimoId(); 
    $objFuncionario->id_tipo_tel = $_POST['tipo_tel'];
    $objFuncionario->inserirTelefone();
    
    $objFuncionario->login = $_POST['cpf'];
    $objFuncionario->dt_entrada = $_POST['dt_entrada'];
    //$objFuncionario->senha = '12345678';
    $objFuncionario->senha = crypt('12345678');
    $objFuncionario->admin = (isset($_POST['admin']) == true ? 1 : 0);
    $objFuncionario->id_pessoa_func = $objFuncionario->getUltimoId(); 
    $objFuncionario->inserirFuncionario();
    //var_dump($objFuncionario);

}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objFuncionario->id_pessoa = $_POST['ID'];
    $objFuncionario->nome = $_POST['nome'];
    $objFuncionario->data_nasc = $_POST['data_nasc'];
    $objFuncionario->cpf = $_POST['cpf'];
    $objFuncionario->rg = $_POST['rg'];
    $objFuncionario->est_civil = $_POST['est_civil'];
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->rua = $_POST['rua'];
    $objFuncionario->numero_casa = $_POST['numero_casa'];
    $objFuncionario->bairro = $_POST['bairro'];
    $objFuncionario->cep = $_POST['cep'];
    $objFuncionario->id_cidade_pessoa =  $_POST['CIDADE'];
    $objFuncionario->status_pessoa = (isset($_POST['STATUS']) == true ? 1 : 0);

    $objFuncionario->dt_entrada = $_POST['dt_entrada'];
    $objFuncionario->senha = crypt($_POST['senha']);
    $objFuncionario->login = $_POST['cpf'];    
    $objFuncionario->dt_saida = (($_POST['dt_saida']== 0) ? '19/12/1200' : $_POST['dt_saida']);
    $objFuncionario->admin = (isset($_POST['admin']) == true ? 1 : 0);
    $objFuncionario->id_pessoa_func = $_POST['ID']; 

    $objFuncionario->id_telefone = $_POST['ID_TEL'];
    $objFuncionario->numero = $_POST['numero'];
    $objFuncionario->id_pessoa_tel = $_POST['ID']; 
    $objFuncionario->id_tipo_tel = $_POST['tipo_tel'];
    $objFuncionario->editarFuncionario();
    $objFuncionario->editarTelefone();
    $objFuncionario->editarPessoa();

    //var_dump($objFuncionario);
    
}


?>