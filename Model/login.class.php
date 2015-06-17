<html>

<script>
    function loginsucessfullyAdm(){
        setTimeout("window.location='/sgs/index.php'",100);
}
// function loginfailed(){
//         setTimeout("window.location='/sgs/View/login/login.php'",1000);
// }
    
</script>
</html> 


<?php
require_once('../config/conexao.class.php');
class Logar{
    
    public function validaLogin(){
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        

        if(empty($login)){
          echo "Login deve ser preenchido!";
        }elseif (empty($senha)) {
          echo "Senha deve ser preenchido!!";
        }else{


        $sql = "select * from funcionario where login = '$login'";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
        $obj = $stmt->fetch(PDO::FETCH_ASSOC);
        $senhaDoBanco = $obj['senha'];
        $senhaCripty = crypt($senha, $senhaDoBanco);
        if($senhaDoBanco == $senhaCripty){
           $admin = $obj['admin'];

           $id_pessoa = $obj["id_pessoa_func"];

           $sql1 = "select * from pessoa where id_pessoa = '$id_pessoa'";
           $stmt1 = Conexao::getInstance()->prepare($sql1);
           $stmt1->execute();
           while ($obj1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
             $nmpessoa = $obj1['nome'];
             $id = $obj1['id_pessoa'];
            }
            session_start();
            $_SESSION['login']=$_POST['login'];
            $_SESSION['nome'] = $nmpessoa;
            $_SESSION['admin'] = $admin;
            $_SESSION['id_pessoa'] = $id;

            echo "<script>loginsucessfullyAdm()</script>";

         }else{
           echo "Senha e usuario incorretos!";
           //  echo "<script>loginfailed()</script>";
        }
      }
   }
 }

