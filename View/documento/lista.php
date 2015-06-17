<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/sgs/Model/documento.class.php');
    $objDocumento = new Documento();
    $teste = $_GET['id'];
    $listaDocumento = $objDocumento->getDocumentoTipo($teste);
?>
<div style="padding-top: 50px">
    <h4 style="text-align:center;" class="alert alert-success">Lista de Documentos</h4>
        <table id="example" class="table table-striped table-bordered">
            <div class="input-prepend">
                   <span class="add-on"><i class="icon-plus"></i></span>
                   <input type="button" class="btn btn-success" value="NOVO" onclick="window.location = '../documento/cadastro.php?id=<?php echo $teste;?>';">
            </div>
            <thead>
                <tr class="alert alert-danger">
                    <th style="text-align:center;">ID</th>
                    <th style="text-align:center;">Propriedade</th>
                    <th style="text-align:center;">Área</th>
                    <th style="text-align:center;">Tipo</th>
                    <th style="text-align:center;">Número</th>
                    <th style="text-align:center;">Opera&ccedil;&atilde;o</th>
                </tr>
            </thead>
            <tbody>
            <?php for($i=0; $i<count($listaDocumento); $i++){?>
                <tr>
                    <td style="text-align:center;"><?php echo $listaDocumento[$i]['id_documento']; ?></td>
                    <td style="text-align:center;"><?php echo $listaDocumento[$i]['nome_prop']; ?></td>
                    <td style="text-align:center;"><?php echo $listaDocumento[$i]['area']; ?></td>
                    <td style="text-align:center;"><?php echo $listaDocumento[$i]['nome_tipo_doc']; ?></td>
                    <td style="text-align:center;"><?php echo $listaDocumento[$i]['numero']; ?></td>
                    <td style="text-align:center;">
                       <div class="input-prepend">
                            <a href="../documento/cadastro.php?id=<?php echo $listaDocumento[$i]['id_documento']; ?>" <span class="add-on"><i class="icon-edit"></i></span></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>                    
            </tbody>
        </table>
</div>