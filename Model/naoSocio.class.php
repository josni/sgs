<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');  

class NaoSocio extends Conexao{
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
    
    public $data_cadastro;
    public $id_pessoa_nao_socio;

    public $id_telefone;
    public $numero;
    public $id_pessoa_tel; 
    public $id_tipo_tel;
    
    public function getNaoSocio(){
        $sql = 'select pessoa.id_pessoa, data_cadastro, pessoa.nome, pessoa.bairro, pessoa.status_pessoa from nao_socio  inner join pessoa  on  nao_socio.id_pessoa_nao_socio = pessoa.id_pessoa limit 10';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
    function getNaoSocioEspec($id_pessoa){
        $sql = 'select telefone.id_telefone, telefone.id_tipo_tel, telefone.numero, pessoa.id_pessoa, pessoa.nome, pessoa.status_pessoa, pessoa.cpf, pessoa.rg, pessoa.est_civil, pessoa.rua, pessoa.numero_casa, pessoa.cep, pessoa.bairro, pessoa.email, pessoa.data_nasc, data_cadastro from nao_socio  inner join pessoa  on  nao_socio.id_pessoa_nao_socio = pessoa.id_pessoa inner join telefone on telefone.id_pessoa_tel = pessoa.id_pessoa where id_pessoa_nao_socio = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa'=>  $id_pessoa));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
     function inserirPessoa(){
        $sql = 'insert into pessoa (rua, nome, status_pessoa, cpf, rg, est_civil, numero_casa, cep, bairro, email, data_nasc, id_cidade_pessoa) values(:rua, :nome, :status_pessoa, :cpf, :rg, :est_civil, :numero_casa, :cep, :bairro, :email, :data_nasc, :id_cidade_pessoa) returning id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('rua'=> $this->rua, 'nome' => $this->nome, 'status_pessoa' => $this->status_pessoa, 'cpf' => $this->cpf, 'rg' => $this->rg, 'est_civil' => $this->est_civil, 'numero_casa' => $this->numero_casa, 'cep' => $this->cep, 'bairro' => $this->bairro, 'email' => $this->email, 'data_nasc' => $this->data_nasc, 'id_cidade_pessoa' => $this->id_cidade_pessoa));
        $this->id_pessoa_nao_socio = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $this->id_pessoa_nao_socio = $this->id_pessoa_nao_socio[0]['id_pessoa'];
        $this->id_pessoa_tel = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $this->id_pessoa_tel = $this->id_pessoa_tel[0]['id_pessoa'];
    }
    
    function getUltimoId(){
        return $this->id_pessoa_nao_socio;
    }
    
    function inserirTelefone(){
        $sql = 'insert into telefone (numero, id_pessoa_tel, id_tipo_tel) values(:numero, :id_pessoa_tel, :id_tipo_tel)';
        $stmt = Conexao::getInstance()->prepare($sql);
       $stmt->execute(array('numero' => $this->numero, 'id_pessoa_tel' => $this->id_pessoa_tel, 'id_tipo_tel' => $this->id_tipo_tel));
    }
    
    function inserirNaoSocio(){
        $sql = 'insert into nao_socio (data_cadastro, id_pessoa_nao_socio) values(:data_cadastro, :id_pessoa_nao_socio)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('data_cadastro' => $this->data_cadastro, 'id_pessoa_nao_socio' => $this->id_pessoa_nao_socio));
    }
    
      function editarNaoSocio(){
        $sql = 'update nao_socio set data_cadastro = :data_cadastro where id_pessoa_nao_socio = :id_pessoa_nao_socio';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa_nao_socio' => $this->id_pessoa_nao_socio, 'data_cadastro' => $this->data_cadastro));
    }
    
    function editarPessoa(){
        $sql = 'update pessoa set rua = :rua, nome = :nome, status_pessoa = :status_pessoa, cpf = :cpf, rg = :rg, est_civil = :est_civil, numero_casa = :numero_casa, cep = :cep, bairro = :bairro, email = :email, data_nasc = :data_nasc, id_cidade_pessoa = :id_cidade_pessoa where id_pessoa = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa' => $this->id_pessoa, 'rua'=> $this->rua, 'nome' => $this->nome, 'status_pessoa' => $this->status_pessoa, 'cpf' => $this->cpf, 'rg' => $this->rg,
                             'est_civil' => $this->est_civil, 'numero_casa' => $this->numero_casa, 'cep' => $this->cep, 'bairro' => $this->bairro, 'email' => $this->email,
                             'data_nasc' => $this->data_nasc, 'id_cidade_pessoa' => $this->id_cidade_pessoa));
    }

    function editarTelefone(){
        $sql = 'update telefone set numero =:numero , id_pessoa_tel = :id_pessoa_tel , id_tipo_tel = :id_tipo_tel where id_pessoa_tel = :id_pessoa_tel';
        $stmt = Conexao::getInstance()->prepare($sql);
       $stmt->execute(array('numero' => $this->numero, 'id_pessoa_tel' => $this->id_pessoa_tel, 'id_tipo_tel' => $this->id_tipo_tel));
    }
    
    function excluirNaoSocio(){
        $sql = 'delete from nao_socio where id_pessoa= :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_pessoa' =>  $this->id_pessoa));
    }
    
    
}

?>