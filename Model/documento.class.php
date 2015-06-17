<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class Documento extends Conexao{
    public $id_pessoa;
    public $rua;
    public $nome;
    public $status_pessoa;
    public $cpf;
    public $rg;
    public $est_civil;
    public $numero_casa;
    public $cep;
    public $bairro;
    public $email;
    public $data_nasc;
    public $id_cidade_pessoa;


    public $id_documento;
    public $area;
    public $numero;
    public $id_tipo_doc;
    public $id_prop;
    public $id_pessoa_prop;

    public $setPropEspc;

    function setPropPessoa($prop){
        $this->setPropEspc = $prop;
    }

     function getPropPessoa(){
        return $this->setPropEspc;
    }

    
    function getDocumentoEspec($id_documento){
        $sql = 'select pessoa.id_pessoa, id_documento, area, numero, id_tipo_doc, id_prop from documento inner join pessoa on propriedade.id_pessoa_prop = pessoa.id_pessoa  where id_prop = :id_prop';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_documento'=>  $id_documento));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

    }

    function inserirDocumento(){
        $sql = 'insert into documento (area, numero, id_tipo_doc, id_prop) values(:area, :numero, :id_tipo_doc, :id_prop)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('area' => $this->area, 'numero' => $this->numero, 'id_tipo_doc' => $this->id_tipo_doc, 'id_prop' => $this->id_prop));
    }

    function editarDocumento(){
        $sql = 'update documento set area = :area, numero = :numero, id_tipo_doc = :id_tipo_doc, id_ prop = :id_prop where id_documento = :id_documento';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_documento' => $this->id_documento, 'area' => $this->area, 'numero' =>  $this->numero, 'id_tipo_doc' => $this->id_tipo_doc, 'id_prop' => $this->id_prop));
    }

    function excluirDocumento(){
        $sql = 'delete from documento where id_documento= :id_documento';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_documento' =>  $this->id_documento));
    }

    function getDocumentoTipo($prop) { 
        $sql = 'select tipo_doc.nome_tipo_doc, propriedade.nome_prop, id_documento, area, numero, documento.id_tipo_doc, 
        documento.id_prop from documento 
        inner join tipo_doc on documento.id_tipo_doc = tipo_doc.id_tipo_doc 
        inner join propriedade on documento.id_prop = propriedade.id_prop
        inner join socio on propriedade.id_pessoa_prop = socio.id_pessoa_socio
        where documento.id_prop = propriedade.id_prop
        and propriedade.id_pessoa_prop = socio.id_pessoa_socio
        and socio.id_pessoa_socio = :prop';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('prop' => $prop ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
