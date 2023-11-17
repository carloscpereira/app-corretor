<?php include('../funcoes/corretor/funcoes-recepcao-de-vendas.php'); ?>
<?php include('../funcoes/funcoes.php'); ?>

<?php

if ($_COOKIE['logado'] != NULL) {
    $idvendedor = $_COOKIE['idvendedor'];
} else {
    header("Location: login.php");
}

?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/raty-js/jquery.raty.css'); ?>

<!-- xeditable css -->
<link href="../assets/node_modules/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />


<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Recepção de Vendas</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="">Relacionamento</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Contratos Ativos</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Topics -->
    <div class="block" id="block-lista">
        <div class="block-header block-header-default">
            <!-- Search Responsável Financeiro -->
            <div class="input-group">
                <input type="text" class="form-control" id="pesquisa" placeholder="localizar contrato...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div>

            <!-- END Search Responsável Financeiro -->

            <div class="block-options">
                <a class="periodo" href="javascript:void(0)" id="periodo" data-type="select" data-pk="1" data-value="2"
                    data-title="Escolha a Forma de Pagamento" class="editable editable-click"
                    style="color: rgb(152, 166, 173);">escolha...
                </a>

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
                        <th colspan="2">Contratos</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 180px;">Contato</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 200px;">Produto</th>
                        <th class="d-none d-md-table-cell" style="width: 130px;">Valor</th>
                        <th style="width: 130px;"></th>
                    </tr>
                </thead>
                <tbody id="body-contratos">
                </tbody>
            </table>
            <!-- END Topics -->

        </div>
    </div>
    <div id="block-detalhe" style="display:none;">
        <div class="block block-fx-shadow">
            <div class="block-header block-header-default">
                <button type="button" class="btn-block-option"><a href="javascript:void(0);"
                        onclick="verListaContrato();">
                        <i class="si si-logout mr-1"></i> Voltar para lista de contratos</a>
                </button>

            </div>

            <div class="block-content">
                <div class="p-sm-0 p-xl-0">

                    <div class="row">
                        <div class="col-4 text-muted"><small><b>RESPONSÁVEL PELO CONTRATO</b></small></div>
                        <div class="col-3 text-muted"><small><b>VENDEDOR</b></small></div>
                        <div class="col-3 text-muted"><small><b>ASSINATURA</b></small></div>
                        <div class="col-2 text-muted"><small><b>VALOR TOTAL</b></small></div>
                    </div>

                    <div class="row">
                        <div id="responsavel" class="col-4 font-w600 mb-1 text-uppercase"><small>Ana Patricia Batista
                                Vieira da Anunciacao</small></div>
                        <div id="vendedor" class="col-3 font-w600 mb-1 text-uppercase"><small>ANDREA SOUZA</small></div>
                        <div id="tipo-proposta" class="col-3 font-w600 mb-1 text-uppercase"><small>DIGITAL
                                (28/08/2020)</b></small></div>
                        <div id="valor-total" class="col-2 font-w600 mb-1 text-uppercase"><small>R$ 120,00</small></div>
                    </div>

                    <h4 class="content-heading"></h4>

                    <div class="row">
                        <div class="col-2 text-muted"><small><b>PLANO PARA</b></small></div>
                        <div class="col-6 text-muted"><small><b>EMPRESA/PREFEITURA/REPARTIÇÃO PÚBLICA</b></small></div>
                        <div class="col-2 text-muted"><small><b>PAGAMENTO</b></small></div>
                        <div class="col-2 text-muted"><small><b>VENCIMENTO</b></small></div>
                    </div>

                    <div class="row">
                        <div id="tipo-convenio" class="col-2 font-w600 mb-1 text-uppercase"><small>PESSOA FÍSICA</small>
                        </div>
                        <div id="convenio" class="col-6 font-w600 mb-1 text-uppercase"><small>PREFEITURA MUNICIPAL DE
                                CAMAÇARI</small></div>
                        <div id="forma-pagamento" class="col-2 font-w600 mb-1 text-uppercase"><small>BOLETO</small>
                        </div>
                        <div id="vencimento" class="col-2 font-w600 mb-1 text-uppercase"><small>10/mes</small></div>
                    </div>

                    <h4 class="content-heading"></h4>

                    <div class="row">
                        <div class="col-7 text-muted"><small><b>BENEFICIARIO</b></small></div>
                        <div class="col-3 text-muted"><small><b>PLANO</b></small></div>
                        <div class="col-2 text-muted"><small><b>VALOR</b></small></div>
                    </div>

                    <div id="beneficiarios">
                        <div class="row">
                            <div class="col-7 font-w600 mb-1 text-uppercase">Ana Patricia Batista Vieira da Anunciacao
                                (Titular)</div>
                            <div class="col-3 font-w600 mb-1 text-uppercase">MAXI ORTO</div>
                            <div class="col-2 font-w600 mb-1 text-uppercase">R$ 35,00</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-header block-header-default">
                <h2></h2>
                <div class="block-options">
                    <!-- Print Page functionality is initialized in Helpers.print() -->
                    <button type="button" id="btn-imprimir1" class="btn-block-option"
                        onclick="Dashmix.helpers('print');">
                        <i class="si si-control-rewind mr-3"></i>
                    </button>


                    <button type="button" id="btn-imprimir1" class="btn-block-option"
                        onclick="Dashmix.helpers('print');">
                        <i class="si si-dislike mr-1"></i>
                    </button>

                    <button type="button" id="btn-imprimir1" class="btn-block-option"
                        onclick="Dashmix.helpers('print');">
                        <i class="si si-like mr-1"></i>
                    </button>

                </div>
            </div>

            <!-- END Invoice -->
        </div>

    </div>
    <!-- END Topics -->
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/raty-js/jquery.raty.js'); ?>

