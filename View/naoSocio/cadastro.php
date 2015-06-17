<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/naoSocio.class.php');

        $objNaoSocio = new NaoSocio();
        $listaNaoSocio = $objNaoSocio->getNaoSocioEspec($_GET['id']);
        $operação = 'EDITAR';
    }
    else{
        $operação = 'CADASTRAR';
    }

require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/estado.class.php');
    $objEstado = new Estado();
    $listaEstado = $objEstado->getEstado();

require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoTelefone.class.php');
        $objTipoTelefone = new TipoTelefone();
        $listaTipoTelefone = $objTipoTelefone->getTipoTelefone();


?> 


<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

<form name="form_nao_socio" action="/sgs/Controller/naoSocio.controller.php" method="post">
    <div style="padding-top: 50px">
       <h2 style="text-align:center;" class="alert alert-success">Cadastro de N&atilde;o S&oacute;cio</h2>
       <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">

            <input name="OPERACAO" type="hidden" value="<?php echo $operação;?>" >
            <input name="ID" type="hidden">
            <input name="ID_TEL" type="hidden">

            <div class="tab-content">
                <div class="tab-pane active" id="inicio">
                    <h4>Dados Pessoais</h4>
                    <hr />
                    <?php 
                        if($operação == 'EDITAR')
                    {
                    ?>
                ATIVO:<input type="checkbox" name="STATUS" class="input-block-level" />

                     <?php 
                       }
                    ?>
                <label class="control-label">Nome Completo:</label>
                <input type="text" name="nome" class="input-block-level" placeholder="Nome Completo" autofocus required/><br />
                <label class="control-label">Data de Nascimento:</label>
                <input type="text" name="data_nasc" class="input-block-level" placeholder="Data de Nascimento" required /><br />
                <label class="control-label">Data do Cadastro:</label>
                <input type="text" name="data_cadastro" class="input-block-level" value="<?php echo date('d/m/Y');?>" placeholder="Data do Cadastro" required /><br />
                <label class="control-label">Estado Civil:</label>
                    <select name="est_civil" class="form-control">
                        <option value="">Estado Civil</option>
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
                    <input type="text" name="cpf" class="input-block-level" placeholder="CPF" autofocus required/><br />
                    <label class="control-label">RG:</label>
                    <input type="text" name="rg" class="input-block-level" placeholder="RG" required /><br />
                    
                    <button href="#endereco" data-toggle="tab" class="btn btn-primary">Avançar</button>
                    <button href="#inicio" data-toggle="tab" class="btn btn-success">Voltar</button>
                </div>
                <div class="tab-pane" id="endereco">
                    <h4>Endereço</h4>
                    <hr />
                    <label class="control-label">Rua:</label>
                    <input type="text" name="rua" class="input-block-level" placeholder="Rua" autofocus required/><br />
                    <label class="control-label">Numero:</label>
                    <input type="text" name="numero_casa" class="input-block-level" placeholder="Numero"  /><br />
                    <label class="control-label">Bairro:</label>
                    <input type="text" name="bairro" class="input-block-level" placeholder="Bairro" required /><br />
                    <label class="control-label">CEP:</label>
                    <input type="text" name="cep" class="input-block-level" placeholder="CEP" autofocus required/><br />
                    <label class="control-label">ESTADO:</label>
                    <select name="ESTADO" id="cod_estados">
                        <option value="" selected="">..Selecione um Estado..</option>
                        <?php 
                            $total = count($listaEstado);
                            for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaEstado[$i]['id_estado'] . '#' .$listaEstado[$i]['uf']; ?>"><?php echo $listaEstado[$i]['uf']; ?></option>
                        <?php } ?>
                    </select><br />
                    <label class="control-label">CIDADE:</label>
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
                    <input type="tel" name="numero" class="input-block-level" placeholder="Telefone" /><br />
                    <label class="control-label">Tipo de Telefone:</label>
                        <select name="tipo_tel" >
                            <option value="" selected="">..Selecione um Tipo..</option>
                            <?php 
                                $total = count($listaTipoTelefone);
                                for ($i=0; $i < $total; $i++) { ?>
                            <option value="<?php echo $listaTipoTelefone[$i]['id_tipo_tel']; ?>"><?php echo $listaTipoTelefone[$i]['nome_tipo_tel']; ?></option>
                            <?php } ?>
                    </select><br />


                    <input type="submit" value="Cadastrar" id="btnSocio" class="btn btn-primary">
                    <button href="#endereco" data-toggle="tab" class="btn btn-success">Voltar</button>
                </div>

            </div>
        </div>
    </div>
</form>


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
    with(document.form_nao_socio){
        ID.value = '<?php echo $listaNaoSocio[0]['id_pessoa']; ?>';   
        ID_TEL.value = '<?php echo $listaNaoSocio[0]['id_telefone']; ?>';      
        STATUS.checked = '<?php echo $listaNaoSocio[0]['status_pessoa']; ?>';
        nome.value = '<?php echo $listaNaoSocio[0]['nome']; ?>';
        data_nasc.value = '<?php echo $listaNaoSocio[0]['data_nasc']; ?>';
        data_cadastro.value = '<?php echo $listaNaoSocio[0]['data_cadastro']; ?>';
        cpf.value = '<?php echo $listaNaoSocio[0]['cpf']; ?>';
        rg.value = '<?php echo $listaNaoSocio[0]['rg']; ?>';
        est_civil.value = '<?php echo $listaNaoSocio[0]['est_civil']; ?>';
        email.value = '<?php echo $listaNaoSocio[0]['email']; ?>';
        rua.value = '<?php echo $listaNaoSocio[0]['rua']; ?>';
        numero_casa.value = '<?php echo $listaNaoSocio[0]['numero_casa']; ?>';
        numero.value = '<?php echo $listaNaoSocio[0]['numero']; ?>';
        bairro.value = '<?php echo $listaNaoSocio[0]['bairro']; ?>';
        cep.value = '<?php echo $listaNaoSocio[0]['cep']; ?>';
        tipo_tel.value = '<?php echo $listaNaoSocio[0]['id_tipo_tel']; ?>';
       
    }
</script>
<?php } ?>