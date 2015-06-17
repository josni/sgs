
<html lang="pt">
        
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Gestão de Sindicatos - SGS</title>
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="../../assets/css/font-awesome.css" rel="stylesheet">
        <script type="text/javascript" charset="utf8" src="../../assets/js/jquery.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>

        <script type="text/javascript">
                $(document).ready(function(){
                               //Quando 'btnEntrar' for clicado
                               $("#btnEntrar").click(function(){
                                               //Envia por POST para a página login.php: usuario = valor da textbox usuario
                                               //e senha = valor da textbox senha (pegando valores pelo ID)
                                               var envio = $.post("../../Controller/login.controller.php", { 
                                               //var envio = $.post("teste.php", { 
                                               login: $("#login").val(), 
                                               senha: $("#senha").val() 
                                               })
          envio.done(function(data){
  // se retornou 1 entao os dados nao foram enviados
  if(data == 1){ 
// remove a classe css sucess da div
      $("#d").removeClass("sucess")
        // adiciona a classe error da div 
      $("#d").addClass("error")
        // insere na div o conteudo/mensagem de erro
     //$("#d").html(data)
  }else{
    // se nao retornou 1 entao os dados foram enviados
    // remove a classe error da div
    $("#d").removeClass("error")
    // adiciona a classe sucess na div 
    $("#d").addClass("sucess")
    // insere o conteudo vindo do data.php na div
    $("#d").html(data);
   }
  // torna a div invisivel
   $("#d").css("display","none");
  // torna a div visivel usando o efeito show com a slow de parametro
   $("#d").show("slow");
})
// efeito show na div 
 $("#d").show("slow");
            
            
            
                               });
                });
</script>




    </head>

    <body>

  <!--   <form name="form_login" action="teste.php" method="post"> -->
           <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">
            
                <h1>Identifica&ccedil;&atilde;o</h1>
                <input type="text" name="login" id="login" class="input-block-level" placeholder="Login" autofocus required/>
                <br />
                <input type="password" name="senha" id="senha" class="input-block-level" placeholder="Senha" required />
                <br />
                
                    <input type="button" value="Login" name="btnEntrar" id="btnEntrar" class="btn btn-primary"/>

              <div id="d" class="alert-error" style="margin: 20px auto 0px; font-size: 16;">
            
            </div>
<!--     </form> -->

    </body>

    </html>