<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/cidade.class.php');

        $objCidade = new Cidade();
        $listaCidade = $objCidade->getCidadeEspec($_GET['id']);
        $operação = 'EDITAR';
    }
    else{
        $operação = 'CADASTRAR';
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/estado.class.php');
    $objEstado = new Estado();
    $listaEstado = $objEstado->getEstado();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

    <form id="form_cadastro" name="form_cadastro" action="/sgs/Controller/cidade.controller.php" method="post">
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
            NOME:<input type="text" name="NOME" data-required class="input-block-level"><br />
            ESTADO:
            <select name="UF_ESTADO">
                <option value="">..Selecione..</option>
                <?php 
                    $total = count($listaEstado);
                    for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaEstado[$i]['id_estado']; ?>"><?php echo $listaEstado[$i]['uf']; ?></option>
                <?php } ?>
            </select><br />
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </form>
</body>    
</html>

<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_cadastro){
        ID.value = '<?php echo $listaCidade[0]['id_cidade']; ?>';
        STATUS.checked = '<?php echo $listaCidade[0]['status_cidade']; ?>';
        NOME.value = '<?php echo $listaCidade[0]['nome_cidade']; ?>';
        UF_ESTADO.value = '<?php echo $listaEstado[0]['id_estado']; ?>';
    }
</script>
<?php } ?>