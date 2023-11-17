<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Plataforma</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Plataforma</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Topics -->
    <div class="block">
        <div class="block-header block-header-default">

            <!-- Search Origens de Lead -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar plataformas..." id="pesquisa">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div>
            <!-- END Search Origens de Lead -->


            <div class="block-options">
                <button type="button" class="btn-block-option mr-2"
                    onclick="window.location.href = 'adm-plataforma-manage.php'">
                    <i class="fa fa-plus mr-1"></i> Nova Plataforma
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option"
                    data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                    data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>

        </div>
        <div class="block-content">
            <!-- Topics -->
            <table class="table table-striped table-borderless table-vcenter">
                <thead class="thead-light">
                    <tr>
                        <th colspan="2">Plataforma</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Oportunidades</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Conversões</th>
                        <th class="d-none d-md-table-cell" style="width: 200px;">Última Conversão</th>
                    </tr>
                </thead>
                <tbody id="mybody">
                </tbody>
            </table>
            <!-- END Topics -->

            <!-- Pagination -->
            <nav aria-label="Topics navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                            <span aria-hidden="true">
                                <i class="fa fa-angle-left"></i>
                            </span>
                            <span class="sr-only">Anterior</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                            <span aria-hidden="true">
                                <i class="fa fa-angle-right"></i>
                            </span>
                            <span class="sr-only">Próxima</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END Pagination -->
        </div>
    </div>
    <!-- END Topics -->
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

<?php require 'inc/_global/views/footer_end.php'; ?>

<script>
/**
 * WebSocket
 **/

const ws = new WebSocket('wss://www.idental.com.br/ws');
// A classe `WebSocket` nos navegadores tem uma sintaxe um pouco diferente de `ws`
// Ao invés da sintax de EventEmmiter `on('open')`, você adiciona um callback
// a propriedade `onopen`.
ws.onopen = function() {
    //     ws.send(document.querySelector('#message').value);
};

ws.onmessage = function(msg) {
    const {
        data: response
    } = msg;

    // {
    //     system: [all, vendas, analise]
    //     user: all,
    //     id: idproposta,
    //     acao: [enviar, bloquear, liberar]
    // }


    const proposta = JSON.parse(response);


    switch (proposta.acao) {
        case 'enviar':
            liberarEnvio(proposta.idcontato);
            break;
        case 'notify':

            Dashmix.helpers('notify', {
                align: 'center',
                type: 'success',
                icon: 'fa fa-check mr-1',
                message: `${proposta.data[0].value}, está neste instante fazendo um pedido. Ligue para ele no número ${proposta.data[1].value}`
            });

            break;
    }

};


const apiCRM = axios.create({
    baseURL: 'https://www.idental.com.br/api/crm/',
    timeout: 10000,
    headers: {
        'AppAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
    }
});


getPlataformas();

async function getPlataformas() {

    const url = `/plataforma`;
    $(".plataformas").remove();
    // Dashmix.block('state_loading', '.myblock');

    const {
        data: plataformas
    } = await apiCRM.get(url);
    // console.log(plataformas);

    var plataformasPai = $("#mybody");

    plataformas.map(p => {

        // console.log(m);
        plataformasPai.append(`
        <tr class="bloco plataformas">
        <td colspan="2">
            <a class="font-w600" href="adm-plataforma-manage.php?p=${p.id}">${p.plataformadoanuncio}</a>
        </td>
        <td class="d-none d-md-table-cell text-center">
            <a class="font-w600" href="javascript:void(0)">-</a>
        </td>
        <td class="d-none d-md-table-cell text-center">
            <a class="font-w600" href="javascript:void(0)">-</a>
        </td>
        <td class="d-none d-md-table-cell text-center">
        <span class="font-size-sm"><a href="javascript:void(0)">-</a>
        </td>
    </tr>`);
        // <td class="d-none d-md-table-cell">
        //     <span class="font-size-sm">por <a href="be_pages_generic_profile.php">-</a><br>em
        //         <em>-</em></span>
        // </td>

    });


    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
    Dashmix.block('state_normal', '.myblock');


}


/*Filtrar os blocos com base no filtro*/
$(function() {
    $("#pesquisa").keyup(function() {
        var texto = $(this).val();

        $(".bloco").each(function() {
            var resultado = $(this).text().toUpperCase().indexOf(' ' + texto.toUpperCase());

            if (resultado < 0) {
                $(this).fadeOut();
            } else {
                $(this).fadeIn();
            }
        });
    });
});
</script>