<?php
    //require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Controller/dependente.controller.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/dependente.class.php');
    $objDependente = new Dependente();
    $teste = $_GET['id'];
    $listaDependente = $objDependente->getDependentePessoa($teste);
    


    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/tipoDependente.class.php');
    $objTipoDependente = new TipoDependente();
    $listaTipoDependente = $objTipoDependente->getTipoDependente();


?>
<div style="padding-top: 50px">
   <h4 style="text-align:center;" class="alert alert-success">Lista de Dependentes</h4>
   <table id="example" class="table table-striped table-bordered">
     
        <div class="input-prepend">
           <span class="add-on"><i class="icon-plus"></i></span>
           <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../dependente/cadastro.php?id=<?php echo $teste; ?>'">
        </div>
       
        <thead>
            <tr class="alert alert-danger">
                <th style="text-align:center;">Id</th>
                <th style="text-align:center;">Nome</th>
                <th style="text-align:center;">Parentesco</th>
                <th style="text-align:center;">Ativo</th>
                <th style="text-align:center;">Op&ccedil;&otilde;es</th>
            </tr>
        </thead>
        <tbody>
        <?php for($i=0; $i<count($listaDependente); $i++){ ?>
            
            <tr>
                <td style="text-align:center;"><?php echo $listaDependente[$i]['id_pessoa_dep']; ?></td>                        
                <td style="text-align:center;"><?php echo $listaDependente[$i]['nome']; ?></td>
                <td style="text-align:center;"><?php echo $listaTipoDependente[$i]['parentesco']; ?></td>
                <td style="text-align:center;"><?php if ($listaTipoDependente[$i]['status'] == true){
                    echo "SIM";
                    }else{
                        echo "NÃO"; }?>
                </td>
                <td style="text-align:center;">
                    
                    <div class="input-prepend">
                       
                       <a href="../dependente/cadastro.php?id=<?php echo $listaDependente[$i]['id_pessoa_dep']; ?>"><span class="add-on"><i class="icon-edit"></i></span></a>
                    </div>
                                            
                </td>
            </tr>
        
        <?php } ?>
        </tbody>

    </table>
</div>