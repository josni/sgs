<?php
 require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/socio.class.php');
    $objSocio = new Socio();
    $listaSocio = $objSocio->getSocioEspec($_GET['id']);
   

?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="assets/js/jquery-1.9.1.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
     <script type="text/javascript">
        function listaProp(){
            $.ajax({
                url: '../propriedade/lista.php?id=<?php for($i=0; $i<count($listaSocio); $i++){ echo $listaSocio[$i]['id_pessoa']; }?>',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

         function listaDoc(){
            $.ajax({
                url: '../documento/lista.php?id=<?php for($i=0; $i<count($listaSocio); $i++){ echo $listaSocio[$i]['id_pessoa']; }?>',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

         function listaDep(){
            $.ajax({
                url: '../dependente/lista.php?id=<?php for($i=0; $i<count($listaSocio); $i++){ echo $listaSocio[$i]['id_pessoa']; }?>',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

         function listaProd(){
            $.ajax({
                url: '../producao/lista.php?id=<?php for($i=0; $i<count($listaSocio); $i++){ echo $listaSocio[$i]['id_pessoa']; }?>',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

         function listaArq(){
            $.ajax({
                url: '../arquivo/lista.php?id=<?php for($i=0; $i<count($listaSocio); $i++){ echo $listaSocio[$i]['id_pessoa']; }?>',
               success: function(data) {
                    $('#conteudo').html(data);
               }
            });
        }

    </script>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?> 
<div style="padding-top: 50px">
    <?php for($i = 0; $i<count($listaSocio); $i++){?>
            <h4 style="text-align:center;"> Nome Associado:   <?php echo $listaSocio[$i]['nome'];?></h4>
        
        
        <?php } ?>
    <div style=" width: 620px; margin: 20px auto 0px;">

        <div class="row-fluid">

            <div class="navbar navbar-default" role="navigation" style="width: 620px; background-color: #FFFFFF;" >
                <div class="navbar-inner">
                    <div class="container-fluid">
                             <a data-target=".socio" data-toggle="collapse" class="btn btn-navbar collapsed"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
                        <div class="nav-collapse navbar-responsive-collapse collapse socio">
                            <ul id="menu" class="nav nav-tabs nav-justified">
                                <li>
                                    <a href="#" onClick="listaProp()">Propriedade</a>
                                </li>
                                <li>
                                    <a href="#" onClick="listaDoc()">Documentos</a>
                                </li>
                                <li>
                                    <a href="#" onClick="listaDep()">Dependente</a>
                                </li>
                                <li>
                                    <a href="#" onClick="listaProd()">Produção</a>
                                </li>
                                <li>
                                    <a href="#" onClick="listaArq()">Arquivos</a>
                                </li>
                                
                            </ul>
                        </div>                        
                    </div>
                </div>                
            </div>   
        </div>
    </div>
</div>

   


<div id="conteudo">
 <?php require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/View/propriedade/lista.php'); ?>

        
</div>
   
</body>
</html>