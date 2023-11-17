<?php error_reporting(0); ?>


<?php
    if ( $_COOKIE['logado'] != NULL){            
        $idusuario = $_COOKIE['idvendedor'];                                                    
    } else{
        header("Location: login.php");
    }    
?>

<?php include('../funcoes/corretor/funcoes-pessoas.php'); ?>
<?php include('../funcoes/corretor/funcoes-propostas.php'); ?>
<?php include('../funcoes/corretor/funcoes-convenios.php'); ?>
<?php include('../funcoes/corretor/funcoes-produtos.php'); ?>
<?php include('../funcoes/funcoes.php'); ?>


<?php 

if (!isset($_GET['id'])){
    $titulo = 'Nova Proposta';
    $acao   = 'c'; /**Create - Inserir */
    echo "<script> var acao='c'; </script>";
    $botao  = 'Criar Proposta';
} else {
    $titulo = 'Editar Proposta';
    $acao   = 'u'; /**Updatr - Alterar */
    echo "<script> var acao='u'; </script>";
    $botao  = 'Salvar Proposta';

    
    /**Propostas (tabela: CONTATOS) */
    $idcontato = $_GET['id']!=null?$_GET['id']:null;
    $proposta   = getProposta($idcontato);

    /**Responsável Financeiro (tabela: CONTATOS_RF) */
    $rfinanceiro    = getRFinanceiro($idcontato);    
}

    /**Propostas (tabela: CONTATOS) */
    $idcorretor         = $proposta['idvendedor']==null?$idusuario:$proposta['idvendedor'];

    $pdigital           = isset($idcontato)?$proposta['proposta_digital']:'t';
    $operadora          = isset($idcontato)?$proposta['operadora']:null;
    $idoperadora        = isset($idcontato)?$proposta['idoperadora']:null;
    $idtipodeconvenio   = isset($idcontato)?$proposta['idtipodeconvenio']:null;
    $tipodeconvenio     = isset($idcontato)?$proposta['tipodeconvenio']:null;
    $idtipodecontrato   = isset($idcontato)?$proposta['idtipodecontrato']:null;
    $tipodecontrato     = isset($idcontato)?$proposta['tipodecontrato']:null;
    $idconvenio         = isset($idcontato)?$proposta['idconvenio']:null;
    $convenio           = isset($idcontato)?$proposta['convenio']:null;
    $idformadepagamento = isset($idcontato)?$proposta['idformadepagamento']:null;
    $formadepagamento   = isset($idcontato)?$proposta['formadepagamento']:null;
    $vencimento         = isset($idcontato)?$proposta['vencimento']:null;

    /**Responsável Financeiro (tabela: CONTATOS_RF) */
    $nome               = isset($idcontato)?$rfinanceiro['nome']:null;
    $telefone           = isset($idcontato)?$rfinanceiro['telefone']:null;
    $email              = isset($idcontato)?$rfinanceiro['email']:null;
    $cpf                = isset($idcontato)?$rfinanceiro['cpf']:null;
    $rg                 = isset($idcontato)?$rfinanceiro['rg']:null;
    $orgao              = isset($idcontato)?$rfinanceiro['orgao']:null;
    $idgenero           = isset($idcontato)?$rfinanceiro['idgenero']:null;
    $nascimento         = isset($idcontato)?$rfinanceiro['nascimento']:null;
    $cns                = isset($idcontato)?$rfinanceiro['cns']:null;
    $nomemae            = isset($idcontato)?$rfinanceiro['nomemae']:null;
    $cep                = isset($idcontato)?$rfinanceiro['cep']:null;
    $iduf               = isset($idcontato)?$rfinanceiro['iduf']:null;
    $uf                 = isset($idcontato)?$rfinanceiro['uf']:null;
    $idcidade           = isset($idcontato)?$rfinanceiro['idcidade']:null;
    $cidade             = isset($idcontato)?$rfinanceiro['cidade']:null;
    $bairro             = isset($idcontato)?$rfinanceiro['bairro']:null;
    $endereco           = isset($idcontato)?$rfinanceiro['endereco']:null;
    $complemento        = isset($idcontato)?$rfinanceiro['complemento']:null;
    $numero             = isset($idcontato)?$rfinanceiro['numero']:null;