<!-- Page JS Code -->
<?php $dm->get_js('js/pages/be_comp_rating.min.js'); ?>
<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/pt-br.min.js"></script>

<script type="text/javascript"
    src="../assets/node_modules/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>


<script type="text/javascript">
$(function() {
    loadContratosAtivos(2);
    /** Funções X-Editable */
    $('.periodo').editable({
        mode: 'inline',
        source: [{
            value: 0,
            text: 'Todos'
        }, {
            value: 1,
            text: 'Hoje'
        }, {
            value: 2,
            text: 'Nesta Semana'
        }, {
            value: 3,
            text: 'Neste Mês'
        }, {
            value: 4,
            text: 'Neste Trimestre'
        }, {
            value: 5,
            text: 'Neste Semestre'
        }, {
            value: 6,
            text: 'Neste Ano'
        }],
        display: function(value, sourceData) {
            var colors = {
                    "": "#98a6ad",
                    1: "#5fbeaa",
                    2: "#5d9cec",
                    3: "#70c8a7"
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

    $('#periodo').on('save', function(e, params) {
        loadContratosAtivos(params.newValue);
    });

    /** FIM Funções X-Editable */
});
</script>


<?php require 'inc/_global/views/footer_end.php'; ?>

<script>
function loadContratosAtivos(dataPeriodo = null, tpproposta = null) {

    const filtrodata = (dataPeriodo == null ? $('#periodo').data().editable.value : dataPeriodo);
    const periodo = getPeriodo(filtrodata);


    Dashmix.block('state_loading', '.myblock');

    var recebidasPai = $("#body-contratos");

    $.ajax({
        type: 'GET',
        url: 'retorna-contratos-ativos.php',
        data: {
            periodo: periodo,
            tipoproposta: tpproposta
        },
        success: function(response) {

            dados = response;
            contratos = JSON.parse(dados);
            // console.log(dados);
            // dados =  response.filter(el => el.formapagamento_modalidadepagamentoid!=2);
            // dados =  response.filter(el => el.contrato_id==46341);
            // console.log(dados)

            $(".tab-contratos").remove();

            if (dados.length <= 0) {
                Dashmix.block('state_normal', '.myblock');
                return;
            }

            contratos.forEach((i) => {

                let operadora = i.operadora;

                let theme = i.operadora == 'Idental' ? 'info' : 'success';

                let idvendedor = i.idvendedor;
                let vendedor = primeiroUltimoNome(primeira_maiuscula(i.vendedor));
                let idcontato = i.idcontato;
                let titular = primeira_maiuscula(i.titular);
                let responsavel = primeira_maiuscula(i.responsavel);
                let idtipodeproposta = i.idtipodeproposta;
                let telefone = i.telefone;
                let email = i.email;
                let idconvenio = i.idconvenio;
                let convenio = i.convenio;
                let dtcadastro = i.dtcadastro;

                moment().locale("pt-br");
                let dtativacao = moment(i.dtativacao, "YYYY-MM-DD").format("MMMM DD, YYYY");

                let idformadepagamento = i.idformadepagamento;
                let formadepagamento = primeira_maiuscula(i.formadepagamento);
                let idproduto = i.idproduto;
                let produto = primeira_maiuscula(i.produto);
                let beneficiarios = i.beneficiarios;
                let valor = 'R$ ' + mascaraValor(i.valor);

                recebidasPai.append(`<tr class="bloco tab-contratos">
                        <td colspan="2">
                            <a class="font-w600" href="javascript:void(0);" onclick="verDetalheContrato(${idcontato})">${responsavel}</a>
                            <div class="font-size-sm text-muted mt-0">
                                <a href="#">${vendedor}</a> em <em>${dtativacao}</em>
                            </div>
                            <div class="font-size-sm text-muted mt-0">
                                ${operadora}
                            </div>
                            <div class="js-rating" data-cancel="false" data-score="0"></div>

                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <span class="font-w600">${mascaraDeTelefone(telefone)}</span>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                        <span class="font-size-sm"><a href="#">${produto}</a><br><em>${formadepagamento}</em></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                        <span class="font-w600">${valor}</span>
                        </td>
                        <td>
                        <a href="javascript:void(0);" onclick="enviarLinkPeloWhatsApp(${telefone});"> <i class="fa fa-2x fa-mail-bulk text-info"></i></a>
                        <a href="javascript:void(0);" onclick="gravarPosVendas(${idcontato});"><i class="fa fa-2x fa-check-square text-success ml-2"></i></a>
                        </td>
                    </tr>
                    `);
            });

            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
            Dashmix.block('state_normal', '.myblock');
        }
    });

}

function gravarPosVendas(idcontrato) {

    $.ajax({
        type: 'GET',
        url: 'gravar-posvendas.php',
        data: {
            idcontrato: idcontrato
        },
        success: function(response) {
            loadContratosAtivos();
            Dashmix.helpers('notify', {
                align: 'center',
                type: 'success',
                icon: 'fa fa-check mr-1',
                message: 'Avaliação bem sucecida!'
            });

        }
    });

}

function enviarLinkPeloWhatsApp(celular) {
    let mensagem =
        `Para acessar SEU portal, onde terá acesso a carteirinha, rede credenciada, promoções e muito mais, acesse: idental.com.br/associado e clique em PRIMEIRO ACESSO.`;
    let url = `https://api.whatsapp.com/send?phone=55${celular}&text=${mensagem}`;
    window.open(url, "_blank");
}

function verDetalheContrato(idcontrato) {

    // var recebidasPai = $("#body-contratos");

    $.ajax({
        type: 'GET',
        url: 'retorna-detalhe-contrato.php',
        data: {
            idproposta: idcontrato
        },
        success: function(response) {

            dados = response;
            contratos = JSON.parse(dados);
            // console.log(dados);
            // dados =  response.filter(el => el.formapagamento_modalidadepagamentoid!=2);
            // dados =  response.filter(el => el.contrato_id==46341);
            // console.log(dados)

            // $(".tab-contratos").remove();

            if (dados.length <= 0) {
                Dashmix.block('state_normal', '.myblock');
                return;
            }

            contratos.forEach((i) => {

                let operadora = i.operadora;

                let theme = i.operadora == 'Idental' ? 'info' : 'success';

                let idvendedor = i.idvendedor;
                let vendedor = primeiroUltimoNome(primeira_maiuscula(i.vendedor));
                let idcontato = i.idcontato;
                let titular = primeira_maiuscula(i.titular);
                let responsavel = primeira_maiuscula(i.responsavel);
                let idtipodeproposta = i.idtipodeproposta;
                let telefone = i.telefone;
                let email = i.email;
                let idconvenio = i.idconvenio;
                let convenio = i.convenio;
                let dtcadastro = i.dtcadastro;

                moment().locale("pt-br");
                let dtativacao = moment(i.dtativacao, "YYYY-MM-DD").format("MMMM DD, YYYY");

                let idformadepagamento = i.idformadepagamento;
                let formadepagamento = primeira_maiuscula(i.formadepagamento);
                let idproduto = i.idproduto;
                let produto = primeira_maiuscula(i.produto);
                let beneficiarios = i.beneficiarios;
                let valor = 'R$ ' + mascaraValor(i.valor);

                recebidasPai.append(`<tr class="bloco tab-contratos">
                        <td colspan="2">
                            <a class="font-w600" href="javascript:void(0);" onclick="verDetalheContrato(${idcontato})">${responsavel}</a>
                            <div class="font-size-sm text-muted mt-0">
                                <a href="#">${vendedor}</a> em <em>${dtativacao}</em>
                            </div>
                            <div class="font-size-sm text-muted mt-0">
                                ${operadora}
                            </div>
                            <div class="js-rating" data-cancel="false" data-score="0"></div>

                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <span class="font-w600">${mascaraDeTelefone(telefone)}</span>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                        <span class="font-size-sm"><a href="#">${produto}</a><br><em>${formadepagamento}</em></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                        <span class="font-w600">${valor}</span>
                        </td>
                        <td>
                        <a href="javascript:void(0);" onclick="enviarLinkPeloWhatsApp(${telefone});"> <i class="fa fa-2x fa-mail-bulk text-info"></i></a>
                        <a href="javascript:void(0);" onclick="gravarPosVendas(${idcontato});"><i class="fa fa-2x fa-check-square text-success ml-2"></i></a>
                        </td>
                    </tr>
                    `);
            });

            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
            Dashmix.block('state_normal', '.myblock');
        }
    });



    $("#responsavel").html("<small>Carlos Cesar S Pereira</small>");

    $("#block-detalhe").show();
    $("#block-lista").fadeOut();

}

function verListaContrato() {
    $("#block-lista").show();
    $("#block-detalhe").fadeOut();

}

function getPeriodo(filtro) {

    // text: 'Todos'
    // text: 'Hoje'
    // text: 'Nesta Semana'
    // text: 'Neste Mês'
    // text: 'Neste Trimestre'
    // text: 'Neste Semestre'
    // text: 'Neste Ano'


    let retorno = null;
    let data = new Date();
    filtro = String(filtro);

    switch (filtro) {
        case '0':
            /**Todos */
        case '1':
            /**Hoje */
            retorno = " = '" + formataData(data, false) + "'";
            break;
        case '2':
            /**nesta semana */
            let firstDayOfWeek = new Date();
            firstDayOfWeek.setDate(firstDayOfWeek.getDate() - (firstDayOfWeek.getDay()));
            retorno = " between '" + formataData(firstDayOfWeek) + "' and '" + formataData(data) + "'";
            break;
        case '3':
            /**neste mes */
            const data_inicio_mes = '01/' +
                ("0" + (data.getMonth() + 1)).substr(-2) + '/' +
                data.getFullYear();
            retorno = " between '" + data_inicio_mes + "' and '" + formataData(data, false) + "'";
            break;
        case '6':
            /**neste ano */
            const data_inicio_ano = '01/01/' +
                data.getFullYear();
            retorno = " between '" + data_inicio_ano + "' and '" + formataData(data, false) + "'";

            break;
    }
    return retorno;
}

function formataData(data, mesano = null, formato = 2) {
    var datafinal = new Date(data);
    var separator = null;

    if (formato == 2) {
        separator = "/";
    } else {
        separator = "-";
    }

    if (!mesano) {
        datafinal = ("0" + datafinal.getDate()).substr(-2) + separator +
            ("0" + (datafinal.getMonth() + 1)).substr(-2) + separator + datafinal.getFullYear();
    } else {
        datafinal = ("0" + (datafinal.getMonth() + 1)).substr(-2) + separator + datafinal.getFullYear();
    }
    return datafinal;
}

function mascaraValor(valor) {

    valor = parseFloat(valor);
    valor = valor.toFixed(2);
    valor = valor.toString().replace(/\D/g, "");
    valor = valor.toString().replace(/(\d)(\d{8})$/, "$1.$2");
    valor = valor.toString().replace(/(\d)(\d{5})$/, "$1.$2");
    valor = valor.toString().replace(/(\d)(\d{2})$/, "$1,$2");
    return valor;
}

function primeira_maiuscula(text) {

    var words = text.toLowerCase().split(" ");

    for (var a = 0; a < words.length; a++) {
        if (
            (words[a] != "de") &&
            (words[a] != "da") &&
            (words[a] != "das") &&
            (words[a] != "do") &&
            (words[a] != "em") &&
            (words[a] != "no") &&
            (words[a] != "nos") &&
            (words[a] != "na") &&
            (words[a] != "nas") &&
            (words[a] != "e") &&
            (words[a] != "com") &&
            (words[a] != "para") &&
            (words[a] != "dos") &&
            (words[a] != "") &&
            (words[a] != " ")
        ) {
            var w = words[a];
            words[a] = w[0].toUpperCase() + w.slice(1);
        }
    }
    return words.join(" ");
}


function primeiroUltimoNome(nome) {
    let fullName = nome.split(' '),
        firstName = fullName[0],
        lastName = fullName[fullName.length - 1];
    return firstName + " " + lastName;
}

function mascaraDeTelefone(telefone) {


    const textoAtual = telefone;
    const configCel1 = textoAtual.length === 12; //071 9 9118-6042
    const configCel2 = (textoAtual.length === 11 &&
        textoAtual.slice(0, 2) != '0'); //  71 9 8148-6318
    const configCel3 = (textoAtual.length === 11 &&
        textoAtual.slice(0, 2) === '0'); // 071 8148-6318

    const configCel4 = (textoAtual.length === 10); // 71 8148-6318

    let textoAjustado;

    if (configCel1) {
        const parte1 = textoAtual.slice(1, 3);
        const parte2 = textoAtual.slice(3, 4);
        const parte3 = textoAtual.slice(4, 8);
        const parte4 = textoAtual.slice(8);
        textoAjustado = `(${parte1}) ${parte2} ${parte3}-${parte4}`
    } else if (configCel2) {
        const parte1 = textoAtual.slice(0, 2);
        const parte2 = textoAtual.slice(2, 3);
        const parte3 = textoAtual.slice(3, 7);
        const parte4 = textoAtual.slice(7);
        textoAjustado = `(${parte1}) ${parte2} ${parte3}-${parte4}`
    } else if (configCel3) {
        const parte1 = textoAtual.slice(1, 3);
        const parte2 = textoAtual.slice(3, 7);
        const parte3 = textoAtual.slice(7);
        textoAjustado = `(${parte1}) ${parte2}-${parte3}`
    } else if (configCel4) {
        const parte1 = textoAtual.slice(0, 2);
        const parte2 = textoAtual.slice(2, 6);
        const parte3 = textoAtual.slice(6);
        textoAjustado = `(${parte1}) ${parte2}-${parte3}`

    } else {
        const parte1 = textoAtual.slice(0, 5);
        const parte2 = textoAtual.slice(5, 9);
        textoAjustado = `${parte1}-${parte2}`
    }
    return textoAjustado;
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