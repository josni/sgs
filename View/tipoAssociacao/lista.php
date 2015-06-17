<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/tipoAssociacao.class.php');
    $objtipoAssociacao = new TipoAssociacao();
    $listatipoAssociacao = $objtipoAssociacao->gettipoAssociacao();
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

<div style="padding-top: 50px">
    <h2 style="text-align:center;" class="alert alert-success">Lista de Tipos de Associação</h2>
    <table id="example" class="table table-striped table-bordered">
        <div class="input-prepend">
           <span class="add-on"><i class="icon-plus"></i></span>
           <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../tipoAssociacao/cadastro.php';">
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
        <?php for($i=0; $i<count($listatipoAssociacao); $i++){?>
            <tr>
                <td style="text-align:center;"><?php echo $listatipoAssociacao[$i]['id_tipo_assoc']; ?></td>
                <td style="text-align:center;"><?php echo $listatipoAssociacao[$i]['nome_tipo_assoc']; ?></td>
                <td style="text-align:center;"><?php if ($listatipoAssociacao[$i]['status'] == true){
                    echo "Sim";
                }else{
                    echo "Não"; }?></td>
                <td style="text-align:center;">
                    <div class="input-prepend">

                        <a href="cadastro.php?id=<?php echo $listatipoAssociacao[$i]['id_tipo_assoc']; ?>" <span class="add-on"><i class="icon-edit"></i></span></a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>               
    </table>
</div>
