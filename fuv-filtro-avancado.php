<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<?php $dm->get_css('js/plugins/select2/css/select2.min.css'); ?>
<?php $dm->get_css('js/plugins/ion-rangeslider/css/ion.rangeSlider.css'); ?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill fw-light mt-2 mb-0 mb-sm-2">Filtro Avançado</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Leads</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
    <div class="row">
        <div class="col-md-4 order-md-0">
            <!-- Job Summary -->
            <div class="block block-rounded myblock">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Filtros</h3>
                    <button type="button" id="btnFilter" class="btn-block-option" onclick="setFilter();" disabled>
                        <i id="icoFilter" class="si fa-2x si-control-play text-gray"></i></button>
                </div>

                <div class="block-content">
                    <ul class="fa-ul list-icons">
                        <li>
                            <div class="custom-checkbox custom-control-primary">
                                <input type="checkbox" class="custom-control-input" id="chkMargemAtual"
                                    name="chkMargemAtual">
                                <label class="custom-control-label text-gray font-italic" id="lblMargemAtual"
                                    for="chkMargemAtual">Margem
                                    Atual (R$)</label>
                            </div>
                            <div class="form-group row mt-1">
                                <div class="col-6">
                                    <input type="text" id="margemAtualInicio" class="form-control" value="0,00"
                                        disabled>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="margemAtualFim" class="form-control" value="0,00" disabled>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="custom-checkbox custom-control-primary">
                                <input type="checkbox" class="custom-control-input" id="chkMargemUsada"
                                    name="chkMargemUsada">
                                <label class="custom-control-label text-gray font-italic" id="lblMargemUsada"
                                    for="chkMargemUsada">Margem
                                    Usada (%)</label>
                            </div>
                            <div class="form-group row mt-1">
                                <div class="col-6">
                                    <input type="text" id="margemUsadaInicio" class="form-control" value="0,00"
                                        disabled>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="margemUsadaFim" class="form-control" value="0,00" disabled>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="custom-checkbox custom-control-primary">
                                <input type="checkbox" class="custom-control-input" id="chkLimiteTotal"
                                    name="chkLimiteTotal">
                                <label class="custom-control-label text-gray font-italic" id="lblLimiteTotal"
                                    for="chkLimiteTotal">Limite
                                    Total (R$)</label>
                            </div>
                            <div class="form-group row mt-1">
                                <div class="col-6">
                                    <input type="text" id="limiteTotalInicio" class="form-control" value="0,00"
                                        disabled>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="limiteTotalFim" class="form-control" value="0,00" disabled>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="custom-checkbox custom-control-primary">
                                <input type="checkbox" class="custom-control-input" id="chkSaldoDevedor"
                                    name="chkSaldoDevedor">
                                <label class="custom-control-label text-gray font-italic" id="lblSaldoDevedor"
                                    for="chkSaldoDevedor">Saldo
                                    Devedor (R$)</label>
                            </div>
                            <div class="form-group row mt-1">
                                <div class="col-6">
                                    <input type="text" id="saldoDevedorInicio" class="form-control" value="0,00"
                                        disabled>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="saldoDevedorFim" class="form-control" value="0,00" disabled>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="custom-checkbox custom-control-primary">
                                <input type="checkbox" class="custom-control-input" id="chkLimiteDisponivel"
                                    name="chkLimiteDisponivel">
                                <label class="custom-control-label text-gray font-italic" id="lblLimiteDisponivel"
                                    for="chkLimiteDisponivel">Limite
                                    Disponível (R$)</label>
                            </div>
                            <div class="form-group row mt-1">
                                <div class="col-6">
                                    <input type="text" id="limiteDisponivelInicio" class="form-control" value="0,00"
                                        disabled>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="limiteDisponivelFim" class="form-control" value="0,00"
                                        disabled>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Job Summary -->
        </div>
        <div class="col-md-8 order-md-1">
            <!-- Job Description -->
            <div class="block block-rounded myblock">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Leads <small class="text-muted">(0 registros)</small></h3>
                    <div class="dropdown">
                        <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="fa fa-2x fa-ellipsis-h"></i></button>
                        <div class="dropdown-menu dropdown-menu-right" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="escolherArquivo();">
                                <i class="far fa-fw fa-bell mr-1"></i> Download de CPF's
                            </a>
                            <div role="separator" class="dropdown-divider"></div>

                            <a class="dropdown-item" href="javascript:void(0)" onclick="downloadXls();">
                                <i class="far fa-fw fa-envelope mr-1"></i> Download de Celulares
                            </a>

                        </div>
                    </div>

                </div>
                <div class="block-content">
                    <table class="table table-striped table-borderless table-vcenter">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2">Contatos</th>
                                <th class="d-none d-md-table-cell text-center" style="width: 150px;">Margem Atual</th>
                                <th class="d-none d-md-table-cell" style="width: 150px;">Margem Usada (%)</th>
                                <th style="width: 150px;">Limite Total (R$)</th>
                                <th style="width: 150px;">Lim Disponível (%)</th>
                            </tr>
                        </thead>
                        <tbody id="myBody">
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END Job Description -->

        </div>
    </div>
