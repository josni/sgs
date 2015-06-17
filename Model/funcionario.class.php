<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');  

class Funcionario extends Conexao{
    public $id_pessoa;
    public $rua;
    public $nome;
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

    public $login;
    public $dt_entrada;
    public $dt_saida;
    public $senha;
    public $admin;
    public $id_pessoa_func; 
    
    
    public function getFuncionarioPessoa(){    
        $sql = 'select pessoa.id_pessoa, pessoa.nome, pessoa.status_pessoa, login,senha, dt_entrada, dt_saida, admin from funcionario inner join pessoa on funcionario.id_pessoa_func = pessoa.id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
   }
    
    function getFuncionarioEspec($id_pessoa){
        $sql = 'select tipo_telefone.id_tipo_tel, telefone.id_telefone, 
        SUBSTR(telefone.numero, 1, 4) || '-' || SUBSTR(telefone.numero, 5,8) as numero, 
        pessoa.id_pessoa, pessoa.rua, pessoa.nome, pessoa.status_pessoa, 
        SUBSTR(pessoa.cpf, 1, 3) || '.' || SUBSTR(pessoa.cpf, 4, 3) || '.' || SUBSTR( pessoa.cpf, 7, 3) || '-' || SUBSTR(pessoa.cpf, 10) as cpf, 
        SUBSTR(pessoa.rg, 1, 1) || '.' || SUBSTR(pessoa.rg, 2, 3) || '.' || SUBSTR(pessoa.rg, 5, 3) || '-' || SUBSTR(pessoa.rg, 8) as rg, 
        pessoa.est_civil, pessoa.numero_casa, 
        SUBSTR(pessoa.cep, 1, 2) || '.' || SUBSTR(pessoa.cep, 3,3) || '-' || SUBSTR(pessoa.cep, 6) as cep, 
        pessoa.bairro, pessoa.email, pessoa.data_nasc, pessoa.id_cidade_pessoa, login, dt_entrada, dt_saida, senha, admin 
        from funcionario  inner join pessoa on funcionario.id_pessoa_func = pessoa.id_pessoa 
        inner join telefone on pessoa.id_pessoa = telefone.id_pessoa_tel 
        inner join tipo_telefone on telefone.id_tipo_tel = tipo_telefone.id_tipo_tel where id_pessoa_func = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa'=>  $id_pessoa));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
    function inserirPessoa(){
        $sql = 'insert into pessoa (rua, nome, status_pessoa, cpf, rg, est_civil, numero_casa, cep, bairro, email, data_nasc, id_cidade_pessoa) values(:rua, :nome, :status_pessoa, :cpf, :rg, :est_civil, :numero_casa, :cep, :bairro, :email, :data_nasc, :id_cidade_pessoa) returning id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('rua'=> $this->rua, 'nome' => $this->nome, 'status_pessoa' => $this->status_pessoa, 'cpf' => $this->cpf, 'rg' => $this->rg, 'est_civil' => $this->est_civil, 'numero_casa' => $this->numero_casa, 'cep' => $this->cep, 'bairro' => $this->bairro, 'email' => $this->email, 'data_nasc' => $this->data_nasc, 'id_cidade_pessoa' => $this->id_cidade_pessoa));
        $this->id_pessoa_func = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $this->id_pessoa_func = $this->id_pessoa_func[0]['id_pessoa'];
    }
    
    function inserirFuncionario(){
        $sql = 'insert into funcionario (login, dt_entrada, dt_saida, senha, admin, id_pessoa_func) values(:login, :dt_entrada, :dt_saida, :senha, :admin, :id_pessoa_func)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('login' => $this->login, 'dt_entrada' => $this->dt_entrada, 'dt_saida' =>$this->dt_saida, 'senha' =>$this->senha, 'admin' =>$this->admin, 
                             'id_pessoa_func' => $this->id_pessoa_func));
    }
    

    function getUltimoId(){
        return $this->id_pessoa_func;
    }

    function editarPessoa(){
        $sql = 'update pessoa set rua = :rua, nome = :nome, status_pessoa = :status_pessoa, cpf = :cpf, rg = :rg, est_civil = :est_civil, numero_casa = :numero_casa, cep = :cep, bairro = :bairro, email = :email, data_nasc = :data_nasc, id_cidade_pessoa = :id_cidade_pessoa where id_pessoa = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa' => $this->id_pessoa, 'rua'=> $this->rua, 'nome' => $this->nome, 'status_pessoa' => $this->status_pessoa, 'cpf' => $this->cpf, 'rg' => $this->rg,
                             'est_civil' => $this->est_civil, 'numero_casa' => $this->numero_casa, 'cep' => $this->cep, 'bairro' => $this->bairro, 'email' => $this->email,
                             'data_nasc' => $this->data_nasc, 'id_cidade_pessoa' => $this->id_cidade_pessoa));
    }

    function editarFuncionario(){
        $sql = 'update funcionario set login = :login, dt_entrada = :dt_entrada, dt_saida = :dt_saida, senha = :senha, admin = :admin, id_pessoa_func = :id_pessoa_func where id_pessoa_func = :id_pessoa_func';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa_func' => $this->id_pessoa_func, 'login' => $this->login, 'dt_entrada' => $this->dt_entrada, 'dt_saida' =>$this->dt_saida, 
                             'senha' =>$this->senha, 'admin' =>$this->admin));
    }

    function getCpf($cpf){
            $sql = 'select pessoa.cpf from funcionario inner join pessoa on funcionario.id_pessoa_func = pessoa.id_pessoa where cpf = :cpf limit 1';
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute(array('cpf'=>  $cpf));
            return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
}