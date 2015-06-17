<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');  
    //require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/pessoa.class.php');

class TipoTelefone extends Conexao{

    public $id_tipo_tel;
    public $nome_tipo_tel;
    public $status;
    
    
    public function getTipoTelefone(){
        $sql = 'select id_tipo_tel, nome_tipo_tel, status from tipo_telefone';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
    function getTelefoneEspec($id_pessoa){
        $sql = 'select pessoa.id_pessoa, pessoa.nome, numero, id_tipo_tel from telefone  inner join pessoa  on  socio.id_pessoa_tel = pessoa.id_pessoa where id_pessoa_tel = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa'=>  $id_pessoa));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
    function inserirTelefone(){
        $sql = 'insert into telefone (numero, id_pessoa_tel, id_tipo_tel) values(:numero, :id_pessoa_tel, :id_tipo_tel)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('numero' => $this->numero, 'id_pessoa_tel' => $this->id_pessoa_tel, 'id_tipo_tel' => $this->id_tipo_tel));
    }
    
    function editarPessoa(){
        $sql = 'update pessoa set rua = :rua, nome = :nome, status = :status, cpf = :cpf, rg = :rg, est_civil = :est_civil, numero_casa = :numero_casa, cep = :cep, bairro = :bairro, email = :email, telefone = :telefone, data_nasc = :data_nasc, id_cidade = :id_cidade where id_pessoa = :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa' => $this->id_pessoa, 'rua'=> $this->rua, 'nome' => $this->nome, 'status' => $this->status, 'cpf' => $this->cpf, 'rg' => $this->rg,
                             'est_civil' => $this->est_civil, 'numero_casa' => $this->numero_casa, 'cep' => $this->cep, 'bairro' => $this->bairro, 'email' => $this->email,
                             'telefone' => $this->telefone, 'data_nasc' => $this->data_nasc, 'id_cidade' => $this->id_cidade));
    }

    function editarTelefone(){
        $sql = 'update telefone set numero = :numero, id_tipo_tel = :id_tipo_tel where id_pessoa_tel = :id_pessoa_tel';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_pessoa_tel' => $this->id_pessoa_tel, 'numero' => $this->numero, 'id_tipo_tel' => $this->id_tipo_tel));
    }
    
    function excluirTelefone(){
        $sql = 'delete from telefone where id_pessoa= :id_pessoa';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_pessoa' =>  $this->id_pessoa));
    }
    
    
    
}

?>