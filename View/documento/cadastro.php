<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/documento.class.php');
        $objDocumento = new Documento();
        $listaDocumento = $objDocumento->getDocumentoEspec($_GET['id']);
        if (($_GET['id']) ==  $listaDocumento[0]['id_documento']) {
            $operacao = 'EDITAR';
        }
        else{
            $operacao = 'CADASTRAR';
        }

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoDocumento.class.php');
    $objTipoDocumento = new TipoDocumento();
    $listaTipoDocumento = $objTipoDocumento->getTipoDocumento();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/propriedade.class.php');
    $objPropriedade = new Propriedade();
    $listaPropriedade = $objPropriedade->getPropriedade();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

<form id="form_documento" name="form_cadastro" action="/sgs/Controller/documento.controller.php" method="post">
    <div style="padding-top: 50px">
        <h2 style="text-align:center;" class="alert alert-success">Cadastro de Documento</h2>
        <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">
            <input name="OPERACAO" type="hidden" value="<?php echo $operacao;?>" >
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
            AREA EM METROS:<input type="text" name="AREA" data-required class="input-block-level"><br />
            TIPO:
            <select name="TIPO">
                <option value="">..Selecione..</option>
                <?php 
                    $total = count($listaTipoDocumento);
                    for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaTipoDocumento[$i]['id_tipo_doc']; ?>"><?php echo $listaTipoDocumento[$i]['nome_tipo_doc']; ?></option>
                <?php } ?>
            </select><br />
            NUMERO:<input type="text" name="NUMERO" data-required class="input-block-level"><br />
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </div>
</form>

<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_documento){
        ID.value = '<?php echo $listaDocumento[0]['id_documento']; ?>';
        AREA.value = '<?php echo $listaDocumento[0]['area']; ?>';        
        NUMERO.value = '<?php echo $listaDocumento[0]['numero']; ?>';
        TIPO.value = '<?php echo $listaDocumento[0]['id_tipo_doc']; ?>';        
        PROPRIEDADE.value = '<?php echo $listaDocumento[0]['id_prop']; ?>';
    }
</script>
<?php } 