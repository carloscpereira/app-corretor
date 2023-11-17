<?php
// if ($_COOKIE['logado'] === NULL) {
//     header("Location: login.php");
// }
?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/select2/css/select2.min.css'); ?>
<?php $dm->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>
<?php $dm->get_css('js/plugins/dropzone/dist/min/dropzone.min.css'); ?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Nova Oportunidade</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="fuv-oportunidades.php">Oportunidades</a>
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
    <div class="block">
        <div class="block-header block-header-default">
            <a class="btn btn-light" href="javascript:void(0);" onclick="cancelarCadastro();">
                <i class="fa fa-arrow-left mr-1"></i> Todas as Oportunidades
            </a>

            <div class="block-options">

                <select class="custom-select mb-2" id="example-select-custom" name="example-select-custom">
                    <option value="0">INFORME A ETAPA</option>
                    <option value="2">PROSPECÇÃO</option>
                    <option value="3">QUALIFICAÇÃO</option>
                    <option value="4">PRIMEIRA OFERTA</option>
                    <option value="5">FOLLOW UP</option>
                    <option value="6">NEGOCIAÇÃO</option>
                    <option value="7">FECHAMENTO</option>
                    <option value="8">PÓS VENDAS</option>
                    <option value="9">RETENÇÃO</option>
                    <option value="10">INDICAÇÃO</option>
                    <option value="11">RECUPERAÇÃO</option>
                </select>

                <!-- <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-alt-info" id="dropdown-analytics-overview"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações <i class="fa fa-fw fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right font-size-sm"
                        aria-labelledby="dropdown-analytics-overview">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="salvarProposta(0);">Salvar e
                            Manter na Qualificação</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="salvarProposta(2);">Salvar e
                            Encaminhar para Negociação</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="salvarProposta(3);">Formalizar</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="salvarProposta(5);">Averbar</a>
                    </div>
                </div> -->
                <button id="btnSalvarLiberado" class="btn btn-alt-info" onclick="salvarProposta();">
                    <i class="fa fa-fw fa-check mr-1"></i> Enviar para Digitação
                </button>

                <button type="button" class="btn-block-option" data-toggle="block-option"
                    data-action="fullscreen_toggle"></button>

            </div>
        </div>
        <div class="block-content">
            <!-- Block Tabs Alternative Style -->
            <div class="myblock block block-rounded">

                <div class="block-content tab-content">
                    <form id="frm-oportunidade" action="javascript:void(0);" onsubmit="return false;">

                        <!-- sobre produto -->
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Sobre a proposta
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-xl-7">
                                        <label for="parceiro">Parceiro</label>
                                        <select class="js-select2 form-control" id="parceiro" name="parceiro"
                                            style="width: 100%;">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-5">
                                        <label for="produto">Produto</label>
                                        <select class="js-select2 form-control" id="produto" name="produto"
                                            style="width: 100%;">
                                            <option></option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="valor-solicitado">Valor Solicitado</label>
                                        <input type="text" class="form-control money" id="valor-solicitado"
                                            name="valor-solicitado" disabled>
                                    </div>

                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="parcela">Parcela</label>
                                        <input type="text" class="form-control money" id="parcela" name="parcela"
                                            data-autoclose="true" data-today-highlight="false" disabled>
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="prazo">Prazo</label>
                                        <select class="js-select2 form-control" id="prazo" name="prazo"
                                            style="width: 100%;" disabled>
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="1">1 vez</option>
                                            <option value="2">2 vezes</option>
                                            <option value="3">3 vezes</option>
                                            <option value="4">4 vezes</option>
                                            <option value="5">5 vezes</option>
                                            <option value="6">6 vezes</option>
                                            <option value="7">7 vezes</option>
                                            <option value="8">8 vezes</option>
                                            <option value="9">9 vezes</option>
                                            <option value="10">10 vezes</option>
                                            <option value="11">11 vezes</option>
                                            <option value="12">12 vezes</option>
                                            <option value="13">13 vezes</option>
                                            <option value="14">14 vezes</option>
                                            <option value="15">15 vezes</option>
                                            <option value="16">16 vezes</option>
                                            <option value="17">17 vezes</option>
                                            <option value="18">18 vezes</option>
                                            <option value="19">19 vezes</option>
                                            <option value="20">20 vezes</option>
                                            <option value="21">21 vezes</option>
                                            <option value="22">22 vezes</option>
                                            <option value="23">23 vezes</option>
                                            <option value="24" selected>24 vezes</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- FIM sobre produto -->

                        <!-- sobre responsável -->
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Dados de Contato </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control text-uppercase" id="nome" name="nome">
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4 col-sm-12">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular">
                                    </div>

                                    <div class="form-group col-lg-8 col-sm-12">
                                        <label for="email">e-mail</label>
                                        <input type="text" class="form-control text-lowercase" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Documentos.
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-3">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control" id="rg" name="rg">
                                    </div>

                                    <div class="form-group col-lg-12 col-xl-2">
                                        <label for="orgaoemissor">Órgão</label>
                                        <input type="text" class="form-control text-uppercase" id="orgaoemissor"
                                            name="orgaoemissor">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-3">
                                        <label for="genero">Gênero</label>
                                        <select class="js-select2 form-control" id="genero" name="genero"
                                            style="width: 100%;">
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="1">MASCULINO</option>
                                            <option value="2">FEMININO</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="nascimento">Nascimento</label>
                                        <input type="text" class="js-masked-date js-datepicker form-control"
                                            id="nascimento" name="nascimento" data-autoclose="true"
                                            data-today-highlight="false" data-date-format="dd/mm/yyyy">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="matricula">Matrícula/Cód. Familiar</label>
                                        <input type="text" class="form-control" id="matricula" name="matricula">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="renda">Renda Familiar</label>
                                        <input type="text" class="form-control money" id="renda" name="renda">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="nomedamae">Nome da mãe</label>
                                    <input type="text" class="form-control text-uppercase" id="nomedamae"
                                        name="nomedamae">
                                </div>
                            </div>
                        </div>
                        <!-- fim sobre responsável -->

                        <!-- sobre endereço -->
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Endereço </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-xl-3">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-2">
                                        <label for="uf">UF</label>
                                        <input type="text" class="form-control text-uppercase" id="uf" name="uf">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-7">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control text-uppercase" id="cidade"
                                            name="cidade">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control text-uppercase" id="bairro" name="bairro">
                                </div>
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control text-uppercase" id="endereco"
                                        name="endereco">
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 col-xl-8">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control text-uppercase" id="complemento"
                                            name="complemento">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control text-uppercase" id="numero"
                                            name="numero">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- fim sobre endereço -->

                        <!-- sobre mensalidade -->
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Dados Bancários
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-xl-5">
                                        <label for="banco">Banco</label>
                                        <select class="js-select2 form-control" id="banco" name="banco"
                                            style="width: 100%;">
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-12 col-xl-3">
                                        <label for="agencia">Agência</label>
                                        <input type="text" class="form-control text-uppercase" id="agencia"
                                            name="agencia">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-4">
                                        <label for="conta">Conta</label>
                                        <input type="text" class="form-control text-uppercase" id="conta" name="conta">
                                    </div>
                                    <div class="form-group col-lg-12 col-xl-12">
                                        <label for="pix">PIX</label>
                                        <input type="text" class="form-control text-uppercase" id="pix" name="pix">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- FIM sobre mensalidade -->

                        <!-- sobre observação -->
                        <div class="row push mx-4">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Observações
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-xl-12">
                                        <label for="banco">Observações</label>
                                        <textarea class="form-control text-uppercase" id="observacao" name="observacao"
                                            rows="5"> </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- FIM sobre observação -->

                    </form>
                </div>
            </div>

            <div class="block-content mb-2" id="div-documentos" style="display:none">
                <!-- Block Tabs Default Style -->
                <div class="row">
                    <!-- CPF-->
                    <div class="col-lg-3">
                        <!-- CPF Imagem Servidor-->
                        <div class="imagem" id="servidor-cpf" style="display:none;">
                            <img class="img-thumbnail" id="img-cpf" width="100%" height="100%" style="height:160px;" />
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>CPF<br>click para remover</small> </span>
                            </button>


                        </div>
                        <!-- FIM CPF Imagem Servidor-->

                        <!-- CPF Nova Imagem-->
                        <div class="captura" id="captura-cpf">
                            <form action="upload-docs.php" class="dropzone" id="dropzcpf">
                                <input type="hidden" name="tipodedocumentoid" value="1">
                                <input type="hidden" name="pessoaid" id="pessoaid-cpf-edit">
                            </form>

                        </div>
                        <!-- FIM CPF Nova Imagem-->
                    </div>
                    <!-- FIM: CPF-->

                    <!-- RG OU CNH-->
                    <div class="col-lg-3">
                        <!-- Imagem Servidor-->
                        <div class="imagem" id="servidor-rg" style="display:none;">
                            <img class="img-thumbnail" id="img-rg" width="100%" height="100%" style="height:160px; " />
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG OU CNH<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura" id="captura-rg">
                            <form action="upload-docs.php" class="dropzone" id="dropzrg">
                                <input type="hidden" name="tipodedocumentoid" value="2">
                                <input type="hidden" name="pessoaid" id="pessoaid-rg-edit">
                            </form>
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: RG OU CNH-->

                    <!-- CADSUS-->
                    <div class="col-lg-3" id="4">
                        <!-- CADSUS (Imagem Servidor)-->
                        <div class="imagem" id="servidor-cadsus" style="display:none;">
                            <img class="img-thumbnail" id="img-cadsus" width="100%" height="100%"
                                style="height:160px;" />
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>CAD Único<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM CADSUS (Imagem Servidor)-->

                        <!-- CADSUS-->
                        <div class="captura" id="captura-cadsus">
                            <form action="upload-docs.php" class="dropzone" id="dropzcadsus">
                                <input type="hidden" name="tipodedocumentoid" value="4">
                                <input type="hidden" name="pessoaid" id="pessoaid-cadsus-edit">
                            </form>
                        </div>
                        <!-- FIM CADSUS-->
                    </div>
                    <!-- FIM: CADSUS-->

                    <!-- Selfie -->
                    <div class="col-lg-3" id="5">
                        <!-- Selfie (Imagem Servidor)-->
                        <div class="imagem" id="servidor-selfie" style="display:none;">
                            <img class="img-thumbnail" id="img-selfie" width="100%" height="100%"
                                style="height:160px;" />
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Selfie<br>click para remover</small>
                                </span>
                            </button>


                        </div>
                        <!-- FIM Selfie (Imagem Servidor)-->

                        <!-- SELFIE Nova Imagem -->
                        <div class="captura" id="captura-selfie">
                            <form action="upload-docs.php" class="dropzone" id="dropzselfie">
                                <input type="hidden" name="tipodedocumentoid" value="5">
                                <input type="hidden" name="pessoaid" id="pessoaid-selfie-edit">
                            </form>

                        </div>
                        <!-- FIM SELFIE Nova Imagem -->
                    </div>
                    <!-- FIM: Selfie -->

                </div>
                <!-- END Block Tabs Default Style -->
            </div>

            <!-- END Block Tabs Alternative Style -->

        </div>

        <!-- <div class="block-header block-header-default">
            <a class="btn btn-light" href="javascript:void(0);" onclick="cancelarCadastro();">
                <i class="fa fa-arrow-left mr-1"></i> Todas as Oportunidades
            </a>

            <div class="block-options">
                <button id="btnSalvarLiberado" class="btn btn-alt-info" onclick="salvarProposta();">
                    <i class="fa fa-fw fa-check mr-1"></i> Enviar para Digitação
                </button>

                <button type="button" class="btn-block-option" data-toggle="block-option"
                    data-action="fullscreen_toggle"></button>

            </div>
        </div> -->

    </div>

    <!-- END New Post -->


