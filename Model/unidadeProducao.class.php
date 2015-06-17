<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class UnidadeProducao extends Conexao{
    public $id_und_prod;
    public $nome_und_prod;
    public $id_tipo_und;
    public $id_und_prod_tipo;
    
    function getUnidadeProducaoEspec($id_und_prod){
        $sql = 'select und_producao.id_und_prod, nome_und_prod, und_tipo.id_tipo_und from und_producao inner join und_tipo on und_producao.id_und_prod = und_tipo.id_und_prod where und_producao.id_und_prod = :id_und_prod';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_und_prod'=>  $id_und_prod));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirUnidadeProducao(){
        $sql = 'insert into und_producao (nome_und_prod) values(:nome_und_prod) returning id_und_prod';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('nome_und_prod' => $this->nome_und_prod));
        $this->id_und_prod_tipo= $stmt->fetchALL(PDO::FETCH_ASSOC);
        $this->id_und_prod_tipo = $this->id_und_prod_tipo[0]['id_und_prod'];
    }

    function inserirUnidadeTipo(){
        $sql = 'insert into und_tipo (id_tipo_und, id_und_prod) values(:id_tipo_und, :id_und_prod_tipo)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_tipo_und' => $this->id_tipo_und, 'id_und_prod_tipo' => $this->id_und_prod_tipo));
    }

    function getUltimoId(){
        return $this->id_und_prod_tipo;
    }

   function editarUnidadeProducao(){
        $sql = 'update und_producao set nome_und_prod = :nome_und_prod where id_und_prod = :id_und_prod';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_und_prod' => $this->id_und_prod, 'nome_und_prod' => $this->nome_und_prod));
    }

    function editarUnidadeTipo(){
        $sql = 'update und_tipo set id_tipo_und = :id_tipo_und, id_und_prod = :id_und_prod_tipo';
        $stmt = Conexao::getInstance()->prepare($sql);
       $stmt->execute(array('id_tipo_und' => $this->id_tipo_und, 'id_und_prod_tipo' => $this->id_und_prod_tipo));
    }

    function excluirUnidadeProducao(){
        $sql = 'delete from und_producao where id_und_prod= :id_und_prod';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_und_prod' =>  $this->id_und_prod));
    }

     function getUnidadeProducao() { 
        $sql = 'select tipo_und_prod.nome_und, und_producao.id_und_prod, nome_und_prod, und_tipo.id_tipo_und from und_producao inner join und_tipo on und_producao.id_und_prod = und_tipo.id_und_prod inner join tipo_und_prod on und_tipo.id_tipo_und = tipo_und_prod.id_tipo_und';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
