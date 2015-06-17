<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/unidadeProducao.class.php');

        $objUnidadeProducao = new UnidadeProducao();
        $listaUnidadeProducao = $objUnidadeProducao->getUnidadeProducaoEspec($_GET['id']);
        $operação = 'EDITAR';
    }
    else{
        $operação = 'CADASTRAR';
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoUnidadeProducao.class.php');
    $objUnidade = new TipoUnidadeProducao();
    $listaUnidade = $objUnidade->getTipoUnidade();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
<form name="form_cadastro" id="form_cadastro" action="/sgs/Controller/unidadeProducao.controller.php" method="post">
    <div style="padding-top: 50px">
        <h2 style="text-align:center;" class="alert alert-success">Cadastro de Unidade de Produ&ccedil;&atilde;o</h2>
        <div id="content" style="max-width: 700px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">
            <input name="OPERACAO" type="hidden" value="<?php echo $operação;?>" >
            <input name="ID" type="hidden">
            NOME:<input type="text" name="NOME" required class="input-block-level"><br/>
            UNIDADE: <br /><?php 
            $total = count($listaUnidade);
            for ($i=0; $i < $total; $i++) { ?>
            <label class="checkbox inline">
                <input type="checkbox" name="UNIDADE[]" value="<?php echo $listaUnidade[$i]['id_tipo_und']; ?>"><?php echo $listaUnidade[$i]['nome_und']; ?><br>
            </label>
            <?php } ?><br /><br />
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </div>
</form>

<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_cadastro){
        ID.value = '<?php echo $listaUnidadeProducao[0]['id_und_prod']; ?>';
        NOME.value = '<?php echo $listaUnidadeProducao[0]['nome_und_prod']; ?>';
        UNIDADE.value = '<?php echo $listaUnidadeProducao[0]['id_tipo_und']; ?>';
    }
</script>
<?php } 