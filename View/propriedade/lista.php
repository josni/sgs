<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/propriedade.class.php');
    $objPropriedade = new Propriedade();
    $prop = $_GET['id'];
    $listaPropriedade = $objPropriedade->getPropriedadePessoa($prop);
    
?>
<div style="padding-top: 50px">
    <h2 style="text-align:center;" class="alert alert-success">Lista de Propriedade</h2>
       <table id="example" class="table table-striped table-bordered">
            <div class="input-prepend">
               <span class="add-on"><i class="icon-plus"></i></span>
               <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../propriedade/cadastro.php?id=<?php echo $prop; ?>';">
            </div>
            <thead>
                <tr class="alert alert-danger">
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">Nome</th>
                    <th style="text-align:center;">CCIR</th>
                    <th style="text-align:center;">ITR</th>
                    <th style="text-align:center;">Op&ccedil;&otilde;es</th>
                </tr>
            </thead>                
            <tbody>
            <?php for($i=0; $i<count($listaPropriedade); $i++){ ?>
                <tr>
                    <td style="text-align:center;"><?php echo $listaPropriedade[$i]['id_prop']; ?></td>
                    <td style="text-align:center;"><?php echo $listaPropriedade[$i]['nome_prop']; ?></td>
                    <td style="text-align:center;"><?php echo $listaPropriedade[$i]['ccir']; ?></td>
                    <td style="text-align:center;"><?php echo $listaPropriedade[$i]['itr']; ?></td>
                    <td style="text-align:center;">
                        <div class="input-prepend">
                            <a href="../propriedade/cadastro.php?id=<?php echo $listaPropriedade[$i]['id_prop']; ?>" <span class="add-on"><i class="icon-edit"></i></span></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>               
        </table>
</div>
