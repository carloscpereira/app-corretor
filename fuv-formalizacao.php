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
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Formalizando Propostas</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Propostas</li>
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
            <h3 class="block-title">Propostas</h3>

            <!-- Menu de opcoes -->
            <div class="block-options">
                <a class="editable editable-click" href="javascript:void(0)" id="status" data-type="select" data-pk="1"
                    data-value="3" data-title="Escolha o Status" style="color: rgb(93, 156, 236);">carregando...</a>
            </div>
            <!-- END Menu de opcoes -->

        </div>
        <!--END Titulo -->

        <div class="block-header block-header-default bg-body-dark">

            <!-- Search Responsável Financeiro -->
            <div class="input-group">
                <input type="text" class="form-control form-control-alt" id="pesquisa"
                    placeholder="Buscar pelo Responsável Financeiro...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div>
            <!-- END Search Responsável Financeiro -->

            <div class="block-options">
                <button type="button" class="btn-block-option mr-2"
                    onclick="window.location.href = 'fuv-formalizacao-manage.php'">
                    <i class="fa fa-plus mr-1"></i> Nova Proposta
                </button>
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
                        <th colspan="2">CLIENTES</th>
                        <th class="d-none d-md-table-cell" style="width: 250px;">Produto</th>
                        <th class="d-none d-md-table-cell" style="width: 120px;">Renda Familiar</th>
                        <th class="d-none d-md-table-cell" style="width: 120px;">Margem Atual</th>
                        <th class="d-none d-md-table-cell" style="width: 120px;">Limite CredCESTA</th>
                        <th style="width: 120px;">Valor Solicitado</th>
                    </tr>
                </thead>

                <tbody id="mybody">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal SOLICITAR ASSINATURA -->
<div class="modal fade" id="modalSignature" tabindex="-1" role="dialog" aria-labelledby="modalSignature"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-content">
                    <div class="blockSignature card">
                        <div class="card-body">
                            <h4 class="card-title">Enviar proposta para assinatura</h4>
                            <h6 class="card-subtitle">
                                <code>Escolha a forma de envio da proposta para assinatura. <br>Será enviado para o email e celular informado. Caso deseje enviar para outro numero/email, altere a informação na proposta.</code>
                            </h6>
                            <hr class="m-t-0 m-b-20">

                            <form id="form-envemailboleto" method="post" onsubmit="return false;">
                                <input type="hidden" id="signatureNome">
                                <input type="hidden" id="signatureCodex">
                                <input type="hidden" id="signatureIdcontato">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 form-group">
                                                    <small
                                                        class="form-control-feedback font-italic font-bold">Email</small>
                                                    <input id="signatureEmail" name="signatureEmail"
                                                        class="form-control" maxlength="60" disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <small
                                                        class="form-control-feedback font-italic font-bold">Celular</small>
                                                    <input id="signatureCelular" name="signatureCelular"
                                                        class="form-control" disabled>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group px-0">
                                    <button class="btn btn-info waves-effect waves-light"
                                        onclick="enviarSignaturePorSMS();">Envio por E-mail e SMS</button>
                                    <button class="btn btn-info waves-effect waves-light"
                                        onclick="enviarSignaturePorWhatsApp();">Envio por E-mail e WhatsApp</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal SOLICITAR ASSINATURA -->

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
            },
            {
                value: 5,
                text: 'Aguardando Pagamento'
            },
            {
                value: 6,
                text: 'Aguardando Comissão'
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


    $('#status').on('save', function(e, params) {
        getPropostas(params.newValue);
    });

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
        $('#corretor').editable({
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

        $('#corretor').editable('setValue', userId)
            .editable('option', 'pk', userId);
        getPropostas();

    })
    .catch(err => {
        console.log("ERRO: ", err)
    });

async function getPropostas(status = null) {

    let filtroStatus = String(status == null ? $('#status').data().editable.value : status);


    $(".propostas").remove();
    // Dashmix.block('state_loading', '.myblock');

    const {
        data: propostas
    } = await apiCRM.get(`/oportunidade/consultor/1`);
    console.log(propostas);

    var propostasPai = $("#mybody");

    propostas.filter(p => p.statusdaoportunidadeid === filtroStatus).map(m => {

        // console.log(m);
        propostasPai.append(`
        <tr class="bloco propostas">
                        <td colspan="2">
                            <a class="font-w600" href="fuv-formalizacao-manage.php?id=${m.id}">${m.contato}</a>
                            <span class="badge badge-danger js-popover-enabled" data-toggle="popover"
                                data-placement="top" data-content="danger" data-original-title="" title="">
                                ${m.statusdaoportunidade}
                            </span>

                            <div class="font-size-sm tt-muted mt-1"></div>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="javascript:void(0);">${m.consultor}</a> em <em>${moment(m.data).format('MMMM, DD - YYYY')}</em>
                            </div>
                        </td>

                        <td class="d-none d-md-table-cell">
                            <span class="font-size-sm">
                                <a href="javascript:void(0);">${m.produto}</a>
                                <br>
                                <em>${m.prestador}</em>
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell text-right">
                            <span class="font-size-sm">
                                <i class="font-w600">R$ ${m.rendafamiliar}</i>
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell text-right">
                            <span class="font-size-sm">
                                <i class="font-w600">R$ ${m.margem_atual||'0,00'}</i>
                            </span>
                        </td>

                        <td class="d-none d-md-table-cell text-right">
                            <span class="font-size-sm">
                                <i class="font-w600">R$ ${m.limite_credcerta}</i>
                            </span>
                        </td>

                        <td class="d-none d-table-cell text-right">
                            <span class="font-size-sm">
                                <i class="font-w600">R$ ${m.valor}</i>
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
});


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
</script>