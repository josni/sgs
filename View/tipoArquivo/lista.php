<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/tipoArquivo.class.php');
    $objtipoArquivo = new TipoArquivo();
    $listatipoArquivo = $objtipoArquivo->gettipoArquivo();
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
<div style="padding-top: 50px">
    <h2 style="text-align:center;" class="alert alert-success">Lista de Tipos de Arquivo</h1>
    <table id="example" class="table table-striped table-bordered">
     <table id="example" class="table table-striped table-bordered">
    <div class="input-prepend">
           <span class="add-on"><i class="icon-plus"></i></span>
           <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../tipoArquivo/cadastro.php';">
        </div>
        <thead>
            <tr class="alert alert-danger">
                <th style="text-align:center;">ID</th>
                <th style="text-align:center;">Nome</th>
                <th style="text-align:center;">Ativo</th>
                <th style="text-align:center;">Opera&ccedil;&atilde;o</th>
            </tr>
        </thead>                
        <tbody>
        <?php for($i=0; $i<count($listatipoArquivo); $i++){?>
            <tr>
                <td style="text-align:center;"><?php echo $listatipoArquivo[$i]['id_tipo_arq']; ?></td>
                <td style="text-align:center;"><?php echo $listatipoArquivo[$i]['nome_tipo_arq']; ?></td>
                <td style="text-align:center;"><?php if ($listatipoArquivo[$i]['status'] == true){
                    echo "Sim";
                }else{
                    echo "Não"; }?></td>
                <td style="text-align:center;">
                    <a href="cadastro.php?id=<?php echo $listatipoArquivo[$i]['id_tipo_arq']; ?>" class="btn btn-success">Editar</a>
                    <a href="../../Controller/tipoArquivo.controller.php?id=<?php echo $listatipoArquivo[$i]['id_tipo_arq']; ?>&OPERACAO=EXCLUIR" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>               
    </table>
</div>