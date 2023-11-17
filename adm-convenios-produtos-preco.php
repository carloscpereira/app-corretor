<?php include('../funcoes/corretor/funcoes-convenios.php'); ?>
<?php include('../funcoes/corretor/funcoes-produtos.php'); ?>
<?php include('../funcoes/corretor/funcoes-pessoas.php'); ?>
<?php include('../funcoes/corretor/funcoes-propostas.php'); ?>
<?php include('../funcoes/funcoes.php');?>


<?php 

if (!isset($_GET['id'])){
    $titulo = 'Novo Preço';
    $acao   = 'c'; /**Create - Inserir */
    $botao  = 'Criar Preço';
} else {
    $titulo = 'Editar Preço';
    $acao   = 'u'; /**Updatr - Alterar */
    $botao  = 'Salvar Preço';

    $idpreco = $_GET['id'];
    $precos = pg_fetch_assoc(getPrecos($idpreco));

}

$idoperadora    = isset($idpreco)?$precos['idoperadora']:null;
$idconvenio     = isset($idpreco)?$precos['idconvenio']:null;
$idproduto      = isset($idpreco)?$precos['idproduto']:null;
$idfpagamento   = isset($idpreco)?$precos['idformadepagamento']:null;
$valor          = isset($idpreco)?$precos['valor']:null;


?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/select2/css/select2.min.css'); ?>


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
                        <a href="adm-convenios.php">Convênios</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="adm-convenios-produtos.php">Preços</a>
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
    <form action="adm-convenios-produtos-preco-gravar.php" id="myform" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="acao" value="<?php echo $acao; ?>">
        <input type="hidden" name="id"   value="<?php echo $idpreco; ?>">

        <div class="block">
            <div class="block-header block-header-default">
                <a class="btn btn-light" href="adm-convenios-produtos.php">
                    <i class="fa fa-arrow-left mr-1"></i> Todas os Produtos
                </a>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                </div>
            </div>

            <div class="block-content">
                <div class="row justify-content-center push">
                    <div class="col-md-10">
                        <div class="row">
                            <!-- Operadora de Seguro -->
                            <div class = "col-md-3">
                                <div class="form-group">
                                    <label for="operadora">Operadora</label>
                                    <select class="js-select2 form-control" id="operadora" name="operadora" style="width: 100%;" data-placeholder="Escolha operadora..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = getOperadoras(); //Operadoras
                                        foreach($resultados as $operadoras){
                                            $descricao = utf8_encode(primeiro_maiusculo($operadoras['operadora']));
                                            $id   = $operadoras['id']; ?>
                                        <option <?php if($id == $idoperadora){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>                            
                                </div>
                            </div>
                            <!-- Fim Operadora de Seguro -->
                           
                            <!-- Operadora de Seguro -->
                            <div class = "col-md-4">
                                <div class="form-group">
                                    <label for="tipo-convenio">Tipo de Convênio</label>
                                    <select class="js-select2 form-control" id="tipo-convenio" name="tipo-convenio" style="width: 100%;" data-placeholder="Escolha tipo de convenio..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = getTConvenios(); //Operadoras
                                        foreach($resultados as $tconvenios){
                                            $descricao = utf8_encode(primeiro_maiusculo($tconvenios['descricao']));
                                            $id   = $tconvenios['id']; ?>
                                        <option <?php if($id == $idtconvenio){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>                            
                                </div>
                            </div>
                            <!-- Fim Operadora de Seguro -->

                            <!-- Convênio-->
                            <div class = "col-md-5">
                                <div class="form-group">
                                    <label for="convenio">Convênio</label>
                                    <select class="js-select2 form-control" id="convenio" name="convenio" style="width: 100%;" data-placeholder="Escolha o convenio..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = pg_fetch_all(getConvenios()); //Convenios
                                        foreach($resultados as $convenios){
                                            $descricao = primeiro_maiusculo($convenios['descricao']);
                                            $id   = $convenios['id']; ?>
                                        <option <?php if($id == $idconvenio){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>                            
                                </div>
                            </div>
                            <!-- Fim Convênio -->

                        </div>
                        <div class="row">
                            <!-- Plano -->
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <label for="produto">Produto</label>
                                    <select class="js-select2 form-control" id="produto" name="produto" style="width: 100%;" data-placeholder="Escolha o plano..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = getProdutos(); //Convenios
                                        foreach($resultados as $produtos){
                                            $descricao = utf8_encode(primeiro_maiusculo($produtos['produto']));
                                            $id   = $produtos['idproduto']; ?>
                                        <option <?php if($id == $idproduto){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        
                                    </select>
                                </div>
                            </div>
                            <!-- Fim Plano -->

                            <!-- Versão do Plano -->
                            <div class = "col-md-4">
                                <div class="form-group">
                                    <label for="fpagamento">Forma de Pagamento</label>
                                    <select class="js-select2 form-control" id="fpagamento" name="fpagamento" style="width: 100%;" data-placeholder="Escolha a versão..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                       
                                        <?php                                         
                                        $resultados = getFormaPagamento(); //Convenios
                                        foreach($resultados as $formasdepagamento){
                                            $descricao = utf8_encode(primeiro_maiusculo($formasdepagamento['formadepagamento']));
                                            $id   = $formasdepagamento['id']; ?>
                                        <option <?php if($id == $idproduto){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>                            
                                </div>
                            </div>
                            <!-- Fim Versão do Plano -->

                            <!-- Preço Sugerido-->
                            <div class = "col-md-2">
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $valor; ?>">
                                </div>
                            </div>
                            <!-- FIM Preço Sugerido -->

                        </div>

                    </div>
                </div>
            </div>
            <div class="block-content bg-body-light">
                <div class="row justify-content-center push">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-alt-info">
                            <i class="fa fa-fw fa-check mr-1"></i> <?php echo $botao; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- END New Post -->
</div>
<!-- END Page Content -->


<script type="text/javascript">
        // Este evendo é acionado após o carregamento da página
        jQuery(window).load(function() {
            //Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
            jQuery("#loader").delay(2000).fadeOut("slow");
        });
    </script>

    

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>
<!-- Validation -->
<?php $dm->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>



<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
<script>jQuery(function(){ Dashmix.helpers(['select2','masked-inputs']); });</script>


<?php require 'inc/_global/views/footer_end.php'; ?>



<script>
// validation.js
    $("#myform").validate({
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
            'operadora': {
                required: true
            },
            'convenio':{
                required: true
                            }
            ,'produto':{
                required: true
            }
            ,'fpagamento':{
                required: true
            }
                        
            ,'valor':{
                required: true
            }
        },
        messages: {
            'operadora': {
                required: "Favor informar a operadora."
            }
            ,"convenio": {
                required: "Favor informar o convênio."
            }
            ,"produto": {
                required: "Favor informar a operadora."
            }
            ,"fpagamento": {
                required: "Favor informar a forma de pagamento."
            }
            , "valor": {
                required: "Favor informar o valor."
            }
        }
    }); 

</script>