</div>
<!-- END Page Content -->

<!-- Modal CAPTURA DE IMAGEM -->
<div class="modal fade" id="modal-imagens" tabindex="-1" role="dialog" aria-labelledby="modal-imagens"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">

                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">DOCUMENTOS</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>


                <div class="block-content">
                    <!-- Block Tabs Default Style -->

                    <div class="row">
                        <!-- CPF-->
                        <div class="col-lg-3" id="1">
                            <!-- CPF Imagem Servidor-->
                            <div style="display:none;">
                                <img class="img-thumbnail" width="100%" height="100%" style="height:160px;" />
                                <br>
                                <button type="button" class="btn btn-link remove_image btn-block">
                                    <span class="text-center">
                                        <small>CPF<br>click para remover</small> </span>
                                </button>


                            </div>
                            <!-- FIM CPF Imagem Servidor-->

                            <!-- CPF Nova Imagem-->
                            <div>
                                <form action="upload-docs.php" class="dropzone" id="dropzcpf">
                                    <input type="hidden" name="tipodedocumentoid" value="1">
                                    <input type="hidden" name="pessoaid" id="pessoaid-cpf">
                                </form>

                            </div>
                            <!-- FIM CPF Nova Imagem-->
                        </div>
                        <!-- FIM: CPF-->

                        <!-- RG FRENTE-->
                        <div class="col-lg-3" id="2">
                            <!-- Imagem Servidor-->
                            <div style="display:none;">
                                <img class="img-thumbnail" width="100%" height="100%" style="height:160px; " />
                                <br>
                                <button type="button" class="btn btn-link remove_image btn-block">
                                    <span class="text-center">
                                        <small>RG/CNH<br>click para remover</small>
                                    </span>
                                </button>
                            </div>
                            <!-- FIM:Imagem Servidor)-->

                            <!-- Captura Imagem-->
                            <div>
                                <form action="upload-docs.php" class="dropzone" id="dropzrg">
                                    <input type="hidden" name="tipodedocumentoid" value="2">
                                    <input type="hidden" name="pessoaid" id="pessoaid-rg">
                                </form>
                            </div>
                            <!-- FIM: Captura Imagem-->
                        </div>
                        <!-- FIM: RG FRENTE-->

                        <!-- CADSUS-->
                        <div class="col-lg-3" id="4">
                            <!-- CADSUS (Imagem Servidor)-->
                            <div style="display:none;">
                                <img class="img-thumbnail" width="100%" height="100%" style="height:160px;" />
                                <br>
                                <button type="button" class="btn btn-link remove_image btn-block">
                                    <span class="text-center">
                                        <small>CAD Único<br>click para remover</small>
                                    </span>
                                </button>
                            </div>
                            <!-- FIM CADSUS (Imagem Servidor)-->

                            <!-- CADSUS-->
                            <div>
                                <form action="upload-docs.php" class="dropzone" id="dropzcadsus">
                                    <input type="hidden" name="tipodedocumentoid" value="4">
                                    <input type="hidden" name="pessoaid" id="pessoaid-cadsus">
                                </form>
                            </div>
                            <!-- FIM CADSUS-->
                        </div>
                        <!-- FIM: CADSUS-->

                        <!-- Selfie -->
                        <div class="col-lg-3" id="5">
                            <!-- Selfie (Imagem Servidor)-->
                            <div class="imagem" style="display:none;">
                                <img class="img-thumbnail" width="100%" height="100%" style="height:160px;" />
                                <br>
                                <button type="button" class="btn btn-link remove_image btn-block">
                                    <span class="text-center">
                                        <small>Selfie<br>click para remover</small>
                                    </span>
                                </button>


                            </div>
                            <!-- FIM Selfie (Imagem Servidor)-->

                            <!-- SELFIE Nova Imagem -->
                            <div>
                                <form action="upload-docs.php" class="dropzone" id="dropzselfie">
                                    <input type="hidden" name="tipodedocumentoid" value="5">
                                    <input type="hidden" name="pessoaid" id="pessoaid-selfie">
                                </form>

                            </div>
                            <!-- FIM SELFIE Nova Imagem -->
                        </div>
                        <!-- FIM: Selfie -->

                    </div>

                    <!-- END Block Tabs Default Style -->
                </div>

                <div class="block-content block-content-full text-right bg-light">
                    <button type="button" id="save-obs" class="btn btn-sm btn-primary" data-dismiss="modal">Enviar
                        documentos</button>

                    <button type="button" id="no-save-obs" class="btn btn-sm btn-danger-light" data-dismiss="modal">Não
                        possui documentos</button>

                </div>


            </div>
        </div>
    </div>
