<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/tipoUnidadeProducao.class.php');
    $objTipoUnidadeProducao = new TipoUnidadeProducao();
    $listaTipoUnidadeProducao = $objTipoUnidadeProducao->getTipoUnidade();
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
        
<div style="padding-top: 50px">
    <h2 style="text-align:center;" class="alert alert-success">Lista de Tipos de Unidades de Produção</h2>
    <table id="example" class="table table-striped table-bordered">
        <div class="input-prepend">
           <span class="add-on"><i class="icon-plus"></i></span>
           <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../tipoUnidadeProducao/cadastro.php';">
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
        <?php for($i=0; $i<count($listaTipoUnidadeProducao); $i++){?>
            <tr>
                <td style="text-align:center;"><?php echo $listaTipoUnidadeProducao[$i]['id_tipo_und']; ?></td>
                <td style="text-align:center;"><?php echo $listaTipoUnidadeProducao[$i]['nome_und']; ?></td>
                <td style="text-align:center;"><?php if ($listaTipoUnidadeProducao[$i]['status'] == true){
                    echo "Sim";
                }else{
                    echo "Não"; }?></td>
                <td style="text-align:center;">
                    <a href="cadastro.php?id=<?php echo $listaTipoUnidadeProducao[$i]['id_tipo_und']; ?>" class="btn btn-success">Editar</a>
                    <a href="../../Controller/tipoUnidadeProducao.controller.php?id=<?php echo $listaTipoUnidadeProducao[$i]['id_tipo_und']; ?>&OPERACAO=EXCLUIR" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>               
    </table>
</div>