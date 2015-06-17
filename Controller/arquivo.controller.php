<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/arquivo.class.php');
$objArquivo = new Arquivo();
if($_REQUEST['OPERACAO'] == 'CADASTRAR'){
    $origem = $_FILES['ARQUIVO']['tmp_name'];    
    $arquivoSeparado = explode('.', $_FILES['ARQUIVO']['name']);
    $extensao = $arquivoSeparado[count($arquivoSeparado)-1];
    $nomeArquivo = md5(time()). '.' . $extensao;
    $destino = '../upload/' . $nomeArquivo;
    copy($origem, $destino);
    $objArquivo->caminho = $nomeArquivo;
    $objArquivo->id_tipo_arq = $_POST['TIPO'];    
    $objArquivo->id_pessoa_arquivo = $_POST['PESSOA'];
    $objArquivo->inserirArquivo();
}
elseif($_REQUEST['OPERACAO'] == 'EDITAR'){
    $objArquivo->id_arquivo = $_POST['ID'];
    $objArquivo->caminho = $_FILES['ARQUIVO'];
    $objArquivo->id_tipo_arq = $_POST['TIPO'];    
    $objArquivo->id_pessoa_arquivo = $_POST['PESSOA'];
    $objArquivo->editarArquivo();
}
elseif($_REQUEST['OPERACAO'] == 'EXCLUIR'){
    $objArquivo->id_arquivo = $_GET['id'];
    $objArquivo->excluirArquivo();
}
?>
<script>
   window.location = '../View/arquivo/lista.php';
</script>
