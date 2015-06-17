<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class Pessoa extends Conexao{
    public $id_pessoa;
    public $nome;
    public $rua;
    public $status_pessoa;
    public $cpf;
    public $rg;
    public $est_civil;
    public $numero_casa;
    public $cep;
    public $bairro;
    public $email;
    public $data_nasc;
    public $id_cidade_pessoa;
    
        

    function getPessoa(){
        $sql = 'select * from pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
    function getPessoaEspec($id_pessoa){
        $sql = 'select id_pessoa, nome, rua, status_pessoa, cpf, rg, est_civil, numero, cep, bairro, email, data_nasc from pessoa where id_pessoa = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa'=>  $id_pessoa));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirPessoa(){
        $sql = 'insert into pessoa (nome, rua, status_pessoa, cpf, rg, est_civil, numero_casa, cep, bairro, email, data_nasc) values(:nome, :rua, :status_pessoa, :cpf, :rg, :est_civil, :numero, :cep,                    :bairro, :email, :data_nasc)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('nome' => $this->nome, 'rua' => $this->rua, 'status_pessoa' => $this->status_pessoa, 'cpf' => $this->cpf, 'rg' => $this->rg, 'est_civil' => $this->est_civil, 
                             'numero_casa' => $this->numero_casa, 'cep' => $this->cep, 'bairro' => $this->bairro, 'email' => $this->email, 'data_nasc' => $this->data_nasc));
    }

    function editarPessoa(){
        $sql = 'update pessoa set nome = :nome, rua = :rua, status_pessoa = :status_pessoa, cpf = :cpf, rg = :rg, est_civil = :est_civil, numero = :numero, cep = :cep, bairro = :bairro,
                email = :email, data_nasc = :data_nasc where id_pessoa = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
         $stmt->execute(array('id_pessoa' => $this->id_pessoa, 'nome' => $this->nome, 'rua' => $this->rua, 'status_pessoa' => $this->status_pessoa, 'cpf' => $this->cpf, 'rg' => $this->rg,
                              'est_civil' => $this->est_civil, 'numero' => $this->numero, 'cep' => $this->cep, 'bairro' => $this->bairro, 'email' => $this->email,
                              'data_nasc' => $this->data_nasc));
    }

    function excluirPessoa(){
        $sql = 'delete from pessoa where id_pessoa= :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_pessoa' =>  $this->id_pessoa));
    }
}
