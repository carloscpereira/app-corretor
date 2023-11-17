<?php include('../funcoes/funcoes.php'); ?>


<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<!-- xeditable css -->
<link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
<link href="../assets/node_modules/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Oportunidades</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Oportunidades</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <div id="tab-prevista" class="myblock block block-rounded block-mode-loading-refresh">

        <!-- Titulo -->
        <div class="block-header block-header-default">
            <div class="block-title">
                Consultor: <a class="editable editable-click" href="javascript:void(0)" id="corretor" data-type="select"
                    data-pk="1" data-value="" data-title="" style="color: rgb(93, 156, 236);">caregando...</a>
                <br>
                <button type="button" class="btn btn-outline-dark mr-1 mt-3" data-toggle="modal"
                    data-target="#modalFilter">
                    <i class="fa fa-fw fa-box mr-1"></i> Filtros
                </button>
            </div>

            <!-- Menu de opcoes -->
            <div class="block-options">

                Encaminhar para: <a class="editable editable-click" href="javascript:void(0)" id="corretor-destino"
                    data-type="select" data-pk="1" data-value="0" data-title=""
                    style="color: rgb(93, 156, 236);">selecione o consultor</a>
                <br>
                <button type="button" class="btn btn-outline-info mr-1 mt-3" onclick="encaminharOportunidades();">
                    <i class="fa fa-exchange-alt mr-1"></i> Encaminhar
                </button>

            </div>


        </div>
        <!-- END Menu de opcoes -->

    </div>
    <!--END Titulo -->

    <div class="block-header block-header-default bg-body-dark">

        <!-- Search Responsável Financeiro -->
        <div class="input-group">
            <input type="text" class="form-control form-control-alt" id="pesquisa"
                placeholder="Digite para pesquisa...">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fa fa-fw fa-search"></i>
                </span>
            </div>
        </div>
        <!-- END Search Responsável Financeiro -->

        <div class="block-options">
            <button type="button" class="btn-block-option mr-2"
                onclick="window.location.href = 'fuv-oportunidades-manage.php'">
                <i class="fa fa-plus mr-1"></i> Nova Proposta
            </button>

            <!-- <button type="button" class="btn-primary mr-2" onclick="encaminharOportunidades();">
                    <i class=""></i> Encaminhar
                </button> -->

            <button type="button" class="btn-block-option" data-toggle="block-option"
                data-action="fullscreen_toggle"></button>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                data-action-mode="demo">
                <i class="si si-refresh"></i>
            </button>
        </div>

    </div>

    <div id="blockPrevistas" class="block-content">
        <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
            <thead>
                <tr class="text-uppercase">
                    <th colspan="2">Clientes</th>
                    <th class="d-none d-md-table-cell" style="width: 250px;">Consultor</th>
                    <th class="d-none d-md-table-cell" style="width: 100px;">Origem</th>
                    <th class="d-none d-md-table-cell" style="width: 280px;">Campanha</th>
                    <th class="d-none d-md-table-cell" style="width: 220px;">Produto</th>
                </tr>
            </thead>

            <tbody id="mybody">
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- Modal Filtros -->
<div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="modalFilter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">


            <div class="block block-themed block-transparent mb-0">

                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Filtros</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="block-content">
                    <div class="block-title mb-3">
                        <div class="row">
                            <div class="col">
                                Status: <a class="editable editable-click" href="javascript:void(0)" id="status"
                                    data-type="select" data-pk="1" data-value="1" data-title="Escolha o Status"
                                    style="color: rgb(93, 156, 236);">carregando...</a>
                                <br>

                                Etapa do Funil: <a class="editable editable-click" href="javascript:void(0)" id="etapa"
                                    data-type="select" data-pk="1" data-value="3" data-title="Escolha a Etapa"
                                    style="color: rgb(93, 156, 236);">carregando...</a>
                                <br>

                                Registros: <a class="editable editable-click" href="javascript:void(0)" id="limite"
                                    data-type="text" data-pk="1" data-value="10" data-title=""
                                    style="color: rgb(93, 156, 236);"></a> de <span class="font-bold" id="total"></span>
                            </div>

                            <div class="col">
                                Origem: <a class="editable editable-click" href="javascript:void(0)" id="origem"
                                    data-type="select" data-pk="1" data-value="1" data-title="Escolha o Status"
                                    style="color: rgb(93, 156, 236);">carregando...</a>
                                <br>
                                Campanha: <a class="editable editable-click" href="javascript:void(0)" id="campanha"
                                    data-type="select" data-pk="1" data-value="3" data-title="Escolha a Etapa"
                                    style="color: rgb(93, 156, 236);">carregando...</a>
                                <br>
                                Produto: <a class="editable editable-click" href="javascript:void(0)" id="produto"
                                    data-type="select" data-pk="1" data-value="3" data-title="Escolha a Etapa"
                                    style="color: rgb(93, 156, 236);">carregando...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-content block-content-full text-right bg-light">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Fechar</button>
                </div>

            </div>

        </div>

    </div>