</div>
<!-- END Page Content -->


<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
<?php $dm->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>
<?php $dm->get_js('js/funcoes/funcoes-gerais.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.core.min.js"></script>
<?php $dm->get_js('js/plugins/jsontoexcel/FileSaver.js'); ?>
<?php $dm->get_js('js/plugins/jsontoexcel/jhxlsx.js'); ?>
<?php $dm->get_js('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/plentz/jquery-maskmoney@master/dist/jquery.maskMoney.min.js"></script>


<script>
jQuery(function() {
    Dashmix.helpers(['select2', 'masked-inputs', 'rangeslider']);
});
</script>

<?php require 'inc/_global/views/footer_end.php'; ?>


<script>
const apiCRM = axios.create({
    baseURL: 'https://www.idental.com.br/api/crm/',
    headers: {
        'appAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
    }
});

let originalContacts = [];
let contatcsFiltered = [];

$("#margemAtualInicio").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#margemAtualFim").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#margemUsadaInicio").maskMoney({
    prefix: '% ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#margemUsadaFim").maskMoney({
    prefix: '% ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#limiteTotalInicio").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#limiteTotalFim").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#saldoDevedorInicio").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#saldoDevedorFim").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#limiteDisponivelInicio").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#limiteDisponivelFim").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});




const loadContacts = async () => {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    var myBody = $('#myBody');

    $(".newTd").remove();

    contatcsFiltered.forEach(function(e) {

        let telefones = '';
        e.telefones.forEach(t =>
            telefones +=
            `<span class="font-w600"><a class="text-secondary">${mascaraDeTelefone(t.numero)}</a> <a href="javascript:void(0);" onclick="enviarMensagemWhatsApp(${e.id},'${t.numero}');"><i class="fab fa-whatsapp text-success"></i></a></span></br>`
        );

        myBody.append(`
            <tr id="tr${e.id}" class="newTd">
                    <td colspan="2">
                        <a class="font-w600 text-dark" href="javascript:void(0);">${e.nome}</a>
                        <div class="font-size-sm font-w600 text-muted mb-2">
                            ${e.enderecos[0].cidade}
                        </div>
                    </td>
                    <td class="d-none d-md-table-cell text-right">                            
                        ${e.margem_atual||' - '}
                    </td>
                    <td class="d-none d-md-table-cell">
                    <span class="font-w600">${e.margem_usada||' - '}</span>
                    </td>
                    <td>
                    <span class="font-w600">${e.limite_credcerta||' - '}</span>
                    </td>
                    <td>
                    <span class="font-w600">${e.disponivel_credcerta||' - '}</span>
                    </td>

                </tr>
            `);
    });

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock');
    });
}

function downloadXls() {

    var dataSheet = [
        [{
            "text": "id"
        }, {
            "text": "cpf"
        }],
    ];

    contatcsFiltered.forEach(function(item, index) {
        dataSheet.push([{
                "text": item.id
            },
            {
                "text": item.cpf
            },
        ]);
    });

    var tableData = [{
        "sheetName": "Sheet1",
        "data": dataSheet,
    }];

    console.log(tableData);

    var options = {
        fileName: "validar margem"
    };
    Jhxlsx.export(tableData, options);
}

const checkButonPlayFilter = () => {
    if (
        $("#chkMargemAtual").is(':checked') ||
        $("#chkMargemUsada").is(':checked') ||
        $("#chkLimiteTotal").is(':checked') ||
        $("#chkSaldoDevedor").is(':checked') ||
        $("#chkLimiteDisponivel").is(':checked')
    ) {
        $("#icoFilter").removeClass("text-gray");
        $("#btnFilter").attr('disabled', false);
    } else {
        $("#icoFilter").addClass("text-gray");
        $("#btnFilter").attr('disabled', true);
    }
}


