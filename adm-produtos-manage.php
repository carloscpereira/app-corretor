<?php include('../funcoes/corretor/funcoes-produtos.php'); ?>
<?php include('../funcoes/corretor/funcoes-pessoas.php'); ?>
<?php include('../funcoes/funcoes.php'); ?>


<?php 

if (!isset($_GET['id'])){
    $titulo = 'Novo Produto';
    $botao  = 'Criar Produto';
} else {
    $titulo = 'Editar Produto';
    $botao  = 'Salvar Produto';
    
    $idproduto = $_GET['id'];
    $sql = "SELECT idoperadora, descricao, planoid, versaoid, valor FROM produto WHERE id=$idproduto";

    $result     = pg_query($sql);
    $produtos   = pg_fetch_assoc($result);

    $descricao      = $produtos['descricao'];
    $idplano        = $produtos['planoid'];
    $idversao       = $produtos['versaoid'];
    $idoperadora    = $produtos['idoperadora'];
    $valor          = $produtos['valor'];

}

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
                        <a href="adm-produtos.php">Produtos</a>
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
    <form action="be_pages_blog_post_add.php" method="POST" enctype="multipart/form-data" onsubmit="return false;">
        <div class="block">
            <div class="block-header block-header-default">
                <a class="btn btn-light" href="adm-produtos.php">
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
                            <!-- Descriçao do Produto -->
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <label for="dm-post-add-title">Nome do Produto</label>
                                    <input type="text" class="form-control" id="dm-post-add-title" name="dm-post-add-title" placeholder="Informe o produto..." value="<?php echo $descricao; ?>">
                                </div>
                            </div>
                            <!-- FIM Descriçao do Produto -->

                            <!-- Operadora de Seguro -->
                            <div class = "col-md-4">
                                <div class="form-group">
                                    <label for="dm-post-add-title">Operadora</label>
                                    <select class="js-select2 form-control" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Escolha operadora..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = getOperadoras(); //Operadoras
                                        foreach($resultados as $operadoras){
                                            $descricao = primeiro_maiusculo(utf8_encode($operadoras['operadora']));
                                            $id   = $operadoras['id']; ?>
                                        <option <?php if($id == $idoperadora){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>                            
                                </div>
                            </div>
                            <!-- Fim Operadora de Seguro -->

                            <!-- Operadora de Seguro -->
                            <div class = "col-md-2">
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $valor; ?>">
                                </div>
                            </div>
                            <!-- Fim Operadora de Seguro -->

                        </div>
                        <div class="row">
                            <!-- Plano -->
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <label for="example-select3">Plano</label>
                                    <select class="js-select2 form-control" id="example-select3" name="example-select3" style="width: 100%;" data-placeholder="Escolha o plano..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = getPlanos(); //Operadoras
                                        foreach($resultados as $planos){
                                            $descricao = primeiro_maiusculo(utf8_encode($planos['descricao']));
                                            $id   = $planos['id']; ?>
                                        <option <?php if($id == $idplano){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>
                                </div>
                            </div>
                            <!-- Fim Plano -->

                            <!-- Versão do Plano -->
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <label for="example-select4">Versão do Plano</label>
                                    <select class="js-select2 form-control" id="example-select4" name="example-select4" style="width: 100%;" data-placeholder="Escolha a versão..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                                        <?php                                         
                                        $resultados = getVersoes(); //Operadoras
                                        foreach($resultados as $versoes){
                                            $descricao = primeiro_maiusculo(utf8_encode($versoes['descricao']));
                                            $id   = $versoes['id']; ?>
                                        <option <?php if($id == $idversao){ echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                                       <?php }?>                                        

                                    </select>                            
                                </div>
                            </div>
                            <!-- Fim Versão do Plano -->

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