</div>
<!-- END Modal CAPTURA DE IMAGEM-->


<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>
<?php $dm->get_js('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>
<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>
<?php $dm->get_js('js/plugins/dropzone/dropzone.min.js'); ?>

<?php $dm->get_js('js/funcoes/funcoes-gerais.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/pt-br.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>

<!-- jquery-maskMoney -->
<script src="../assets/node_modules/jquery-maskMoney/jquery.maskMoney.min.js"></script>
<!--Custom JavaScript -->

<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
<script>
jQuery(function() {
    Dashmix.helpers(['select2', 'masked-inputs', 'validation', 'datepicker', 'notify']);
});
</script>

<?php require 'inc/_global/views/footer_end.php'; ?>

<script>
/** Definicições iniciais */
moment().locale("pt-br");

var oportunidades;

jQuery('#frm-oportunidade').validate({
    ignore: [],
    errorClass: "invalid-feedback animated fadeIn",
    errorElement: "div",
    errorPlacement: function(e, r) {
        jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
    },
    highlight: function(e) {
        jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass(
            "is-invalid")
    },
    success: function(e) {
        jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
    },
    rules: {
        'produto': {
            required: !0
        },
        'valor-solicitado': {
            required: !0
        },
        'nome': {
            required: !0
        },
        'celular': {
            required: !0
        },
        'cpf': {
            required: !0
        },
        'rg': {
            required: !0
        },
        'orgaoemissor': {
            required: !0
        },
        'genero': {
            required: !0
        },
        'nascimento': {
            required: !0
        },
        'uf': {
            required: !0
        },
        'cidade': {
            required: !0
        },
        'bairro': {
            required: !0
        },
        'endereco': {
            required: !0
        },
        'numero': {
            required: !0
        }
    },
    messages: {
        'produto': {
            required: 'Escolha o produto.'
        },
        'valor-solicitado': {
            required: 'Digite o valor.'
        },
        'nome': {
            required: 'Digite o o nome do cliente.'
        },
        'celular': {
            required: 'Informe o celular.'
        },
        'cpf': {
            required: 'Digite o CPF.'
        },
        'rg': {
            required: 'Digite o RG.'
        },
        'orgaoemissor': {
            required: 'Digite o Órgão Emissor.'
        },
        'genero': {
            required: 'Digite o gênero.'
        },
        'nascimento': {
            required: 'Digite a data de nascimento.'
        },
        'uf': {
            required: 'Informe o Estado.'
        },
        'cidade': {
            required: 'Informe a Cidade.'
        },
        'bairro': {
            required: 'Informe o Bairro.'
        },
        'endereco': {
            required: 'Informe o Endereço.'
        },
        'numero': {
            required: 'Informe o número'
        }
    }
});

const apiCRM = axios.create({
    baseURL: 'https://www.idental.com.br/api/crm/',
    timeout: 10000,
    headers: {
        'AppAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
    }
});

$(".money").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    thousands: '.',
    decimal: ',',
    affixesStay: false
});

