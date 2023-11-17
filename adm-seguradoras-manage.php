<?php 

if (!isset($_GET['id'])){
    $titulo = 'Nova Seguradora';
    $botao  = 'Criar Seguradora';
} else {
    $titulo = 'Editar Seguradora';
    $botao  = 'Salvar Seguradora';
}

?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
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
                        <a href="adm-seguradoras.php">Seguradoras</a>
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
                <a class="btn btn-light" href="adm-seguradoras.php">
                    <i class="fa fa-arrow-left mr-1"></i> Todas as Seguradoras
                </a>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center push">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="dm-post-add-title">Operadora de Seguro</label>
                            <input type="text" class="form-control" id="dm-post-add-title" name="dm-post-add-title" placeholder="Informe a Operadora de Seguro...">
                        </div>
                        <div class="form-group">
                            <label for="dm-post-add-excerpt">Link de conexão</label>
                            <textarea class="form-control" id="dm-post-add-excerpt" name="dm-post-add-excerpt" rows="3" placeholder="Informe link..."></textarea>
                            <div class="form-text text-muted font-size-sm font-italic">Informações de configuração de conexão com o banco de dados da operadora.</div>
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
<?php $dm->get_js('js/plugins/ckeditor/ckeditor.js'); ?>

<!-- Page JS Helpers (CKEditor plugin) -->
<script>jQuery(function(){ CKEDITOR.config.height = '450px'; Dashmix.helpers(['ckeditor']); });</script>

<?php require 'inc/_global/views/footer_end.php'; ?>
