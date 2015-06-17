<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/dependente.class.php');

        $objDependente = new Dependente();
        $listaDependente = $objDependente->getDependenteEspec($_GET['id']);
        $operacao = 'EDITAR';
    }
    else{
        $operacao = 'CADASTRAR';
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/estado.class.php');
        $objEstado = new Estado();
        $listaEstado = $objEstado->getEstado();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoTelefone.class.php');
        $objTipoTelefone = new TipoTelefone();
        $listaTipoTelefone = $objTipoTelefone->getTipoTelefone();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoDependente.class.php');
        $objTipoDependente = new TipoDependente();
        $listaTipoDep = $objTipoDependente->getTipoDependente();

?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?> 
       
<form name="form_dependente" id="form_cadastro" action="/sgs/Controller/dependente.controller.php" method="post">
    <div style="padding-top: 50px">
        <h2 style="text-align:center;" class="alert alert-success">Cadastro de Dependente</h2>
       
       <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">

            <input name="OPERACAO" type="hidden" value="<?php echo $operacao;?>" >
            <input name="IDSOCIO" type="hidden" value="<?php echo $_GET['id'];?>">
            <input name="ID" type="hidden">
            <input name="ID_TEL" type="hidden">

            <div class="tab-content">
                <div class="tab-pane active" id="inicio">
                    <h4>Dados Pessoais</h4>
                    <hr />
                    <?php 
                    if($operacao == 'EDITAR')
                {
                ?>
                    ATIVO:<input type="checkbox" name="STATUS" class="input-block-level" />

                         <?php 
                           }
                        ?>
                    <label class="control-label">Nome Completo:</label>
                    <input type="text" name="NOME" data-required class="input-block-level" placeholder="Nome Completo" autofocus  /><br />
                    <label class="control-label">Data de Nascimento:</label>
                    <input type="date" name="data_nasc" class="input-block-level" placeholder="Data de Nascimento"  /><br />
                    <label class="control-label">Estado Civil:</label>
                   <select name="est_civil" class="form-control" >
                        <option value="">..Selecione..</option>
                        <option value="Casado">Casado</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viuvo">Viuvo</option>
                    </select><br />
                    
                    <button href="#documento" data-toggle="tab" class="btn btn-primary">Avançar</button>
                </div>
                <div class="tab-pane" id="documento">
                    <h4>Documentos</h4>
                    <hr />
                    <label class="control-label">CPF:</label>
                    <input type="text" name="cpf" class="input-block-level" placeholder="CPF" /><br />
                    <label class="control-label">RG:</label>
                    <input type="text" name="rg" class="input-block-level" placeholder="RG"  /><br />
                    
                    <button  href="#endereco" data-toggle="tab" class="btn btn-primary">Avançar</button>
                    <button  href="#inicio" data-toggle="tab" class="btn btn-success">Voltar</button>
                </div>
                <div class="tab-pane" id="endereco">
                    <h4>Endereço</h4>
                    <hr />
                    <label class="control-label">Rua:</label>
                    <input type="text" name="rua" class="input-block-level" placeholder="Rua" /><br />
                    <label class="control-label">Numero:</label>
                    <input type="number" name="numero_casa" class="input-block-level" placeholder="Numero"  /><br />
                    <label class="control-label">Bairro:</label>
                    <input type="text" name="bairro" class="input-block-level" placeholder="Bairro"  /><br />
                    <label class="control-label">CEP:</label>
                    <input type="text" name="cep" class="input-block-level" placeholder="CEP" /><br />
                    <label class="control-label">ESTADO:</label>
                    <select name="ESTADO" id="cod_estados" >
                        <option value="" selected="">..Selecione um Estado..</option>
                        <?php 
                            $total = count($listaEstado);
                            for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaEstado[$i]['id_estado']; ?>"><?php echo $listaEstado[$i]['uf']; ?></option>
                        <?php } ?>
                    </select><br />
                    <label class="control-label">CIDADE:</label>
                    <select name="CIDADE" id="cod_cidades" >
                        <option value="">..Selecione uma Cidade..</option>
                    </select><br />

                    <button  href="#email" data-toggle="tab" class="btn btn-primary">Avançar</button>
                    <button  href="#documento" data-toggle="tab" class="btn btn-success">Voltar</button>
                </div>
                <div class="tab-pane" id="email">
                    <h4>Dados da Associação</h4>
                    <hr />
                    <label class="control-label">E-mail:</label>
                    <input type="email" name="email" class="input-block-level" placeholder="E-mail" /><br />  
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
                    <label class="control-label">Tipo de Dependencia:</label>
                    <select name="TIPO_DEP" >
                        <option value="">..Selecione..</option>
                        <?php 
                            $total = count($listaTipoDep);
                            for ($i=0; $i < $total; $i++) { ?>
                                <option value="<?php echo $listaTipoDep[$i]['id_tipo_dep']; ?>"><?php echo $listaTipoDep[$i]['parentesco']; ?></option>
                        <?php } ?>
                    </select><br />
                    <input type="submit" value="Cadastrar" id="btnSocio" class="btn btn-primary">
                    <button  href="#endereco" data-toggle="tab" class="btn btn-success">Voltar</button>
                </div>
            </div>
              
        </div>
    </div>
</form>
    
<script>
    $(function(){
        $('#cod_estados').change(function(){
            var cod_estados = document.getElementById('cod_estados').value;
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
    with(document.form_dependente){
        ID.value = '<?php echo $listaDependente[0]['id_pessoa']; ?>'; 
        ID_TEL.value = '<?php echo $listaDependente[0]['id_telefone']; ?>';         
        STATUS.checked = '<?php echo $listaDependente[0]['status_pessoa']; ?>';
        NOME.value = '<?php echo $listaDependente[0]['nome']; ?>';
        data_nasc.value = '<?php echo $listaDependente[0]['data_nasc']; ?>';
        cpf.value = '<?php echo $listaDependente[0]['cpf']; ?>';
        rg.value = '<?php echo $listaDependente[0]['rg']; ?>';
        est_civil.value = '<?php echo $listaDependente[0]['est_civil']; ?>';
        email.value = '<?php echo $listaDependente[0]['email']; ?>';
        rua.value = '<?php echo $listaDependente[0]['rua']; ?>';
        numero_casa.value = '<?php echo $listaDependente[0]['numero_casa']; ?>';
        numero.value = '<?php echo $listaDependente[0]['numero']; ?>';
        bairro.value = '<?php echo $listaDependente[0]['bairro']; ?>';
        cep.value = '<?php echo $listaDependente[0]['cep']; ?>';
        TIPO_DEP.value = '<?php echo $listaDependente[0]['id_tipo_dep']; ?>';
        tipo_tel.value = '<?php echo $listaDependente[0]['id_tipo_tel']; ?>';
    }
</script>
<?php } ?>