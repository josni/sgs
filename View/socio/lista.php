<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/socio.class.php');
    $objSocio = new Socio();
    $listaSocio = $objSocio->getSocioPessoa();

    // require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/dependente.class.php');
    // $objDependente = new Dependente();
    // $count = $objDependente->countDep();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

<div style="padding-top: 50px">
    <table id="example" class="table table-striped table-bordered">
    <h2 style="text-align:center;" class="alert alert-success">Lista de Sócio</h2>
     
        <div class="input-prepend">
           <span class="add-on"><i class="icon-plus"></i></span>
           <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../socio/cadastro.php';">
        </div>
       
        <thead>
            <tr class="alert alert-danger">
                <th style="text-align:center;">Id</th>
                <th style="text-align:center;">Nome</th>
                <th style="text-align:center;">Bairro</th>
                <th style="text-align:center;">Associado desde</th>
                <th style="text-align:center;">Dependentes</th>
                <th style="text-align:center;">Op&ccedil;&otilde;es</th>
            </tr>
        </thead>
        <tbody>
        <?php for($i=0; $i<count($listaSocio); $i++){?>
            
            <tr>
                <td style="text-align:center;"><?php echo $listaSocio[$i]['id_pessoa']; ?></td>                        
                <td style="text-align:center;"><?php echo $listaSocio[$i]['nome']; ?></td>
                <td style="text-align:center;"><?php echo $listaSocio[$i]['bairro']; ?></td>
                <td style="text-align:center;"><?php echo $listaSocio[$i]['data_assoc']; ?></td>
                <td style="text-align:center;"></td>
                <td style="text-align:center;">
                    <div class="input-prepend">
                       <a href="listaSocio.php? id=<?php echo $listaSocio[$i]['id_pessoa']; ?>" > <span class="add-on"><i class="icon-search"></i></span></a>
                    </div>
                    <div class="input-prepend">
                       <a href="cadastro.php?id=<?php echo $listaSocio[$i]['id_pessoa']; ?>"><span class="add-on"><i class="icon-edit"></i></span></a>
                    </div>
                                            
                </td>
            </tr>
        
        <?php } ?>
        </tbody>

    </table>
</div>