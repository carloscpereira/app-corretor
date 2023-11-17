<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $dm->assets_folder; ?>/media/photos/photo24@2x.jpg');">
    <div class="hero bg-black-90">
        <div class="hero-inner">
            <div class="content content-full">
                <div class="px-3 py-5 text-center">
                    <div class="mb-3">
                        <a class="link-fx font-w700 font-size-h1" href="index.php">
                            <span class="text-white">Corretor</span><span class="text-primary">Online</span>
                        </a>
                        <p class="text-uppercase font-w700 font-size-sm text-muted">Em Manutenção</p>
                    </div>
                    <h1 class="text-white font-w700 mt-5 mb-3">Algo indesejado aconteceu, mas já estamos trabalhando nisso.</h1>
                    <h2 class="h3 text-white-75 font-w400 text-muted mb-5">Não se preocupe, tudo voltará ao normal em breve!</h2>
                    <a class="btn btn-hero-primary mb-3" href="login.php">
                        <i class="fa fa-flask mr-1"></i> Atualizar a página
                    </a>
                    <br>
                    <a class="btn btn-sm btn-dark" href="https://www.idental.com.br">
                        <i class="fa fa-arrow-left mr-1"></i> Ir ao nosso site
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>
<?php require 'inc/_global/views/footer_end.php'; ?>