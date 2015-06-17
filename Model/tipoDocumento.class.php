<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class TipoDocumento extends Conexao{
    public $id_tipo_doc;
    public $nome_tipo_doc;
    public $status;

    function getTipoDocumento(){
        $sql = 'select id_tipo_doc, nome_tipo_doc, status from tipo_doc';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }
    
    function getTipoDocumentoEspec($id_tipo_doc){
        $sql = 'select id_tipo_doc, nome_tipo_doc, status from tipo_doc where id_tipo_doc = :id_tipo_doc';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_doc'=>  $id_tipo_doc));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirTipoDocumento(){
        $sql = 'insert into tipo_doc (status, nome_tipo_doc) values(:status, :nome_tipo_doc)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('status'=> $this->status, 'nome_tipo_doc' => $this->nome_tipo_doc));
    }

    function editarTipoDocumento(){
        $sql = 'update tipo_doc set nome_tipo_doc = :nome_tipo_doc, status = :status where id_tipo_doc = :id_tipo_doc';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_doc' => $this->id_tipo_doc, 'nome_tipo_doc'=>  $this->nome_tipo_doc, 'status'=> $this->status));
    }

    function excluirTipoDocumento(){
        $sql = 'delete from tipo_doc where id_tipo_doc= :id_tipo_doc';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_tipo_doc'=>  $this->id_tipo_doc));
    }
}