</div>
<!-- END Modal Filtros -->

<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>
<?php $dm->get_js('js/funcoes/funcoes-gerais.js'); ?>

<script type="text/javascript"
    src="../assets/node_modules/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>

<!--Custom JavaScript -->
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css"
    rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/br.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone.min.js"></script>

<?php require 'inc/_global/views/footer_end.php'; ?>

<script type="text/javascript">
moment().locale("pt-br");

moment.tz.add([
    "America/Sao_Paulo|LMT BRT BRST|36.s 30 20|012121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212121212|-2glwR.w HdKR.w 1cc0 1e10 1bX0 Ezd0 So0 1vA0 Mn0 1BB0 ML0 1BB0 zX0 pTd0 PX0 2ep0 nz0 1C10 zX0 1C10 LX0 1C10 Mn0 H210 Rb0 1tB0 IL0 1Fd0 FX0 1EN0 FX0 1HB0 Lz0 1EN0 Lz0 1C10 IL0 1HB0 Db0 1HB0 On0 1zd0 On0 1zd0 Lz0 1zd0 Rb0 1wN0 Wn0 1tB0 Rb0 1tB0 WL0 1tB0 Rb0 1zd0 On0 1HB0 FX0 1C10 Lz0 1Ip0 HX0 1zd0 On0 1HB0 IL0 1wp0 On0 1C10 Lz0 1C10 On0 1zd0 On0 1zd0 Rb0 1zd0 Lz0 1C10 Lz0 1C10 On0 1zd0 On0 1zd0 On0 1zd0 On0 1C10 Lz0 1C10 Lz0 1C10 On0 1zd0 On0 1zd0 Rb0 1wp0 On0 1C10 Lz0 1C10 On0 1zd0 On0 1zd0 On0 1zd0 On0 1C10 Lz0 1C10 Lz0 1C10 Lz0 1C10 On0 1zd0 Rb0 1wp0 On0 1C10 Lz0 1C10 On0 1zd0",
]);

moment.tz.setDefault('America/Sao_Paulo');


const apiCRM = axios.create({
    baseURL: 'https://www.idental.com.br/api/crm/',
    timeout: 10000,
    headers: {
        'AppAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
    }
});

$(function() {

    $('#status').editable({
        mode: 'inline',
        source: [{
                value: 1,
                text: 'Aguardando Contato'
            },
            {
                value: 2,
                text: 'Aguardando Digitação'
            },
            {
                value: 3,
                text: 'Aguardando Formalização'
            },
            {
                value: 4,
                text: 'Aguardando Averbação'
            }

        ],
        display: function(value, sourceData) {
            var colors = {
                    "": "#98a6ad",
                    1: "#5fbeaa",
                    2: "#5d9cec",
                    3: "#5d9cec"
                },
                elem = $.grep(sourceData, function(o) {
                    return o.value == value;
                });

            if (elem.length) {
                $(this).text(elem[0].text).css("color", colors[value]);
            } else {
                $(this).empty();
            }
        }

    });

    $('#etapa').editable({
        mode: 'inline',
        source: [{
                value: 2,
                text: 'Prospecção'
            },
            {
                value: 3,
                text: 'Qualificação'
            },
            {
                value: 4,
                text: 'Primeira Oferta'
            },
            {
                value: 5,
                text: 'Follow Up'
            },
            {
                value: 6,
                text: 'Negociação'
            },
            {
                value: 7,
                text: 'Fechamento'
            },
            {
                value: 8,
                text: 'Pós Vendas'
            },
            {
                value: 9,
                text: 'Retenção'
            },
            {
                value: 10,
                text: 'Indicação'
            }

        ],
        display: function(value, sourceData) {
            var colors = {
                    "": "#98a6ad",
                    1: "#5fbeaa",
                    2: "#5d9cec",
                    3: "#5d9cec",
                    4: "#5fbeaa",
                    5: "#5d9cec",
                    6: "#5d9cec",
                    7: "#5fbeaa",
                    8: "#5d9cec",
                    9: "#5d9cec",
                    10: "#5d9cec"
                },
                elem = $.grep(sourceData, function(o) {
                    return o.value == value;
                });

            if (elem.length) {
                $(this).text(elem[0].text).css("color", colors[value]);
            } else {
                $(this).empty();
            }
        }

    });

    $('#limite').editable({
        mode: 'inline',
        type: 'text'
    });

    $('#corretor').on('save', function(e, params) {
        getPropostas(params.newValue, null, null, null, null, null, null);
    });

    $('#status').on('save', function(e, params) {
        getPropostas(null, params.newValue, null, null, null, null, null);
    });

    $('#limite').on('save', function(e, params) {
        getPropostas(null, null, params.newValue, null, null, null, null);
    });

    $('#etapa').on('save', function(e, params) {
        getPropostas(null, null, null, params.newValue, null, null, null);
    });

    $('#origem').on('save', function(e, params) {
        getPropostas(null, null, null, null, params.newValue, null, null);
    });

    $('#campanha').on('save', function(e, params) {
        getPropostas(null, null, null, null, null, params.newValue, null);
    });

    $('#produto').on('save', function(e, params) {
        getPropostas(null, null, null, null, null, null, params.newValue);
    });

});

