<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class TipoDependente extends Conexao{
    public $id_tipo_dep;
    public $parentesco;
    public $status;

    function getTipoDependente(){
        $sql = 'select id_tipo_dep, parentesco, status from tipo_dependente order by status';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }
    
    function getTipoDependenteEspec($id_tipo_arq){
        $sql = 'select id_tipo_dep, parentesco, status from tipo_dependente where id_tipo_dep = :id_tipo_dep';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_dep'=>  $id_tipo_dep));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirTipoDependente(){
        $sql = 'insert into tipo_dependente (status, parentesco) values(:status, :parentesco)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('status'=> $this->status, 'parentesco' => $this->parentesco));
    }

    function editarTipoArquivo(){
        $sql = 'update tipo_dependente set parentesco = :parentesco, status = :status where id_tipo_dep = :id_tipo_dep';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_dep' => $this->id_tipo_dep, 'parentesco'=>  $this->parentesco, 'status'=> $this->status));
    }

    function excluirTipoDependente(){
        $sql = 'delete from tipo_dependente where id_tipo_dep= :id_tipo_dep';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_tipo_dep'=>  $this->id_tipo_dep));
    }
}
