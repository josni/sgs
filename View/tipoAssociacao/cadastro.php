<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoAssociacao.class.php');

        $objtipoAssociacao = new tipoAssociacao();
        $listatipoAssociacao = $objtipoAssociacao->getTipoAssociacaoEspec($_GET['id']);
        $operação = 'EDITAR';
    }
    else{
        $operação = 'CADASTRAR';
    }
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
    
<form name="form_cadastro" id="form_cadastro" action="/sgs/Controller/tipoAssociacao.controller.php" method="post">
    <div style="padding-top: 50px">
        <h2 style="text-align:center;" class="alert alert-success">Cadastro de Tipo de Tipo de Associa&ccedil;&atilde;o</h2>
        <div id="content" style="max-width: 700px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">
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
            TIPO DE ASSOCIACAO:<input type="text" name="TIPO" data-required class="input-block-level"></br>
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </div>
</form>

<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_cadastro){
        ID.value = '<?php echo $listatipoAssociacao[0]['id_tipo_assoc']; ?>';
        STATUS.checked = '<?php echo $listatipoAssociacao[0]['status']; ?>';
        TIPO.value = '<?php echo $listatipoAssociacao[0]['nome_tipo_assoc']; ?>';
    }
</script>
<?php } 