?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/select2/css/select2.min.css'); ?>
<?php $dm->get_css('js/plugins/dropzone/dist/min/dropzone.min.css'); ?>
<?php $dm->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2"><?php echo $titulo;?></h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="fdv-propostas.php">Propostas</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Gestão</li>
                </ol>
            </nav>
        </div>
   </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-full content-boxed">
    <!-- New Post -->

    <input type="hidden" id="idcontato"   value="<?php echo $idcontato;?>">
    <input type="hidden" id="idvendedor"  value="<?php echo $idcorretor;?>">
    <div class="block">
        <div class="block-header block-header-default">
            <a class="btn btn-light" href="javascript:void(0);" onclick="cancelarCadastro();">
                <i class="fa fa-arrow-left mr-1"></i> Todas as Propostas
            </a>

            <div class="block-options">
                <button class="btn btn-alt-info" onclick="salvarProposta();">
                    <i class="fa fa-fw fa-check mr-1"></i> <?php echo $botao; ?>
                </button>

                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>

            </div>
            <!-- <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div> -->
        </div>
        <div class="block-content">
            <!-- Block Tabs Alternative Style -->
        <div class="block block-rounded">
            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link nav-link-info active" href="#btabs-alt-static-proposta">Proposta</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="#btabs-alt-static-responsavel">Responsável</a>
                    </li>

                    <li class="nav-item">
                        <a id="tbeneficiarios" class="nav-link text-gray disabled" href="#btabs-alt-static-beneficiarios">Beneficiários</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a id="tpagamento" class="nav-link text-gray disabled" href="#btabs-alt-static-pagamento">Pagamento</a>
                    </li> -->

                    <!-- <li class="nav-item">
                        <a id="trecibos" class="nav-link text-gray disabled" href="#btabs-alt-static-recibos">Recibos</a>
                    </li>

                    <li class="nav-item">
                        <a id="tdocumentos" class="nav-link text-gray disabled" href="#btabs-alt-static-documentos">Documentos</a>
                    </li> -->

                </ul>
            </ul>
            <div class="block-content tab-content">
                
                <!-- Sobre a proposta -->
                
                <div class="tab-pane active" id="btabs-alt-static-proposta" role="tabpanel">
                    <form id="form-proposta" action="javascript:void(0);" onsubmit="return false;">
                        <div class="row push">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Informações gerais da proposta, como operadora, se possui algum convênio, a forma de pagamento e se a proposta é digital.
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">

                                <div class="custom-control custom-switch custom-control-success mb-3">
                                    <input type="checkbox" class="custom-control-input" id="pdigital" data-state="proposta.digital"  name="pdigital" <?php if($pdigital=='t'){echo 'checked';} ?>>
                                    <label id="lblpdigital" class="custom-control-label" for="pdigital">Proposta Digital</label>
                                </div>

                                <div class="form-group">
                                    <label for="corretor">Corretor</label>
                                    <select class="js-select2 form-control" id="corretor" data-state="proposta.corretor" name="corretor" style="width: 100%;" >
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->                                                                          
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="operadora">Operadora</label>
                                    <select class="js-select2 form-control" id="operadora" data-state="proposta.operadora" name="operadora" style="width: 100%;" data-placeholder="Escolha a operadora..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <?php                                         
                                            $resultados = getOperadoras(); //Operadoras
                                            foreach($resultados as $operadoras){
                                                $descricao = utf8_encode($operadoras['operadora']);
                                                $id   = $operadoras['id']; ?>
                                                <option <?php if($id == $idoperadora){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                        <?php }?>          
                                                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tpcontrato">Tipo de Contrato</label>
                                    <select class="js-select2 form-control" id="tpcontrato" name="tpcontrato" data-state="proposta.tipoContrato" style="width: 100%;" data-placeholder="Escolha tipo de contrato..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                            $resultados = getTipodeProposta(); //Tipos de Contrato
                                            foreach($resultados as $tiposdecontrato){
                                                $descricao = primeiro_maiusculo(utf8_encode($tiposdecontrato['tipodeproposta']));
                                                $id   = $tiposdecontrato['id']; ?>
                                            <option <?php if($id == $idtipodecontrato){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                            <?php }?>                                        

                                    </select> 
                                </div>

                                <div class="form-group">
                                    <label for="tconvenio">Tipo de Convênio</label>
                                    <select class="js-select2 form-control" id="tconvenio" name="tconvenio" data-state="proposta.tipoConvenio" style="width: 100%;" data-placeholder="Escolha tipo de convênio..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                            $resultados = getTConvenios(); //Tipos de Contrato
                                            foreach($resultados as $tiposdeconvenio){
                                                $descricao = primeiro_maiusculo(utf8_encode($tiposdeconvenio['descricao']));
                                                $id   = $tiposdeconvenio['id']; ?>
                                            <option <?php if($id == $idtipodeconvenio){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                            <?php }?>                                        

                                    </select> 
                                </div>

                                <div class="form-group">
                                    <label for="convenio">Convênio</label>
                                    <select class="js-select2 form-control" id="convenio" name="convenio" style="width: 100%;" data-state="proposta.convenio" data-placeholder="Escolha o convênio.." value="<?php echo $idconvenio;?>">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                            $resultados = pg_fetch_all(GetConvenios()); //Convenios
                                            foreach($resultados as $convenios){
                                                $descricao = primeiro_maiusculo($convenios['descricao']);
                                                $id   = $convenios['id']; ?>
                                            <option <?php if($id == $idconvenio){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                        <?php }?>

                                    </select>
                                </div>
                                <div class= "row">
                                    <div class="form-group col-md-8">
                                        <label for="fpagamento">Forma de Pagamento</label>
                                        <select class="js-select2 form-control" id="fpagamento" data-state="proposta.formaPagamento" name="fpagamento" style="width: 100%;" data-placeholder="Escolha a forma de pgt..">
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                            $resultados = getFormaPagamento(); 
                                            foreach($resultados as $formasdepagamento){
                                                $descricao = utf8_encode(primeiro_maiusculo($formasdepagamento['formadepagamento']));
                                                $id   = $formasdepagamento['id']; ?>
                                            <option <?php if($id == $idformadepagamento){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                        <?php }?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <!-- vencimento-->
                                        <label for="vencimento">Vencimento</label>
                                        <input type="text" class="form-control" id="vencimento" data-state="proposta.diaVencimento" name="vencimento" value="<?php echo $vencimento; ?>"">
                                        <!-- FIM  vencimento -->
                                    </div>
                                </div>
                                <h2 class="content-heading pt-0">
                                <i class="fas fa-paperclip text-muted mr-1"></i>
                                Anexar Documentos
                                </h2>
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-6">

                                        <form action="upload-docs.php" class="dropzone" id="formTest">
                                        </form>
                                        <!-- New Post -->
                                        <form action="upload-docs.php" id="anexoComprovanteRenda" class="dropzone" data-state="proposta.anexo_comprovante_renda" data-dropzone="true">
                                            <div class="dz-message m-0 py-md-2" data-dz-message>                              
                                                <div class="py-2 d-none d-md-block">
                                                    <i class="fa fa-2x fa-plus text-success-light"></i>
                                                </div>
                                                <p class="font-size-h3 font-w700 mb-0">
                                                    <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Anexar
                                                </p>
                                                <p class="text-muted mb-0">
                                                    Comprovante de Renda 
                                                </p> 
                                            </div>
                                        </form>
                                        <!-- END New Post -->
                                    </div>
                                </div>
                            </div>
                        </div>                            
                    </form>
                </div>                   
                
                <!-- FIM sobre a proposta  -->

                <!-- sobre responsável -->
                <div class="tab-pane" id="btabs-alt-static-responsavel" role="tabpanel">
                    <form id="form-responsavel" action="javascript:void(0);" onsubmit="return false;">                                                
                        <h2 class="content-heading pt-0">
                            <i class="fa fa-fw fa-user-circle text-muted mr-1"></i> Contato
                        </h2>
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Informações de contato do contratante. Informe o celular para onde enviaremos a proposta a ser assinada, e o email onde enviaremos o contrato, caso a proposta seja aceita.
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="form-group">
                                    <label for="nome">Nome do Responsável Financeiro</label>
                                    <input type="text" data-state="responsavelFinanceiro.nome" class="form-control text-uppercase" id="nome" name="nome" value="<?php echo $nome; ?>">
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="celular">Celular</label>
                                        <input type="text" data-state="responsavelFinanceiro.celular" class="form-control" id="celular" name="celular" value="<?php echo $telefone; ?>">
                                    </div>

                                    <div class="form-group col-lg-8 col-sm-12">
                                        <label for="email">e-mail</label>
                                        <input type="text" data-state="responsavelFinanceiro.email" class="form-control text-lowercase" id="email" name="email" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="content-heading pt-0">
                            <i class="fa fa-fw fa-file-contract text-muted mr-1"></i> Documentos
                        </h2>
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Documentos do contratante para composição do contrato.
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class = "row">
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="cpf-responsavel">CPF</label>
                                        <input type="text" data-state="responsavelFinanceiro.cpf" class="form-control" id="cpf-responsavel" name="cpf-responsavel" value="<?php echo $cpf; ?>">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="rg">RG</label>
                                        <input type="text" data-state="responsavelFinanceiro.rg" class="form-control" id="rg" name="rg" value="<?php echo $rg; ?>">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="oemissor">Orgao</label>
                                        <input type="text" data-state="responsavelFinanceiro.orgaoEmissorRg" class="form-control text-uppercase" id="oemissor" name="oemissor" value="<?php echo $orgao; ?>">
                                    </div>
                                </div>

                                <div class = "row">
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="genero-responsavel">Gênero</label>
                                        <select class="js-select2 form-control" id="genero-responsavel" data-state="responsavelFinanceiro.genero" name="genero-responsavel" style="width: 100%;">
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                            <?php                                         
                                            $resultados = getGeneros(); 

                                            foreach($resultados as $generos){
                                                $descricao = utf8_encode($generos['descricao']);
                                                $id   = $generos['id']; ?>
                                            <option <?php if($id == $idgenero){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                                <?php }?>


                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="nascimento-responsavel">Nascimento</label>
                                        <input type="text" data-state="responsavelFinanceiro.nascimento" class="js-masked-date js-datepicker form-control" id="nascimento-responsavel" name="nascimento-responsavel" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy" value="<?php echo $nascimento; ?>">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="cns">CNS</label>
                                        <input type="text" data-state="responsavelFinanceiro.cns" class="form-control" id="cns" name="cns" value="<?php echo $cns; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mae-responsavel">Nome da mãe</label>
                                    <input type="text" data-state="responsavelFinanceiro.nomeDaMae" class="form-control text-uppercase" id="mae-responsavel" name="mae-responsavel" value="<?php echo $nomemae; ?>">
                                </div>
                            </div>
                        </div>

                        <h2 class="content-heading pt-0">
                            <i class="fa fa-fw fa-map-marker-alt text-muted mr-1"></i> Endereço
                        </h2>
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Endereço do responsável financeiro, para envio de postagens e composição do contrato.
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class = "row">
                                    <div class="form-group col-lg-12 col-xl-3">
                                        <label for="cep">CEP</label>
                                        <input type="text" data-state="responsavelFinanceiro.endereco.cep" class="form-control" id="cep" name="cep" value="<?php echo $cep; ?>">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-2">
                                        <label for="uf">UF</label>
                                        <input type="text" class="form-control text-uppercase" data-state="responsavelFinanceiro.endereco.uf" id="uf" name="uf" value="<?php echo $uf; ?>">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-7">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control text-uppercase" data-state="responsavelFinanceiro.endereco.cidade" id="cidade" name="cidade" value="<?php echo $cidade; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control text-uppercase" data-state="responsavelFinanceiro.endereco.bairro" id="bairro" name="bairro" value="<?php echo $bairro;?>" >
                                </div>
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control text-uppercase" id="endereco" data-state="responsavelFinanceiro.endereco.logradouro" name="endereco" value="<?php echo $endereco; ?>">
                                </div>
                                <div class = "row">
                                    <div class="form-group col-lg-12 col-xl-8">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control text-uppercase" id="complemento" data-state="responsavelFinanceiro.endereco.complemento" name="complemento" value="<?php echo $complemento; ?>">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control text-uppercase" id="numero" data-state="responsavelFinanceiro.endereco.numero" name="numero" value="<?php echo $numero; ?>">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <h2 class="content-heading pt-0">
                            <i class="fas fa-paperclip text-muted mr-1"></i>
                            Anexar Documentos
                        </h2>
                        <div class="row push mx-4 offset-6">
                            <div class="col-12 col-md-3 col-xl-3">
                                <form action="upload-docs.php" class="dropzone" id="formTest">
                                </form>
                                <!-- New Post -->
                                <form action="upload-docs.php" id="anexo-comprovante-residencia" class="dropzone" data-state="responsavelFinanceiro.anexo_comprovante_residencia" data-dropzone="true">
                                    <div class="dz-message m-0 py-md-2" data-dz-message>                              
                                        <div class="py-2 d-none d-md-block">
                                            <i class="fa fa-2x fa-plus text-success-light"></i>
                                        </div>
                                        <p class="font-size-h3 font-w700 mb-0">
                                            <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Anexar
                                        </p>
                                        <p class="text-muted mb-0">
                                            Comprovante de Residencia 
                                        </p> 
                                    </div>
                                </form>
                                <!-- END New Post -->
                            </div>
                            <div class="col-12 col-md-3 col-xl-3">
                                <!-- New Post -->
                                <form action="upload-docs.php" id="anexo-rg" class="dropzone" data-state="responsavelFinanceiro.anexo_rg" data-dropzone="true">
                                    <div class="dz-message m-0 py-md-2" data-dz-message>                              
                                        <div class="py-2 d-none d-md-block">
                                            <i class="fa fa-2x fa-plus text-success-light"></i>
                                        </div>
                                        <p class="font-size-h3 font-w700 mb-0">
                                            <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Anexar
                                        </p>
                                        <p class="text-muted mb-0">
                                            RG 
                                        </p> 
                                    </div>
                                </form>
                                <!-- END New Post -->
                            </div>
                        </div>
                        
                    </form>
                </div>
                <!-- fim sobre responsável -->
               
                <!-- sobre beneficiarios -->
                <div class="tab-pane" id="btabs-alt-static-beneficiarios" role="tabpanel">
                    <div id="lista-benficiarios">
                        <div class="form-text text-muted font-size-sm font-italic ml-3 mb-3">Lance aqui todos os beneficiários, podendo ter vários produtos, e para cada produto, vários beneficiários.</div>
                        <div id="dv-beneficiarios" class="row text-center">
                                  
                        </div>
                    </div>
                </div>
                <!-- fim sobre beneficiarios  -->

                <!-- sobre pagamento -->
                <div class="tab-pane" id="btabs-alt-static-pagamento" role="tabpanel">
                    <div class = "row">
                    </div>
                </div>
                <!-- FIM sobre pagamento -->

                <!-- sobre recibos -->
                <div class="tab-pane" id="btabs-alt-static-recibos" role="tabpanel">
                    <div class="form-text text-muted font-size-sm font-italic ml-3 mb-3">Emita recibos do pagamento da primeira parcela quando for paga a você. O recibo emitido será enviado por e-mail ao seu cliente, com cópia no seu email.</div>

                    <div class="row text-center">
                        <div class="col-12 col-md-6 col-xl-3">
                            <!-- New Post -->
                            <a class="block block-rounded block-bordered  block-link-shadow text-center" href="javascript:void(0);" onclick="openModal('modalrecibo');">
                                <div class="block-content block-content-full">
                                    <div class="py-md-2">
                                        <div class="py-2 d-none d-md-block">
                                            <i class="fa fa-2x fa-plus text-success-light"></i>
                                        </div>
                                        <p class="font-size-h3 font-w700 mb-0">
                                            <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Criar
                                        </p>
                                        <p class="text-muted mb-0">
                                            recibo de pagamento 
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- END New Post -->
                        </div>
                    </div>

                </div>
                <!-- FIM sobre recibos -->

                <!-- sobre documentos -->
                <div class="tab-pane" id="btabs-alt-static-documentos" role="tabpanel">
                    <div class="form-text text-muted font-size-sm font-italic ml-3 mb-3">Anexe os documentos referentes às informações lançadas nesta proposta (rg, cpf, comp. residência, comp de pagamento...).</div>

                    <div class="row text-center">
                        <div class="col-12 col-md-6 col-xl-3">
                            <!-- New Post -->
                            <a class="block block-rounded block-bordered  block-link-shadow text-center" href="be_pages_blog_post_add.php">
                                <div class="block-content block-content-full">
                                    <div class="py-md-2">
                                        <div class="py-2 d-none d-md-block">
                                            <i class="si fa-2x si-paper-clip text-info-light"></i>
                                        </div>
                                        <p class="font-size-h3 font-w700 mb-0">
                                            <i class="si si-paper-clip text-info-light mr-1 d-md-none"></i> Anexar
                                        </p>
                                        <p class="text-muted mb-0">
                                            documentos
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- END New Post -->
                        </div>
                    </div>

                </div>
                <!-- FIM sobre documentos -->

            </div>
        </div>

            <!-- END Block Tabs Alternative Style -->    
                        
        </div>
    </div>

    <!-- END New Post -->

    
</div>
<!-- END Page Content -->

<!-- Modal's  -->

<!-- Modal SELECAO DE CONTRATO -->
<div class="modal fade" id="modalcontratos" tabindex="-1" role="dialog" aria-labelledby="modalcontratos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">RECIBO</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <form id="form-recibo<?php echo $idcontato; ?>" method="post">
                    <div class="block-content">
                        <!-- Block Tabs Default Style -->
                        <div class="row">
                            <!--cpf-->
                            <div class="col-lg-8 form-group">
                                <label>Recibo para</label>
                                <div class="input-group">
                                <strong><small><?php echo strtoupper($responsavel);?></small></strong>
                                </div>
                            </div>                                          
                            <!--fim cpf-->
                            
                            <!--rg-->
                            <div class="col-lg-2 form-group">
                                <label for="valor">Valor</label>
                                <input class="form-control" name="valor" style="width: 100%;" onKeyPress="return(moeda(this,'.',',',event))" value="<?php echo $valor; ?>">
                            </div>
                            <!--fim rg-->
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label for="descricao">Decrição do Recibo</label>
                                <textarea class="form-control" name="descricao" rows="4">Recibo de pagamento da primeira parcela referente ao plano adquirido.</textarea>
                            </div>
                        </div>                    
                        <!-- END Block Tabs Default Style -->
                    </div>
                    
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" id = "emitir-recibo<?php echo $idcontato;?>" class="btn btn-sm btn-primary" data-dismiss="modal">Emitir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal SELECAO DE CONTRATO-->


<!-- Modal RECIBO -->
<div class="modal fade" id="modalrecibo" tabindex="-1" role="dialog" aria-labelledby="modalrecibo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">RECIBO</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                
                <form id="form-recibo<?php echo $idcontato; ?>" method="post">
                    <div class="block-content">
                        <!-- Block Tabs Default Style -->
                        <div class="row">
                            <!--cpf-->
                            <div class="col-lg-8 form-group">
                                <label>Recibo para</label>
                                <div class="input-group">
                                <strong><small><?php echo strtoupper($responsavel);?></small></strong>
                                </div>
                            </div>                                          
                            <!--fim cpf-->
                            
                            <!--rg-->
                            <div class="col-lg-2 form-group">
                                <label for="valor">Valor</label>
                                <input class="form-control" name="valor" style="width: 100%;" onKeyPress="return(moeda(this,'.',',',event))" value="<?php echo $valor; ?>">
                            </div>
                            <!--fim rg-->
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label for="descricao">Decrição do Recibo</label>
                                <textarea class="form-control" name="descricao" rows="4">Recibo de pagamento da primeira parcela referente ao plano adquirido.</textarea>
                            </div>
                        </div>                    
                        <!-- END Block Tabs Default Style -->
                    </div>
                    
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" id = "emitir-recibo<?php echo $idcontato;?>" class="btn btn-sm btn-primary" data-dismiss="modal">Emitir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal RECIBO-->

<!-- Modal BENEFICIARIOS -->
<div class="modal fade" id="modalbenef" tabindex="-1" role="dialog" aria-labelledby="modalbenef" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">BENEFICIARIO</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs nav-tabs-alt" id="tab-modal-beneficiarios" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link nav-link-info active" href="#modal-beneficiario-info">Informações</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="#modal-beneficiario-anexo">Anexo Documentos</a>
                        </li>
                    </ul>
                    <form id="form-beneficiarios" class="p-0 m-0" method="post" onsubmit="return false;">
                        <div class="tab-content">
                            <div class="tab-pane active" id="modal-beneficiario-info" role="tabpanel">
                                    <div class="block-content">
                                        <!-- Block Tabs Default Style -->
                                        <div class="row">
                                            <!--cpf-->
                                            <div class="col-lg-8 form-group">
                                                <small class="form-control-feedback font-italic font-bold">Nome <span class="text-danger">*</span></small>
                                                <input class="form-control text-uppercase" id="nome-beneficiario" name="nome-beneficiario" style="width: 100%;" value="">
                                                
                                                <div class="custom-control custom-switch custom-control-success mb-3" id="boxSwitchCCRf">
                                                    <input type="checkbox" class="custom-control-input" id="switchCCRf" name="switchCCRf">
                                                    <label id="lblswitchCCRf" class="custom-control-label text-primary" for="switchCCRf">Copiar dados do responsável financeiro</label>
                                                </div>
                                            </div>                                          
                                            <!--fim cpf-->
                                            
                                            <!--rg-->
                                            <div class="col-lg-4 form-group">
                                                <small class="form-control-feedback font-italic font-bold">Vínculo <span class="text-danger">*</span></small>
                                                <select class="js-select2 form-control" id="vinculo-beneficiario" name="vinculo-beneficiario" style="width: 100%;">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                </select>
                                            </div>
                                            <!--fim rg-->
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-4 form-group">
                                                <small class="form-control-feedback font-italic font-bold">Gênero <span class="text-danger">*</span></small>
                                                <select class="js-select2 form-control" id="genero-beneficiario" name="genero-beneficiario" style="width: 100%;">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <?php                                         
                                                    $resultados = getGeneros(); 
            
                                                    foreach($resultados as $generos){
                                                        $descricao = utf8_encode($generos['descricao']);
                                                        $id   = $generos['id']; ?>
                                                    <option value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                                        <?php }?>
                                                </select>
                                            </div>
            
                                            <div class="col-lg-4 form-group">
                                                <small class="form-control-feedback font-italic font-bold">Nascimento <span class="text-danger">*</span></small>
                                                <input type="text" class="js-masked-date js-datepicker form-control" id="nascimento-beneficiario" name="nascimento-beneficiario" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy">
                                            </div>                                          
            
                                            <div class="col-lg-4 form-group">
                                                <small class="form-control-feedback font-italic font-bold">CPF <span class="text-danger">*</span></small>
                                                <input class="form-control" id="cpf-beneficiario" name="cpf-beneficiario" style="width: 100%;" value="">
                                            </div>                                          
            
                                        </div>                    
            
                                        <div class="row">
                                            <div class="col-lg-3 form-group">
                                                <small class="form-control-feedback font-italic font-bold">RG <span class="text-danger">*</span></small>
                                                <input class="form-control" id="rg-beneficiario" name="rg-beneficiario" style="width: 100%;" value="">
                                            </div>
            
                                            <div class="col-lg-2 form-group">
                                                <small class="form-control-feedback font-italic font-bold">Órgão <span class="text-danger">*</span></small>
                                                <input class="form-control text-uppercase" id="orgao-beneficiario" name="orgao-beneficiario" style="width: 100%;" value="">
                                            </div>                                          
            
                                            <div class="col-lg-7 form-group">
                                                <small class="form-control-feedback font-italic font-bold">Nome da mãe <span class="text-danger">*</span></small>
                                                <input class="form-control text-uppercase" id="mae-beneficiario" name="mae-beneficiario" style="width: 100%;" value="">
                                            </div>                                          
            
            
                                        </div>                    
            
                                        <h2 class="content-heading pt-0"></h2>
            
                                        <div class="row">
                                            <!--cpf-->
                                            <div class="col-lg-8 form-group">
                                                <small class="form-control-feedback font-italic font-bold">Produto <span class="text-danger">*</span></small>
                                                <select class="js-select2 form-control" id="produto-beneficiario" name="produto-beneficiario" style="width: 100%;" >
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                </select>
                                            </div>                                          
                                            <!--fim cpf-->
                                            
                                            <!--rg-->
                                            <div class="col-lg-4 form-group">
                                                <small class="form-control-feedback font-italic font-bold">Valor <span class="text-danger">*</span></small>
                                                <input class="form-control" id="valor-beneficiario" name="valor-beneficiario" style="width: 100%;" value="" disabled>
                                            </div>
                                            <!--fim rg-->
                                        </div>
                                        <!-- END Block Tabs Default Style -->
                                    </div>
                            </div>
                            <div class="tab-pane" id="modal-beneficiario-anexo" role="tabpanel">
                                <div class="row push mx-4 py-4">
                                    <div class="col-12 col-md-4 col-xl-4">
                                        <!-- New Post -->
                                        <form action="upload-docs.php" id="beneficiario-active" class="dropzone" data-dropzone="true" data-dropzone-init="false">

                                        </form>
                                        <form action="upload-docs.php" id="beneficiario-anexo-comprovante-residencia" class="dropzone" data-dropzone="true" data-dropzone-init="false">
                                            <div class="dz-message m-0 py-md-2" data-dz-message>                              
                                                <div class="py-2 d-none d-md-block">
                                                    <i class="fa fa-2x fa-plus text-success-light"></i>
                                                </div>
                                                <p class="font-size-h3 font-w700 mb-0">
                                                    <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Anexar
                                                </p>
                                                <p class="text-muted mb-0">
                                                    Comprovante de Residencia 
                                                </p> 
                                            </div>
                                        </form>
                                        <!-- END New Post -->
                                    </div>
                                    <div class="col-12 col-md-4 col-xl-4">
                                        <!-- New Post -->
                                        <form action="upload-docs.php" id="beneficiario-anexo-rg" class="dropzone" data-dropzone="true" data-dropzone-init="false">
                                            <div class="dz-message m-0 py-md-2" data-dz-message>                              
                                                <div class="py-2 d-none d-md-block">
                                                    <i class="fa fa-2x fa-plus text-success-light"></i>
                                                </div>
                                                <p class="font-size-h3 font-w700 mb-0">
                                                    <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Anexar
                                                </p>
                                                <p class="text-muted mb-0">
                                                    RG 
                                                </p> 
                                            </div>
                                        </form>
                                        <!-- END New Post -->
                                    </div>
                                </div>
                            </div>  
                            <div class="block-content block-content-full text-right bg-light">
                                <button id = "btnRemoveBenef" class="btn btn-sm btn-danger waves-effect waves-light" style="display: none" onclick="">Remover</button>
                                <button id = "btnSalvarBenef" class="btn btn-sm btn-primary waves-effect waves-light" onclick="addBeneficiario();">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal BENEFICIARIOS-->


<!-- END Modal's -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>
<?php $dm->get_js('js/plugins/dropzone/dropzone.min.js'); ?>
<?php $dm->get_js('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>
<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>

<?php $dm->get_js('js/pages/add-validation.js'); ?>
<?php $dm->get_js('js/funcoes/funcoes-gerais.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/pt-br.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/min/dropzone.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
<script>jQuery(function(){ Dashmix.helpers(['select2','masked-inputs','validation','datepicker','notify']); });</script>

<?php require 'inc/_global/views/footer_end.php'; ?>

<script>
/** Definicições iniciais */
    moment().locale("pt-br");

    function previewFile() {
        var preview = document.querySelector('img');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    // Dropzone.autoDiscover = false;

    var state = new Proxy({
        beneficiarios: [],
        proposta: new Proxy({            
            digital: false, 
            corretor: '', 
            operadora: '', 
            tipoContrato: '', 
            tipoConvenio: '', 
            formaPagamento: '', 
            diaVencimento: '', 
            anexo_comprovante_renda: '',
        },{
            set: function(obj, prop, value) {
                return Reflect.set(...arguments);
            }
        }),
        responsavelFinanceiro: new Proxy({
            nome: '',
            celular: '',
            email: '',
            cpf: '',
            rg: '',
            orgaoEmissorRg: '',
            genero: '',
            nascimento: '',
            cns: '',
            nomeDaMae: '',
            anexo_comprovante_residencia: '',
            anexo_rg: '',
            anexo_cpf: '',
            endereco: new Proxy({
                cep: '',
                uf: '',
                cidade: '',
                bairro: '',
                logradouro: '',
                complemento: '',
                numero: ''
            }, {
                set: function(obj, prop, value) {
                    return Reflect.set(...arguments);
                }
            })
        },{
            set: function(obj, prop, value) {
                return Reflect.set(...arguments);
            }
        })
        }, {
        set: function (obj, prop, value) {
            if(prop === 'beneficiarios' && Array.isArray(value)) {
                console.log(value);
                const divBeneficiarios = document.getElementById('dv-beneficiarios');

                // reset Render
                divBeneficiarios.innerHTML = `
                    <div class="col-12 col-md-6 col-xl-3">
                        <!-- New Post -->
                        <a class="block block-rounded block-bordered  block-link-shadow text-center" href="javascript:void(0);" onclick="newBeneficiario();">
                            <div class="block-content block-content-full">
                                <div class="py-md-2">
                                    <div class="py-2 d-none d-md-block">
                                        <i class="fa fa-2x fa-plus text-success-light"></i>
                                    </div>
                                    <p class="font-size-h3 font-w700 mb-0">
                                        <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Adicionar
                                    </p>
                                    <p class="text-muted mb-0">
                                        beneficiário ao plano 
                                    </p>
                                </div>
                            </div>
                        </a>
                        <!-- END New Post -->
                    </div>  
                `;

                const render = value.map(({ nome, produto, valor, deleted }, index) => {
                    if(deleted) return '';

                    return (`
                            <div class="cl-beneficiarios col-12 col-md-6 col-xl-3">
                                <a class="block block-link-shadow text-center" href="javascript:void(0)" onclick="editBeneficiario(${index});">  
                                    <div class="block-content">
                                        <img class="img-avatar" src="../assets/media/avatars/avatar6.jpg" alt="">
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="font-w600">${primeiroUltimoNome(primeira_maiuscula(nome))}</div>
                                        <div class="font-size-sm text-muted">${primeira_maiuscula(produto)} (R$${valor})</div>
                                    </div>
                                </a>
                            </div>
                        `)
                });
                divBeneficiarios.innerHTML += render;
                return Reflect.set(...arguments);
            }
        }
    });
    
    // var beneficiarios = [];

    if ($("#pdigital").is(":checked")){
        $("#lblpdigital").text("Proposta Digital");
        $("#lblpdigital").removeClass("text-danger");
        $("#lblpdigital").addClass("text-primary");
    } else {
        $("#lblpdigital").text("Proposta Física");
        $("#lblpdigital").removeClass("text-primary");
        $("#lblpdigital").addClass("text-danger");
    }

/* tratamento de abas */
    if (acao=='u'){
        $("#tbeneficiarios").removeClass("text-gray disabled");
        $("#tpagamento").removeClass("text-gray disabled");
        $("#trecibos").removeClass("text-gray disabled");
        $("#tdocumentos").removeClass("text-gray disabled");

        setSelectVinculo($("#operadora").val()==1?'idental':'atemde');
        setSelectProduto($("#operadora").val());

    }
/* FIM tratamento de abas */

    const switchCCRF = document.getElementById('switchCCRf');

    const changeFormNewBen = (value) => {
        if(value) {
            $('#nome-beneficiario').val($("#nome").val()).prop('disabled', true);
            $('#genero-beneficiario').val($("#genero-responsavel").val()).change().prop('disabled', true);
            $('#vinculo-beneficiario').val('14').change();
            $('#nascimento-beneficiario').val($("#nascimento-responsavel").val()).prop('disabled', true);
            $('#cpf-beneficiario').val($("#cpf-responsavel").val()).prop('disabled', true);
            $('#rg-beneficiario').val($("#rg").val()).prop('disabled', true);
            $('#orgao-beneficiario').val($("#oemissor").val()).prop('disabled', true);
            $('#mae-beneficiario').val($("#mae-responsavel").val()).prop('disabled', true);
        } else {
            // console.log('entrei aqui')
            $('#genero-beneficiario').val(null).change().prop('disabled', false);
            $('#vinculo-beneficiario').val(null).change();
            $('#nome-beneficiario').prop('disabled', false);
            $('#nascimento-beneficiario').prop('disabled', false);
            $('#cpf-beneficiario').prop('disabled', false);
            $('#rg-beneficiario').prop('disabled', false);
            $('#orgao-beneficiario').prop('disabled', false);
            $('#mae-beneficiario').prop('disabled', false);
            $('#form-beneficiarios').trigger("reset");
        }
    }
    
    switchCCRF.addEventListener('change', (event) => {
        changeFormNewBen(event.target.checked);
    })

/* mascaras */
    $("#cpf-beneficiario").mask("999.999.999-99",{placeholder:' ', autoclear: false});
    $("#cpf-responsavel").mask("999.999.999-99",{placeholder:' ', autoclear: false});
    $("#celular").mask("(99) 9 9999-9999",{placeholder:' ', autoclear: false});
/* fim mascaras */

/** FIM Definicições iniciais */

/** Teste de Validações */
    jQuery('#form-beneficiarios').validate({
        ignore:[], errorClass:"invalid-feedback animated fadeIn", errorElement:"div", errorPlacement:function(e, r) {
            jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
        }
        , highlight:function(e) {
            jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
        }
        , success:function(e) {
            jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
        },        
        rules: {
            'nome-beneficiario'         : {required: !0, minlength: 3, pattern: "[a-zA-Z ]+"},
            'vinculo-beneficiario'      : 'required',
            'genero-beneficiario'       : 'required',
            'nascimento-beneficiario'   : 'required',
            'cpf-beneficiario'          : {required: !0, verificaCPF:true},
            'rg-beneficiario'           : 'required',
            'orgao-beneficiario'        : 'required',
            'mae-beneficiario'          : {required: !0, minlength: 3, pattern: "[a-zA-Z ]+"},
            'produto-beneficiario'      : 'required',
            'valor-beneficiario'        : 'required'
            
        },
        messages: {
            'nome-beneficiario'         : {required:'Informe o nome',pattern: "Só poderá conter letras não acentuadas."},
            'vinculo-beneficiario'      : 'Informe o vínculo',
            'genero-beneficiario'       : 'Informe o gênero',
            'nascimento-beneficiario'   : 'Informe o nascimento',
            'cpf-beneficiario'          : 'Informe o CPF',
            'rg-beneficiario'           : 'Informe o RG',
            'orgao-beneficiario'        : 'Informe o Orgão Emissor',
            'mae-beneficiario'          : {required:'Informe o nome',pattern: "Só poderá conter letras não acentuadas."},
            'produto-beneficiario'      : 'Informe o produto',
            'valor-beneficiario'        : 'informe o valor'
        }
    });

    jQuery('#form-proposta').validate({
        ignore:[], errorClass:"invalid-feedback animated fadeIn", errorElement:"div", errorPlacement:function(e, r) {
            jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
        }
        , highlight:function(e) {
            jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
        }
        , success:function(e) {
            jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
        },        
        rules: {
            'corretor'                  : 'required',
            'operadora'                 : 'required',
            'tpcontrato'                : 'required',
            'tconvenio'                 : 'required',
            'fpagamento'                : 'required',
            'vencimento'                : {required: !0,
                                            number: !0,
                                            range: [1, 30]}
            
        },
        messages: {
            'corretor'                  : 'Informe o corretor',
            'operadora'                 : 'Informe a operadora',
            'tpcontrato'                : 'Informe o gênero',
            'tconvenio'                 : 'Informe o convênio',
            'fpagamento'                : 'Informe a forma de pagamento',
            'vencimento'                : {required: "Informe o vencimento da proposta.",
                                            number: "Apenas número.",
                                            range: "Dia de vencimento inválido."
                                        }
        }
    });
    
    jQuery('#form-responsavel').validate({
        ignore:[], errorClass:"invalid-feedback animated fadeIn", errorElement:"div", errorPlacement:function(e, r) {
            jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
        }
        , highlight:function(e) {
            jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
        }
        , success:function(e) {
            jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
        },        
        rules: {
            'nome': {
                required: !0,
                minlength: 3,
                pattern: "[a-zA-Z ]+"
            },
            'email':{
                required: { 
                    depends: function(element) {
                        return ($("#fpagamento").select2('data')[0].text.trim()=="Boleto");
                    }
                },
            },
            'celular': {
                required:!0, 
                telefoneBR: true
            },
            'cpf-responsavel':{
                verificaCPF: true
            },
            'rg': {
                required:!0, 
                pattern: "[a-zA-Z 0-9]+"
            },
            'orgao': {
                required: !0,
                minlength: 3,
                pattern: "[a-zA-Z ]+"
            },
            'genero': 'required',
            'nascimento': 'required',
            'nomedamae': {
                required: !0,
                minlength: 3,
                pattern: "[a-zA-Z ]+"
            }
        },
        messages: {
            'nome': {
                required: "Informe o nome",
                minlength: "Nome deve conter no mínimo 3 letras",
                pattern: "Só poderá conter letras não acentuadas."
            },
            'email': "Favor informar o email.",
            'celular': "Informe o celular",
            'cpf-responsavel': 'Informe um CPF válido',
            'rg': 'required',
            'orgao': {
                required: !0,
                minlength: 3,
                pattern: "[a-zA-Z ]+"
            },
            'genero': 'required',
            'nascimento': 'required',
            'nomedamae': {
                required: !0,
                minlength: 3,
                pattern: "[a-zA-Z ]+"
            }
        }
    });

/** FIM Teste de Validações */

/** Teste para habilitar ABA Beneficiarios */
    $("#operadora").on("select2:select", function (e) { 
        let valor = $(this).val();  
        let operadora = null;
        
        if (valor==1){operadora = 'idental';} 
        else {operadora = 'atemde';}

        setSelectVinculo(operadora);
        setSelectProduto(valor);

        if (($("#tpcontrato").val()!="")&&
            ($("#tpconvenio").val()!="")&&
            ($("#operadora").val()!="")&&
            ($("#fpagamento").val()!=""))
        {
            $("#tbeneficiarios").removeClass("text-gray disabled");
        }
    });

    $("#tpcontrato").on("select2:select", function (e) { 

        if (($("#tpcontrato").val()!="")&&
            ($("#tpconvenio").val()!="")&&
            ($("#operadora").val()!="")&&
            ($("#fpagamento").val()!=""))
        {
            $("#tbeneficiarios").removeClass("text-gray disabled");
        }
    });

    $("#tpconvenio").on("select2:select", function (e) { 

        if (($("#tpcontrato").val()!="")&&
            ($("#tpconvenio").val()!="")&&
            ($("#operadora").val()!="")&&
            ($("#fpagamento").val()!=""))
        {
            $("#tbeneficiarios").removeClass("text-gray disabled");
        }
    });

    $("#fpagamento").on("select2:select", function (e) { 

        if (($("#tpcontrato").val()!="")&&
            ($("#tpconvenio").val()!="")&&
            ($("#operadora").val()!="")&&
            ($("#fpagamento").val()!=""))
        {
            $("#tbeneficiarios").removeClass("text-gray disabled");
        }
    });
/** FIM Teste para habilitar ABA Beneficiarios */

    $("#produto-beneficiario").on("select2:select", function (e) { 

        let produto     = $(this).val();  
        let operadora   =  $("#operadora").val();

        setValorProduto(operadora, produto);
    });


    function cancelarCadastro(){
        window.location.href = "fdv-propostas.php";
    }

   ;(async () => {
        const { data:corretores } = await axios.get('./getCorretores.php');

        for (const {value, text} of corretores) {
            if($('#corretor').find(`option[value='${value}']`).length) {
                $('#corretor').val(value).trigger('change');
            } else {
                const options = new Option(text.toUpperCase(), value, false, false);
                $('#corretor').append(options).trigger('change')
            }
         }

         $('#corretor').val($('#idvendedor').val());
         $('#corretor').trigger('change');
    })()

    function setSelectVinculo(operadora){

        $('#vinculo-beneficiario').val(null).trigger('change');

        $.ajax({
            headers: {
                "appAuthorization": "ad57fb31-4d9a-4cc7-8231-43f414507e7f"
            },
            type: 'GET',
            url: 'https://idental.com.br/api/giga/vinculos/'+operadora+'?id=in:14,15,22,16,19,21',
            success: function({
                data: response
            }) {

                var dados = response;

                dados.forEach((i) => {

                    let id = i.id;
                    let descricao = i.descricao;

                    var data = {
                        id: id,
                        text: descricao
                    };


                    // Set the value, creating a new option if necessary
                    if ($('#vinculo-beneficiario').find("option[value='" + data.id + "']").length) {
                        $('#vinculo-beneficiario').val(data.id).trigger('change');
                    } else { 
                        // Create a DOM Option and pre-select by default
                        var newOption = new Option(data.text, data.id, false, false);
                        // Append it to the select
                        $('#vinculo-beneficiario').append(newOption).trigger('change');
                    } 

                });

            }
        });

    }

    function setSelectProduto(operadora){        

        $.ajax({
            type: 'GET',
            data: {operadora:operadora},
            url: 'getProdutos.php',
            success: function(response) {

                var dados = JSON.parse(response);
                dados.forEach((i) => {

                    let id = i.id;
                    let descricao = i.descricao;

                    var data = {
                        id: id,
                        text: descricao
                    };

                    $('#produto-beneficiario').val('').trigger('change');

                    // Set the value, creating a new option if necessary
                    if ($('#produto-beneficiario').find("option[value='" + data.id + "']").length) {
                        $('#produto-beneficiario').val(data.id).trigger('change');
                    } else { 
                        // Create a DOM Option and pre-select by default
                        var newOption = new Option(data.text, data.id, false, false);
                        // Append it to the select
                        $('#produto-beneficiario').append(newOption).trigger('change');
                    } 
                });
            }
        });

    }

    function setValorProduto(operadora, produto){        

        $.ajax({
            type: 'GET',
            data: {operadora:operadora, produto:produto},
            url: 'getValorProduto.php',
            success: function(response) {

                var dados = JSON.parse(response);
                var valor = '';

                if (!dados.valor){
                    valor = '0,00';
                } else {
                    valor = dados.valor;
                }
                
                $('#valor-beneficiario').val('R$ '+valor);

            }
        });

    }

    async function getBeneficiarios(proposta){
        const { data: beneficiarios } = await axios.get('./getBeneficiarios.php', { params: { proposta } });
        console.log(proposta);
        console.log('getBeneficiarios: ', beneficiarios);

        return beneficiarios;
    }

    ;(async () => {
        const beneficiarios = await getBeneficiarios(<?php echo $idcontato; ?>);
        state.beneficiarios = beneficiarios.map(({ 
                    tpbeneficiario, 
                    idbeneficiario, 
                    nome, 
                    idvinculo, 
                    genero, 
                    nascimento, 
                    cpf, 
                    rg, 
                    orgao, 
                    nomedamae, 
                    idproduto, 
                    produto, 
                    valor }) => ({
                        tpbeneficiario,
                        id : idbeneficiario,
                        nome,
                        vinculo : idvinculo,
                        genero,
                        nascimento,
                        cpf,
                        rg,
                        orgao,
                        mae : nomedamae,
                        idproduto,
                        produto,
                        valor
         }))
    })()

    const snakeToCamel = (str) => str.replace(
        /([-_][a-z])/g,
        (group) => group.toUpperCase()
                        .replace('-', '')
                        .replace('_', '')
    );

    const capitalize = (str) => str[0].toUpperCase() + str.slice(1);

    const dropZoneElementos = document.querySelectorAll('[data-dropzone]');
    [...dropZoneElementos].forEach(el => {
        const dropName = snakeToCamel(el.getAttribute('id'));
        const stateElement = el.getAttribute('data-state');
        const initDropzone = el.getAttribute('data-dropzone-init') === null || el.getAttribute('data-dropzone-init') === undefined || el.getAttribute('data-dropzone-init') === 'true';

        // if(!initDropzone) {
        //     console.log(dropName);
        //     Dropzone.options[dropName] = false;
        //     return;
        // }      
        const options = {
            autoProcessQueue: false,
            uploadMultiple: false,
            maxFiles: 1,
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            init: function() {
                this.on("addedfile", (file) => {
                    // console.log(`Elemento colocado no dropzone ${dropName}`);
                    _.set(state, stateElement, file);
                    this.emit("complete", file);
                });

                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                })
            } 
        }


        Dropzone.options[dropName] = options;
        Dropzone.options[`my${capitalize(dropName)}`] = options;


        console.log(Dropzone.options);
        //  $(el).dropzone({
        //     autoProcessQueue: false,
        //     uploadMultiple: false,
        //     maxFiles: 1,
        //     acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
        //     init: function() {
        //         this.on("addedfile", (file) => {
        //             console.log(`Elemento colocado no dropzone ${dropName}`);
        //             _.set(state, stateElement, file);
        //             this.emit("complete", file);
        //         });

        //         this.on("maxfilesexceeded", function(file) {
        //             this.removeAllFiles();
        //             this.addFile(file);
        //         })
        //     } 
        // });
    }); 

    $(function () {
        const elementos =  document.querySelectorAll('[data-state]');

        [...elementos].forEach(el =>{

            if(el.tagName.toLowerCase() === 'form') return;

            if(el.getAttribute('type') &&  el.getAttribute('type') === 'checkbox') {
                _.set(state, el.getAttribute('data-state'), el.checked);
            }else{
                _.set(state, el.getAttribute('data-state'), el.value);
            }
            $(el).on('change', (event) => {

                if(event.target.getAttribute('data-state') === 'proposta.diaVencimento') {
                    event.target.value = event.target.value.replace(/\D/g, '');
                    // console.log(event.target.value)
                }

                if(event.target.getAttribute('type') &&  event.target.getAttribute('type') === 'checkbox') {
                _.set(state, event.target.getAttribute('data-state'), event.target.checked);
                }else{
                    _.set(state, event.target.getAttribute('data-state'), event.target.value);
                }
            })
        });
    });



    function editBeneficiario(index){
        $('#boxSwitchCCRf').hide();
        $('#btnRemoveBenef').show();
        changeFormNewBen(false);
        const beneficiarios = state.beneficiarios;
        // console.log(beneficiarios)
        const beneficiario = beneficiarios[index];

        /** Setar beneficiario no modal */
        $("#nome-beneficiario").val(beneficiario.nome);
        $("#vinculo-beneficiario").val(beneficiario.vinculo).trigger('change');
        $("#genero-beneficiario").val(beneficiario.genero).trigger('change');
        $("#nascimento-beneficiario").val(moment(beneficiario.nascimento,"YYYY-MM-DD").format("DD/MM/YYYY"));
        $("#cpf-beneficiario").val(beneficiario.cpf);
        $("#rg-beneficiario").val(beneficiario.rg);
        $("#orgao-beneficiario").val(beneficiario.orgao);
        $("#mae-beneficiario").val(beneficiario.mae);
        $("#produto-beneficiario").val(beneficiario.idproduto).trigger('change');
        $("#valor-beneficiario").val(beneficiario.valor);
        /** FIM Setar beneficiario no modal */
        $("#btnSalvarBenef").attr('onclick','saveBeneficiario('+index+');');
        $("#btnRemoveBenef").attr('onclick', 'removeBeneficiario('+ index +')').show();

        // Dropzone RG
        const dropzoneRg = Dropzone.forElement("#beneficiario-anexo-rg");

        dropzoneRg.init();

        dropzoneRg.removeAllFiles(true);
        // console.log(index);
        if(beneficiario.anexo_rg) {
            dropzoneRg.emit('addedfile',beneficiario.anexo_rg);
            dropzoneRg.createThumbnailFromUrl(beneficiario.anexo_rg, dropzoneRg.options.thumbnailWidth, dropzoneRg.options.thumbnailHeight, dropzoneRg.options.thumbnailMethod, true, function (thumbnail){
                dropzoneRg.emit('thumbnail', beneficiario.anexo_rg, thumbnail);
            });
            dropzoneRg.emit("success", beneficiario.anexo_rg);
            dropzoneRg.emit("complete", beneficiario.anexo_rg);
            dropzoneRg.files.push(beneficiario.anexo_rg);
        }
        dropzoneRg.on("addedfile", function(file) {
            console.log('Entrei aqui uma vez');
            // console.log(index);
            beneficiario.anexo_rg = file;
            // console.log('beneficiarios: ', beneficiarios);
            state.beneficiarios = beneficiarios;
            this.emit("complete", file);
            // console.log('Adicionado')
        });

        dropzoneRg.on("addedfile", function(file) {
            console.log('Entrei aqui segunda vez');
            // console.log(index);
            beneficiario.anexo_rg = file;
            // console.log('beneficiarios: ', beneficiarios);
            state.beneficiarios = beneficiarios;
            this.emit("complete", file);
            // console.log('Adicionado')
        });

        // Dropzone Comprovante de Residencia
        const dropzoneComprovanteResidencia = Dropzone.forElement("#beneficiario-anexo-comprovante-residencia");
        dropzoneComprovanteResidencia.removeAllFiles(true);

        if(beneficiario.anexo_comprovante_residencia) {
            dropzoneComprovanteResidencia.emit('addedfile',beneficiario.anexo_comprovante_residencia);
            dropzoneComprovanteResidencia.createThumbnailFromUrl(beneficiario.anexo_comprovante_residencia, dropzoneComprovanteResidencia.options.thumbnailWidth, dropzoneComprovanteResidencia.options.thumbnailHeight, dropzoneComprovanteResidencia.options.thumbnailMethod, true, function (thumbnail){
                dropzoneComprovanteResidencia.emit('thumbnail', beneficiario.anexo_comprovante_residencia, thumbnail);
            });
            dropzoneComprovanteResidencia.emit("success", beneficiario.anexo_comprovante_residencia);
            dropzoneComprovanteResidencia.emit("complete", beneficiario.anexo_comprovante_residencia);
            dropzoneComprovanteResidencia.files.push(beneficiario.anexo_comprovante_residencia);
        }
        dropzoneComprovanteResidencia.on("addedfile", function(file) {
            this.emit("complete", file);
        });
        dropzoneComprovanteResidencia.on('thumbnail', function(file) {
            console.log('Beneficiario: ', beneficiarios[index].nome);
            console.log(index);
            beneficiario.anexo_comprovante_residencia = { name: file.name, size: file.size, type: file.type, accepted: true,  status: "queued", dataURL: file.dataURL };
            state.beneficiarios = beneficiarios;
        })

        openModal('modalbenef');
    }

    function removeBeneficiario(index) {
        const beneficiarios = state.beneficiarios;
        const beneficiario = beneficiarios[index];

        beneficiario['deleted'] = true;
        // if(index === undefined || index === null || typeof index !== 'number' || (beneficiarios.length - 1) < index) {
        //     return;
        // }

        // beneficiarios.splice(index, 1);



        state.beneficiarios = beneficiarios;

        $('#modalbenef').modal('hide');
    }

    function newBeneficiario(){
        $('#boxSwitchCCRf').show();
    
        
         changeFormNewBen(false);
        

        /** Setar beneficiario no modal */
        $("#nome-beneficiario").val(null);
        $("#vinculo-beneficiario").val(null).trigger('change');
        $("#genero-beneficiario").val(null);
        $("#nascimento-beneficiario").val(null);
        $("#cpf-beneficiario").val(null);
        $("#rg-beneficiario").val(null);
        $("#orgao-beneficiario").val(null);
        $("#mae-beneficiario").val(null);
        $("#produto-beneficiario").val(null).trigger('change');
        $("#valor-beneficiario").val(null);
        /** FIM Setar beneficiario no modal */

        $("#btnRemoveBenef").attr('onclick', '').hide();
        $("#btnSalvarBenef").attr('onclick','addBeneficiario();');
        openModal('modalbenef');

    }

    function saveBeneficiario(index){
        const beneficiarios = state.beneficiarios;

        if ($('#form-beneficiarios').valid()){
            // $('#modalbenef').modal('hide');

            const beneficiario = beneficiarios[index];
            // const benef = "#ben-"+index;
            // const nome  = "#bnome-"+index;
            // const valor = "#bvalor-"+index; 

            beneficiario.nome            = $("#nome-beneficiario").val();
            beneficiario.vinculo         = $("#vinculo-beneficiario").select2('data')[0].id;
            beneficiario.genero          = $("#genero-beneficiario").select2('data')[0].id;
            beneficiario.nascimento      = $("#nascimento-beneficiario").val();
            beneficiario.cpf             = $("#cpf-beneficiario").val();
            beneficiario.rg              = $("#rg-beneficiario").val();
            beneficiario.orgao           = $("#orgao-beneficiario").val();
            beneficiario.mae             = $("#mae-beneficiario").val();
            beneficiario.idproduto       = $("#produto-beneficiario").select2('data')[0].id;
            beneficiario.produto         = $("#produto-beneficiario").select2('data')[0].text;
            beneficiario.valor           = $("#valor-beneficiario").val();
            

            state.beneficiarios = beneficiarios;
            // console.log("beneficiario",beneficiario);

            // $(nome).text(primeiroUltimoNome(primeira_maiuscula(beneficiario.nome)));
            // $(valor).text(primeira_maiuscula(beneficiario.produto)+' (R$ '+beneficiario.valor+')');

            $('#modalbenef').modal('hide');
        }
    }

    function addBeneficiario(){ 

            if ($('#form-beneficiarios').valid()){
                $('#modalbenef').modal('hide');
                const beneficiarios = state.beneficiarios;

                let newBeneficiario = {
                    id              : null,
                    tpbeneficiario  : null,
                    nome            : $("#nome-beneficiario").val(),
                    vinculo         : $("#vinculo-beneficiario").select2('data')[0].id,
                    genero          : $("#genero-beneficiario").select2('data')[0].id,
                    nascimento      : $("#nascimento-beneficiario").val(),
                    cpf             : $("#cpf-beneficiario").val(),
                    rg              : $("#rg-beneficiario").val(),
                    orgao           : $("#orgao-beneficiario").val(),
                    mae             : $("#mae-beneficiario").val(),
                    idproduto       : $("#produto-beneficiario").select2('data')[0].id,
                    produto         : $("#produto-beneficiario").select2('data')[0].text,
                    valor           : $("#valor-beneficiario").val()
                };

                

                // $("#dv-beneficiarios").append(`
                //     <div id="ben-${beneficiarios.length}" class="cl-beneficiarios col-12 col-md-6 col-xl-3">
                //         <a class="block block-link-shadow text-center" href="javascript:void(0)" onclick="editBeneficiario(${beneficiarios.length});">  
                //             <div class="block-content">
                //                 <img class="img-avatar" src="../assets/media/avatars/avatar6.jpg" alt="">
                //             </div>
                //             <div class="block-content block-content-full">
                //                 <div id = "bnome-${beneficiarios.length}" class="font-w600">${primeiroUltimoNome(primeira_maiuscula(newBeneficiario.nome))}</div>
                //                 <div id="bvalor-${beneficiarios.length}" class="font-size-sm text-muted">${primeira_maiuscula(newBeneficiario.produto)} (${newBeneficiario.valor})</div>
                //             </div>
                //         </a>
                //     </div>
                // `);

                beneficiarios.push(newBeneficiario);
                state.beneficiarios = beneficiarios;

            }
        
    }

/**Salvar Proposta */
    async function salvarProposta(){

        if ($('#form-proposta').valid() || $('#form-responsavel').valid()){
            const beneficiarios = state.beneficiarios;

            const beneficiarioCapaIndex =  beneficiarios.findIndex(b => b.tpbeneficiario == 't' || b.vinculo == 14) || 0;
            const beneficiarioCapa = beneficiarios[beneficiarioCapaIndex];

            console.log('beneficiarioCapa: ', beneficiarioCapa);
            

            const idcontato     = $("#idcontato").val();
            const novo          = $("#idcontato").val()?false:true;
            const idvendedor    = $("#corretor").val();
            const idfpagamento  = $("#fpagamento").val();
            const idtipodeplano = $("#tconvenio").val();
            const idtpcontrato  = $("#tpcontrato").val();
            const idoperadora   = $("#operadora").val();
            const idconvenio    = $("#convenio").val();
            const pdigital      = $("#pdigital").is(":checked");
            const vencimento    = $("#vencimento").val();

            beneficiarioCapa.novo = novo;

            const dreqProposta = {
                idcontato           : idcontato,
                idvendedor          : idvendedor,
                idformadepagamento  : idfpagamento,
                idtpcontrato        : idtpcontrato,
                idtipodeplano       : idtipodeplano,
                idoperadora         : idoperadora,
                idcentrodecusto     : idconvenio,
                pdigital            : pdigital,
                vencimento          : vencimento
            }

            const capaProposta  = JSON.parse(await salvarCapaProposta(dreqProposta));
            // console.log('capaProposta',capaProposta);

            beneficiarioCapa.id = capaProposta.idcontato;
            // console.log('beneficiarioCapa',beneficiarioCapa);

            const titular = JSON.parse(await salvarTitular(beneficiarioCapa)); 
            // console.log('saveTitular',titular);

            const dreqResponsavel = {
                idcontato       : beneficiarioCapa.id,
                novo            : beneficiarioCapa.novo,
                nome            : $("#nome").val(),
                telefone        : $("#celular").val(),
                email           : $("#email").val(),
                cep             : $("#cep").val(),
                estado          : $("#uf").val(),
                cidade          : $("#cidade").val(),
                endereco        : $("#endereco").val(),
                complemento     : $("#complemento").val(),
                numero          : $("#numero").val(),
                bairro          : $("#bairro").val(),
                nomemae         : $("#mae-responsavel").val(),
                genero          : $("#genero-responsavel").val(),
                nascimento      : $("#nascimento-responsavel").val(),
                cpf             : $("#cpf-responsavel").val(),
                rg              : $("#rg").val(),
                orgao           : $("#oemissor").val()
            }

            const savedResponsavel = JSON.parse(await salvarResponsavel(dreqResponsavel))
            // console.log('savedResponsavel',savedResponsavel);
            
            console.log(beneficiarios);
            beneficiarios.splice(beneficiarioCapaIndex, 1)
            const newBeneficiarios = beneficiarios.filter(({vinculo}) => parseInt(vinculo, 10) !== 14);
            // console.log('newBeneficiarios',newBeneficiarios);

            const savedBeneficiarios = [];
            console.log(beneficiarios);
            console.log('newBeneficiarios: ', newBeneficiarios);
            // return
            for (const ben of newBeneficiarios) {
                try {
                    
                    const dReqBeneficiario = {
                        id           : ben.id,
                        idcontato    : beneficiarioCapa.id,
                        nome         : ben.nome,
                        vinculo      : ben.vinculo,
                        genero       : ben.genero,
                        nascimento   : ben.nascimento,
                        cpf          : ben.cpf,
                        rg           : ben.rg,
                        orgao        : ben.orgao,
                        mae          : ben.mae,
                        idproduto    : ben.idproduto,
                        produto      : ben.produto,
                        valor        : ben.valor.replace("R$ ",""),
                        deleted      : ben.deleted
                    };
                    const savedBen = await salvarBeneficiarios(dReqBeneficiario);
                    savedBeneficiarios.push(savedBen); 
                } catch (error) {
                    console.error(error);
                    console.error(`Não foi possível salvar o beneficiario ${ben.nome}`)
                }
            }
            // console.log('saveBeneficiarios',savedBeneficiarios);

            let dExpiraCookie = moment().add(5, 'seconds').format();
            document.cookie = 'notice=insert success; expires=' + dExpiraCookie + ';';
            window.location.href = "fdv-propostas.php";

        }
    }

    async function salvarCapaProposta(dataRequest){

        // console.log('dataRequest - CapaProposta',dataRequest);
        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'GET',
                data: dataRequest,
                url: 'setProposta.php',
                success: (res) =>{
                    // console.log(res);
                    resolve(res);
                },error: (err) => {
                    reject(err);
                }
            });
        });

    }

    async function salvarTitular(benTitular){

        const data = {
                id           : benTitular.id,
                novo         : benTitular.novo,
                nome         : benTitular.nome,
                vinculo      : benTitular.vinculo,
                genero       : benTitular.genero,
                nascimento   : benTitular.nascimento,
                cpf          : benTitular.cpf,
                rg           : benTitular.rg,
                orgao        : benTitular.orgao,
                mae          : benTitular.mae,
                idproduto    : benTitular.idproduto,
                produto      : benTitular.produto,
                valor        : benTitular.valor.replace("R$ ","")
        }

        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'GET',
                data: data,
                url: 'setTitular.php',
                success: (res) =>{
                    resolve(res);
                },error: (err) => {
                    reject(err);
                }
            });
        });

    }

    async function salvarResponsavel(dreqResponsavel){

        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'GET',
                data: dreqResponsavel,
                url: 'setResponsavel.php',
                success: (res) =>{
                    // console.log(res);
                    resolve(res);
                },error: (err) => {
                    reject(err);
                }
            });

        });

    }

    async function salvarBeneficiarios(dReqBeneficiario){

        console.log({...dReqBeneficiario})
        return axios.get('./setBeneficiario.php', { params: { ...dReqBeneficiario } });
    }

