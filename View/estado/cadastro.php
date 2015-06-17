<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/estado.class.php');

        $objEstado = new Estado();
        $listaEstado = $objEstado->getEstadoEspec($_GET['id']);
        $operação = 'EDITAR';
    }
    else{
        $operação = 'CADASTRAR';
    }
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
    
    <form name="form_cadastro" id="form_cadastro" action="/sgs/Controller/estado.controller.php" method="post">
        <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">
            <input name="OPERACAO" type="hidden" value="<?php echo $operação;?>" >
            <input name="ID" type="hidden">
                <?php 
                    if($operação == 'EDITAR')
                    {
                ?>
                    ATIVO:<input type="checkbox" name="STATUS" class="input-block-level" />

                 <?php 
                   }
                ?>
            UF:<input type="text" name="UF" class="input-block-level"></br>
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </form>
</body>    
</html>

<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_cadastro){
        ID.value = '<?php echo $listaEstado[0]['id_estado']; ?>';
        STATUS.checked = '<?php echo $listaEstado[0]['status']; ?>';
        UF.value = '<?php echo $listaEstado[0]['uf']; ?>';
    }
</script>
<?php } 