/*RG*/
Dropzone.options.dropzrg = {
    dictDefaultMessage: 'RG ou CNH',
    uploadMultiple: false,
    maxFiles: 1,
    autoProcessQueue: true,
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    resizeWidth: 600,
    resizeHeight: 800,
    init: function() {
        this.on("success", function(file, response) {
            const data = JSON.parse(response)[0];
            loadDocumento(data);
        });
    }
};
/*FIM RG*/

/*CADSUS*/
Dropzone.options.dropzcadsus = {
    dictDefaultMessage: 'CAD Único',
    uploadMultiple: false,
    maxFiles: 1,
    autoProcessQueue: true,
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    resizeWidth: 600,
    resizeHeight: 800,
    init: function() {
        this.on("success", function(file, response) {
            const data = JSON.parse(response)[0];
            loadDocumento(data);
        });
    }
};
/*FIM CADSUS*/

/*Selfie */
Dropzone.options.dropzselfie = {
    dictDefaultMessage: 'Selfie',
    uploadMultiple: false,
    maxFiles: 1,
    autoProcessQueue: true,
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    resizeWidth: 600,
    resizeHeight: 800,
    init: function() {
        this.on("success", function(file, response) {
            const data = JSON.parse(response)[0];
            loadDocumento(data);
        });
    }
};
/*FIM Selfie*/

/*CPF */
Dropzone.options.dropzcpf = {
    dictDefaultMessage: 'CPF',
    uploadMultiple: false,
    maxFiles: 1,
    autoProcessQueue: true,
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    resizeWidth: 600,
    resizeHeight: 800,
    init: function() {
        this.on("success", function(file, response) {
            const data = JSON.parse(response)[0];
            loadDocumento(data);
        });
    }
};
/*FIM CPF*/


