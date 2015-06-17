<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class TipoUnidadeProducao extends Conexao{
    public $id_tipo_und;
    public $nome_und;
    public $status;

    function getTipoUnidade(){
        $sql = 'select id_tipo_und, nome_und, status from tipo_und_prod';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }
    
    function getTipoUnidadeEspec($id_tipo_und){
        $sql = 'select id_tipo_und, nome_und, status from tipo_und_prod where id_tipo_und = :id_tipo_und';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_und'=>  $id_tipo_und));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirTipoUnidade(){
        $sql = 'insert into tipo_und_prod (status, nome_und) values(:status, :nome_und)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('status'=> $this->status, 'nome_und' => $this->nome_und));
    }

    function editarTipoUnidade(){
        $sql = 'update tipo_und_prod set nome_und = :nome_und, status = :status where id_tipo_und = :id_tipo_und';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_und' => $this->id_tipo_und, 'nome_und'=>  $this->nome_und, 'status'=> $this->status));
    }

    function excluirTipoUnidade(){
        $sql = 'delete from tipo_und_prod where id_tipo_und= :id_tipo_und';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_tipo_und'=>  $this->id_tipo_und));
    }
}
