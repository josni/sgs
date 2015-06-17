<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/arquivo.class.php');
    $objArquivo = new Arquivo();
    $teste = $_GET['id'];
    $listaArquivo = $objArquivo->getArquivoTipoPessoa($teste);
?>
    <div style="padding-top: 50px">
    <h4 style="text-align:center;" class="alert alert-success">Lista de Arquivos</h4>

           <table id="example" class="table table-striped table-bordered">
            <div class="input-prepend">
                   <span class="add-on"><i class="icon-plus"></i></span>
                   <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../arquivo/cadastro.php';">
                </div>
                <thead>
                    <tr class="alert alert-danger">
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">Tipo de Arquivo</th>
                        <th style="text-align:center;">Sócio</th>
                        <th style="text-align:center;">Arquivo</th>
                        <th style="text-align:center;">Opera&ccedil;&atilde;o</th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i=0; $i<count($listaArquivo); $i++){?>
                    <tr>
                        <td style="text-align:center;"><?php echo $listaArquivo[$i]['id_arquivo']; ?></td>
                        <td style="text-align:center;"><?php echo $listaArquivo[$i]['nome_tipo_arq']; ?></td>
                        <td style="text-align:center;"><?php echo $listaArquivo[$i]['nome']; ?></td>
                        <td style="text-align:center;"><a href="../../upload/<?php echo $listaArquivo[$i]['caminho']; ?>" class="btn btn-default">ARQUIVO <i class="icon-white icon-large icon-file"></i></a></td>
                        <td style="text-align:center;">
                            <a href="cadastro.php?id=<?php echo $listaArquivo[$i]['id_arquivo']; ?>" <span class="add-on"><i class="icon-edit"></i></span></a>
                        </td>
                    </tr>
                <?php } ?>                    
                </tbody>
            </table>
    </div>