<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/tipoDocumento.class.php');
    $objtipoDocumento = new TipoDocumento();
    $listatipoDocumento = $objtipoDocumento->gettipoDocumento();
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
        
<div style="padding-top: 50px">
    <h2 style="text-align:center;" class="alert alert-success">Lista de Tipos de Documento</h2>
    <table id="example" class="table table-striped table-bordered">
        <div class="input-prepend">
           <span class="add-on"><i class="icon-plus"></i></span>
           <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../tipoDocumento/cadastro.php';">
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
        <?php for($i=0; $i<count($listatipoDocumento); $i++){?>
            <tr>
                <td style="text-align:center;"><?php echo $listatipoDocumento[$i]['id_tipo_doc']; ?></td>
                <td style="text-align:center;"><?php echo $listatipoDocumento[$i]['nome_tipo_doc']; ?></td>
                <td style="text-align:center;"><?php if ($listatipoDocumento[$i]['status'] == true){
                    echo "Sim";
                }else{
                    echo "Não"; }?></td>
                <td style="text-align:center;">
                    <a href="cadastro.php?id=<?php echo $listatipoDocumento[$i]['id_tipo_doc']; ?>" class="btn btn-success">Editar</a>
                    <a href="../../Controller/tipoDocumento.controller.php?id=<?php echo $listatipoDocumento[$i]['id_tipo_doc']; ?>&OPERACAO=EXCLUIR" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>               
    </table>
</div>