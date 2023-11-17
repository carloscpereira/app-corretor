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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gestão da Campanha</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="adm-campanha.php">Campanha</a>
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
                <a class="btn btn-light" href="adm-campanha.php">
                    <i class="fa fa-arrow-left mr-1"></i> Todas as Campanhas
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
                            <div class="form-group col-lg-12 col-xl-6">
                                <label for="campanha">Nome da Campanha</label>
                                <input type="text" class="form-control" id="campanha" name="campanha"
                                    placeholder="digite o nome da mídia..." value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="form-group col-lg-12 col-xl-6">
                                <label for="produto">Produto</label>
                                <select class="js-select2 form-control" id="produto" name="produto"
                                    style="width: 100%;">
                                    <option></option>
                                </select>
                            </div>

                            <div class="form-group col-lg-12 col-xl-3">
                                <label for="inicio">Inicio</label>
                                <input type="text" class="js-masked-date js-datepicker form-control" id="inicio"
                                    name="inicio" data-autoclose="true" data-today-highlight="false"
                                    data-date-format="dd/mm/yyyy">
                            </div>
                            <div class="form-group col-lg-12 col-xl-3">
                                <label for="fim">Fim</label>
                                <input type="text" class="js-masked-date js-datepicker form-control" id="fim" name="fim"
                                    data-autoclose="true" data-today-highlight="false" data-date-format="dd/mm/yyyy">
                            </div>

                        </div>
                    </div>

                </div>
                <div class="block-content bg-body-light">
                    <div class="row justify-content-center push">
                        <div class="col-md-10">
                            <button class="btn btn-alt-info" onclick="salvarCampanha();">
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
<?php $dm->get_js('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/pt-br.min.js"></script>


<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
<script>
jQuery(function() {
    Dashmix.helpers(['select2', 'masked-inputs', 'datepicker']);
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
        data: produtos
    } = await apiCRM.get(`/produto`);

    produtos?.map(b => {
        var data = {
            id: b.id,
            text: b.prestador + ' - ' + b.produto
        };
        var newOption = new Option(data.text, data.id, false, false);
        $('#produto').append(newOption).trigger('change');
    });

    if (campanhaid) {
        loadCampanha(campanhaid);
    }


});



async function salvarCampanha() {

    console.log($('#fim').val());
    const body = {
        campanha: $('#campanha').val(),
        inicio: $('#inicio').val() != '' ? moment($('#inicio').val(), "DD/MM/YYYY").format('YYYY-MM-DD') : null,
        fim: $('#fim').val() != '' ? moment($('#fim').val(), "DD/MM/YYYY").format('YYYY-MM-DD') : null,
        produtoid: $('#produto').val()
    };

    console.log(body);
    if (campanhaid) {
        const anuncio = await apiCRM.put(`/campanha/${campanhaid}`, body);
    } else {
        const anuncio = await apiCRM.post('/campanha', body);
        // console.log(plataforma);
    }
    location.href = 'adm-campanha.php';
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

const campanhaid = getParameter('p');

async function loadCampanha(campanhaid) {

    const {
        data: [campanha]
    } = await apiCRM.get(`/campanha/${campanhaid}`);

    console.log(campanha);

    $('#campanha').val(campanha.campanha);
    $('#inicio').val(moment(campanha.inicio, "YYYY-MM-DD").format("DD/MM/YYYY"));
    $('#fim').val(campanha.fim != null ? moment(campanha.fim, "YYYY-MM-DD").format("DD/MM/YYYY") : null);

    $('#produto').val(campanha.produtoid).select2();


}
</script>