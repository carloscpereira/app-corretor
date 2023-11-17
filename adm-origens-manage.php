<?php include('../funcoes/corretor/conexao.php');?>

<?php 

if (!isset($_GET['id'])){
    $titulo = 'Nova Origem';
    $botao  = 'Criar Origem';

    $origem     = null;
    $link       = null;
    $campanha   = null;

} else {
    $titulo = 'Editar Origem';
    $botao  = 'Salvar Origem';

    $idorigem = $_GET['id'];
    $sql = "select origem, link, campanha from origem where id=$idorigem";

    $result = pg_query($sql);
    $data = pg_fetch_assoc($result);


    $origem     = $data['origem'];
    $link       = $data['link'];
    $campanha   = $data['campanha'];

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
                        <a href="adm-origens.php">Origens de Lead</a>
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
                <a class="btn btn-light" href="adm-origens.php">
                    <i class="fa fa-arrow-left mr-1"></i> Todas as Origens
                </a>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center push">
                    <div class="col-md-10">
                        <div class="row">
                            <!-- Descriçao da Origem -->
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <label for="dm-post-add-title">Nome da Origem</label>
                                    <input type="text" class="form-control" id="dm-post-add-title" name="dm-post-add-title" placeholder="Informe a origem da lead..." value="<?php echo $origem;?>">
                                </div>
                            </div>
                            <!-- FIM Descriçao da Origem -->

                            <!-- Campanha -->
                            <div class = "col-md-6">
                                <div class="form-group">
                                        <label for="dm-post-add-title">Nome da Campanha</label>
                                        <input type="text" class="form-control" id="dm-post-add-title" name="dm-post-add-title" placeholder="Informe a campanha..." value="<?php echo $link; ?>">
                                    </div>
                                </div>
                            <!-- Fim Campanha -->
                        </div>
                        <div class="row">
                            <!-- Link -->
                            <div class = "col-md-12">
                                <div class="form-group">
                                <label for="dm-post-add-title">Endereço (link)</label>
                                <input type="text" class="form-control" id="dm-post-add-title" name="dm-post-add-title" placeholder="www.link.com.br/campanha" value="<?php echo $campanha; ?>">

                            </div>
                            <!-- Fim Link -->
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
