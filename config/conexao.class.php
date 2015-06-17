<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/Retorno.class.php');
class Conexao {
   protected $retorno; 
   
   public static $instance; 
 
   public function Conexao(){
    $this->retorno = new Retorno();

   }

   public static function getInstance() { 
       if (!isset(self::$instance)) { 
           self::$instance = new PDO('pgsql:host=localhost;dbname=sgs', 'postgres', '16051989', 
                   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
           self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
           self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING); 
           
       } return self::$instance; 
       
       } 
       
       } 
       ?>
