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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gestão de Anúncio</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="adm-anuncio.php">Anúncio</a>
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
                <a class="btn btn-light" href="adm-anuncio.php">
                    <i class="fa fa-arrow-left mr-1"></i> Todas os anúncios
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anuncio">Nome do Anúncio</label>
                                    <input type="text" class="form-control" id="anuncio" name="anuncio"
                                        placeholder="Informe a anuncio..." value="">
                                </div>
                            </div>
                            <!-- FIM Descriçao da Origem -->

                            <!-- Campanha -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                        placeholder="Título do anúncio..." value="">
                                </div>
                            </div>
                            <!-- Fim Campanha -->
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="row">
                            <!-- Descriçao da Origem -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="landingpage">Landing Page</label>
                                    <input type="text" class="form-control" id="landingpage" name="landingpage"
                                        placeholder="Informe a landing page do anuncio..." value="">
                                </div>
                            </div>
                            <!-- FIM Descriçao da Origem -->

                            <!-- Campanha -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="urldoanuncio">URL do anúncio</label>
                                    <input type="text" class="form-control" id="urldoanuncio" name="urldoanuncio"
                                        placeholder="digite a URL do anúncio na plataforma..." value="">
                                </div>
                            </div>
                            <!-- Fim Campanha -->
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="row">
                            <div class="form-group col-lg-12 col-xl-6">
                                <label for="campanha">Campanha</label>
                                <select class="js-select2 form-control" id="campanha" name="campanha"
                                    style="width: 100%;">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12 col-xl-6">
                                <label for="plataforma">Plataforma</label>
                                <select class="js-select2 form-control" id="plataforma" name="plataforma"
                                    style="width: 100%;">
                                    <option></option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="form-group col-lg-12 col-xl-4">
                                <label for="nomedamidia">Nome da Mídia</label>
                                <input type="text" class="form-control" id="nomedamidia" name="nomedamidia"
                                    placeholder="digite o nome da mídia..." value="">
                            </div>
                            <div class="form-group col-lg-12 col-xl-8">
                                <label for="urldamidia">URL da Mídia</label>
                                <input type="text" class="form-control" id="urldamidia" name="urldamidia"
                                    placeholder="digite a url da midia na plataforma..." value="">
                            </div>

                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="row">
                            <div class="form-group col-lg-12 col-xl-12">
                                <label for="copywriting">Copywriting</label>
                                <textarea type="text" class="form-control" id="copywriting" name="copywriting"
                                    rows="6"></textarea>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="block-content bg-body-light">
                    <div class="row justify-content-center push">
                        <div class="col-md-10">
                            <button class="btn btn-alt-info" onclick="salvarAnuncio();">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/pt-br.min.js"></script>


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


$(async function() {

    /**campanhas */
    const {
        data: campanhas
    } = await apiCRM.get(`/campanha`);

    campanhas?.map(b => {
        var data = {
            id: b.id,
            text: b.campanha
        };
        var newOption = new Option(data.text, data.id, false, false);
        $('#campanha').append(newOption).trigger('change');
    });

    /**Plataforma dos Anuncios */
    const {
        data: plataformas
    } = await apiCRM.get(`/plataforma`);

    // console.log(plataformas);
    // $('#plataforma').empty();
    plataformas?.map(p => {

        var data = {
            id: p.id,
            text: p.plataformadoanuncio
        };
        var newOption = new Option(data.text, data.id, false, false);
        $('#plataforma').append(newOption).trigger('change');

    });

    if (anuncioid) {
        loadAnuncio(anuncioid);
    }


});



async function salvarAnuncio() {
    const body = {
        titulo: $('#titulo').val(),
        data: moment(Date()).format('DD-MM-YYYY'),
        campanhaid: $('#campanha').val(),
        plataformadoanuncioid: $('#plataforma').val(),
        nomedamidia: $('#nomedamidia').val(),
        urldamidia: $('#urldamidia').val(),
        copywriting: $('#copywriting').val(),
        anuncio: $('#anuncio').val(),
        urldoanuncio: $('#urldoanuncio').val(),
        landingpage: $('#landingpage').val()
    };

    console.log(body);
    if (anuncioid) {
        const anuncio = await apiCRM.put(`/anuncio/${anuncioid}`, body);
    } else {
        const anuncio = await apiCRM.post('/anuncio', body);
        // console.log(plataforma);
    }
    location.href = 'adm-anuncio.php';
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

const anuncioid = getParameter('p');

async function loadAnuncio(anuncioid) {

    const {
        data: [anuncio]
    } = await apiCRM.get(`/anuncio/${anuncioid}`);

    // console.log(anuncio);

    $('#anuncio').val(anuncio.anuncio);
    $('#titulo').val(anuncio.titulo);
    $('#nomedamidia').val(anuncio.nomedamidia);
    $('#urldamidia').val(anuncio.urldamidia);
    $('#copywriting').val(anuncio.copywriting);
    $('#landingpage').val(anuncio.landingpage);
    $('#urldoanuncio').val(anuncio.urldoanuncio);

    $('#campanha').val(anuncio.campanhaid).select2();
    $('#plataforma').val(anuncio.plataformadoanuncioid).select2();


}
</script>