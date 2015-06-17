<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php'); 
    

class Dependente {

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
    
    public $id_tipo_dep;  
    public $id_pessoa_dep;
    public $id_pessoa_socio;

    public $id_telefone;
    public $numero;
    public $id_pessoa_tel; 
    public $id_tipo_tel;

    public $setDepEspc;

    function setDependentePessoa($dep){
        $this->setDepEspc = $dep;
    }

     function getDepPessoa(){
        return $this->setDepEspc;
    }

    public function getDependentePessoa($dep){
        
       
        //echo '{$objSocio->getSocioEspec($_GET['id'])}';
        //$sql = 'select pessoa.id_pessoa, id_tipo_dep, pessoa.nome, id_pessoa_dep, pessoa.bairro, pessoa.status_pessoa from dependente  inner join pessoa  on  dependente.id_pessoa_dep = pessoa.id_pessoa where ';
        $sql = "select d.id_pessoa_socio, d.id_pessoa_dep, t.id_tipo_dep, p.nome, t.parentesco, t.status from pessoa p , dependente d, tipo_dependente t

                where p.id_pessoa = d.id_pessoa_dep
                and d.id_tipo_dep = t.id_tipo_dep
                and d.id_pessoa_socio = :dep" ;
        $stmt = Conexao::getInstance()->prepare($sql);
        //$stmt->execute();
        $stmt->execute(array('dep'=>  $dep));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    // function countDep(){
    //      $sql = 'select count(id_pessoa_dep) from dependente where id_pessoa_dep = :id_pessoa';
    //     $stmt = Conexao::getInstance()->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
    
    function getDependenteEspec($id_pessoa){
        $sql = 'select telefone.id_telefone, telefone.id_tipo_tel, telefone.numero, pessoa.id_pessoa, pessoa.nome, pessoa.status_pessoa, pessoa.cpf, pessoa.rg, pessoa.est_civil, pessoa.rua, pessoa.numero_casa, pessoa.cep, pessoa.bairro, pessoa.email, pessoa.data_nasc, id_tipo_dep, id_pessoa_dep from dependente  inner join pessoa  on  dependente.id_pessoa_dep = pessoa.id_pessoa inner join telefone on telefone.id_pessoa_tel = pessoa.id_pessoa where id_pessoa_dep = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa'=>  $id_pessoa));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
     function inserirPessoa(){
        $sql = 'insert into pessoa (rua, nome, status_pessoa, cpf, rg, est_civil, numero_casa, cep, bairro, email, data_nasc, id_cidade_pessoa) values(:rua, :nome, :status_pessoa, :cpf, :rg, :est_civil, :numero_casa, :cep, :bairro, :email, :data_nasc, :id_cidade_pessoa) returning id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('rua'=> $this->rua, 'nome' => $this->nome, 'status_pessoa' => $this->status_pessoa, 'cpf' => $this->cpf, 'rg' => $this->rg, 'est_civil' => $this->est_civil, 'numero_casa' => $this->numero_casa, 'cep' => $this->cep, 'bairro' => $this->bairro, 'email' => $this->email, 'data_nasc' => $this->data_nasc, 'id_cidade_pessoa' => $this->id_cidade_pessoa));
        $this->id_pessoa_dep = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $this->id_pessoa_dep = $this->id_pessoa_dep[0]['id_pessoa'];
        $this->id_pessoa_tel = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $this->id_pessoa_tel = $this->id_pessoa_tel[0]['id_pessoa'];
    }
    
    function getUltimoId(){
        return $this->id_pessoa_dep;
    }
    
    function inserirTelefone(){
        $sql = 'insert into telefone (numero, id_pessoa_tel, id_tipo_tel) values(:numero, :id_pessoa_tel, :id_tipo_tel)';
        $stmt = Conexao::getInstance()->prepare($sql);
       $stmt->execute(array('numero' => $this->numero, 'id_pessoa_tel' => $this->id_pessoa_tel, 'id_tipo_tel' => $this->id_tipo_tel));
    }
    
    function inserirDependente(){
        $sql = 'insert into dependente (id_tipo_dep, id_pessoa_dep, id_pessoa_socio) values(:id_tipo_dep, :id_pessoa_dep, :id_pessoa_socio)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_dep' => $this->id_tipo_dep, 'id_pessoa_dep' => $this->id_pessoa_dep, 'id_pessoa_socio'=>  $this->id_pessoa_socio));
    }
    
      function editarDependente(){
        $sql = 'update dependente set id_tipo_dep = :id_tipo_dep, id_pessoa_dep = :id_pessoa_dep where id_pessoa_dep = :id_pessoa_dep';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_dep' => $this->id_tipo_dep, 'id_pessoa_dep' => $this->id_pessoa_dep));
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
    
    function excluirDependente(){
        $sql = 'delete from dependente where id_pessoa= :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_pessoa' =>  $this->id_pessoa));
    }
    
    
}

?>