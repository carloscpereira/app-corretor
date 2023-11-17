<?php include('../funcoes/corretor/funcoes-convenios.php'); ?>
<?php include('../funcoes/corretor/funcoes-pessoas.php'); ?>
<?php include('../funcoes/funcoes.php'); ?>

<?php 


if (!isset($_GET['id'])){
    $titulo = 'Novo Convênio';
    $acao   = 'c'; /**Create - Inserir */
    $botao  = 'Criar Convênio';
} else {
    $titulo = 'Editar Convênio';
    $acao   = 'u'; /**Updatr - Alterar */
    $botao  = 'Salvar Convênio';

    $idconvenio = $_GET['id'];
    $convenios = pg_fetch_assoc(getConvenios($idconvenio));

}

$convenio       = isset($idconvenio)?$convenios['descricao']:null;
$idseguradora   = isset($idconvenio)?$convenios['idseguradora']:null;
$idtconvenio    = isset($idconvenio)?$convenios['idtipodeplano']:null;
$idparse        = isset($idconvenio)?$convenios['idparse']:null;


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
    <form action="adm-convenios-gravar.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="acao" value ="<?php echo $acao;?>">
        <input type="hidden" name="id" value ="<?php echo $idconvenio;?>">

        <div class="block">
            <div class="block-header block-header-default">
                <a class="btn btn-light" href="adm-convenios.php">
                    <i class="fa fa-arrow-left mr-1"></i> Todas os Convênios
                </a>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center push">
                    <div class="col-md-10">
                        <div class="row">
                            <div class = "col-md-3">
                                <div class="form-group">
                                    <label for="operadora">Operadora</label>
                                    <select class="js-select2 form-control" id="operadora" name="operadora" style="width: 100%;" data-placeholder="Escolha...">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = getOperadoras(); //Operadoras
                                        foreach($resultados as $operadoras){
                                            $descricao = primeiro_maiusculo(utf8_encode($operadoras['operadora']));
                                            $id   = $operadoras['id']; ?>
                                        <option <?php if($id == $idseguradora){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>                            
                                </div>
                            </div>

                            <div class = "col-md-3">
                                <div class="form-group">
                                    <label for="tconvenio">Tipo de Convenio</label>
                                    <select class="js-select2 form-control" id="tconvenio" name="tconvenio" style="width: 100%;" data-placeholder="Escolha...">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = getTConvenios(); //Operadoras
                                        foreach($resultados as $tconvenios){
                                            $descricao = primeiro_maiusculo(utf8_encode($tconvenios['descricao']));
                                            $id   = $tconvenios['id']; ?>
                                        <option <?php if($id == $idtconvenio){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>                            
                                </div>
                            </div>

                            <div class = "col-md-6">
                                <div class="form-group">
                                    <label for="convenio">Convênio</label>
                                    <input type="text" class="form-control" id="convenio" name="convenio" placeholder="Informe o convênio..." value="<?php echo $convenio; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cresultado">Centro de Resultado</label>
                                <select class="js-select2 form-control" id="cresultado" name="cresultado" style="width: 100%;" data-placeholder="Escolha o Centro de Resultado..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                    <?php                                         
                                    $resultados = getCResultados(); //Centro de Resultado
                                    foreach($resultados as $cresultados){
                                        $descricao = primeiro_maiusculo(utf8_encode($cresultados['descricao']));
                                        $id   = $cresultados['id']; ?>
                                    <option <?php if($id == $idparse){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                    <?php }?>                                        

                                </select>
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

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>

<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
<script>jQuery(function(){ Dashmix.helpers(['select2','masked-inputs']); });</script>


<?php require 'inc/_global/views/footer_end.php'; ?>

