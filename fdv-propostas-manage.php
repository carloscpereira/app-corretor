<?php error_reporting(0); ?>


<?php
    if ( $_COOKIE['logado'] === NULL){            
        header("Location: login.php");
    }    
?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/select2/css/select2.min.css'); ?>
<?php $dm->get_css('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Contrato</h1>
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

  <input type="hidden" id="idcontato">
  <input type="hidden" id="idvendedor">
  <div class="block">
    <div class="block-header block-header-default">
      <a class="btn btn-light" href="javascript:void(0);" onclick="cancelarCadastro();">
        <i class="fa fa-arrow-left mr-1"></i> Todas as Propostas
      </a>

      <div class="block-options">
        <button id="btnSalvarLiberado" class="btn btn-alt-info" onclick="salvarProposta();">
          <i class="fa fa-fw fa-check mr-1"></i> Salvar Proposta
        </button>

        <button id="btnSalvarBloqueado" class="btn btn-alt-danger">
          <i class="fa fa-fw fa-ban mr-1"></i>Não permitido
        </button>

        <button type="button" class="btn-block-option" data-toggle="block-option"
          data-action="fullscreen_toggle"></button>

      </div>
      <!-- <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div> -->
    </div>
    <div class="block-content">
      <!-- Block Tabs Alternative Style -->
      <div class="myblock block block-rounded">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">

          <li class="nav-item">
            <a id="tab-corretora" class="nav-link nav-link-info active" href="#btabs-alt-static-corretora">Corretora</a>
          </li>

          <li class="nav-item">
            <a id="tab-responsavel" class="nav-link nav-link-info" href="#btabs-alt-static-responsavel">Responsável</a>
          </li>

          <li class="nav-item">
            <a id="tab-endereco" class="nav-link nav-link-info" href="#btabs-alt-static-endereco">Endereço</a>
          </li>

          <li class="nav-item">
            <a id="tab-proposta" class="nav-link" href="#btabs-alt-static-proposta">Proposta</a>
          </li>

          <li class="nav-item">
            <a id="tab-mensalidade" class="nav-link" href="#btabs-alt-static-mensalidade">Mensalidade</a>
          </li>

          <li class="nav-item">
            <a id="tbeneficiarios" class="nav-link" href="#btabs-alt-static-beneficiarios">Beneficiários</a>
          </li>

          <li class="nav-item">
              <a id="trecibos" class="nav-link" href="#btabs-alt-static-recibos">Recibos</a>
          </li>

          <li class="nav-item">
            <a id="tdocumentos" class="nav-link" href="#btabs-alt-static-documentos">Documentos</a>
          </li>

        </ul>
        </ul>

        <div class="block-content tab-content">

          <!-- Sobre a Corretora -->
          <div class="tab-pane active" id="btabs-alt-static-corretora" role="tabpanel">
            <form id="form-corretora" action="javascript:void(0);" onsubmit="return false;">

              <!-- Operadora, Corretora e Vendedor -->
              <div class="row push">
                <!-- Descrição -->
                <div class="col-lg-4">
                  <p class="text-muted">
                    Informações do vendedor e corretora da proposta.
                  </p>
                </div>

                <!-- Operadora, Corretora e Vendedor -->
                <div class="col-lg-8 col-xl-5">
                  <!-- Vendedor -->
                  <div class="form-group">
                    <label for="vendedor">Vendedor</label>
                    <select class="js-select2 form-control" id="vendedor" name="vendedor" style="width: 100%;">
                      <option></option>
                      <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    </select>
                  </div>

                  <!-- Operadora -->
                  <div class="form-group">
                    <label for="operadora">Operadora</label>
                    <select class="js-select2 form-control" id="operadora" name="operadora" style="width: 100%;"
                      data-placeholder="Escolha a operadora..">
                      <option></option>
                    </select>
                  </div>

                  <!-- Corretora -->
                  <div class="form-group">
                    <label for="corretora">Corretora</label>
                    <select class="js-select2 form-control" id="corretora" name="corretora" style="width: 100%;">
                      <option></option>
                      <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    </select>
                  </div>

                </div>
              </div>

            </form>
          </div>
          <!-- FIM sobre a Corretora  -->

          <!-- sobre responsável -->
          <div class="tab-pane" id="btabs-alt-static-responsavel" role="tabpanel">
            <form id="form-responsavel" action="javascript:void(0);" onsubmit="return false;">
              <div class="row push mx-4">
                <div class="col-lg-4">
                  <p class="text-muted">
                    Informações de contato do contratante. Informe o celular para onde enviaremos a proposta a ser
                    assinada, e o email onde enviaremos o contrato, caso a proposta seja aceita.
                  </p>
                </div>
                <div class="col-lg-8 col-xl-8">
                  <div class="form-group">
                    <label for="nome">Nome do Responsável Financeiro</label>
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
                    Documentos do contratante para composição do contrato.
                  </p>
                </div>
                <div class="col-lg-8 col-xl-8">
                  <div class="row">
                    <div class="form-group col-lg-12 col-xl-4">
                      <label for="cpf-responsavel">CPF</label>
                      <input type="text" class="form-control" id="cpf-responsavel" name="cpf-responsavel">
                    </div>
                    <div class="form-group col-lg-12 col-xl-4">
                      <label for="rg">RG</label>
                      <input type="text" class="form-control" id="rg" name="rg">
                    </div>
                    <div class="form-group col-lg-12 col-xl-4">
                      <label for="oemissor">Orgao</label>
                      <input type="text" class="form-control text-uppercase" id="oemissor" name="oemissor">
                    </div>
                  </div>

                  <div id="showContratos" class="row">
                    <div class="form-group col-lg-12 col-xl-4">
                      <label for="contrato-responsavel">Contratos</label>
                      <select class="js-select2 form-control" id="contrato-responsavel" name="contrato-responsavel"
                        style="width: 100%;">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                      </select>

                    </div>
                    <div class="form-group col-lg-12 col-xl-8 mt-3">
                      <h6 class="card-subtitle">
                        <code>Esse contrato não pode receber a primeira parcela. Pagamento previsto para 01/05/2021. 
                                                <br>A migração/adição acontecerá a partir desta data.
                                            </code>
                      </h6>
                    </div>
                  </div>

                  <div id="mensErroCpf" class="row">

                    <div class="form-group col-lg-12 col-xl-12 mt-3">
                      <h6 class="card-subtitle">
                        <code>Existem valores em aberto junto à Operadora para este CPF, não sendo possível
                                                  fazer novos contratos. Para liberação, entre em contato com o financeiro para 
                                                  quitação do débito, e renovação contratual.
                                            </code>
                      </h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-12 col-xl-4">
                      <label for="genero-responsavel">Gênero</label>
                      <select class="js-select2 form-control" id="genero-responsavel" name="genero-responsavel"
                        style="width: 100%;">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <option value="1">MASCULINO</option>
                        <option value="2">FEMININO</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-12 col-xl-4">
                      <label for="nascimento-responsavel">Nascimento</label>
                      <input type="text" class="js-masked-date js-datepicker form-control" id="nascimento-responsavel"
                        name="nascimento-responsavel" data-autoclose="true" data-today-highlight="false"
                        data-date-format="dd/mm/yyyy">
                    </div>
                    <div class="form-group col-lg-12 col-xl-4">
                      <label for="cns">CNS</label>
                      <input type="text" class="form-control" id="cns" name="cns">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="mae-responsavel">Nome da mãe</label>
                    <input type="text" class="form-control text-uppercase" id="mae-responsavel" name="mae-responsavel">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- fim sobre responsável -->

          <!-- sobre endereço -->
          <div class="tab-pane" id="btabs-alt-static-endereco" role="tabpanel">
            <form id="form-endereco" action="javascript:void(0);" onsubmit="return false;">
              <div class="row push mx-4">
                <div class="col-lg-4">
                  <p class="text-muted">
                    Endereço do responsável financeiro, para envio de postagens e composição do contrato.
                  </p>
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
                      <input type="text" class="form-control text-uppercase" id="cidade" name="cidade">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control text-uppercase" id="bairro" name="bairro">
                  </div>
                  <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control text-uppercase" id="endereco" name="endereco">
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-xl-8">
                      <label for="complemento">Complemento</label>
                      <input type="text" class="form-control text-uppercase" id="complemento" name="complemento">
                    </div>
                    <div class="form-group col-lg-12 col-xl-4">
                      <label for="numero">Número</label>
                      <input type="text" class="form-control text-uppercase" id="numero" name="numero">
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>
          <!-- fim sobre endereço -->

          <!-- Sobre a proposta -->
          <div class="tab-pane" id="btabs-alt-static-proposta" role="tabpanel">
            <form id="form-proposta" action="javascript:void(0);" onsubmit="return false;">

              <!-- Proposta -->
              <div class="row push">

                <!-- Descrição -->
                <div class="col-lg-4">
                  <p class="text-muted">
                    Documentos do contratante para composição do contrato.
                  </p>
                </div>

                <!-- Dados da Proposta -->
                <div class="col-lg-8 col-xl-5">

                  <!-- Tipo de Contrato -->
                  <div class="form-group">
                    <label for="tpcontrato">Tipo de Contrato</label>
                    <select class="js-select2 form-control" id="tpcontrato" name="tpcontrato" style="width: 100%;"
                      data-placeholder="Escolha tipo de contrato..">
                      <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    </select>
                  </div>

                  <!-- Tipo de Convenio -->
                  <div class="form-group">
                    <label for="tpconvenio">Tipo de Convênio</label>
                    <select class="js-select2 form-control" id="tpconvenio" name="tpconvenio" style="width: 100%;"
                      data-placeholder="Escolha tipo de convênio..">
                      <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    </select>
                  </div>

                  <!-- Convenio -->
                  <div class="form-group">
                    <input type="hidden" id="empresadigitada" value="">
                    <label for="convenio">Convênio</label>
                    <select class="js-select2 form-control" id="convenio" name="convenio" style="width: 100%;"
                      data-placeholder="Escolha o convênio..">
                      <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    </select>
                  </div>

                </div>

              </div>

            </form>
          </div>
          <!-- FIM sobre a proposta  -->

          <!-- sobre mensalidade -->
          <div class="tab-pane" id="btabs-alt-static-mensalidade" role="tabpanel">
            <form id="form-mensalidade" action="javascript:void(0);" onsubmit="return false;">

              <!-- Proposta -->
              <div class="row push">

                <!-- Descrição -->
                <div class="col-lg-4">
                  <p class="text-muted">
                    Documentos do contratante para composição do contrato.
                  </p>
                </div>

                <!-- Dados da Proposta -->
                <div class="col-lg-8 col-xl-5">

                  <!-- Modalidade e Vencimento -->
                  <div class="row">
                    <!-- Modalidade -->
                    <div class="form-group col-md-8">
                      <label for="fpagamento">Forma de Pagamento</label>
                      <select class="js-select2 form-control" id="fpagamento" name="fpagamento" style="width: 100%;">
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                      </select>
                    </div>

                    <!-- Vencimento -->
                    <div class="form-group col-md-4">
                      <label for="vencimento">Vencimento</label>
                      <input type="text" class="form-control" id="vencimento" name="vencimento">
                    </div>
                  </div>

                  <!-- Primeira parcela  -->
                  <div class="row">
                    <!-- Modalidade -->
                    <div class="form-group col-md-12">
                      <label for="pparcela">Primeira parcela</label>
                      <select class="js-select2 form-control" id="pparcela" name="pparcela" style="width: 100%;">
                        <option></option>
                        <option value="O">Pagar na assinatura da proposta (cartão/boleto)</option>
                        <option value="V">Pagar ao vendedor (emissão de recibo)</option>
                        <option value="A">Pagar no próximo vencimento (a pagar)</option>
                      </select>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Dados de Consignação -->
              <div class=" row push" id="rconsignado" style="display:none;">

                <div class="col-lg-4">
                  <p class="text-muted">
                    Confira os dados para consignação
                  </p>
                </div>

                <div class="col-lg-8 col-xl-5">

                  <!-- Número da matrícula -->
                  <div class="form-group">
                    <label for="matricula">Número da Matrícula</label>
                    <input class="form-control" id="matricula" name="matricula" style="width: 100%;"
                      data-placeholder="Digite o número da matrícula.." value="">
                  </div>

                </div>
              </div>

              <!-- Dados de conta bancária -->
              <div class="row push" id="rdebito" style="display:none;">
                <div class="col-lg-4">
                  <p class="text-muted">
                    Confira os dados da conta bancária
                  </p>
                </div>

                <!-- Tipo de Conta, Agencia, Banco e Dados da conta -->
                <div class="col-lg-8 col-xl-5">
                  <!-- Tipo de Conta -->
                  <div class="form-group">
                    <label for="tipoconta">Tipo da Conta</label>
                    <select class="js-select2 form-control" id="tipoconta" name="tipoconta" style="width: 100%;"
                      value="">
                      <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                      <option value="1">CONTA CORRENTE</option>
                      <option value="3">CONTA POUPANÇA</option>
                    </select>
                  </div>

                  <!-- Agencia e Banco -->
                  <div class="row">
                    <!-- banco -->
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="banco">Banco</label>
                        <select class="js-select2 form-control" id="banco" name="banco" style="width: 100%;" value="">
                          <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        </select>
                      </div>
                    </div>

                    <!-- agencia -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="agencia">Agência</label>
                        <select class="js-select2 form-control" id="agencia" name="agencia" style="width: 100%;"
                          value="">
                          <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- Operação, numero da conta e dígito -->
                  <div class="row">
                    <!-- Operacao -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="operacao">Operação</label>
                        <input class="form-control" id="operacao" name="operacao" style="width: 100%;" value="">
                      </div>
                    </div>

                    <!-- Número da Conta -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="numeroconta">Número da Conta</label>
                        <input class="form-control" id="numeroconta" name="numeroconta" style="width: 100%;">
                      </div>
                    </div>

                    <!-- Dígito -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="digito">Díg.</label>
                        <input class="form-control" id="digito" name="digito" style="width: 100%;" value="">
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </form>
          </div>
          <!-- FIM sobre mensalidade -->

          <!-- sobre beneficiarios -->
          <div class="tab-pane" id="btabs-alt-static-beneficiarios" role="tabpanel">
            <div id="lista-benficiarios">
              <div class="form-text text-muted font-size-sm font-italic ml-3 mb-3">Lance aqui todos os beneficiários,
                podendo ter vários produtos, e para cada produto, vários beneficiários.</div>
              <div id="dv-beneficiarios" class="row text-center">
                <div class="col-12 col-md-6 col-xl-3">
                  <!-- New Post -->
                  <a class="block block-rounded block-bordered  block-link-shadow text-center"
                    href="javascript:void(0);" onclick="newBeneficiario();">
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

              </div>
            </div>
          </div>
          <!-- fim sobre beneficiarios  -->

          <!-- sobre recibos -->
          <div class="tab-pane" id="btabs-alt-static-recibos" role="tabpanel">
            <div class="form-text text-muted font-size-sm font-italic ml-3 mb-3">Emita recibos do pagamento da primeira
              parcela quando for paga a você. O recibo emitido será enviado por e-mail ao seu cliente, com cópia no seu
              email.</div>

            <div  id = "dv-recibos" class="row text-center">
              <div class="col-12 col-md-6 col-xl-3">
                <a class="block block-rounded block-bordered  block-link-shadow text-center" href="javascript:void(0)" onclick="newRecibo();">                  
                  <div class="block-content block-content-full">
                    <div class="py-md-2">
                      <div class="py-2 d-none d-md-block">
                        <i class="fa fa-2x fa-plus text-success-light"></i>
                      </div>
                      <p class="font-size-h3 font-w700 mb-0">
                        <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Emitir
                      </p>
                      <p class="text-muted mb-0">
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
            <div class="form-text text-muted font-size-sm font-italic ml-3 mb-3">Anexe os documentos referentes às
              informações lançadas nesta proposta (rg, cpf, comp. residência, comp de pagamento...).</div>

            <div id="dv-documentos" class="row text-center">
              <div class="col-12 col-md-6 col-xl-3">
                <!-- New Post -->
                <a class="block block-rounded block-bordered  block-link-shadow text-center" href="javascript:void(0)"
                  onclick="newDocumento();">
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

<!-- Modal RECIBO -->
<div class="modal fade" id="modalRecibo" tabindex="-1" role="dialog" aria-labelledby="modalRecibo" aria-hidden="true">
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

        <form id="form-recibo" method="post">
          <div class="block-content">
            <!-- Block Tabs Default Style -->
            <div class="row">
              <!--cpf-->
              <div class="col-lg-9 form-group">
                  <div class="form-group">
                    <label for="nome-recibo">Recibo para</label>
                    <input type="text" class="form-control text-uppercase" id="nome-recibo" name="nome-recibo" disabled>
                  </div>
              </div>
              <!--fim cpf-->

              <!--rg-->
              <div class="col-lg-3 form-group">
                <label for="valor-recibo">Valor</label>
                <input class="form-control" id="valor-recibo" name="valor-recibo" style="width: 100%;"
                  onKeyPress="return(moeda(this,'.',',',event))">
              </div>
              <!--fim rg-->
            </div>

            <div class="row">
              <div class="col-lg-12 form-group">
                <label for="descricao-recibo">Decrição do Recibo</label>
                <textarea class="form-control" id="descricao-recibo" name="descricao-recibo"
                  rows="4">Recibo de pagamento da primeira parcela referente ao plano adquirido.</textarea>
              </div>
            </div>
            <!-- END Block Tabs Default Style -->
          </div>

          <div class="block-content block-content-full text-right bg-light">
            <button type="button" id="emitir-recibo" class="btn btn-sm btn-primary" onclick="addRecibo();">Emitir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Modal RECIBO-->

<!-- Modal Documentos -->
<div class="modal fade" id="modaldocumentos" tabindex="-1" role="dialog" aria-labelledby="modaldocumentos"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">DOCUMENTO</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>

        <!-- <form id="form-documentos" method="post"> -->
        <div class="block-content">
          <!-- Block Tabs Default Style -->
          <div class="row">
            <!--rg-->
            <div class="col-lg-6 form-group">
              <label for="tipodocumento" class="d-block">Tipo de Documento</label>
              <select name="" class="js-select2 form-control" id="tipodocumentos" style="width: 100%"></select>
            </div>
            <div class="col-lg-6 form-group">
              <label for="tipodocumento" class="d-block">Tipo de Documento</label>
              <select name="" class="js-select2 form-control" id="tipodocumentos" style="width: 100%"></select>
            </div>
            <!--fim rg-->
          </div>

          <div class="row">
            <div class="col-lg-12 form-group">
              <input type="file" id="documento" accept="image/png, image/jpeg">
            </div>
          </div>
          <!-- END Block Tabs Default Style -->
        </div>

        <div class="block-content block-content-full text-right bg-light">
          <button type="button" id="btnSalvarDocumento"
            class="btn btn-sm btn-primary waves-effect waves-light">Salvar</button>
          <button type="button" id="btnRemoveDocumento" class="btn btn-sm btn-danger waves-effect waves-light"
            style="display: none">Remover</button>
        </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>
<!-- END Modal Documentos-->

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
          <form id="form-beneficiarios" class="p-0 m-0" method="post" onsubmit="return false;">
            <div class="tab-content">
              <div class="block-content">
                <!-- Block Tabs Default Style -->
                <div class="row">
                  <!--cpf-->
                  <div class="col-lg-8 form-group">
                    <small class="form-control-feedback font-italic font-bold">Nome <span
                        class="text-danger">*</span></small>
                    <input class="form-control text-uppercase" id="nome-beneficiario" name="nome-beneficiario"
                      style="width: 100%;" value="">

                    <div class="custom-control custom-switch custom-control-success mb-3" id="boxSwitchCCRf">
                      <input type="checkbox" class="custom-control-input" id="switchCCRf" name="switchCCRf">
                      <label id="lblswitchCCRf" class="custom-control-label text-primary" for="switchCCRf">Copiar dados
                        do responsável financeiro</label>
                    </div>
                  </div>
                  <!--fim cpf-->

                  <!--rg-->
                  <div class="col-lg-4 form-group">
                    <small class="form-control-feedback font-italic font-bold">Vínculo <span
                        class="text-danger">*</span></small>
                    <select class="js-select2 form-control" id="vinculo-beneficiario" name="vinculo-beneficiario"
                      style="width: 100%;">
                      <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    </select>
                  </div>
                  <!--fim rg-->
                </div>

                <div class="row">
                  <div class="col-lg-4 form-group">
                    <small class="form-control-feedback font-italic font-bold">Gênero <span
                        class="text-danger">*</span></small>
                    <select class="js-select2 form-control" id="genero-beneficiario" name="genero-beneficiario"
                      style="width: 100%;">
                      <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                      <option value="1">MASCULINO</option>
                      <option value="2">FEMININO</option>
                    </select>
                  </div>

                  <div class="col-lg-4 form-group">
                    <small class="form-control-feedback font-italic font-bold">Nascimento <span
                        class="text-danger">*</span></small>
                    <input type="text" class="js-masked-date js-datepicker form-control" id="nascimento-beneficiario"
                      name="nascimento-beneficiario" data-week-start="1" data-autoclose="true"
                      data-today-highlight="true" data-date-format="dd/mm/yyyy">
                  </div>

                  <div class="col-lg-4 form-group">
                    <small class="form-control-feedback font-italic font-bold">CPF <span
                        class="text-danger">*</span></small>
                    <input class="form-control" id="cpf-beneficiario" name="cpf-beneficiario" style="width: 100%;"
                      value="">
                  </div>

                </div>

                <div class="row">
                  <div class="col-lg-3 form-group">
                    <small class="form-control-feedback font-italic font-bold">RG <span
                        class="text-danger">*</span></small>
                    <input class="form-control" id="rg-beneficiario" name="rg-beneficiario" style="width: 100%;"
                      value="">
                  </div>

                  <div class="col-lg-2 form-group">
                    <small class="form-control-feedback font-italic font-bold">Órgão <span
                        class="text-danger">*</span></small>
                    <input class="form-control text-uppercase" id="orgao-beneficiario" name="orgao-beneficiario"
                      style="width: 100%;" value="">
                  </div>

                  <div class="col-lg-7 form-group">
                    <small class="form-control-feedback font-italic font-bold">Nome da mãe <span
                        class="text-danger">*</span></small>
                    <input class="form-control text-uppercase" id="mae-beneficiario" name="mae-beneficiario"
                      style="width: 100%;" value="">
                  </div>


                </div>

                <h2 class="content-heading pt-0"></h2>

                <div class="row">
                  <!--cpf-->
                  <div class="col-lg-8 form-group">
                    <small class="form-control-feedback font-italic font-bold">Produto <span
                        class="text-danger">*</span></small>
                    <select class="js-select2 form-control" id="produto-beneficiario" name="produto-beneficiario"
                      style="width: 100%;">
                      <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    </select>
                  </div>
                  <!--fim cpf-->

                  <!--rg-->
                  <div class="col-lg-4 form-group">
                    <small class="form-control-feedback font-italic font-bold">Valor <span
                        class="text-danger">*</span></small>
                    <input class="form-control" id="valor-beneficiario" name="valor-beneficiario" style="width: 100%;"
                      value="" disabled>
                  </div>
                  <!--fim rg-->
                </div>
                <!-- END Block Tabs Default Style -->
              </div>
            </div>
            <div class="block-content block-content-full text-right bg-light">
              <button id="btnSalvarBenef" class="btn btn-sm btn-primary waves-effect waves-light"
                onclick="addBeneficiario();">Salvar</button>
              <button id="btnRemoveBenef" class="btn btn-sm btn-danger waves-effect waves-light" style="display: none"
                onclick="">Remover</button>
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
<?php $dm->get_js('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>
<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>

<?php $dm->get_js('js/pages/add-validation.js'); ?>
<?php $dm->get_js('js/funcoes/funcoes-gerais.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/pt-br.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>

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


function moeda(a, e, r, t) {
        let n = ""
        , h = j = 0
        , u = tamanho2 = 0
        , l = ajd2 = ""
        , o = window.Event ? t.which : t.keyCode;
        if (13 == o || 8 == o)
            return !0;
        if (n = String.fromCharCode(o),
            -1 == "0123456789".indexOf(n))
            return !1;
        for (u = a.value.length,
             h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
            ;
        for (l = ""; h < u; h++)
            -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
        if (l += n,
            0 == (u = l.length) && (a.value = ""),
            1 == u && (a.value = "0" + r + "0" + l),
            2 == u && (a.value = "0" + r + l),
            u > 2) {
            for (ajd2 = "",
                 j = 0,
                 h = u - 3; h >= 0; h--)
                3 == j && (ajd2 += e,
                           j = 0),
                    ajd2 += l.charAt(h),
                    j++;
            for (a.value = "",
                 tamanho2 = ajd2.length,
                 h = tamanho2 - 1; h >= 0; h--)
                a.value += ajd2.charAt(h);
            a.value += r + l.substr(u - 2, u)
        }
        return !1
  }    

const apiGiga = axios.create({
  baseURL: 'https://www.idental.com.br/api/giga/',
  timeout: 10000,
  headers: {
    'AppAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
  }
});

const apiVendas = axios.create({
  baseURL: 'https://www.idental.com.br/api/corretor/',
  timeout: 10000
});


const idProposta = getParameter('id');
const vendedor = $.cookie('idvendedor');


$("#mensErroCpf").hide();
$("#showContratos").hide();

$("#btnSalvarBloqueado").hide();
$("#btnSalvarLiberado").show();

// const buttonSaveAll = document.querySelector('#main-container > div.content.content-full.content-boxed > div > div.block-header.block-header-default > div > button.btn.btn-alt-info');

// buttonSaveAll.disabled = true;    

function previewFile() {
  var preview = document.querySelector('img');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  reader.onloadend = function() {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

var state = new Proxy({
  beneficiarios: [],
  documentos: [],
  recibos:[],
  produtos: [],
  proposta: new Proxy({
    digital: false,
    vendedor: '',
    operadora: 0,
    corretora: '',
    tipoContrato: '',
    tipoConvenio: '',
    convenio: '',
    formaPagamento: '',
    diaVencimento: '',
    primeiraParcela: '',
    parcelas:'',
    dataSolicitacao:''
  }, {
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
    banco: '',
    agencia: '',
    tipodeconta: '',
    endereco: '',
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
}, {
  set: function(obj, prop, value) {

    if (prop === 'produtos' && Array.isArray(value)) {
      return Reflect.set(...arguments);
    }

    if (prop==='recibos' && Array.isArray(value)){
      const divRecibos = document.getElementById('dv-recibos');
      
      divRecibos.innerHTML = `
              <div class="col-12 col-md-6 col-xl-3">
                <a class="block block-rounded block-bordered  block-link-shadow text-center" href="javascript:void(0) "onclick="newRecibo();">
                  <div class="block-content block-content-full">
                    <div class="py-md-2">
                      <div class="py-2 d-none d-md-block">
                        <i class="fa fa-2x fa-plus text-success-light"></i>
                      </div>
                      <p class="font-size-h3 font-w700 mb-0">
                        <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> Criar
                      </p>
                      <p class="text-muted mb-0">
                      </p>
                    </div>
                  </div>
                </a>
                <!-- END New Post -->
              </div>
        `;

        const render = value.map((r,index)=>{
          if (r.deleted) return '';
            return (`
                <div class="cl-recibos col-12 col-md-6 col-xl-3">
                    <a class="block block-link-shadow text-center" href="javascript:void(0)" onclick="editRecibo(${index});">
                      <div class="block-content block-content-full">
                        <div class="d-none d-md-block">
                          <i class="fa fa-2x fa-money-bill-alt text-info"></i>
                        </div>
                        <p class="font-w600">R$ ${r.valor}
                          <br><span class="font-size-sm text-muted">emitido em: ${moment(r.data, "YYYY-MM-DD").format("DD/MMM Y")}.</span>
                        </p>
                      </div>
                    </a>
                </div>
              `)

        });

        divRecibos.innerHTML +=render;
        return Reflect.set(...arguments);
    }

    if (prop === 'beneficiarios' && Array.isArray(value)) {
      // buttonSaveAll.disabled = !(value.filter(el => !el.deleted).length > 0);
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

      const render = value.map(({
        nome,
        produto,
        valor,
        deleted
      }, index) => {
        if (deleted) return '';

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

    if (prop === 'documentos' && Array.isArray(value)) {
      const divDocumentos = document.getElementById('dv-documentos');

      divDocumentos.innerHTML = `
            <div class="col-12 col-md-6 col-xl-3">
              <!-- New Post -->
              <a class="block block-rounded block-bordered  block-link-shadow text-center" href="javascript:void(0) "onclick="newDocumento();">
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
        `;

      const render = value.map(({
        id,
        tipo
      }, index) => {
        return (`
                    <div class="cl-beneficiarios col-12 col-md-6 col-xl-3">
                        <a class="block block-link-shadow text-center" href="javascript:void(0)" onclick="editDocumento(${index});">  
                            <div class="block-content d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                                    <i class="si fa-2x si-paper-clip text-info-light"></i>
                                </div>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="font-w600">Documentos</div>
                                <div class="font-size-sm text-muted">${tipo}</div>
                            </div>
                        </a>
                    </div>
                `)
      });
      divDocumentos.innerHTML += render;
      return Reflect.set(...arguments);
    }
  },

});

// var beneficiarios = [];

// Aceitar Proposta digital somente se for tipo EMPRESA
if ($("#pdigital").is(":checked")) {
  $("#lblpdigital").text("Proposta Digital");
  $("#lblpdigital").removeClass("text-danger");
  $("#lblpdigital").addClass("text-primary");
} else {
  $("#lblpdigital").text("Proposta Física");
  $("#lblpdigital").removeClass("text-primary");
  $("#lblpdigital").addClass("text-danger");
}

const switchCCRF = document.getElementById('switchCCRf');

const convertMoney = (valorBr)=> parseFloat(valorBr.replace("R$","").replace(" ", "").replace(".","").replace(",","."));

const changeFormNewBen = (value) => {
  if (value) {
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
$("#cpf-beneficiario").mask("999.999.999-99", {
  placeholder: ' ',
  autoclear: false
});
$("#cpf-responsavel").mask("999.999.999-99", {
  placeholder: ' ',
  autoclear: false
});
$("#celular").mask("(99) 9 9999-9999", {
  placeholder: ' ',
  autoclear: false
});
/* fim mascaras */
/** FIM Definicições iniciais */

/** Teste de Validações */

$.validator.addMethod("existsCPF", function(value, element) {
  const beneficiarios = state.beneficiarios || [];
  return this.optional(element) || !!beneficiarios.find(({
    cpf
  }) => cpf.replace(/\D/, '') === value.replace(/\D/, ''));
}, "* CPF já cadastrado");

jQuery('#form-corretora').validate({
  ignore: [],
  errorClass: "invalid-feedback animated fadeIn",
  errorElement: "div",
  errorPlacement: function(e, r) {
    jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
  },
  highlight: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
  },
  success: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
  },
  rules: {
    'vendedor': "required",
    'operadora': "required",
    'corretora': "required"
  },
  messages: {
    'vendedor': "Informe o vendedor.",
    'operadora': "Informe a operadora.",
    'corretora': "Informe a corretora."
  }
});

jQuery('#form-responsavel').validate({
  ignore: [],
  errorClass: "invalid-feedback animated fadeIn",
  errorElement: "div",
  errorPlacement: function(e, r) {
    jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
  },
  highlight: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
  },
  success: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
  },
  rules: {
    'nome': {
      required: !0,
      minlength: 3,
      pattern: "[a-zA-Z ]+"
    },
    'email': {
      required: {
        depends: function(element) {
          return ($("#fpagamento").select2('data')[0].text.trim() == "Boleto");
        }
      },
    },
    'celular': {
      required: !0,
      telefoneBR: true
    },
    'cpf-responsavel': {
      verificaCPF: true
    },
    'rg': {
      required: !0,
      pattern: "[a-zA-Z 0-9]+"
    },
    'oemissor': {
      required: !0,
      minlength: 3,
      pattern: "[a-zA-Z ]+"
    },
    'genero-responsavel': 'required',
    'nascimento-responsavel': 'required',
    'mae-responsavel': {
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
    'rg': 'Informe o RG.',
    'oemissor': {
      required: 'Informe o Orgão Emissor.',
      minlength: 'Deve conter no mínimo 3 letras.',
      pattern: "Apenas letras."
    },
    'genero-responsavel': 'Informe o genero.',
    'nascimento-responsavel': 'Informe o nascimento.',
    'mae-responsavel': {
      required: "Informe o nome da mão do responsavel.",
      minlength: "Nome inválido.",
      pattern: "Nome Inválido."
    }
  }
});

jQuery('#form-endereco').validate({
  ignore: [],
  errorClass: "invalid-feedback animated fadeIn",
  errorElement: "div",
  errorPlacement: function(e, r) {
    jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
  },
  highlight: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
  },
  success: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
  },
  rules: {
    'uf': {
      required: !0,
      maxlength: 2,
      pattern: "[a-zA-Z ]+"
    },
    'cidade': {
      required: !0,
      pattern: "[a-zA-Z ]+"
    },
    'bairro': {
      required: !0,
      pattern: "[a-zA-Z]+"
    },
    'endereco': {
      required: !0,
      pattern: "[a-zA-Z ]+"
    },
    'numero': {
      required: !0,
      pattern: "[a-zA-Z 0-9]+"
    }
  },
  messages: {
    'estado': {
      required: "Informe o estado.",
      maxlength: "Informe a SIGLA.",
      pattern: "Só poderá conter letras não acentuadas."
    },
    'cidade': {
      required: "Informe a cidade.",
      pattern: "Só poderá conter letras não acentuadas."
    },
    'bairro': {
      required: "Informe o bairro.",
      pattern: "Só poderá conter letras não acentuadas."
    },
    'endereco': {
      required: "Informe a endereco.",
      pattern: "Só poderá conter letras não acentuadas."
    },
    'numero': {
      required: "Informe a cidade.",
      pattern: "Informe letra não acentuadas ou números."
    },

  }
});

jQuery('#form-proposta').validate({
  ignore: [],
  errorClass: "invalid-feedback animated fadeIn",
  errorElement: "div",
  errorPlacement: function(e, r) {
    jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
  },
  highlight: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
  },
  success: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
  },
  rules: {
    'tpcontrato': 'required',
    'tpconvenio': 'required',
    'convenio': 'required'

  },
  messages: {
    'tpcontrato': 'Informe o gênero',
    'tpconvenio': 'Informe o tipo de convênio',
    'convenio': 'Informe o convênio'
  }
});

jQuery('#form-mensalidade').validate({
  ignore: [],
  errorClass: "invalid-feedback animated fadeIn",
  errorElement: "div",
  errorPlacement: function(e, r) {
    jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
  },
  highlight: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
  },
  success: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
  },
  rules: {
    'fpagamento': "required",
    'vencimento': "required",
    'pparcela': "required",
    'matricula': {
      required: {
        depends: function(element) {
          return (parseInt($("#fpagamento").select2('data')[0].id, 10) === 10);
        }
      },
    },
    'tipoconta': {
      required: {
        depends: function(element) {
          return ((parseInt($("#fpagamento").select2('data')[0].id, 10) === 10) || (parseInt($("#fpagamento")
            .select2('data')[0].id, 10) === 3));
        }
      },
    },
    'banco': {
      required: {
        depends: function(element) {
          return ((parseInt($("#fpagamento").select2('data')[0].id, 10) === 10) || (parseInt($("#fpagamento")
            .select2('data')[0].id, 10) === 3));
        }
      },
    },

    'agencia': {
      required: {
        depends: function(element) {
          return ((parseInt($("#fpagamento").select2('data')[0].id, 10) === 10) || (parseInt($("#fpagamento")
            .select2('data')[0].id, 10) === 3));
        }
      },
    },

    'numeroconta': {
      required: {
        depends: function(element) {
          return ((parseInt($("#fpagamento").select2('data')[0].id, 10) === 10) || (parseInt($("#fpagamento")
            .select2('data')[0].id, 10) === 3));
        }
      },
    },

    'digito': {
      required: {
        depends: function(element) {
          return ((parseInt($("#fpagamento").select2('data')[0].id, 10) === 10) || (parseInt($("#fpagamento")
            .select2('data')[0].id, 10) === 3));
        }
      },
    }
  },
  messages: {
    'fpagamento': "Informe a forma de pagamento.",
    'vencimento': "Informe o vencimento.",
    'pparcela': "Informe como será paga a primeira parcela.",
    'matricula': 'Informe a matrícula.',
    'tipoconta': 'Informe o tipo de conta.',
    'banco': 'Informe o banco.',
    'agencia': 'Informe a agencia.',
    'numeroconta': 'Informe o numero da conta.',
    'digito': 'Informe o dígito da conta.'
  }
});

jQuery('#form-beneficiarios').validate({
  ignore: [],
  errorClass: "invalid-feedback animated fadeIn",
  errorElement: "div",
  errorPlacement: function(e, r) {
    jQuery(r).addClass("is-invalid"), jQuery(r).parents(".form-group").append(e)
  },
  highlight: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
  },
  success: function(e) {
    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
  },
  rules: {
    'nome-beneficiario': {
      required: !0,
      minlength: 3,
      pattern: "[a-zA-Z ]+"
    },
    'vinculo-beneficiario': 'required',
    'genero-beneficiario': 'required',
    'nascimento-beneficiario': 'required',
    'cpf-beneficiario': {
      required: !0,
      verificaCPF: true,
      existsCPF: false
    },
    'rg-beneficiario': 'required',
    'orgao-beneficiario': 'required',
    'mae-beneficiario': {
      required: !0,
      minlength: 3,
      pattern: "[a-zA-Z ]+"
    },
    'produto-beneficiario': 'required',
    'valor-beneficiario': 'required'

  },
  messages: {
    'nome-beneficiario': {
      required: 'Informe o nome',
      pattern: "Só poderá conter letras não acentuadas."
    },
    'vinculo-beneficiario': 'Informe o vínculo',
    'genero-beneficiario': 'Informe o gênero',
    'nascimento-beneficiario': 'Informe o nascimento',
    'cpf-beneficiario': {
      verificaCPF: 'Informe o CPF',
      existsCPF: 'CPF já informado para outro beneficiário.'
    },
    'rg-beneficiario': 'Informe o RG',
    'orgao-beneficiario': 'Informe o Orgão Emissor',
    'mae-beneficiario': {
      required: 'Informe o nome',
      pattern: "Só poderá conter letras não acentuadas."
    },
    'produto-beneficiario': 'Informe o produto',
    'valor-beneficiario': 'informe o valor'
  }
});


/** FIM Teste de Validações */

// Verifica débito em contratos com Atemde/Idental
$("#cpf-responsavel").change(async function() {
  const debitIdental = await findDebit('idental', $("#cpf-responsavel").val().replace(/[^\d]+/g, ''));

  if (debitIdental.length === 0) {
    $("#mensErroCpf").fadeOut();
    $("#btnSalvarLiberado").show();
    $("#btnSalvarBloqueado").hide();
  } else {
    $("#mensErroCpf").fadeIn();
    $("#btnSalvarLiberado").hide();
    $("#btnSalvarBloqueado").show();
  }
})

// Seta valor com base no produto
$("#produto-beneficiario").on("select2:select", function(e) {

  const valor = parseFloat(state.produtos.find((p)=>e.params.data.id===p.id).valor).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

  $('#valor-beneficiario').val(valor);

});


function cancelarCadastro() {
  window.location.href = "fdv-propostas.php";
}


async function getBeneficiarios(proposta) {
  const {
    data: beneficiarios
  } = await axios.get('./getBeneficiarios.php', {
    params: {
      proposta
    }
  });
  // console.log(proposta);
  // console.log('getBeneficiarios: ', beneficiarios);

  return beneficiarios;
}

function editBeneficiario(index) {
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
  $("#nascimento-beneficiario").val(moment(beneficiario.nascimento, "YYYY-MM-DD").format("DD/MM/YYYY"));
  $("#cpf-beneficiario").val(beneficiario.cpf);
  $("#rg-beneficiario").val(beneficiario.rg);
  $("#orgao-beneficiario").val(beneficiario.orgao);
  $("#mae-beneficiario").val(beneficiario.mae);
  $("#produto-beneficiario").val(beneficiario.idproduto).trigger('change');
  $("#valor-beneficiario").val(beneficiario.valor);
  /** FIM Setar beneficiario no modal */
  $("#btnSalvarBenef").attr('onclick', 'saveBeneficiario(' + index + ');');
  $("#btnRemoveBenef").attr('onclick', 'removeBeneficiario(' + index + ')').show();

  openModal('modalbenef');
}

function editDocumento(index) {
  $('#btnRemoveDocumentos').show();
  changeFormNewBen(false);
  const documentos = state.documentos;
  // console.log(beneficiarios)
  const documento = documentos[index];

  /** Setar beneficiario no modal */
  $('#tipodocumentos').val(documento.id).trigger('change');
  $('#documento').val('');
  document.getElementById('documento').files[0] = documento.documento;



  /** FIM Setar beneficiario no modal */
  $("#btnSalvarDocumento").attr('onclick', 'saveDocumentos(' + index + ');');
  $("#btnRemoveDocumento").attr('onclick', 'removeDocumentos(' + index + ')').show();

  openModal('modaldocumentos');
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

function removeDocumentos(index) {
  const documentos = state.documentos;
  if (index === undefined || index === null || typeof index !== 'number' || (documentos.length - 1) < index) {
    return;
  }

  documentos.splice(index, 1);


  state.documentos = documentos;

  $('#modaldocumentos').modal('hide');
}

function newBeneficiario() {
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
  $("#btnSalvarBenef").attr('onclick', 'addBeneficiario();');
  openModal('modalbenef');

}

let tipodeDocumentos = [];

function newDocumento() {
  $('#tipodocumentos').val('').trigger('change');
  $('#documento').val('');

  $("#btnRemoveDocumento").attr('onclick', '').hide();
  $("#btnSalvarDocumento").attr('onclick', 'addDocumentos();');
  openModal('modaldocumentos');
}

function newRecibo() {

  const totalProposta = state.beneficiarios.reduce((ant, atu)=>ant + convertMoney(atu.valor),0);

  console.log("beneficiarios",state.beneficiarios);
  console.log("total da proposta",totalProposta);

  $("#nome-recibo").val($("#nome").val().toUpperCase());
  $("#valor-recibo").val(totalProposta);
  // $("#btnRemoveDocumento").attr('onclick', '').hide();
  // $("#btnSalvarDocumento").attr('onclick', 'addDocumentos();');
  openModal('modalRecibo');
}


// document.getElementById('btnSalvarDocumento').addEventListener('click', (event) => {
//   event.preventDefault();

//   $('#modaldocumentos').modal('hide');
//   const documentos = state.documentos;
//   console.log(tipodeDocumentos)
//   let newDocumento = {
//     id: $('#tipodocumentos').val(),
//     tipo: tipodeDocumentos.find(({
//       id
//     }) => id === Number.parseInt($('#tipodocumentos').val(), 10))?.tipodedocumento,
//     documento: document.getElementById('documento').files[0],
//   };

//   documentos.push(newDocumento);
//   state.documentos = documentos;

// })

function saveDocumentos(index) {
  const documentos = state.documentos;
  console.log(documentos)
  const documento = documentos[index];

  let newDocumento = {
    id: $('#tipodocumentos').val(),
    tipo: tipodeDocumentos.find(({
      id
    }) => id === Number.parseInt($('#tipodocumentos').val(), 10))?.tipodedocumento,
    documento: document.getElementById('documento').files[0],
  };

  documento = newDocumento;
  state.documentos = documentos;
  $('#modaldocumentos').modal('hide');
}

function addDocumentos() {
  $('#modaldocumentos').modal('hide');
  console.log('entrei aqui')
  const documentos = state.documentos;

  let newDocumento = {
    id: $('#tipodocumentos').val(),
    tipo: tipodeDocumentos.find(({
      id
    }) => id === Number.parseInt($('#tipodocumentos').val(), 10))?.tipodedocumento,
    documento: document.getElementById('documento').files[0],
  };

  documentos.push(newDocumento);
  state.documentos = documentos;
}

// document.getElementById('btnSalvarDocumento').addEventListener('click', (event) => {
//   event.preventDefault()
// })

function saveBeneficiario(index) {
  const beneficiarios = state.beneficiarios;

  if ($('#form-beneficiarios').valid()) {
    // $('#modalbenef').modal('hide');

    const beneficiario = beneficiarios[index];
    // const benef = "#ben-"+index;
    // const nome  = "#bnome-"+index;
    // const valor = "#bvalor-"+index; 

    beneficiario.nome = $("#nome-beneficiario").val();
    beneficiario.vinculo = $("#vinculo-beneficiario").select2('data')[0].id;
    beneficiario.genero = $("#genero-beneficiario").select2('data')[0].id;
    beneficiario.nascimento = $("#nascimento-beneficiario").val();
    beneficiario.cpf = $("#cpf-beneficiario").val();
    beneficiario.rg = $("#rg-beneficiario").val();
    beneficiario.orgao = $("#orgao-beneficiario").val();
    beneficiario.mae = $("#mae-beneficiario").val();
    beneficiario.idproduto = $("#produto-beneficiario").select2('data')[0].id;
    beneficiario.produto = $("#produto-beneficiario").select2('data')[0].text;
    beneficiario.valor = $("#valor-beneficiario").val();


    state.beneficiarios = beneficiarios;
    // console.log("beneficiario",beneficiario);

    // $(nome).text(primeiroUltimoNome(primeira_maiuscula(beneficiario.nome)));
    // $(valor).text(primeira_maiuscula(beneficiario.produto)+' (R$ '+beneficiario.valor+')');

    $('#modalbenef').modal('hide');
  }
}

function addBeneficiario() {

  if ($('#form-beneficiarios').valid()) {
    $('#modalbenef').modal('hide');
    const beneficiarios = state.beneficiarios;

    let newBeneficiario = {
      id: null,
      tpbeneficiario: null,
      nome: $("#nome-beneficiario").val(),
      vinculo: $("#vinculo-beneficiario").select2('data')[0].id,
      genero: $("#genero-beneficiario").select2('data')[0].id,
      nascimento: $("#nascimento-beneficiario").val(),
      cpf: $("#cpf-beneficiario").val(),
      rg: $("#rg-beneficiario").val(),
      orgao: $("#orgao-beneficiario").val(),
      mae: $("#mae-beneficiario").val(),
      idproduto: $("#produto-beneficiario").select2('data')[0].id,
      produto: $("#produto-beneficiario").select2('data')[0].text,
      valor: $("#valor-beneficiario").val()
    };

    beneficiarios.push(newBeneficiario);
    state.beneficiarios = beneficiarios;
  }

}

function addRecibo(){
  if ($('#form-recibo').valid()){
    $('#modalRecibo').modal('hide');
    const recibos = state.recibos;

    const newRecibo ={
      data: moment(new Date()).format("YYYY-MM-DD"),
      descricao: $("#descricao-recibo").val().toUpperCase(),
      valor: $("#valor-recibo").val()
    };

    recibos.push(newRecibo);
    state.recibos = recibos;


  }
}

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

/**Salvar Proposta */
async function salvarProposta() {

  let pendencias = [];

  if ($('#form-corretora').valid()) {
    $("#tab-corretora").removeClass("text-danger");
  } else {
    pendencias.push('corretora');
    $("#tab-corretora").addClass("text-danger");
  }

  if ($('#form-responsavel').valid()) {
    $("#tab-responsavel").removeClass("text-danger");
  } else {
    pendencias.push('responsavel');
    $("#tab-responsavel").addClass("text-danger");
  }

  if ($('#form-endereco').valid()) {
    $("#tab-endereco").removeClass("text-danger");
  } else {
    pendencias.push('endereco');
    $("#tab-endereco").addClass("text-danger");
  }

  if ($('#form-proposta').valid()) {
    $("#tab-proposta").removeClass("text-danger");
  } else {
    pendencias.push('proposta');
    $("#tab-proposta").addClass("text-danger");
  }

  if ($('#form-mensalidade').valid()) {
    $("#tab-mensalidade").removeClass("text-danger");
  } else {
    pendencias.push('mensalidade');
    $("#tab-mensalidade").addClass("text-danger");
  }

  if (pendencias.length === 0) {

    state.proposta.vendedor       = $("#vendedor").select2('data')[0].id;
    state.proposta.operadora      = $("#operadora").select2('data')[0].id;
    state.proposta.corretora      = $("#corretora").select2('data')[0].id;
    state.proposta.tipoContrato   = $("#tpcontrato").select2('data')[0].id;
    state.proposta.tipoConvenio   = $("#tpconvenio").select2('data')[0].id;
    state.proposta.convenio       = $("#convenio").select2('data')[0].id;
    state.proposta.formaPagamento = $("#fpagamento").select2('data')[0].id;
    state.proposta.diaVencimento  = $("#vencimento").val();

    state.proposta.digital          = state.proposta.tipoConvenio === 2?false:true;
    state.proposta.primeiraParcela  = $("#pparcela").select2('data')[0].id;
    state.proposta.dataSolicitacao  = new Date();

    state.responsavelFinanceiro.nome            = $("#nome").val().toUpperCase();
    state.responsavelFinanceiro.celular         = $("#celular").val().replace(/[^\d]+/g,'');
    state.responsavelFinanceiro.email           = $("#email").val().toLowerCase();
    state.responsavelFinanceiro.cpf             = $("#cpf-responsavel").val().replace(/[^\d]+/g,'');
    state.responsavelFinanceiro.rg              = $("#rg").val();
    state.responsavelFinanceiro.orgaoEmissorRg  = $("#oemissor").val().toUpperCase();
    state.responsavelFinanceiro.genero          = $("#genero-responsavel").val();
    state.responsavelFinanceiro.nascimento      = moment($("#nascimento-responsavel").val(),"DD/MM/YYYY").format("YYYY-MM-DD");
    state.responsavelFinanceiro.cns             = $("#cns").val();
    state.responsavelFinanceiro.nomeDaMae       = $("#mae-responsavel").val().toUpperCase();

    if ((parseInt(state.proposta.formaPagamento, 10) === 10) || 
        (parseInt(state.proposta.formaPagamento, 10) === 3)) {

          state.responsavelFinanceiro.banco       = $("#banco").select2('data')[0].id;
          state.responsavelFinanceiro.agencia     = $("#agencia").select2('data')[0].id;
          state.responsavelFinanceiro.tipodeconta = $("#tipoconta").select2('data')[0].id;

    }

    state.responsavelFinanceiro.cep         = $("#cep").val();
    state.responsavelFinanceiro.uf          = $("#uf").val().toUpperCase();
    state.responsavelFinanceiro.cidade      = $("#cidade").val().toUpperCase();
    state.responsavelFinanceiro.bairro      = $("#bairro").val().toUpperCase();
    state.responsavelFinanceiro.endereco    = $("#endereco").val().toUpperCase();
    state.responsavelFinanceiro.complemento = $("#complemento").val().toUpperCase();
    state.responsavelFinanceiro.numero      = $("#numero").val().toUpperCase();

      const storedProposta = await insertNewProposta();
      console.log("newProposta",storedProposta);

    // if (!idProposta) {

    //   const storedProposta = await insertNewProposta();
    //   console.log("newProposta",storedProposta);

    // } else {
      
    // }

  }

  async function insertNewProposta() {


    const bodyBeneficiarios = [];
    state.beneficiarios.forEach(b => {
      
      bodyBeneficiarios.push({
        principal: parseInt(b.vinculo,10)===14,
        vinculo: b.vinculo,
        nome: b.nome,
        nascimento: moment(b.nascimento, "DD/MM/YYY").format("YYYY-MM-DD"),
        cpf: b.cpf.replace(/[^\d]+/g,''),
        rg: b.rg,
        orgao: b.orgao,
        mae: b.mae,
        cns: b.cns,
        genero: b.genero,
        produto: b.idproduto,
        valor: b.valor || 0
      });

    });


    // console.log('bodyBeneficiarios',bodyBeneficiarios);
    // console.log(state.beneficiarios);

    const bodyProposta = {      
        tipodecontrato: state.proposta.tipoContrato,
        operadora: state.proposta.operadora,
        vendedor: state.proposta.vendedor,
        corretora: state.proposta.corretora,
        dtsolicitacaoproposta:state.proposta.dataSolicitacao,
        tipodeconvenio: state.proposta.tipoConvenio,
        convenio: state.proposta.convenio,
        proposta_digital: state.proposta.digital,
        formadepagamento: state.proposta.formaPagamento,
        vencimento: state.proposta.diaVencimento,
        origem:null,
        campanha:null,
        midia:null,
        primeiraparcela:state.proposta.primeiraParcela,
        usuario:vendedor,
        responsavel:{
            nome:state.responsavelFinanceiro.nome, 
            celular:state.responsavelFinanceiro.celular,
            telefone:state.responsavelFinanceiro.telefone,
            email:state.responsavelFinanceiro.email,
            nascimento:state.responsavelFinanceiro.nascimento,
            cpf:state.responsavelFinanceiro.cpf,
            rg:state.responsavelFinanceiro.rg,
            orgao:state.responsavelFinanceiro.orgaoEmissorRg,
            nomedamae:state.responsavelFinanceiro.nomeDaMae,
            cns:state.responsavelFinanceiro.cns,
            genero:state.responsavelFinanceiro.genero,
            cep: state.responsavelFinanceiro.cep,
            estado:state.responsavelFinanceiro.uf,
            cidade: state.responsavelFinanceiro.cidade,
            bairro: state.responsavelFinanceiro.bairro,
            endereco:state.responsavelFinanceiro.endereco,
            complemento: state.responsavelFinanceiro.complemento,
            numero: state.responsavelFinanceiro.numero
        },
        beneficiarios:bodyBeneficiarios
    };

    console.log('bodyProposta',bodyProposta);

    const newProposta = await apiVendas.post(`/propostas/vendas`, bodyProposta);

    return newProposta;

  }

  // if ($('#form-proposta').valid() || $('#form-responsavel').valid()){
  //     const beneficiarios = state.beneficiarios;

  //     const beneficiarioCapaIndex =  beneficiarios.findIndex(b => b.tpbeneficiario == 't' || b.vinculo == 14) || 0;
  //     const beneficiarioCapa = beneficiarios[beneficiarioCapaIndex];

  //     // console.log('beneficiarioCapa: ', beneficiarioCapa);


  //     const idcontato     = $("#idcontato").val();
  //     const novo          = $("#idcontato").val()?false:true;
  //     const idvendedor    = $("#corretor").val();
  //     const idfpagamento  = $("#fpagamento").val();
  //     const idtipodeplano = $("#tpconvenio").val();
  //     const idtpcontrato  = $("#tpcontrato").val();
  //     const idoperadora   = $("#operadora").val();
  //     const idconvenio    = $("#convenio").val();
  //     const pdigital      = $("#pdigital").is(":checked");
  //     const vencimento    = $("#vencimento").val();

  //     beneficiarioCapa.novo = novo;

  //     const dreqProposta = {
  //         idcontato           : idcontato,
  //         idvendedor          : idvendedor,
  //         idformadepagamento  : idfpagamento,
  //         idtpcontrato        : idtpcontrato,
  //         idtipodeplano       : idtipodeplano,
  //         idoperadora         : idoperadora,
  //         idcentrodecusto     : idconvenio,
  //         pdigital            : pdigital,
  //         vencimento          : vencimento
  //     }

  //     const capaProposta  = JSON.parse(await salvarCapaProposta(dreqProposta));
  //     // console.log('capaProposta',capaProposta);

  //     beneficiarioCapa.id = capaProposta.idcontato;
  //     // console.log('beneficiarioCapa',beneficiarioCapa);

  //     const titular = JSON.parse(await salvarTitular(beneficiarioCapa)); 
  //     // console.log('saveTitular',titular);

  //     const dreqResponsavel = {
  //         idcontato       : beneficiarioCapa.id,
  //         novo            : beneficiarioCapa.novo,
  //         nome            : $("#nome").val(),
  //         telefone        : $("#celular").val(),
  //         email           : $("#email").val(),
  //         cep             : $("#cep").val(),
  //         estado          : $("#uf").val(),
  //         cidade          : $("#cidade").val(),
  //         endereco        : $("#endereco").val(),
  //         complemento     : $("#complemento").val(),
  //         numero          : $("#numero").val(),
  //         bairro          : $("#bairro").val(),
  //         nomemae         : $("#mae-responsavel").val(),
  //         genero          : $("#genero-responsavel").val(),
  //         nascimento      : $("#nascimento-responsavel").val(),
  //         cpf             : $("#cpf-responsavel").val(),
  //         rg              : $("#rg").val(),
  //         orgao           : $("#oemissor").val()
  //     }

  //     const savedResponsavel = JSON.parse(await salvarResponsavel(dreqResponsavel))
  //     // console.log('savedResponsavel',savedResponsavel);

  //     // console.log(beneficiarios);
  //     beneficiarios.splice(beneficiarioCapaIndex, 1)
  //     const newBeneficiarios = beneficiarios.filter(({vinculo}) => parseInt(vinculo, 10) !== 14);
  //     // console.log('newBeneficiarios',newBeneficiarios);

  //     const savedBeneficiarios = [];
  //     // console.log(beneficiarios);
  //     // console.log('newBeneficiarios: ', newBeneficiarios);
  //     // return
  //     for (const ben of newBeneficiarios) {
  //         try {

  //             const dReqBeneficiario = {
  //                 id           : ben.id,
  //                 idcontato    : beneficiarioCapa.id,
  //                 nome         : ben.nome,
  //                 vinculo      : ben.vinculo,
  //                 genero       : ben.genero,
  //                 nascimento   : ben.nascimento,
  //                 cpf          : ben.cpf,
  //                 rg           : ben.rg,
  //                 orgao        : ben.orgao,
  //                 mae          : ben.mae,
  //                 idproduto    : ben.idproduto,
  //                 produto      : ben.produto,
  //                 valor        : ben.valor.replace("R$ ",""),
  //                 deleted      : ben.deleted
  //             };
  //             const savedBen = await salvarBeneficiarios(dReqBeneficiario);
  //             savedBeneficiarios.push(savedBen); 
  //         } catch (error) {
  //             console.error(error);
  //             console.error(`Não foi possível salvar o beneficiario ${ben.nome}`)
  //         }
  //     }
  //     // console.log('saveBeneficiarios',savedBeneficiarios);

  //     let dExpiraCookie = moment().add(5, 'seconds').format();
  //     document.cookie = 'notice=insert success; expires=' + dExpiraCookie + ';';
  //     window.location.href = "fdv-propostas.php";

  // }
}

async function salvarCapaProposta(dataRequest) {

  // console.log('dataRequest - CapaProposta',dataRequest);
  return new Promise((resolve, reject) => {
    $.ajax({
      type: 'GET',
      data: dataRequest,
      url: 'setProposta.php',
      success: (res) => {
        // console.log(res);
        resolve(res);
      },
      error: (err) => {
        reject(err);
      }
    });
  });

}

async function salvarTitular(benTitular) {

  const data = {
    id: benTitular.id,
    novo: benTitular.novo,
    nome: benTitular.nome,
    vinculo: benTitular.vinculo,
    genero: benTitular.genero,
    nascimento: benTitular.nascimento,
    cpf: benTitular.cpf,
    rg: benTitular.rg,
    orgao: benTitular.orgao,
    mae: benTitular.mae,
    idproduto: benTitular.idproduto,
    produto: benTitular.produto,
    valor: benTitular.valor.replace("R$ ", "")
  }

  return new Promise((resolve, reject) => {
    $.ajax({
      type: 'GET',
      data: data,
      url: 'setTitular.php',
      success: (res) => {
        resolve(res);
      },
      error: (err) => {
        reject(err);
      }
    });
  });

}

async function salvarResponsavel(dreqResponsavel) {

  return new Promise((resolve, reject) => {
    $.ajax({
      type: 'GET',
      data: dreqResponsavel,
      url: 'setResponsavel.php',
      success: (res) => {
        // console.log(res);
        resolve(res);
      },
      error: (err) => {
        reject(err);
      }
    });

  });

}

async function salvarBeneficiarios(dReqBeneficiario) {
  // console.log({...dReqBeneficiario})
  return axios.get('./setBeneficiario.php', {
    params: {
      ...dReqBeneficiario
    }
  });
}

/**FIM Salvar Proposta */

function proximos(aba) {
  proximaaba = '#' + aba;

  $(proximaaba).siblings().hide();
  $(proximaaba).fadeIn();
}

function openModal(modal) {
  x = '#' + modal;
  $(x).modal('show');
}

$("#cpf-responsavel").blur(function() {

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

$("#pdigital").change(function() {

  if ((this).checked) {
    $("#lblpdigital").text("Proposta Digital");
    $("#lblpdigital").removeClass("text-danger");
    $("#lblpdigital").addClass("text-primary");
  } else {
    $("#lblpdigital").text("Proposta Física");
    $("#lblpdigital").removeClass("text-primary");
    $("#lblpdigital").addClass("text-danger");
  }


});

$("#operadora").on("select2:select", async function(e) {

  const operadora = $("#operadora").select2('data')[0].text.toLowerCase();
  const cpf = $("#vendedor").select2('data')[0].id;

  populaCorretora(operadora, cpf);
  populaConvenio(operadora);
  populaFormasDePagamento(operadora);
  populaVinculo(operadora);
  populaProduto(operadora);
  populaBanco(operadora);

});

$("#vendedor").on("select2:select", async function(e) {

  const operadora = $("#operadora").select2('data')[0].text.toLowerCase();
  const cpf = $("#vendedor").select2('data')[0].id;

  populaCorretora(operadora, cpf);

});

$("#banco").on("select2:select", async function(e) {

  const operadora = $("#operadora").select2('data')[0].text.toLowerCase();
  const banco = $("#banco").select2('data')[0].id;

  populaAgencia(operadora, banco);

});

$("#fpagamento").on("select2:select", function(e) {

  const fpagamento = e.params.data.id;
  showDivPagamento(fpagamento);

});

const showDivPagamento = (fpagamento) => {

  $("#rdebito").hide();
  $("#rconsignado").hide();

  switch (parseInt(fpagamento, 10)) {
    case 10:
      $("#rdebito").show();
      $("#rconsignado").show();
      break;
    case 3:
      $("#rdebito").show();
      break;

    default:
      break;
  }

}

const populaAgencia = async (operadora, banco) => {

  $("#agencia").html("");

  const {
    data: {
      data: agencias
    }
  } = await apiGiga.get(`/agencias/${operadora}?bancoid=${banco}`);

  for (const {
      id: value,
      codigo: text,
      digito
    } of agencias) {
    if ($('#agencia').find(`option[value='${value}']`).length) {
      $('#agencia').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase() + digito, value, false, false);
      $('#agencia').append(options).trigger('change')
    }
  }

  $('#agencia').val(state.responsavelFinanceiro.agencia||null).trigger('change');

}

const populaVendedores = async (vendedor) => {

  $("#vendedor").html("");

  /*Select: corretor*/
  const {
    data: vendedores
  } = await apiVendas.get(`/vendas/vendedor/rede/${vendedor}`);

  for (const {
      cpf: value,
      vendedor: text
    } of vendedores) {
    if ($('#vendedor').find(`option[value='${value}']`).length) {
      $('#vendedor').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#vendedor').append(options).trigger('change')
    }
  }

  $('#vendedor').val(state.proposta.vendedor || null).trigger('change');

}

const populaCorretora = async (operadora, cpf) => {

  Dashmix.block('state_loading', '.myblock');
  $("#corretora").html("");

  const {
    data: {
      data: corretores
    }
  } = await apiGiga.get(`/vendedores/${operadora}?cpf=${cpf}`);


  for (const {
      corretorid: value,
      nome_corretora: text
    } of corretores) {
    if ($('#corretora').find(`option[value='${value}']`).length) {
      $('#corretora').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#corretora').append(options).trigger('change')
    }
  }

  $("#corretora").val(state.proposta.corretora||null).trigger('change');
  Dashmix.block('state_normal', '.myblock');

}

const populaConvenio = async (operadora) => {

  Dashmix.block('state_loading', '.myblock');
  $("#convenio").html("");

  const {
    data: {
      data: convenios
    }
  } = await apiGiga.get(`/centro-resultados/${operadora}?limit=100000`);

  for (const {
      id: value,
      search: text
    } of convenios) {
    if ($('#convenio').find(`option[value='${value}']`).length) {
      $('#convenio').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#convenio').append(options).trigger('change')
    }
  }

  $("#convenio").val(state.proposta.convenio,10||null).trigger('change');
  
  Dashmix.block('state_normal', '.myblock');
}

const populaVinculo = async (operadora) => {

  $("#vinculo-beneficiario").html("");

  const {
    data: {
      data: vinculos
    }
  } = await apiGiga.get(`vinculos/${operadora}?codigo=in:14,15,16,19,21,22`);


  $("#vinculo-beneficiario").html("");

  for (const {
      id: value,
      descricao: text
    } of vinculos) {
    if ($('#vinculo-beneficiario').find(`option[value='${value}']`).length) {
      $('#vinculo-beneficiario').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#vinculo-beneficiario').append(options).trigger('change')
    }
  }

  $('#vinculo-beneficiario').val(null).trigger('change');

}

const populaOperadoras = async () => {

  $("#operadora").html("");

  const {
    data: operadoras
  } = await apiVendas.get(`/vendas/operadora/`);

  for (const {
      id: value,
      operadora: text
    } of operadoras) {
    if ($('#operadora').find(`option[value='${value}']`).length) {
      $('#operadora').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#operadora').append(options).trigger('change')
    }
  }

  $('#operadora').val(state.proposta.operadora || null).trigger('change');
}

const populaTiposDeContrato = async () => {

  $("#tpcontrato").html("");

  const {
    data: tiposdecontrato
  } = await apiVendas.get(`/vendas/tipodecontrato/`);

  for (const {
      id: value,
      tipodecontrato: text
    } of tiposdecontrato) {
    if ($('#tpcontrato').find(`option[value='${value}']`).length) {
      $('#tpcontrato').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#tpcontrato').append(options).trigger('change')
    }
  }
  $('#tpcontrato').val(state.proposta.tipoContrato || null).trigger('change');
}

const populaTiposDeConvenio = async () => {

  $("#tpconvenio").html("");

  const {
    data: tiposdeconvenio
  } = await apiVendas.get(`/convenios/vendas/tipos/`);

  for (const {
      id: value,
      tipodeconvenio: text
    } of tiposdeconvenio) {
    if ($('#tpconvenio').find(`option[value='${value}']`).length) {
      $('#tpconvenio').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#tpconvenio').append(options).trigger('change')
    }
  }

  $('#tpconvenio').val(state.proposta.tipoConvenio || null).trigger('change');

}

const populaFormasDePagamento = async (operadora) => {

  $("#fpagamento").html("");

  const {
    data: {
      data: formasdepagamento
    }
  } = await apiGiga.get(`/modalidade-pagamentos/${operadora}?id=in:7,10,3,2`);

  for (const {
      id: value,
      descricao: text
    } of formasdepagamento) {
    if ($('#fpagamento').find(`option[value='${value}']`).length) {
      $('#fpagamento').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#fpagamento').append(options).trigger('change')
    }
  }

  $("#fpagamento").val(state.proposta.formaPagamento||null).trigger('change');

}

const populaBanco = async (operadora) => {

  $("#banco").html("");

  const {
    data: {
      data: bancos
    }
  } = await apiGiga.get(`bancos/${operadora}?id=in:10,11,6`);

  console.log("bancos", bancos);
  for (const {
      id: value,
      descricao: text
    } of bancos) {
    if ($('#banco').find(`option[value='${value}']`).length) {
      $('#banco').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#banco').append(options).trigger('change')
    }
  }

  $('#banco').val(state.responsavelFinanceiro.banco||null).trigger('change');

}

const populaProduto = async (operadora) => {

  $("#produto-beneficiario").html("");

  const {
    data: {
      data: produtos
    }
  } = await apiGiga.get(`/produtos/${operadora}?limit=10000&prd_in_bloqueado=false&pro_id_tipo_contrato=5`);

  state.produtos = produtos.map(({id, descricao, preco})=>({id, produto: descricao, valor:preco}));

  console.log("produtos", produtos);

  for (const {
      id: value,
      descricao: text
    } of produtos) {
    if ($('#produto-beneficiario').find(`option[value='${value}']`).length) {
      $('#produto-beneficiario').val(value).trigger('change');
    } else {
      const options = new Option(text.toUpperCase(), value, false, false);
      $('#produto-beneficiario').append(options).trigger('change')
    }
  }

  $('#produto-beneficiario').val(null).trigger('change');

}

const populateHtml = async () => {

  /**Proposta */

  $("#vendedor").val(state.proposta.vendedor).trigger('change');
  $("#operadora").val(state.proposta.operadora).trigger('change');
  $("#tpcontrato").val(state.proposta.tipoContrato).trigger('change');
  $("#tpconvenio").val(state.proposta.tipoConvenio).trigger('change');
  $("#pparcela").val(state.proposta.primeiraParcela).trigger('change');
  
  $("#vencimento").val(state.proposta.diaVencimento);

  /**Responsavel Financeiro */
  $("#nome").val(state.responsavelFinanceiro.nome);

  $("#celular").val(state.responsavelFinanceiro.celular);
  $("#celular").mask("(99) 9 9999-9999", {
    placeholder: ' ',
    autoclear: false
  });

  $("#email").val(state.responsavelFinanceiro.email);

  $("#cpf-responsavel").val(state.responsavelFinanceiro.cpf);
  $("#cpf-responsavel").mask("999.999.999-99", {
    placeholder: ' ',
    autoclear: false
  });

  $("#rg").val(state.responsavelFinanceiro.rg);
  $("#oemissor").val(state.responsavelFinanceiro.orgaoEmissorRg);
  $("#genero-responsavel").val(state.responsavelFinanceiro.genero).trigger('change');
  $("#nascimento-responsavel").val(moment(state.responsavelFinanceiro.nascimento, "YYYY-MM-DD").format("DD/MM/YYYY"));
  $("#cns").val(state.responsavelFinanceiro.cns);
  $("#mae-responsavel").val(state.responsavelFinanceiro.nomeDaMae);

  $("#cep").val(state.responsavelFinanceiro.cep);
  $("#cep").mask("99999-999", {
    placeholder: ' ',
    autoclear: false
  });

  $("#uf").val(state.responsavelFinanceiro.uf);
  $("#cidade").val(state.responsavelFinanceiro.cidade);
  $("#bairro").val(state.responsavelFinanceiro.bairro);
  $("#endereco").val(state.responsavelFinanceiro.endereco);
  $("#complemento").val(state.responsavelFinanceiro.complemento);
  $("#numero").val(state.responsavelFinanceiro.numero);

}

$(async function() {

  Dashmix.block('state_loading', '.myblock');

  populaVendedores(vendedor);
  populaOperadoras();
  populaTiposDeContrato();
  populaTiposDeConvenio();

  if (!idProposta) {
    Dashmix.block('state_normal', '.myblock');
    return;
  }

  const [{
    data: [responsavel]
  }, {
    data: [proposta]
  }, {
    data: ocorrencias
  }, {
    data: beneficiarios
  }, {
    data: convenios
  }, {
    data: [primeiraPaga]
  }, {
    data: tipoDocumentos
  }] = await Promise.all([
    apiVendas.get(`propostas/vendas/responsavel/${idProposta}`),
    apiVendas.get(`propostas/vendas/${idProposta}`),
    apiVendas.get(`propostas/vendas/ocorrencias/${idProposta}`),
    apiVendas.get(`propostas/vendas/beneficiarios/${idProposta}`),
    apiVendas.get(`convenios/vendas/tipos`),
    apiVendas.get(`propostas/vendas/pagamentos/${idProposta}`),
    apiVendas.get('vendas/documento/tipos')
  ])

  tipodeDocumentos = tipoDocumentos;


  $('#tipodocumentos').select2({
    placeholder: 'Selecione o tipo de documento',
    data: tipoDocumentos.map(({
      id,
      tipodedocumento
    }) => ({
      id,
      text: tipodedocumento
    }))
  })

  console.log("responsavel", responsavel);
  console.log("proposta", proposta);
  console.log("ocorrencias", ocorrencias);
  console.log("beneficiarios", beneficiarios);
  console.log("convenios", convenios);
  console.log("primeiraPaga", primeiraPaga);

  state.proposta.vendedor = proposta.cpfvendedor;
  state.proposta.operadora = proposta.idoperadora;
  state.proposta.corretora = proposta.idcorretora;
  state.proposta.tipoContrato = proposta.idtipodeplano;
  state.proposta.tipoConvenio = proposta.idtipodeconvenio;
  state.proposta.convenio = proposta.idconvenio;
  state.proposta.formaPagamento = proposta.idmodalidadepagamento;
  state.proposta.diaVencimento = proposta.vencimento;
  state.proposta.primeiraParcela = proposta.primeirapaga;

  state.proposta.digital          = state.proposta.tipoConvenio === 2?false:true;
  state.proposta.dataSolicitacao  = moment();


  state.responsavelFinanceiro.nome = responsavel.nome;
  state.responsavelFinanceiro.celular = responsavel.celular;
  state.responsavelFinanceiro.email = responsavel.email;
  state.responsavelFinanceiro.cpf = responsavel.cpf;
  state.responsavelFinanceiro.rg = responsavel.rg;
  state.responsavelFinanceiro.orgaoEmissorRg = responsavel.orgaoemissor;
  state.responsavelFinanceiro.genero = responsavel.genero;
  state.responsavelFinanceiro.nascimento = responsavel.nascimento;
  state.responsavelFinanceiro.cns = responsavel.cns;
  state.responsavelFinanceiro.nomeDaMae = responsavel.nomedamae;

  state.responsavelFinanceiro.banco = responsavel.giga_bancoid;
  state.responsavelFinanceiro.agencia = responsavel.giga_agenciaid;
  state.responsavelFinanceiro.tipodeconta = responsavel.giga_tipocontaid;

  state.responsavelFinanceiro.cep = responsavel.cep;
  state.responsavelFinanceiro.uf = responsavel.estado;
  state.responsavelFinanceiro.cidade = responsavel.cidade;
  state.responsavelFinanceiro.bairro = responsavel.bairro;
  state.responsavelFinanceiro.endereco = responsavel.endereco;
  state.responsavelFinanceiro.complemento = responsavel.complemento;
  state.responsavelFinanceiro.numero = responsavel.numero;

  const operadora = proposta.idoperadora === 1 ? 'idental' : 'atemde';

  if (operadora != "") {

    if (proposta.cpfvendedor != "") {
      populaCorretora(operadora, proposta.cpfvendedor);
    }

    populaConvenio(operadora);
    populaBanco(operadora);
    populaVinculo(operadora);
    populaProduto(operadora);
    populaFormasDePagamento(operadora);

    // state.responsavelFinanceiro.agencia = responsavel.giga_agenciaid;
    // state.responsavelFinanceiro.tipodeconta = responsavel.giga_tipocontaid;
    if (state.responsavelFinanceiro.banco) {
      populaAgencia(operadora, state.responsavelFinanceiro.banco);
    }

  }

  showDivPagamento(parseInt(state.proposta.formaPagamento), 10);


  // const beneficiarios = await getBeneficiarios(<?php //echo $idcontato; ?>);
  state.beneficiarios = beneficiarios.map(({
    tpbeneficiario,
    idbeneficiario,
    nome,
    idvinculo,
    genero,
    nascimento,
    cpf,
    rg,
    orgaoemissor,
    nomedamae,
    giga_idproduto,
    produto,
    valor
  }) => ({
    tpbeneficiario,
    id: idbeneficiario,
    nome,
    vinculo: idvinculo,
    genero,
    nascimento,
    cpf,
    rg,
    orgao: orgaoemissor,
    mae: nomedamae,
    idproduto:giga_idproduto,
    produto,
    valor
  }));

  console.log("state", state);

  populateHtml();

  // Dashmix.block('state_normal', '.myblock');
  });

  /** Muda de campo, ao pressionar enter */
  $(document).on('keydown', 'input, select, textarea', function(e) {
          var self = $(this)
          , form = self.parents('form:eq(0)')
          , focusable
          , next
          , prev
          ;

          if (e.shiftKey) {
          if (e.keyCode == 13) {
              focusable =   form.find('input,a,select,button,textarea').filter(':visible');
              prev = focusable.eq(focusable.index(this)-1); 

              if (prev.length) {
                  prev.focus();
              } else {
                  form.submit();
              }
          }
          }
          else
          if (e.keyCode == 13) {
              focusable = form.find('input,a,select,button,textarea').filter(':visible');
              next = focusable.eq(focusable.index(this)+1);
              if (next.length) {
                  next.focus();
              } else {
                  form.submit();
              }
              return false;
          }
    });    

</script>