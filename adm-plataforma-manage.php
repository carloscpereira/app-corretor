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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2" id="titulo">Gestão de Plataforma</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="adm-plataforma.php">Plataforma</a>
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
                <a class="btn btn-light" href="adm-plataforma.php">
                    <i class="fa fa-arrow-left mr-1"></i> Todas as plataformas
                </a>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                        data-action="fullscreen_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center push">
                    <div class="col-md-10">
                        <div class="row">
                            <!-- Descriçao da Origem -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="plataforma">Nome da Plataforma</label>
                                    <input type="text" class="form-control" id="plataforma" name="plataforma"
                                        placeholder="Informe a plataforma..." value="">
                                </div>
                            </div>
                            <!-- FIM Descriçao da Origem -->

                            <!-- Campanha -->
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dm-post-add-title">Nome da Campanha</label>
                                    <input type="text" class="form-control" id="dm-post-add-title"
                                        name="dm-post-add-title" placeholder="Informe a campanha..." value="">
                                </div>
                            </div> -->
                            <!-- Fim Campanha -->
                        </div>
                    </div>
                </div>
                <div class="block-content bg-body-light">
                    <div class="row justify-content-center push">
                        <div class="col-md-10">
                            <button class="btn btn-alt-info" onclick="salvarPlataforma();">
                                <i class="fa fa-fw fa-check mr-1"></i>Salvar
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
<script>
jQuery(function() {
    Dashmix.helpers(['select2', 'masked-inputs']);
});
</script>

<?php require 'inc/_global/views/footer_end.php'; ?>


<script>
const apiCRM = axios.create({
    baseURL: 'https://www.idental.com.br/api/crm/',
    timeout: 10000,
    headers: {
        'AppAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
    }
});

async function salvarPlataforma() {
    const body = {
        plataformadoanuncio: $('#plataforma').val(),
        iconedaplataforma: null
    };

    if (plataformaid) {
        const plataforma = await apiCRM.put(`/plataforma/${plataformaid}`, body);
    } else {
        const plataforma = await apiCRM.post('/plataforma', body);
        // console.log(plataforma);
    }
    location.href = 'adm-plataforma.php';
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

const plataformaid = getParameter('p');

if (plataformaid) {
    loadPlataforma();
}

async function loadPlataforma() {

    const {
        data: [plataforma]
    } = await apiCRM.get(`/plataforma/${plataformaid}`);

    $('#plataforma').val(plataforma.plataformadoanuncio);
}
</script>