async function getOrigens() {
    const {
        data: origens
    } = await apiCRM.get(`/plataforma/`);


    return origens.map(o => {
        return {
            value: o.id,
            text: o.plataformadoanuncio
        }
    });

};


getOrigens()
    .then(result => {

        result.push({
            value: 0,
            text: 'TODAS'
        });

        // console.log(result);
        /** X-Editable */
        $('#origem').editable({
            mode: 'inline',
            source: result,
            display: function(value, sourceData) {

                // var colors = {
                //         "": "#98a6ad",
                //         1: "#5fbeaa",
                //         2: "#5d9cec",
                //         3: "#5d9cec"
                //     },
                elem = $.grep(sourceData, function(o) {
                    return o.value == value;
                });

                if (elem.length) {
                    $(this).text(elem[0].text); //.css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }

        });

        $('#origem').editable('setValue', '0')
            .editable('option', 'pk', '0');

    })
    .catch(err => {
        console.log("ERRO: ", err)
    });


async function getCampanhas() {
    const {
        data: campanhas
    } = await apiCRM.get(`/campanha/`);

    return campanhas.map(o => {
        return {
            value: o.id,
            text: o.campanha
        }
    });
};

getCampanhas()
    .then(result => {

        result.push({
            value: 0,
            text: 'TODAS'
        });

        // console.log(result);
        /** X-Editable */
        $('#campanha').editable({
            mode: 'inline',
            source: result,
            display: function(value, sourceData) {

                var colors = {
                        "": "#98a6ad",
                        1: "#5fbeaa",
                        2: "#5d9cec",
                        3: "#5d9cec"
                    },
                    elem = $.grep(sourceData, function(o) {
                        return o.value == value;
                    });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }

        });

        $('#campanha').editable('setValue', '0')
            .editable('option', 'pk', '0');

    })
    .catch(err => {
        console.log("ERRO: ", err)
    });

async function getProdutos() {
    const {
        data: produtos
    } = await apiCRM.get(`/produto/`);

    return produtos.map(o => {
        return {
            value: o.id,
            text: o.prestador + " - " + o.produto
        }
    });
};

getProdutos()
    .then(result => {

        result.push({
            value: 0,
            text: 'TODOS'
        });

        // console.log(result);
        /** X-Editable */
        $('#produto').editable({
            mode: 'inline',
            source: result,
            display: function(value, sourceData) {

                var
                    // colors = {
                    //     "": "#98a6ad",
                    //     1: "#5fbeaa",
                    //     2: "#5d9cec",
                    //     3: "#5d9cec"
                    // },
                    elem = $.grep(sourceData, function(o) {
                        return o.value == value;
                    });

                if (elem.length) {
                    $(this).text(elem[0].text); //.css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }

        });

        $('#produto').editable('setValue', '0')
            .editable('option', 'pk', '0');

    })
    .catch(err => {
        console.log("ERRO: ", err)
    });


async function getCorretores() {
    const {
        data: corretores
    } = await apiCRM.get(`/consultor/${userId}`);

    const rede = corretores.rede;

    rede.push({
        value: corretores.id,
        text: corretores.consultor,
        consultorpaiid: corretores.consultorpaiid,
        consultorpai: corretores.consultorpai
    });

    return rede;
}

getCorretores()
    .then(result => {
        /** X-Editable */
        $('#corretor-destino').editable({
            mode: 'inline',
            source: result,
            display: function(value, sourceData) {

                // var colors = {
                //         "": "#98a6ad",
                //         1: "#5fbeaa",
                //         2: "#5d9cec",
                //         3: "#5d9cec"
                //     },
                elem = $.grep(sourceData, function(o) {
                    return o.value == value;
                });

                if (elem.length) {
                    $(this).text(elem[0].text); //.css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }

        });

        $('#corretor').editable({
            mode: 'inline',
            source: result,
            display: function(value, sourceData) {

                // var colors = {
                //         "": "#98a6ad",
                //         1: "#5fbeaa",
                //         2: "#5d9cec",
                //         3: "#5d9cec"
                //     },
                elem = $.grep(sourceData, function(o) {
                    return o.value == value;
                });

                if (elem.length) {
                    $(this).text(elem[0].text); //.css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }

        });

        $('#corretor').editable('setValue', userId)
            .editable('option', 'pk', userId);

        getPropostas();

    })
    .catch(err => {
        console.log("ERRO: ", err)
    });

async function getPropostas(corretor = null, status = null, limite = null,
    etapa = null, origem = null, campanha = null, produto = null) {

    // const filtroCorretor = (corretor == null ?
    //     $('#corretor').data().editable.value : corretor);
    // let filtroStatus = parseInt(status == null ?
    //     $('#status').data().editable.value : status);
    // let filtroLimite = parseInt(limite == null ?
    //     $('#limite').data().editable.value : limite);
    // let filtroEtapa = parseInt(etapa == null ?
    //     $('#etapa').data().editable.value : etapa);
    // let filtroOrigem = parseInt(origem == null ?
    //     $('#origem').data().editable.value : origem);
    // let filtroCampanha = parseInt(campanha == null ?
    //     $('#campanha').data().editable.value : campanha);
    // let filtroProduto = parseInt(produto == null ?
    //     $('#produto').data().editable.value : produto);


    // filtroStatus = `?status=${filtroStatus}`;
    // filtroEtapa = `&etapa=${filtroEtapa}`;
    // filtroOrigem = `&origem=${filtroOrigem}`;
    // filtroCampanha = `&campanha=${filtroCampanha}`;
    // filtroProduto = `&produto=${filtroProduto}`;


    const url =
        `/oportunidade/consultor/68273`;
    // console.log(url);
    $(".propostas").remove();
    // Dashmix.block('state_loading', '.myblock');

    const {
        data: propostas
    } = await apiCRM.get(url);
    // console.log(propostas);

    globalOportunidades = propostas;

    var propostasPai = $("#mybody");

    // if (filtroLimite > propostas.length) {
    $('#limite').editable('setValue', propostas.length);
    // }

    $("#total").html(propostas.length);

    // propostas.slice(0, filtroLimite).map(m => {
    propostas.map(m => {

        const anuncio = m.anuncio ?
            `<br><strong>anúncio: </strong><span class="font-w300">${m.anuncio}</span>` : '';
        const titulo = m.titulo ?
            `<br><strong>título: </strong><span class="font-w300">${m.titulo||''}</span>` : '';
        const midia = m.nomedamidia ?
            `<br><strong>mídia: </strong><span class="font-w300">${m.nomedamidia||''}</span>` : '';

        propostasPai.append(`
        <tr class="bloco propostas">
                        <td colspan="2">
                            <a class="font-w600" href="fuv-oportunidades-manage.php?id=${m.id}">${m.contato}</a>
                            <br>
                            <em>${mascaraDeTelefone(m.telefone)}</em>
                            <br>
                            <span class="badge badge-warning js-popover-enabled" data-toggle="popover"
                                data-placement="top" data-content="" data-original-title="" title="">
                                ${m.etapadofunil}
                            </span>
                            <br>
                            <span class="badge badge-danger js-popover-enabled" data-toggle="popover"
                                data-placement="top" data-content="danger" data-original-title="" title="">
                                ${m.statusdaoportunidade}
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell">
                            <div class="font-size-sm tt-muted mt-1"></div>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="javascript:void(0);">${m.consultor}</a>
                                <br>em <em> ${moment(m.data).format('DD-MM-YYYY HH:mm')}</em>
                            </div>
                        </td>

                        <td class="d-none d-md-table-cell">
                            <span class="font-size-sm">
                                <a href="javascript:void(0);">${m.plataformadoanuncio}</a>
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell text-left">
                            <span class="font-size-sm">
                                <span class="font-w600">${m.campanha}</span>
                                ${anuncio}
                                ${titulo}
                                ${midia}
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell text-right">
                            <span class="font-size-sm">
                                <span class="font-w600">${m.produto}</span>
                                <br>
                                <i class="font-w600">${m.prestador}</i>
                            </span>
                        </td>

                    </tr>
        `);
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

    let globalOportunidades;
});


/**
 * WebSocket
 **/

const ws = new WebSocket('wss://www.idental.com.br/ws/notificacao');
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
    const {
        system,
        user,
        id,
        acao
    } = proposta;


    console.log(msg);
    console.log('teste');
    console.log("response", response);
    console.log("proposta", proposta);

    if (system === 'funil') {

        switch (acao) {
            case 'enviar':
                // liberarEnvio(proposta.idcontato);
                break;
            case 'atualizar':
                atualizaPainel(id);
                break;
            case 'notify':

                Dashmix.helpers('notify', {
                    align: 'center',
                    type: 'success',
                    icon: 'fa fa-check mr-1',
                    message: `${id}, está neste instante fazendo um pedido. Ligue para ele no número ${proposta.data[1].value}`
                });

                break;
        }

    }

};

function setCookie(cname, cvalue, exHours) {
    let expires = "expires=" + moment().add(exHours, 'hours').format();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";

}

async function encaminharOportunidades() {

    // console.log('globalOportunidades', globalOportunidades);
    const corretorDestino = $('#corretor-destino').data().editable.value;
    // console.log('corretorDestino', corretorDestino);

    const body = [];
    globalOportunidades.map(async o => {
        body.push({
            oportunidadeid: o.id
        });
    });

    // console.log('body', body);
    await apiCRM.put(`/oportunidade/consultor/${corretorDestino}`, body);

    getPropostas();

}

async function atualizaPainel(oportunidadeid) {
    const {
        data: [oportunidade]
    } = await apiCRM.get(`/oportunidade/${oportunidadeid}`);
    // console.log(oportunidade);

    // console.log(oportunidade.consultorid, $('#corretor').data().editable.value);

    if (oportunidade.consultorid === $('#corretor').data().editable.value) {

        globalOportunidades.push(oportunidade);

        var propostasPai = $("#mybody");

        // if (filtroLimite > propostas.length) {
        $('#limite').editable('setValue', globalOportunidades.length);
        // }

        $("#total").html(globalOportunidades.length);


        // console.log(m);
        propostasPai.append(`
        <tr class="bloco propostas">
                        <td colspan="2">
                            <a class="font-w600" href="fuv-oportunidades-manage.php?id=${oportunidade.id}">${oportunidade.contato}</a>
                            <span class="badge badge-secondary">NOVO</span>
                            <br>
                            <em>${mascaraDeTelefone(oportunidade.telefone)}</em>
                            <br>
                            <span class="badge badge-warning js-popover-enabled" data-toggle="popover"
                                data-placement="top" data-content="" data-original-title="" title="">
                                ${oportunidade.etapadofunil}
                            </span>
                            <br>
                            <span class="badge badge-danger js-popover-enabled" data-toggle="popover"
                                data-placement="top" data-content="danger" data-original-title="" title="">
                                ${oportunidade.statusdaoportunidade}
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell">
                            <div class="font-size-sm tt-muted mt-1"></div>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="javascript:void(0);">${oportunidade.consultor}</a>
                                <br>em <em> ${moment(oportunidade.data,'YYYY-MM-DD').format('DD-MM-YYYY')}</em>
                            </div>
                        </td>

                        <td class="d-none d-md-table-cell">
                            <span class="font-size-sm">
                                <a href="javascript:void(0);">${oportunidade.plataformadoanuncio}</a>
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell text-right">
                            <span class="font-size-sm">
                                <span class="font-w600">${oportunidade.campanha}</span>
                                <br>
                                <em>Anúncio <a href="javascript:void(0)">${oportunidade.titulo}</a></em>
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell text-right">
                            <span class="font-size-sm">
                                <span class="font-w600">${oportunidade.produto}</span>
                                <br>
                                <i class="font-w600">${oportunidade.prestador}</i>
                            </span>
                        </td>

                    </tr>
        `);



        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();

        $(function() {
            Dashmix.helpers('notify', {
                align: 'center',
                type: 'success',
                icon: 'fa fa-check mr-1',
                message: `${oportunidade.contato} está se cadastrando agora!`
            });

        });
    }
}
</script>