$('input[type="checkbox"]').change(function() {

    switch (this.id) {
        case "chkMargemAtual":
            if (this.checked) {
                $("#lblMargemAtual").removeClass("font-italic text-gray");
                $("#margemAtualInicio").attr("disabled", false);
                $("#margemAtualFim").attr("disabled", false);
            } else {
                $("#lblMargemAtual").addClass("font-italic text-gray");
                $("#margemAtualInicio").attr("disabled", true);
                $("#margemAtualFim").attr("disabled", true);
            }
            break;
        case "chkMargemUsada":
            if (this.checked) {
                $("#lblMargemUsada").removeClass("font-italic text-gray");
                $("#margemUsadaInicio").attr("disabled", false);
                $("#margemUsadaFim").attr("disabled", false);
            } else {
                $("#lblMargemUsada").addClass("font-italic text-gray");
                $("#margemUsadaInicio").attr("disabled", true);
                $("#margemUsadaFim").attr("disabled", true);
            }
            break;
        case "chkLimiteTotal":
            if (this.checked) {
                $("#lblLimiteTotal").removeClass("font-italic text-gray");
                $("#limiteTotalInicio").attr("disabled", false);
                $("#limiteTotalFim").attr("disabled", false);
            } else {
                $("#lblLimiteTotal").addClass("font-italic text-gray");
                $("#limiteTotalInicio").attr("disabled", true);
                $("#limiteTotalFim").attr("disabled", true);
            }
            break;
        case "chkSaldoDevedor":
            if (this.checked) {
                $("#lblSaldoDevedor").removeClass("font-italic text-gray");
                $("#saldoDevedorInicio").attr("disabled", false);
                $("#saldoDevedorFim").attr("disabled", false);
            } else {
                $("#lblSaldoDevedor").addClass("font-italic text-gray");
                $("#saldoDevedorInicio").attr("disabled", true);
                $("#saldoDevedorFim").attr("disabled", true);
            }
            break;
        case "chkLimiteDisponivel":
            if (this.checked) {
                $("#lblLimiteDisponivel").removeClass("font-italic text-gray");
                $("#limiteDisponivelInicio").attr("disabled", false);
                $("#limiteDisponivelFim").attr("disabled", false);
            } else {
                $("#lblLimiteDisponivel").addClass("font-italic text-gray");
                $("#limiteDisponivelInicio").attr("disabled", true);
                $("#limiteDisponivelFim").attr("disabled", true);
            }
            break;

    }
    checkButonPlayFilter();
});

async function setFilter() {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    const margemAtualIni = $("#margemAtualInicio").val().replace('.', '').replace(',', '.');
    const margemAtualFim = $("#margemAtualFim").val().replace('.', '').replace(',', '.');

    const margemAtual = $("#chkMargemAtual").is(':checked') && (margemAtualIni != '0.00') ?
        'margem_atual__between=' + margemAtualIni + ',' + margemAtualFim :
        '';

    const margemUsadaIni = $("#margemUsadaInicio").val().replace('.', '').replace(',', '.');
    const margemUsadaFim = $("#margemUsadaFim").val().replace('.', '').replace(',', '.');

    const margemUsada = $("#chkMargemUsada").is(':checked') && margemUsadaIni != '0.00' ?
        'margem_usada__between=' + margemUsadaIni + ',' + margemUsadaFim :
        '';

    const limiteTotalIni = $("#limiteTotalInicio").val().replace('.', '').replace(',', '.');
    const limiteTotalFim = $("#limiteTotalFim").val().replace('.', '').replace(',', '.');

    const limiteTotal = $("#chkLimiteTotal").is(':checked') && limiteTotalIni != '0.00' ?
        'limite_credcerta__between=' + limiteTotalIni + ',' + limiteTotalFim : '';

    const saldoDevedorIni = $("#saldoDevedorInicio").val().replace('.', '').replace(',', '.');
    const saldoDevedorFim = $("#saldoDevedorFim").val().replace('.', '').replace(',', '.');

    const saldoDevedor = $("#chkSaldoDevedor").is(':checked') && saldoDevedorIni != '0.00' ?
        'devedor_credcerta__between=' + saldoDevedorIni + ',' + saldoDevedorFim : '';

    const limiteDisponivelIni = $("#limiteDisponivelInicio").val().replace('.', '').replace(',', '.');
    const limiteDisponivelFim = $("#limiteDisponivelFim").val().replace('.', '').replace(',', '.');

    const limiteDisponivel = $("#chkLimiteDisponivel").is(':checked') && limiteDisponivelIni != '0.00' ?
        'disponivel_credcerta__between=' + limiteDisponivelIni + ',' + limiteDisponivelFim : '';

    try {
        const {
            data: leads
        } = await apiCRM.get(
            `/contato/?${margemAtual}&${margemUsada}&${limiteTotal}&${saldoDevedor}&${limiteDisponivel}`);

        contatcsFiltered = leads;
        loadContacts();

        jQuery(function() {
            Dashmix.block('state_normal', '.myblock');
        });
    } catch (error) {
        jQuery(function() {
            Dashmix.block('state_normal', '.myblock');
        });

    }


}
</script>