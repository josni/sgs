<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class Estado extends Conexao{
    public $id_estado;
    public $status;
    public $uf;

    function getEstado(){
        $sql = 'select id_estado, status, uf from estado';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }
    
    function getEstadoEspec($id_estado){
        $sql = 'select id_estado, status, uf from estado where id_estado = :id_estado';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_estado'=>  $id_estado));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirEstado(){
        try{
            $sql = 'insert into estado (status, uf) values(:status, :uf)';
            $stmt = Conexao::getInstance()->prepare($sql);
            $this->retorno->setStatus($stmt->execute(array('status' => $this->status, 'uf'=> $this->uf)));
            $this->retorno->setMensagem($this->retorno->getStatus() ? "Estado inserido com sucesso!" : "Ocorreram problemas ao inserir o Estado!"); 
        }catch (PDOException $e){
            $this->retorno->setStatus(false);
            $this->retorno->setMensagem("Ocorreram problemas ao inserir o Estado!");
            $this->retorno->setMensagemException($e);
        }
        return $this->retorno;
    }

    function editarEstado(){
        try{
        $sql = 'update estado set status = :status, uf = :uf where id_estado = :id_estado';
        $stmt = Conexao::getInstance()->prepare($sql);
        
            $this->retorno->setStatus($stmt->execute(array('id_estado' => $this->id_estado, 'status'=>  $this->status, 'uf'=> $this->uf)));
            $this->retorno->setMensagem($this->retorno->getStatus() ? "Estado editado com sucesso!" : "Ocorreram problemas ao editar o Estado!"); 
        }catch (PDOException $e){
            $this->retorno->setStatus(false);
            $this->retorno->setMensagem("Ocorreram problemas ao editar o Estado!");
            $this->retorno->setMensagemException($e);
        }
        return $this->retorno;
    }

    function excluirEstado(){
        try{
        $sql = 'delete from estado where id_estado= :id_estado';
        $stmt = Conexao::getInstance()->prepare($sql);
        
            $this->retorno->setStatus($stmt-> execute(array('id_estado'=>  $this->id_estado)));
            $this->retorno->setMensagem($this->retorno->getStatus() ? "Estado excluido com sucesso!" : "Ocorreram problemas ao excluir o Estado!"); 
        }catch (PDOException $e){
            $this->retorno->setStatus(false);
            $this->retorno->setMensagem("Ocorreram problemas ao excluir o Estado!");
            $this->retorno->setMensagemException($e);
        }
        return $this->retorno;
    }
}
