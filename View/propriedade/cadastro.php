<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/propriedade.class.php');

        $objPropriedade = new Propriedade();
        $listaPropriedade = $objPropriedade->getPropriedadeEspec($_GET['id']);
        if (($_GET['id']) ==  $listaPropriedade[0]['id_prop']) {
               
            $operacao = 'EDITAR';
        }
        else{
            $operacao = 'CADASTRAR';
        }

?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script src="../../assets/js/map.js"></script>
    <script src="../../assets/css/map.css"></script>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
    <form name="form_propriedade" id="form_cadastro" action="/sgs/Controller/propriedade.controller.php" method="post">
        <div style="padding-top: 50px">
            <h2 style="text-align:center;" class="alert alert-success">Cadastro de Propriedade</h2>
            <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">

                <input name="OPERACAO" type="hidden" value="<?php echo $operacao;?>" >
                <input name="IDSOCIO" type="hidden" value="<?php echo $_GET['id'];?>">
                <input name="ID" type="hidden">
                NOME:<input type="text" name="NOME" required class="input-block-level"><br />
                CCIR:<input type="text" name="CCIR" required class="input-block-level"><br />
                ITR:<input type="text" name="ITR" data-required class="input-block-level"><br />
                LATITUDE:<input type="text" name="lat" id="lat" data-required class="input-block-level"><br />
                LONGITUDE:<input type="text" name="lng" id="lng" data-required class="input-block-level"><br />
                <div id="mapa" style="height: 500px; width: 500px"></div><br />
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>
        </div>
    </form>


<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_propriedade){
        ID.value = '<?php echo $listaPropriedade[0]['id_prop']; ?>';
        NOME.value = '<?php echo $listaPropriedade[0]['nome_prop']; ?>';
        CCIR.value = '<?php echo $listaPropriedade[0]['ccir']; ?>';
        ITR.value = '<?php echo $listaPropriedade[0]['itr']; ?>';
        lng.value = '<?php echo $listaPropriedade[0]['longitude']; ?>';
        lat.value = '<?php echo $listaPropriedade[0]['latitude']; ?>';
    }
</script>
<?php } 