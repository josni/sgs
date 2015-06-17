<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class Arquivo extends Conexao{
    public $id_arquivo;
    public $caminho;
    public $id_tipo_arq;
    public $id_pessoa_arquivo;

     public $setPropEspc;

    function setPropPessoa($prop){
        $this->setPropEspc = $prop;
    }

     function getPropPessoa(){
        return $this->setPropEspc;
    }
    
    function getArquivoEspec($id_arquivo){
        $sql = 'select id_arquivo, caminho, id_tipo_arq, id_pessoa_arquivo from arquivo where id_arquivo = :id_arquivo';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_arquivo'=>  $id_arquivo));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function inserirArquivo(){
        $sql = 'insert into arquivo (caminho, id_tipo_arq, id_pessoa_arquivo) values(:caminho, :id_tipo_arq, :id_pessoa_arquivo)';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('caminho' => $this->caminho, 'id_tipo_arq' => $this->id_tipo_arq, 'id_pessoa_arquivo' => $this->id_pessoa_arquivo));
    }

    function editarArquivo(){
        $sql = 'update arquivo set caminho = :caminho, id_tipo_arq = :id_tipo_arq, id_pessoa_arquivo = :id_pessoa_arquivo where id_arquivo = :id_arquivo';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('id_arquivo' => $this->id_arquivo, 'caminho' => $this->caminho, 'id_tipo_arq' =>  $this->id_tipo_arq, 'id_pessoa_arquivo' => $this->id_pessoa_arquivo));
    }

    function excluirArquivo(){
        $sql = 'delete from arquivo where id_arquivo= :id_arquivo';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt-> execute(array('id_arquivo' =>  $this->id_arquivo));
    }

     function getArquivoTipoPessoa($prop) { 
        $sql = 'select tipo_arquivo.nome_tipo_arq, pessoa.nome, id_arquivo, caminho, arquivo.id_tipo_arq, arquivo.id_pessoa_arquivo from arquivo 
        inner join tipo_arquivo on arquivo.id_tipo_arq = tipo_arquivo.id_tipo_arq 
        inner join pessoa on arquivo.id_pessoa_arquivo = pessoa.id_pessoa 
        inner join socio on pessoa.id_pessoa = socio.id_pessoa_socio
        where socio.id_pessoa_socio = :prop;';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array('prop' => $prop ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
