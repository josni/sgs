<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class Propriedade extends Conexao{
    public $id_prop;
    public $nome_prop;
    public $ccir;
    public $itr;
    public $longitude;
    public $latitude;
    public $id_pessoa_prop;
    public $id_pessoa_socio;

    public $setPropEspc;

    function setPropPessoa($prop){
        $this->setPropEspc = $prop;
    }

     function getPropPessoa(){
        return $this->setPropEspc;
    }

    
    function getPropriedade(){
        $sql = 'select id_prop, nome_prop, ccir, itr from propriedade inner join socio on propriedade.id_pessoa_prop = socio.id_pessoa_socio';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }
    
    function getPropriedadeEspec($id_prop){
        $sql = 'select id_prop, nome_prop, ccir, itr, longitude, latitude, id_pessoa_prop from propriedade where id_prop = :id_prop';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_prop'=>  $id_prop));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirPropriedade(){
        $sql = 'insert into propriedade (nome_prop, ccir, itr, longitude, latitude, id_pessoa_prop) values(:nome_prop, :ccir, :itr, :longitude, :latitude, :id_pessoa_prop)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('nome_prop' => $this->nome_prop, 'ccir' => $this->ccir, 'itr' => $this->itr, 'longitude' => $this->longitude, 'latitude' => $this->latitude, 'id_pessoa_prop' => $this->id_pessoa_prop));
    }

    function editarPropriedade(){
        $sql = 'update propriedade set nome_prop = :nome_prop, ccir = :ccir, itr = :itr, longitude = :longitude, latitude = :latitude, id_pessoa_prop = :id_pessoa_prop where id_prop = :id_prop';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_prop' => $this->id_prop, 'nome_prop'=>  $this->nome_prop, 'ccir'=> $this->ccir, 'itr' => $this->itr, 'longitude' => $this->longitude, 'latitude' => $this->latitude, 'id_pessoa_prop' => $this->id_pessoa_prop));
    }

    function excluirPropriedade(){
        $sql = 'delete from propriedade where id_prop= :id_prop';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_prop'=>  $this->id_prop));
    }
}
