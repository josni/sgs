<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/funcionario.class.php');

        $objFuncionario = new Funcionario();
        $listaFuncionario = $objFuncionario->getFuncionarioEspec($_GET['id']);
        $operacao = 'EDITAR';
    }
    else{
        $operacao = '';
    }
    
require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoTelefone.class.php');
    $objTipoTelefone = new TipoTelefone();
    $listaTipoTelefone = $objTipoTelefone->getTipoTelefone();


?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

           <form name="form_funcionario" action="/sgs/Controller/funcionario.controller.php" method="post">
               <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">

                    <h1 style="text-align:center;">Editar Cadastro</h1>
                    <input name="OPERACAO" type="hidden" value="<?php echo $operacao;?>" >
                    <input name="ID" type="hidden">
                    <input name="ID_TEL" type="hidden">

                    <div class="tab-content">
                        <div class="tab-pane active" id="inicio">
                            <h4>Dados Pessoais</h4>
                            <hr />
                            
                            <label class="control-label">Nome Completo:</label>
                            <input type="text" name="nome" class="input-block-level" placeholder="Nome Completo" autofocus required/><br />
                            <label class="control-label">Data de Nascimento:</label>
                            <input type="text" name="data_nasc" class="input-block-level" placeholder="Data de Nascimento" required /><br />
                            <label class="control-label">Estado Civil:</label>
                            <select name="est_civil" class="form-control">
                                <option value="">...Selecione...</option>
                                <option>Casado</option>
                                <option>Solteiro</option>
                                <option>Divorciado</option>
                                <option>Viuvo</option>
                            </select><br />

                            <button href="#documento" data-toggle="tab" class="btn btn-primary">Avançar</button>
                        </div>

                        <div class="tab-pane" id="documento">
                            <h4>Documentos</h4>
                            <hr />
                            <label class="control-label">CPF:</label>
                            <input type="text" name="cpf" class="input-block-level" placeholder="CPF" required/><br />
                            <label class="control-label">RG:</label>
                            <input type="text" name="rg" class="input-block-level" placeholder="RG" required /><br />

                            <button href="#endereco" data-toggle="tab" class="btn btn-primary">Avançar</button>
                            <button href="#inicio" data-toggle="tab" class="btn btn-success">Voltar</button>
                        </div>
                        <div class="tab-pane" id="endereco">
                            <h4>Endereço</h4>
                            <hr />
                            <label class="control-label">Rua:</label>
                            <input type="text" name="rua" class="input-block-level" placeholder="Rua" required/><br />
                            <label class="control-label">Numero:</label>
                            <input type="text" name="numero_casa" class="input-block-level" placeholder="Numero"  /><br />
                            <label class="control-label">Bairro:</label>
                            <input type="text" name="bairro" class="input-block-level" placeholder="Bairro" required /><br />
                            <label class="control-label">CEP:</label>
                            <input type="text" name="cep" class="input-block-level" placeholder="CEP" required/><br />
                            <label class="control-label">Estado:</label>
                            <select name="ESTADO" id="cod_estados">
                                <option value="" selected="">..Selecione um Estado..</option>
                                <?php 
                                    $total = count($listaEstado);
                                    for ($i=0; $i < $total; $i++) { ?>
                                <option value="<?php echo $listaEstado[$i]['id_estado'] . '#' .$listaEstado[$i]['uf']; ?>"><?php echo $listaEstado[$i]['uf']; ?></option>
                                <?php } ?>
                            </select><br />
                            <label class="control-label">Cidade:</label>
                            <select name="CIDADE" id="cod_cidades">
                                <option value="">..Selecione uma Cidade..</option>
                            </select><br />

                            <button href="#email" data-toggle="tab" class="btn btn-primary">Avançar</button>
                            <button href="#documento" data-toggle="tab" class="btn btn-success">Voltar</button>
                        </div>
                        <div class="tab-pane" id="email">
                            <h4>Dados de Contato</h4>
                            <hr />
                    <label class="control-label">E-mail:</label>
                    <input type="text" name="email" class="input-block-level" placeholder="E-mail" /><br />
                    <label class="control-label">Telefone:</label>
                    <input type="text" name="numero" class="input-block-level" placeholder="Telefone" /><br />
                    <label class="control-label">Tipo de Telefone:</label>
                        <select name="tipo_tel" >
                            <option value="" selected="">..Selecione um Tipo..</option>
                            <?php 
                                $total = count($listaTipoTelefone);
                                for ($i=0; $i < $total; $i++) { ?>
                            <option value="<?php echo $listaTipoTelefone[$i]['id_tipo_tel']; ?>"><?php echo $listaTipoTelefone[$i]['nome_tipo_tel']; ?></option>
                            <?php } ?>
                        </select><br />
                    
                    <input type="submit" value="Salvar" id="btnFuncionario" class="btn btn-primary">
                    <button href="#endereco" data-toggle="tab" class="btn btn-success">Voltar</button>
                </div>
            </div>
        </div>
        </form>

        </body>

        </html>
<script>
    $(function(){
        $('#cod_estados').change(function(){
            var auxiliar = document.getElementById('cod_estados').value.split('#');
            var cod_estados = auxiliar[0];
            $.ajax({
                type: 'get',
                url: 'cidades.ajax.php',
                data: 'cod_estados=' + cod_estados,

                success: function(retorno){
                    pai = document.getElementById('cod_cidades');
                    pai.innerHTML = retorno;
                }
            });
        });
    });
</script>

<?php if(isset($_GET['id'])){?>
<script>
    with(document.form_funcionario){
        ID.value = '<?php echo $listaFuncionario[0]['id_pessoa']; ?>';   
        ID_TEL.value = '<?php echo $listaFuncionario[0]['id_telefone']; ?>';
        nome.value = '<?php echo $listaFuncionario[0]['nome']; ?>';
        data_nasc.value = '<?php echo $listaFuncionario[0]['data_nasc']; ?>';
        cpf.value = '<?php echo $listaFuncionario[0]['cpf']; ?>';
        rg.value = '<?php echo $listaFuncionario[0]['rg']; ?>';
        est_civil.value = '<?php echo $listaFuncionario[0]['est_civil']; ?>';
        email.value = '<?php echo $listaFuncionario[0]['email']; ?>';
        rua.value = '<?php echo $listaFuncionario[0]['rua']; ?>';
        numero_casa.value = '<?php echo $listaFuncionario[0]['numero_casa']; ?>';
        bairro.value = '<?php echo $listaFuncionario[0]['bairro']; ?>';
        cep.value = '<?php echo $listaFuncionario[0]['cep']; ?>';
        numero.value = '<?php echo $listaFuncionario[0]['numero']; ?>';
        tipo_tel.value = '<?php echo $listaFuncionario[0]['id_tipo_tel']; ?>';
    }
</script>
<?php } ?>