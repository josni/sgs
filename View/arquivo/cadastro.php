<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/arquivo.class.php');

        $objArquivo = new Arquivo();
        $listaArquivo = $objArquivo->getArquivoEspec($_GET['id']);
        $operação = 'EDITAR';
    }
    else{
        $operação = 'CADASTRAR';
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/pessoa.class.php');
    $objPessoa = new Pessoa();
    $listaPessoa = $objPessoa->getPessoa();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoArquivo.class.php');
    $objTipoArquivo = new TipoArquivo();
    $listaTipoArquivo = $objTipoArquivo->getTipoArquivo();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>


    <form id="form_cadastro" name="form_cadastro" enctype="multipart/form-data" action="/sgs/Controller/arquivo.controller.php" method="post">
        <div style="padding-top: 50px">
        <h2 style="text-align:center;" class="alert alert-success">Cadastro de Arquivo</h2>
        <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">
            <input name="OPERACAO" type="hidden" value="<?php echo $operação;?>" >
            <input name="ID" type="hidden">
            <?php 
                if($operação == 'CADASTRAR'){
            ?>
            ARQUIVO:<input type="file" name="ARQUIVO" class="input-block-level"><br />
            <?php 
                }else{?>
                    <a class="btn btn-default" href="../../upload/<?php echo $listaArquivo[0]['caminho']; ?>"><i class="icon-large icon-file"></i> <?php echo $listaArquivo[0]['caminho']; ?></a>
                    <a href="../../Controller/arquivo.controller.php?id=<?php echo $listaArquivo[$i]['id_arquivo']; ?>&OPERACAO=EXCLUIR" class="btn btn-danger">Excluir</a>
                    <br /><br />
                    ARQUIVO:<input type="file" name="ARQUIVO" class="input-block-level"><br />
            <?php }
            ?>
            TIPO DE ARQUIVO:
            <select name="TIPO">
                <option value="">..Selecione..</option>
                <?php 
                    $total = count($listaTipoArquivo);
                    for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaTipoArquivo[$i]['id_tipo_arq']; ?>"><?php echo $listaTipoArquivo[$i]['nome_tipo_arq']; ?></option>
                <?php } ?>
            </select><br />
            S&OacuteCIO:
            <select name="PESSOA">
                <option value="">..Selecione..</option>
                <?php 
                    $total = count($listaPessoa);
                    for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaPessoa[$i]['id_pessoa']; ?>"><?php echo $listaPessoa[$i]['nome']; ?></option>
                <?php } ?>
            </select><br />
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </div>
    </form>

<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_cadastro){
        ID.value = '<?php echo $listaArquivo[0]['id_arquivo']; ?>';
        TIPO.value = '<?php echo $listaArquivo[0]['id_tipo_arq']; ?>';
        PESSOA.value = '<?php echo $listaArquivo[0]['id_pessoa']; ?>';
    }
</script>
<?php } 