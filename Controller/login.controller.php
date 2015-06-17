<?php 
     require_once($_SERVER['DOCUMENT_ROOT'].'../sgs/Model/login.class.php');


         if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){

                $objLogin = new Logar();
                $objLogin->validaLogin();
             
               }
         
?> 