const convertMoney = (valorBr) => parseFloat(valorBr.replace("R$", "").replace(" ", "").replace(".", "").replace(",",
    "."));



/* mascaras */
$("#cpf-beneficiario").mask("999.999.999-99", {
    placeholder: ' ',
    autoclear: false
});

$("#cpf").mask("999.999.999-99", {
    placeholder: ' ',
    autoclear: false
});

$("#celular").mask("(99) 9 9999-9999", {
    placeholder: ' ',
    autoclear: false
});
/* fim mascaras */

/** FIM Definicições iniciais */


let tipodeDocumentos = [];


function getParameter(theParameter) {
    var params = window.location.search.substr(1).split('&');

    for (var i = 0; i < params.length; i++) {
        var p = params[i].split('=');
        if (p[0] == theParameter) {
            return decodeURIComponent(p[1]);
        }
    }
    return false;
}

$("#cpf").blur(function() {
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
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            $("#endereco").val("");
            $("#bairro").text("");
            $("#cidade").text("");
            $("#uf").text("");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
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

/** Muda de campo, ao pressionar enter */
$(document).on('keydown', 'input, select, textarea', function(e) {
    var self = $(this),
        form = self.parents('form:eq(0)'),
        focusable, next, prev;

    if (e.shiftKey) {
        if (e.keyCode == 13) {
            focusable = form.find('input,a,select,button,textarea').filter(':visible');
            prev = focusable.eq(focusable.index(this) - 1);

            if (prev.length) {
                prev.focus();
            } else {
                form.submit();
            }
        }
    } else
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this) + 1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});

function salvarProposta(status = 3) {
    if (oportunidadeId) {
        alterarProposta(status);
    } else {
        inserirProposta(status);
    }
}

async function inserirProposta() {

    const consultorId = getCookie('cId');

    // if ($('#frm-oportunidade').valid()) {

    pessoaBody = {
        nome: $('#nome').val(),
        generoid: $('#genero').val(),
        nascimento: moment($('#nascimento').val(), 'DD/MM/YYYY').format('YYYY-MM-DD'),
        cpf: $('#cpf').val().replace(/[^\w\s]/gi, ''),
        rg: $('#rg').val(),
        mae: $('#nomedamae').val(),
        cadunico: $('#matricula').val(),
        orgaoemissor: $('#orgaoemissor').val().replace(/[^\w\s]/gi, ''),
        cadunico: $('#matricula').val(),
        rendafamiliar: $('#renda').val().replace('.', '').replace(',', '.')
    };

    console.log("pessoaBody", pessoaBody);

    let pessoaId;

    try {
        const {
            data: {
                data: pessoafisica
            }
        } = await apiCRM.post('/pessoafisica', pessoaBody);
        console.log("pessoafisica", pessoafisica);
        pessoaId = pessoafisica.id;

    } catch (error) {
        console.log("error pessoafisica", error);
    }

    const enderecoBody = {
        endereco: $('#endereco').val(),
        complemento: $('#complemento').val(),
        numero: $('#numero').val(),
        cep: $('#cep').val(),
        bairro: $('#bairro').val(),
        cidade: $('#cidade').val(),
        estado: $('#uf').val(),
        tipodeendereco: 1,
        principal: true
    };

    console.log("enderecoBody", enderecoBody);

    try {
        const {
            data: endereco
        } = await apiCRM.post(`/endereco/${pessoaId}`, enderecoBody);
        console.log("endereco", endereco);

    } catch (error) {
        console.log("error endereco", error);
    }

    const telefoneBody = {
        numero: $('#celular').val().replace(/[^\w\s]/gi, '').replace(/( )+/g, ""),
        tipodetelefoneid: 2,
        principal: true,
        whatsapp: true
    };

    console.log("telefoneBody", telefoneBody);

    try {
        const {
            data: telefone
        } = await apiCRM.post(`/telefone/${pessoaId}`, telefoneBody);
        console.log("telefone", telefone);
    } catch (error) {
        console.log("error telefone", error);
    }

    const emailBody = {
        email: $('#email').val(),
        tipodeemailid: 2,
        principal: true
    };

    console.log("emailBody", emailBody);

    try {
        const {
            data: email
        } = await apiCRM.post(`/email/${pessoaId}`, emailBody);
        console.log("email", email);

    } catch (error) {
        console.log("error email", error);
    }

    const contaBody = {
        bancoid: $('#banco').val(),
        agencia: $('#agencia').val(),
        conta: $('#conta').val(),
        pix: $('#pix').val(),
        pessoaid: pessoaId,
        principal: true
    };

    console.log("contaBody", contaBody);

    const {
        data: contas
    } = await apiCRM.post(`/contabancaria/${pessoaId}`, contaBody);
    console.log("contas", contas);


    const contatoBody = {
        id: pessoaId,
        consultorid: consultorId
    }

    console.log("contatoBody", contatoBody);

    try {
        const {
            data: contato
        } = await apiCRM.post(`/contato`, contatoBody);
        console.log("contato", contato);
    } catch (error) {
        console.log("error contato", error);
    }

    //0, 2, 3, 5
    const oportunidadeBody = {
        etapadofunilid: status === 0 ? 3 : status === 2 ? 6 : status === 3 ? 7 : 8,
        produtoid: 1,
        contatoid: pessoaId,
        consultorid: consultorId,
        valor: $('#valor-solicitado').val().replace('.', '').replace(',', '.'),
        parcela: $('#parcela').val().replace('.', '').replace(',', '.'),
        prazo: $('#prazo').val(),
        statusdaoportunidadeid: status === 0 ? 1 : status === 2 ? 1 : status === 3 ? 4 : 5,
        observacao: $("#observacao").val(),
        anuncioid: 1
    };

    console.log("oportunidadeBody", oportunidadeBody);

    try {
        const {
            data: oportunidade
        } = await apiCRM.post(`/oportunidade`, oportunidadeBody);
        console.log("oportunidade", oportunidade);


        $('#pessoaid-cpf').val(pessoaId);
        $('#pessoaid-rg').val(pessoaId);
        $('#pessoaid-cadsus').val(pessoaId);
        $('#pessoaid-selfie').val(pessoaId);

        console.log($('#pessoaid-cpf').val());
        console.log($('#pessoaid-rg').val());
        console.log($('#pessoaid-cadsus').val());
        console.log($('#pessoaid-selfie').val());

        $('#modal-imagens').modal('show');

    } catch (error) {
        console.log("error oportunidade", error);
    }


    // params: { pessoaid },
    // }

    // location.href = `fuv-oportunidades.php`;

};

async function alterarProposta(status) {

    const consultorId = getCookie('cId');

    // if ($('#frm-oportunidade').valid()) {


    pessoaBody = {
        nome: $('#nome').val(),
        generoid: $('#genero').val(),
        nascimento: $('#nascimento').val() ? moment($('#nascimento').val(), 'DD/MM/YYYY').format('YYYY-MM-DD') :
            null,
        cpf: $('#cpf').val().replace(/[^\w\s]/gi, ''),
        rg: $('#rg').val(),
        orgaoemissor: $('#orgaoemissor').val().replace(/[^\w\s]/gi, ''),
        mae: $('#nomedamae').val(),
        cadunico: $('#matricula').val(),
        rendafamiliar: $('#renda').val().replace('.', '').replace(',', '.')

    };

    console.log("pessoaBody", pessoaBody);

    try {
        const {
            data: {
                data: pessoafisica
            }
        } = await apiCRM.put(`/pessoafisica/${pessoaId}`, pessoaBody);
        console.log("pessoafisica", pessoafisica);

    } catch (error) {
        console.log("error pessoafisica", error);
    }

    const enderecoBody = {
        pessoaid: pessoaId,
        endereco: $('#endereco').val(),
        complemento: $('#complemento').val(),
        numero: $('#numero').val(),
        cep: $('#cep').val(),
        bairro: $('#bairro').val(),
        cidade: $('#cidade').val(),
        estado: $('#uf').val(),
        tipodeendereco: 1,
        principal: true
    };

    console.log("enderecoBody", enderecoBody);
    console.log(enderecoId);

    if (enderecoId) {

        try {
            const {
                data: endereco
            } = await apiCRM.put(`/endereco/${enderecoId}`, enderecoBody);
            console.log("endereco", endereco);

        } catch (error) {
            console.log("error endereco", error);
        }

    } else if ($('#endereco').val()) {

        try {
            const {
                data: endereco
            } = await apiCRM.post(`/endereco/`, enderecoBody);
            console.log("endereco", endereco);

        } catch (error) {
            console.log("error endereco", error);
        }

    }

    const telefoneBody = {
        pessoaid: pessoaId,
        numero: $('#celular').val().replace(/[^\w\s]/gi, '').replace(/( )+/g, ""),
        tipodetelefoneid: 2,
        principal: true,
        whatsapp: true
    };

    console.log("telefoneBody", telefoneBody);



    if (telefoneId) {

        try {
            const {
                data: telefone
            } = await apiCRM.put(`/telefone/${telefoneId}`, telefoneBody);
            console.log("telefone", telefone);
        } catch (error) {
            console.log("error telefone", error);
        }

    } else if ($('#celular').val()) {

        try {
            const {
                data: telefone
            } = await apiCRM.post(`/telefone/${pessoaId}`, telefoneBody);
            console.log("telefone", telefone);
        } catch (error) {
            console.log("error telefone", error);
        }

    }

    const emailBody = {
        pessoaid: pessoaId,
        email: $('#email').val(),
        tipodeemailid: 2,
        principal: true
    };

    console.log("emailBody", emailBody);

    if (emailId) {

        try {
            const {
                data: email
            } = await apiCRM.put(`/email/${emailId}`, emailBody);
            console.log("email", email);

        } catch (error) {
            console.log("error email", error);
        }

    } else if ($('#email').val()) {

        try {
            const {
                data: email
            } = await apiCRM.post(`/email/${pessoaId}`, emailBody);
            console.log("email", email);

        } catch (error) {
            console.log("error email", error);
        }

    }


    const contaBody = {
        bancoid: $('#banco').val(),
        agencia: $('#agencia').val(),
        conta: $('#conta').val(),
        pix: $('#pix').val(),
        pessoaid: pessoaId,
        principal: true
    }

    if (contaId) {
        const {
            data: contas
        } = await apiCRM.put(`/contabancaria/${contaId}`, contaBody);
        console.log("contas", contas);
    } else if ($('#agencia').val()) {
        const {
            data: contas
        } = await apiCRM.post(`/contabancaria/${pessoaId}`, contaBody);
        console.log("contas", contas);
    }

    const contatoBody = {
        id: pessoaId,
        consultorid: consultorId
    }

    console.log("contatoBody", contatoBody);

    try {
        const {
            data: contato
        } = await apiCRM.put(`/contato/${pessoaId}`, contatoBody);
        console.log("contato", contato);
    } catch (error) {
        console.log("error contato", error);
    }

    const oportunidadeBody = {
        etapadofunilid: status === 0 ? 3 : status === 2 ? 6 : status === 3 ? 7 : 8,
        produtoid: $('#produto').val(),
        contatoid: pessoaId,
        consultorid: consultorId,
        valor: $('#valor-solicitado').val().replace('.', '').replace(',', '.'),
        parcela: $('#parcela').val().replace('.', '').replace(',', '.'),
        prazo: $('#prazo').val(),
        statusdaoportunidadeid: status === 0 ? oportunidades.statusdaoportunidadeid : status === 2 ? 1 :
            status === 3 ? 4 : 5,
        observacao: $("#observacao").val(),
        anuncioid: oportunidades.anuncioid
    };

    console.log("oportunidadeBody", oportunidadeBody);

    try {
        const {
            data: oportunidade
        } = await apiCRM.put(`/oportunidade/${oportunidadeId}`, oportunidadeBody);
        console.log("oportunidade", oportunidade);
        location.href = `fuv-oportunidades.php`;

    } catch (error) {
        console.log("error oportunidade", error);
    }



    // params: { pessoaid },
    // }

}

function cancelarCadastro() {
    location.href = `fuv-oportunidades.php`;
}


/**
 * Popular selects
 */

$(async function() {


    /**Bancos */
    const {
        data: bancos
    } = await apiCRM.get(`/banco`);

    bancos?.map(b => {
        var data = {
            id: b.id,
            text: b.banco
        };
        var newOption = new Option(data.text, data.id, false, false);
        $('#banco').append(newOption).trigger('change');
    });

    /**Prestador */
    const {
        data: prestadores
    } = await apiCRM.get(`/prestador`);

    console.log(prestadores);
    $('#parceiro').empty();
    prestadores?.map(p => {

        var data = {
            id: p.id,
            text: p.nomefantasia
        };
        var newOption = new Option(data.text, data.id, false, false);
        $('#parceiro').append(newOption).trigger('change');

    });

    /**Produto */
    $('#produto').empty();
    const {
        data: produtos
    } = await apiCRM.get(`/produto/prestador/${$('#parceiro').val()}`);
    console.log(produtos);

    produtos?.map(p => {

        var data = {
            id: p.id,
            text: p.produto
        };
        var newOption = new Option(data.text, data.id, false, false);
        $('#produto').append(newOption).trigger('change');

    });

});

/**
 * FIM Popular selects
 */

$('#parceiro').on('select2:select', async function(e) {
    $('#produto').empty();
    const {
        data: produtos
    } = await apiCRM.get(`/produto/prestador/${e.params.data.id}`);

    produtos?.map(p => {

        var data = {
            id: p.id,
            text: p.produto
        };
        var newOption = new Option(data.text, data.id, false, false);
        $('#produto').append(newOption).trigger('change');

    });

});

async function loadOportunidade() {
    const {
        data: [oportunidade]
    } = await apiCRM.get(`/oportunidade/${oportunidadeId}`);
    // console.log("oportunidade", oportunidade);

    oportunidades = oportunidade;
    console.log("oportunidade", oportunidade);

    $('#parceiro').val(oportunidade?.prestadorid).select2();
    $('#produto').val(oportunidade?.produtoid).select2();


    const {
        data: [contato]
    } = await apiCRM.get(`/contato/${oportunidade.contatoid}`);

    console.log("contato", contato);

    const {
        data: documentos
    } = await apiCRM.get(`/documento/${contato.id}`);

    console.log("documentos", documentos);

    const imgCpf = documentos.find(d => d.tipodedocumentoid === 1);
    const imgRg = documentos.find(d => d.tipodedocumentoid === 2);
    const imgCadsus = documentos.find(d => d.tipodedocumentoid === 4);
    const imgSelfie = documentos.find(d => d.tipodedocumentoid === 5);

    if (imgCpf) {
        $('#servidor-cpf').show();
        $('#captura-cpf').hide();
        $("#img-cpf").attr('src', imgCpf.urldodocumento);
        $("#img-cpf").attr('data-id', imgCpf.id);

    } else {
        $('#servidor-cpf').hide();
        $('#captura-cpf').show();
    }


    if (imgRg) {
        $('#servidor-rg').show();
        $('#captura-rg').hide();
        $("#img-rg").attr('src', imgRg.urldodocumento);
        $("#img-rg").attr('data-id', imgRg.id);
    } else {
        $('#servidor-rg').hide();
        $('#captura-rg').show();
    }

    if (imgCadsus) {
        $('#servidor-cadsus').show();
        $('#captura-cadsus').hide();
        $("#img-cadsus").attr('src', imgCadsus.urldodocumento);
        $("#img-cadsus").attr('data-id', imgCadsus.id);
    } else {
        $('#servidor-cadsus').hide();
        $('#captura-cadsus').show();
    }

    if (imgSelfie) {
        $('#servidor-selfie').show();
        $('#captura-selfie').hide();
        $("#img-selfie").attr('src', imgSelfie.urldodocumento);
        $("#img-selfie").attr('data-id', imgSelfie.id);
    } else {
        $('#servidor-selfie').hide();
        $('#captura-selfie').show();
    }

    $('#pessoaid-cpf-edit').val(contato.id);
    $('#pessoaid-rg-edit').val(contato.id);
    $('#pessoaid-cadsus-edit').val(contato.id);
    $('#pessoaid-selfie-edit').val(contato.id);


    $("#nome").val(contato?.nome);
    $("#celular").val(contato.telefones.filter(t => t.whatsapp).map(m => m.numero));
    $("#email").val(contato.emails.filter(e => e.email_principal).map(m => m
        .email));

    $('#cpf').val(contato?.cpf);
    $('#rg').val(contato?.rg);
    $('#orgaoemissor').val(contato?.orgaoemissor);
    $('#genero').val(contato?.generoid).select2(); //com problemas - RESOLVER
    $('#nascimento').val(contato?.nascimento != null ? moment(contato?.nascimento).format('D/MM/Y') : null);
    $('#nomedamae').val(contato?.mae);
    $('#matricula').val(contato?.cadunico);
    $('#renda').val(contato?.rendafamiliar);

    $('#valor-solicitado').val(oportunidade?.valor);
    $('#parcela').val(oportunidade?.parcela);
    $('#prazo').val(oportunidade?.prazo).select2();

    const endereco = contato.enderecos.find(e => e.endereco_principal);
    // console.log(endereco);
    $("#cep").val(endereco?.cep);
    $('#uf').val(endereco?.estado);
    $('#cidade').val(endereco?.cidade);
    $('#bairro').val(endereco?.bairro);
    $('#endereco').val(endereco?.endereco);
    $('#numero').val(endereco?.numero);
    $('#complemento').val(endereco?.complemento);

    const contas = contato.contasbancarias.find(c => c.conta_principal);
    $('#banco').val(contas?.bancoid).select2();
    $('#agencia').val(contas?.agencia);
    $('#conta').val(contas?.conta);
    $('#pix').val(contas?.pix);

    console.log('contas', contas);

    pessoaId = contato?.id;
    enderecoId = endereco?.id;
    telefoneId = contato.telefones.filter(t => t.whatsapp).map(m => m.id)[0];
    emailId = contato.emails.filter(e => e.email_principal).map(m => m.id)[0];
    contaId = contas?.id;

    console.log("telefone", telefoneId);
    // console.log('produto', oportunidade.produtoid);

}

var oportunidadeId = getParameter('id');

var pessoaId;
var enderecoId;
var telefoneId;
var emailId;
var contaId;

$('#valor-solicitado').val('2.100,00');
$('#parcela').val('160,00');

if (oportunidadeId) {
    /**habilita DIV de imagens */
    $('#div-documentos').show();

    /**FIM habilita DIV de imagens */
    loadOportunidade();
} else {
    $('#div-documentos').hide();
}


$(document).on('click', '.remove_image', function() {
    const tpdocumento = $(this).parent().parent();

    const dvcaptura = tpdocumento.find('.captura:eq(0)');
    const dvimagem = tpdocumento.find('.imagem:eq(0)');

    const imagem = dvimagem.find('.img-thumbnail:eq(0)');
    const src = imagem.attr('src');
    const id = imagem.attr('data-id');

    // console.log(src, id);
    // console.log(dvcaptura);


    $.ajax({
        url: "remover-documento.php",
        method: "POST",
        data: {
            source: src,
            documentoid: id
        },
        success: function(data) {
            console.log(data);
            dvimagem.hide();
            dvcaptura.show();
        }
    })
});

function loadDocumento(doc) {

    console.log(doc);

    switch (parseInt(doc.tipodedocumentoid)) {
        case 1:
            $('#servidor-cpf').show();
            $('#captura-cpf').hide();
            $("#img-cpf").attr('src', doc.urldodocumento);
            $("#img-cpf").attr('data-id', doc.id);
            $('#pessoaid-cpf-edit').val(doc.pessoaid);
            break;

        case 2:
            $('#servidor-rg').show();
            $('#captura-rg').hide();
            $("#img-rg").attr('src', doc.urldodocumento);
            $("#img-rg").attr('data-id', doc.id);
            $('#pessoaid-rg-edit').val(doc.pessoaid);

            break;
        case 4:
            $('#servidor-cadsus').show();
            $('#captura-cadsus').hide();
            $("#img-cadsus").attr('src', doc.urldodocumento);
            $("#img-cadsus").attr('data-id', doc.id);
            $('#pessoaid-cadsus-edit').val(doc.pessoaid);



            break;
        case 5:
            $('#servidor-selfie').show();
            $('#captura-selfie').hide();
            $("#img-selfie").attr('src', doc.urldodocumento);
            $("#img-selfie").attr('data-id', doc.id);
            $('#pessoaid-selfie-edit').val(doc.pessoaid);
            break;
    }

}
</script>