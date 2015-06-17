<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/config/conexao.class.php');

class Relatorio extends Conexao{

    function getAniversariante(){
        $sql = "select * from(select *, (extract(year from age(data_nasc)) + 1)
                 * interval '1 year' + data_nasc as prox_aniver, 
                  extract(year from age(data_nasc)) as idade from pessoa 
                  inner join socio on pessoa.id_pessoa = socio.id_pessoa_socio) 
                  as socio_prox_aniver where prox_aniver between now() and now() + 
                  interval '7 days' and status_pessoa = true order by prox_aniver desc";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function getNovosAssociados(){
        $sql = 'select pessoa.nome, data_assoc, id_pessoa_socio from socio inner join pessoa on socio.id_pessoa_socio = pessoa.id_pessoa order by data_assoc desc limit 5';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    function getEvolucao(){
        $sql = 'select extract(year from data_assoc) as ano,
                  sum(case when extract(month from data_assoc)= 1 then 1 else 0 end) as jan,
                  sum(case when extract(month from data_assoc)= 2 then 1 else 0 end) as fev,
                  sum(case when extract(month from data_assoc)= 3 then 1 else 0 end) as mar,
                  sum(case when extract(month from data_assoc)= 4 then 1 else 0 end) as abr,
                  sum(case when extract(month from data_assoc)= 5 then 1 else 0 end) as mai,
                  sum(case when extract(month from data_assoc)= 6 then 1 else 0 end) as jun,
                  sum(case when extract(month from data_assoc)= 7 then 1 else 0 end) as jul,
                  sum(case when extract(month from data_assoc)= 8 then 1 else 0 end) as ago,
                  sum(case when extract(month from data_assoc)= 9 then 1 else 0 end) as set,
                  sum(case when extract(month from data_assoc)= 10 then 1 else 0 end) as out,
                  sum(case when extract(month from data_assoc)= 11 then 1 else 0 end) as nov,
                  sum(case when extract(month from data_assoc)= 12 then 1 else 0 end) as dez,
                  sum(1) as total
                from socio inner join pessoa on socio.id_pessoa_socio = pessoa.id_pessoa group by ano order by 1 desc,2 limit 3';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    
    function getAssociadosAno($ano){
        $sql = 'select extract(year from data_assoc) as ano,
                  sum(case when extract(month from data_assoc)= 1 then 1 else 0 end) as jan,
                  sum(case when extract(month from data_assoc)= 2 then 1 else 0 end) as fev,
                  sum(case when extract(month from data_assoc)= 3 then 1 else 0 end) as mar,
                  sum(case when extract(month from data_assoc)= 4 then 1 else 0 end) as abr,
                  sum(case when extract(month from data_assoc)= 5 then 1 else 0 end) as mai,
                  sum(case when extract(month from data_assoc)= 6 then 1 else 0 end) as jun,
                  sum(case when extract(month from data_assoc)= 7 then 1 else 0 end) as jul,
                  sum(case when extract(month from data_assoc)= 8 then 1 else 0 end) as ago,
                  sum(case when extract(month from data_assoc)= 9 then 1 else 0 end) as set,
                  sum(case when extract(month from data_assoc)= 10 then 1 else 0 end) as out,
                  sum(case when extract(month from data_assoc)= 11 then 1 else 0 end) as nov,
                  sum(case when extract(month from data_assoc)= 12 then 1 else 0 end) as dez,
                  sum(1) as total
                from socio inner join pessoa on socio.id_pessoa_socio = pessoa.id_pessoa where extract(year from data_assoc) = :ano group by ano order by 1 desc,2 ';
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute(array("ano" => $ano));
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }    
}
