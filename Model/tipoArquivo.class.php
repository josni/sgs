<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class TipoArquivo extends Conexao{
    public $id_tipo_arq;
    public $nome_tipo_arq;
    public $status;

    function getTipoArquivo(){
        $sql = 'select id_tipo_arq, nome_tipo_arq, status from tipo_arquivo order by status';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }
    
    function getTipoArquivoEspec($id_tipo_arq){
        $sql = 'select id_tipo_arq, nome_tipo_arq, status from tipo_arquivo where id_tipo_arq = :id_tipo_arq';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_arq'=>  $id_tipo_arq));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirTipoArquivo(){
        $sql = 'insert into tipo_arquivo (status, nome_tipo_arq) values(:status, :nome_tipo_arq)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('status'=> $this->status, 'nome_tipo_arq' => $this->nome_tipo_arq));
    }

    function editarTipoArquivo(){
        $sql = 'update tipo_arquivo set nome_tipo_arq = :nome_tipo_arq, status = :status where id_tipo_arq = :id_tipo_arq';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_arq' => $this->id_tipo_arq, 'nome_tipo_arq'=>  $this->nome_tipo_arq, 'status'=> $this->status));
    }

    function excluirTipoArquivo(){
        $sql = 'delete from tipo_arquivo where id_tipo_arq= :id_tipo_arq';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_tipo_arq'=>  $this->id_tipo_arq));
    }
}
