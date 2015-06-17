<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/producao.class.php');

        $objProducao = new Producao();
        $listaProducao = $objProducao->getProducaoEspec($_GET['id']);
        $operação = 'EDITAR';
    }
    else{
        $operação = 'CADASTRAR';
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/propriedade.class.php');
    $objPropriedade = new Propriedade();
    $listaPropriedade = $objPropriedade->getPropriedade();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/unidadeProducao.class.php');
    $objUnidadeProducao = new UnidadeProducao();
    $listaUnidadeProducao = $objUnidadeProducao->getUnidadeProducao();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

<form id="form_producao" name="form_cadastro" action="/sgs/Controller/producao.controller.php" method="post">
    <div style="padding-top: 50px">
        <h2 style="text-align:center;" class="alert alert-success">Cadastro de Produção</h2>
        <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">
           <input name="OPERACAO" type="hidden" value="<?php echo $operação;?>" >
            <input name="ID" type="hidden">
            PROPRIEDADE:
            <select name="PROPRIEDADE">
                <option value="">..Selecione..</option>
                <?php 
                    $total = count($listaPropriedade);
                    for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaPropriedade[$i]['id_prop']; ?>"><?php echo $listaPropriedade[$i]['nome_prop']; ?></option>
                <?php } ?>
            </select><br />
            UNIDADE:
            <select name="UNIDADE">
                <option value="">..Selecione..</option>
                <?php 
                    $total = count($listaUnidadeProducao);
                    for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaUnidadeProducao[$i]['id_und_prod']; ?>"><?php echo $listaUnidadeProducao[$i]['nome_und_prod'] . " - " . $listaUnidadeProducao[$i]['nome_und']; ?></option>
                <?php } ?>
            </select><br />
            QUANTIDADE:<input type="text" name="QTD" data-required class="input-block-level"><br />
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </div>
</form>

<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_producao){
        ID.value = '<?php echo $listaProducao[0]['id_producao']; ?>';
        PROPRIEDADE.value = '<?php echo $listaProducao[0]['nome_prop']; ?>';
        UNIDADE.value = '<?php echo $listaProducao[0]['nome_und_prod'] . " - " . $listaProducao[0]['nome_und']; ?>';
        QTD.value = '<?php echo $listaProducao[0]['qtd']; ?>';

    }
</script>
<?php } ?>