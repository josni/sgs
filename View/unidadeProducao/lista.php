<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/unidadeProducao.class.php');
    $objUnidadeProducao = new UnidadeProducao();
    $listaUnidadeProducao = $objUnidadeProducao->getUnidadeProducao();
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

<div style="padding-top: 50px">
    <h2 style="text-align:center;" class="alert alert-success">Lista de Unidades de Produção</h2>
    <table id="example" class="table table-striped table-bordered">
        <div class="input-prepend">
           <span class="add-on"><i class="icon-plus"></i></span>
           <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../unidadeProducao/cadastro.php';">
        </div>
        <thead>
            <tr class="alert alert-danger">
                <th style="text-align:center;">ID</th>
                <th style="text-align:center;">NOME</th>
                <th style="text-align:center;">Opera&ccedil;&atilde;o</th>
            </tr>
        </thead>                
        <tbody>
        <?php for($i=0; $i<count($listaUnidadeProducao); $i++){?>
            <tr>
                <td style="text-align:center;"><?php echo $listaUnidadeProducao[$i]['id_und_prod']; ?></td>
                <td style="text-align:center;"><?php echo $listaUnidadeProducao[$i]['nome_und_prod'] . " - " . $listaUnidadeProducao[$i]['nome_und']; ?></td>
                <td style="text-align:center;">
                    <a href="cadastro.php?id=<?php echo $listaUnidadeProducao[$i]['id_und_prod']; ?>" class="btn btn-success">Editar</a>
                    <a href="../../Controller/unidadeProducao.controller.php?id=<?php echo $listaUnidadeProducao[$i]['id_und_prod']; ?>&OPERACAO=EXCLUIR" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>               
    </table>
</div>

