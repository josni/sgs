<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/producao.class.php');
    $objProducao = new Producao();
    $prod = $_GET['id'];
    $listaProducao = $objProducao->getProducaoPropriedade($prod);
    
?>
<div style="padding-top: 50px">
    <h4 style="text-align:center;" class="alert alert-success">Lista de Produção</h4>
        <table id="example" class="table table-striped table-bordered">
            <div class="input-prepend">
               <span class="add-on"><i class="icon-plus"></i></span>
               <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../producao/cadastro.php?id=<?php echo $prod; ?>';">
            </div>
            <thead>
                <tr class="alert alert-danger">
                    <th style="text-align:center;">ID</th>
                    <th style="text-align:center;">Propriedade</th>
                    <th style="text-align:center;">Unidade</th>
                    <th style="text-align:center;">Quantidade</th>
                    <th style="text-align:center;">Opera&ccedil;&atilde;o</th>
                </tr>
            </thead>
            <tbody>
            <?php for($i=0; $i<count($listaProducao); $i++){?>
                <tr>
                    <td style="text-align:center;"><?php echo $listaProducao[$i]['id_producao']; ?></td>
                    <td style="text-align:center;"><?php echo $listaProducao[$i]['nome_prop']; ?></td>
                    <td style="text-align:center;"><?php echo $listaProducao[$i]['nome_und_prod'] . " - " . $listaProducao[$i]['nome_und']; ?></td>
                    <td style="text-align:center;"><?php echo $listaProducao[$i]['qtd']; ?></td>

                    <td style="text-align:center;">
                        <div class="input-prepend">
                            <a href="../producao/cadastro.php?id=<?php echo $listaProducao[$i]['id_producao']; ?>" <span class="add-on"><i class="icon-edit"></i></span></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>                    
            </tbody>
        </table>
</div>
