<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class Producao extends Conexao{
    public $id_producao;
    public $qtd;
    public $id_prop;
    public $id_und_prod;

    public $nome_prop;
    public $nome_und;
    public $nome_und_prod;


    public $setPropEspc;

    function setPropPessoa($prop){
        $this->setPropEspc = $prop;
    }

     function getPropPessoa(){
        return $this->setPropEspc;
    }
    
    function getProducaoEspec($id_producao){
        //$sql = 'select id_producao, qtd, id_prop, propriedade.nome_prop, und_producao.nome_und_prod, tipo_und_prod.nome_und, id_und_prod from producao where id_producao = :id_producao';
        //$sql = 'select producao.id_producao, producao.qtd, producao.id_prop, propriedade.nome_prop, und_producao.nome_und_prod, und_producao.id_und_prod from producao
            //inner join propriedade on producao.id_prop = propriedade.id_prop inner join und_producao on producao.id_und_prod = und_producao.id_und_prod 
            //where id_producao = :id_producao';
        $sql = 'select id_producao, qtd, und_tipo.id_tipo_und, und_producao.nome_und_prod, propriedade.nome_prop,
         tipo_und_prod.nome_und from producao inner join propriedade on producao.id_prop = propriedade.id_prop 
         inner join und_producao on producao.id_und_prod = und_producao.id_und_prod 
         inner join und_tipo on und_tipo.id_und_prod = und_producao.id_und_prod 
         inner join tipo_und_prod on und_tipo.id_tipo_und = tipo_und_prod.id_tipo_und where id_producao = :id_producao';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_producao'=>  $id_producao));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirProducao(){
        $sql = 'insert into producao (qtd, id_prop, id_und_prod) values(:qtd, :id_prop, :id_und_prod)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('qtd' => $this->qtd, 'id_prop' => $this->id_prop, 'id_und_prod' => $this->id_und_prod));
    }

    function editarProducao(){
        $sql = 'update producao set qtd = :qtd, id_prop = :id_prop, id_und_prod = :id_und_prod where id_producao = :id_producao';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_producao' => $this->id_producao, 'qtd' => $this->qtd, 'id_prop' => $this->id_prop, 'id_und_prod' => $this->id_und_prod));
    }

    function excluirProducao(){
        $sql = 'delete from producao where id_producao= :id_producao';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_producao' =>  $this->id_producao));
    }

     function getProducaoPropriedade($prop) { 
        $sql = 'select id_producao, qtd, und_tipo.id_tipo_und, und_producao.nome_und_prod, propriedade.nome_prop,
         tipo_und_prod.nome_und from producao inner join propriedade on producao.id_prop = propriedade.id_prop 
         inner join und_producao on producao.id_und_prod = und_producao.id_und_prod 
         inner join und_tipo on und_tipo.id_und_prod = und_producao.id_und_prod 
         inner join tipo_und_prod on und_tipo.id_tipo_und = tipo_und_prod.id_tipo_und
         inner join socio on propriedade.id_pessoa_prop = socio.id_pessoa_socio
         where producao.id_prop = propriedade.id_prop
         and propriedade.id_pessoa_prop = socio.id_pessoa_socio
         and socio.id_pessoa_socio = :prop';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('prop' => $prop ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
    