/**FIM Salvar Proposta */

    function proximos(aba){
        proximaaba = '#'+aba;
        
        $(proximaaba).siblings().hide();
        $(proximaaba).fadeIn();
    }

    function openModal(modal){
        x = '#'+modal;
        $(x).modal('show');
    }

    $("#cpf-responsavel").blur(function(){

        var cpf = $(this).val().replace(/\D/g, '');
        // $("#modalcontratos").modal('show');

    });

/**Tratamento de CEP */
    $("#cep").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                $("#endereco").val("");
                $("#bairro").text("");
                $("#cidade").text("");
                $("#uf").text("");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {                            
                        //Atualiza os campos com os valores da consulta.

                        $bairro = removeAcento(dados.bairro.toUpperCase());
                        $cidade = removeAcento(dados.localidade.toUpperCase());
                        $endereco = removeAcento(dados.logradouro.toUpperCase());
                        
                        $("#uf").val(dados.uf);
                        $("#cidade").val($cidade);
                        $("#bairro").val($bairro);
                        $("#endereco").val($endereco);

                        $("#numero").focus();
                    }
                });
            }
        }
    });
/**FIM Tratamento de CEP */ 


        $("#pdigital").change(function(){
            
            if ((this).checked){
                $("#lblpdigital").text("Proposta Digital");
                $("#lblpdigital").removeClass("text-danger");
                $("#lblpdigital").addClass("text-primary");
            } else {
                $("#lblpdigital").text("Proposta Física");
                $("#lblpdigital").removeClass("text-primary");
                $("#lblpdigital").addClass("text-danger");
            }


        });


</script>
