<?php 
    if(isset($_GET['id'])){
        require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/socio.class.php');

        $objSocio = new Socio();
        $listaSocio = $objSocio->getSocioEspec($_GET['id']);
        $operação = 'EDITAR';
    }
    else{
        $operação = 'CADASTRAR';
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/estado.class.php');
    $objEstado = new Estado();
    $listaEstado = $objEstado->getEstado();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoAssociacao.class.php');
    $objTipoAssoc = new TipoAssociacao();
    $listaTipoAssoc = $objTipoAssoc->getTipoAssociacao();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/Model/tipoTelefone.class.php');
        $objTipoTelefone = new TipoTelefone();
        $listaTipoTelefone = $objTipoTelefone->getTipoTelefone();



?>


<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/sgs/View/menu/menu.php'); ?>

           <form name="form_socio" action = "/sgs/Controller/socio.controller.php" method = "post">
               <div id="content" style="max-width: 500px; padding: 19px 29px 29px; margin: 60px auto 20px; background-color: #FFFFFF; border: 1px solid #E5E5E5;">

                    <h1>Cadastro de S&oacute;cio</h1>
                    <input name="OPERACAO" type="hidden" value="<?php echo $operação;?>" >
                    <input name="ID" type="hidden">
                    <input name="ID_TEL" type="hidden">

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
                    <input type="date" name="data_nasc" class="input-block-level" placeholder="Data de Nascimento" required /><br />
                    <label class="control-label">Data Associa&ccedil;&atilde;o:</label>
                    <input type="date" name="data_assoc" class="input-block-level" value="<?php echo date('d/m/Y');?>" placeholder="Data Associa&ccedil;&atilde;o" required /><br />
                    <label class="control-label">CPF:</label>
                    <input type="text" name="cpf" class="input-block-level" placeholder="CPF" required/><br />
                    <label class="control-label">RG:</label>
                    <input type="text" name="rg" class="input-block-level" placeholder="RG" required /><br />
                    Estado Civil:
                   <select name="est_civil" class="form-control">
					    <option value="">..Selecione..</option>
					    <option value="Casado">Casado</option>
					    <option value="Solteiro">Solteiro</option>
                        <option value="Divorciado">Divorciado</option>
					    <option value="Viuvo">Viuvo</option>
					</select>
                    <input type="email" name="email" class="input-block-level" placeholder="E-mail" /><br />
                    <input type="text" name="numero" class="input-block-level" placeholder="Telefone" /><br />
                   Tipo de telefone:
                    <select name="tipo_tel">
                        <option value="" selected="">..Selecione um Tipo..</option>
                        <?php 
                            $total = count($listaTipoTelefone);
                            for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaTipoTelefone[$i]['id_tipo_tel']; ?>"><?php echo $listaTipoTelefone[$i]['nome_tipo_tel']; ?></option>
                        <?php } ?>
                    </select><br />
                    <input type="text" name="rua" class="input-block-level" placeholder="Rua" required/><br />
                    <input type="text" name="numero_casa" class="input-block-level" placeholder="Numero"  /><br />
                    <input type="text" name="bairro" class="input-block-level" placeholder="Bairro" required /><br />
                    <input type="text" name="cep" class="input-block-level" placeholder="CEP" required/><br />
                    ESTADO:
                    <select name="ESTADO" id="cod_estados">
                        <option value="" selected="">..Selecione um Estado..</option>
                        <?php 
                            $total = count($listaEstado);
                            for ($i=0; $i < $total; $i++) { ?>
                        <option value="<?php echo $listaEstado[$i]['id_estado'] . '#' .$listaEstado[$i]['uf']; ?>"><?php echo $listaEstado[$i]['uf']; ?></option>
                        <?php } ?>
                    </select><br />
                    CIDADE:
                    <select name="CIDADE" id="cod_cidades">
                        <option value="">..Selecione uma Cidade..</option>
                    </select><br />
                    TIPO DE ASSOCIACAO:
                    <select name="TIPO_ASSOC">
                        <option value="">..Selecione..</option>
                        <?php 
                            $total = count($listaTipoAssoc);
                            for ($i=0; $i < $total; $i++) { ?>
                                <option value="<?php echo $listaTipoAssoc[$i]['id_tipo_assoc']; ?>"><?php echo $listaTipoAssoc[$i]['nome_tipo_assoc']; ?></option>
                        <?php } ?>
                    </select><br />
                    <input type="submit" value="Cadastrar" id="btnSocio" class="btn btn-primary">
                </div>
        </form>
    </body>
</html>
<script>
//gregorio
       /* function cadas(){
            with(document.form_socio){
            action = "/sgs/Controller/socio.controller.php";
            method = "post";
            submit();
            }
            lista_socio();
                
    }*/
</script>
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
    with(document.form_socio){
        ID.value = '<?php echo $listaSocio[0]['id_pessoa']; ?>';        
        ID_TEL.value = '<?php echo $listaSocio[0]['id_telefone']; ?>';        
        STATUS.checked = '<?php echo $listaSocio[0]['status']; ?>';
        nome.value = '<?php echo $listaSocio[0]['nome']; ?>';
        data_nasc.value = '<?php echo $listaSocio[0]['data_nasc']; ?>';
        data_assoc.value = '<?php echo $listaSocio[0]['data_assoc']; ?>';
        cpf.value = '<?php echo $listaSocio[0]['cpf']; ?>';
        rg.value = '<?php echo $listaSocio[0]['rg']; ?>';
        est_civil.value = '<?php echo $listaSocio[0]['est_civil']; ?>';
        email.value = '<?php echo $listaSocio[0]['email']; ?>';
        numero.value = '<?php echo $listaSocio[0]['numero']; ?>';
        rua.value = '<?php echo $listaSocio[0]['rua']; ?>';
        numero_casa.value = '<?php echo $listaSocio[0]['numero_casa']; ?>';
        bairro.value = '<?php echo $listaSocio[0]['bairro']; ?>';
        cep.value = '<?php echo $listaSocio[0]['cep']; ?>';
        TIPO_ASSOC.value = '<?php echo $listaSocio[0]['id_tipo_assoc']; ?>';
        tipo_tel.value = '<?php echo $listaSocio[0]['id_tipo_tel']; ?>';
    }
</script>
<?php } ?>