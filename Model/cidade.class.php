<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class Cidade extends Conexao{
    public $id_cidade;
    public $nome_cidade;
    public $status_cidade;
    public $id_estado_cidade;
    
    function getCidadeEspec($id_cidade){
        $sql = 'select id_cidade, nome_cidade, status_cidade, id_estado_cidade from cidade where id_cidade = :id_cidade';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_cidade'=>  $id_cidade));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirCidade(){
        $sql = 'insert into cidade (nome_cidade, status_cidade, id_estado_cidade) values(:nome_cidade, :status_cidade, :id_estado_cidade)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('nome_cidade' => $this->nome_cidade, 'status_cidade' => $this->status_cidade, 'id_estado_cidade' => $this->id_estado_cidade));
    }

    function editarCidade(){
        $sql = 'update cidade set nome_cidade = :nome_cidade, status_cidade = :status_cidade, id_estado_cidade = :id_estado_cidade where id_cidade = :id_cidade';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_cidade' => $this->id_cidade, 'nome_cidade' => $this->nome_cidade, 'status_cidade' =>  $this->status_cidade, 'id_estado_cidade' => $this->id_estado_cidade));
    }

    function excluirCidade(){
        $sql = 'delete from cidade where id_cidade= :id_cidade';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_cidade' =>  $this->id_cidade));
    }
     function getEstadoCidade($id){
        $sql = 'select id_cidade, nome_cidade from cidade where id_estado_cidade = :id_estado_cidade';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_estado_cidade'=>  $id));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

     function getCidadeEstado() { 
        $sql = 'select estado.uf, id_cidade, nome_cidade, cidade.status_cidade, cidade.id_estado_cidade from cidade inner join estado on cidade.id_estado_cidade = estado.id_estado_cidade';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    
}
