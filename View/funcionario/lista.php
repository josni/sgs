<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/funcionario.class.php');
    $objFuncionario = new Funcionario();
    $listaFuncionario = $objFuncionario->getFuncionarioPessoa();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>
<div style="padding-top: 50px">
    <h2 style="text-align:center;" class="alert alert-success">Lista de Funcionários</h2>
       <table id="example" class="table table-striped table-bordered">
            
            <div class="input-prepend">
               <span class="add-on"><i class="icon-plus"></i></span>
               <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../funcionario/cadastro.php';">
            </div>

                <thead>
                    <tr class="alert alert-danger">
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">Nome</th>
                        <th style="text-align:center;">Data de Entrada</th>
                        <th style="text-align:center;">Data de Saida</th>
                        <th style="text-align:center;">Posição</th>
                        <th style="text-align:center;">Ativo</th>
                          <th style="text-align:center;">Usuario</th>
                        <th style="text-align:center;">Opera&ccedil;&atilde;o</th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i=0; $i<count($listaFuncionario); $i++){?>
                    <tr>
                        <td style="text-align:center;"><?php echo $listaFuncionario[$i]['id_pessoa']; ?></td>
                        <td style="text-align:center;"><?php echo $listaFuncionario[$i]['nome']; ?></td>
                        <td style="text-align:center;"><?php echo $listaFuncionario[$i]['dt_entrada']; ?></td>
                        <td style="text-align:center;"><?php echo $listaFuncionario[$i]['dt_saida']; ?></td>
                        <td style="text-align:center;"><?php if ($listaFuncionario[$i]['admin'] == true){
                            echo "ADM";
                            }else{
                                echo "Usuario"; }?>
                        </td>
                        <td style="text-align:center;"><?php if ($listaFuncionario[$i]['status_pessoa'] == true){
                            echo "SIM";
                            }else{
                                echo "NÃO"; }?>
                        </td>

                        <td style="text-align:center;"><?php echo $listaFuncionario[$i]['login']; ?></td>
                        <td style="text-align:center;">
                           
                            <div class="input-prepend">
                               
                               <a href="cadastro.php?id=<?php echo $listaFuncionario[$i]['id_pessoa']; ?>"><span class="add-on"><i class="icon-edit"></i></span></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>                    
                </tbody>
        </table>
</div>