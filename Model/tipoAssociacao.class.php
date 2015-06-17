<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class TipoAssociacao extends Conexao{
    public $id_tipo_assoc;
    public $nome_tipo_assoc;
    public $status;

    function getTipoAssociacao(){
        $sql = 'select id_tipo_assoc, nome_tipo_assoc, status from tipo_assoc';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }
    
    function getTipoAssociacaoEspec($id_tipo_assoc){
        $sql = 'select id_tipo_assoc, nome_tipo_assoc, status from tipo_assoc where id_tipo_assoc = :id_tipo_assoc';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_assoc'=>  $id_tipo_assoc));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirTipoAssociacao(){
        $sql = 'insert into tipo_assoc (status, nome_tipo_assoc) values(:status, :nome_tipo_assoc)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('status'=> $this->status, 'nome_tipo_assoc' => $this->nome_tipo_assoc));
    }

    function editarTipoAssociacao(){
        $sql = 'update tipo_assoc set nome_tipo_assoc = :nome_tipo_assoc, status = :status where id_tipo_assoc = :id_tipo_assoc';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_assoc' => $this->id_tipo_assoc, 'nome_tipo_assoc'=>  $this->nome_tipo_assoc, 'status'=> $this->status));
    }

    function excluirTipoAssociacao(){
        $sql = 'delete from tipo_assoc where id_tipo_assoc= :id_tipo_assoc';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_tipo_assoc'=>  $this->id_tipo_assoc));
    }
}
