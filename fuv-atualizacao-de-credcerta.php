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
            <h1 class="flex-sm-fill fw-light mt-2 mb-0 mb-sm-2">Atualização de Limites</h1>
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
<div class="content">
    <!-- Topics -->
    <div class="block myblock block-mode-loading-refresh">

        <div class="block-header block-header-default">

            <div class="input-group input-group-lg">
                <!-- <div class="form-group col-3 mt-0 mb-0 custom-control">
                    <input type="checkbox" class="custom-control-input" id="hasCelular" name="hasCelular">
                    <label class="custom-control-label" for="hasCelular">Celular</label>
                </div> -->

                <div class="form-group col-4 mt-0 mb-0 custom-control">
                    <label class="mb-4">Limite Total (R$)</label>
                    <!-- <input type="text" class="js-rangeslider" id="filter-margem-atual" name="filter-margem-atual"
                        data-type="double" data-grid="true" data-skin="big" data-step="0.01" data-min="-20000"
                        data-max="20000" data-from="-20000" data-to="49.99" data-prefix="R$ "> -->

                    <div class="form-group row mt-0">
                        <div class="col-6">
                            <label>de:</label>
                            <input type="text" id="mgAtualInicio" class="form-control" value="-20.000,00">
                        </div>
                        <div class="col-6">
                            <label>até:</label>
                            <input type="text" id="mgAtualFim" class="form-control" value="49,99">
                        </div>
                    </div>

                </div>

                <div class="form-group col-4 mt-0 mb-0 custom-control">
                    <label class="mb-4">Saldo Devedor (R$)</label>
                    <!-- <input type="text" class="js-rangeslider" id="filter-margem-usada" name="filter-margem-usada"
                        data-type="double" data-grid="true" data-skin="big" data-step="0.01" data-min="0" data-max="100"
                        data-from="70" data-to="99.99" data-postfix="%"> -->

                    <div class="form-group row mt-0">
                        <div class="col-6">
                            <label>de:</label>
                            <input type="text" id="mgUsadaInicio" class="form-control" value="70,00">
                        </div>
                        <div class="col-6">
                            <label>até:</label>
                            <input type="text" id="mgUsadaFim" class="form-control" value="99,99">
                        </div>
                    </div>

                </div>

                <div class="form-group col-4 mt-0 mb-0 custom-control">
                    <label class="mb-4">Limite Disponível (R$)</label>
                    <!-- <input type="text" class="js-rangeslider" id="filter-margem-usada" name="filter-margem-usada"
                        data-type="double" data-grid="true" data-skin="big" data-step="0.01" data-min="0" data-max="100"
                        data-from="70" data-to="99.99" data-postfix="%"> -->

                    <div class="form-group row mt-0">
                        <div class="col-6">
                            <label>de:</label>
                            <input type="text" id="mgUsadaInicio" class="form-control" value="70,00">
                        </div>
                        <div class="col-6">
                            <label>até:</label>
                            <input type="text" id="mgUsadaFim" class="form-control" value="99,99">
                        </div>
                    </div>

                </div>


            </div>


            <div class="block-options">
                <form enctype="multipart/form-data">
                    <input id="upload" type=file name="files[]" class="d-none">
                </form>
                <div class="dropdown">
                    <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-2x fa-ellipsis-h"></i></button>
                    <div class="dropdown-menu dropdown-menu-right" style="">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="escolherArquivo();">
                            <i class="far fa-fw fa-bell mr-1"></i> Atualiar info de margem
                        </a>
                        <div role="separator" class="dropdown-divider"></div>

                        <a class="dropdown-item" href="javascript:void(0)" onclick="downloadXls();">
                            <i class="far fa-fw fa-envelope mr-1"></i> Download lista celulares
                        </a>

                    </div>
                </div>
                <!-- 
                <button class="btn btn-success mt-0 mb-0" type="button" onclick="carregarBanco();"><i class="fa fa-sync-alt text-white"></i> carregar dados</button>
                <button class="btn btn-info mt-0 mb-0" type="button" onclick="escolherArquivo();"><i class="fa fa-upload text-white"></i> novos leads</button>
                <button class="btn btn-info mt-0 mb-0" type="button" onclick="downloadXls();"><i class="fa fa-download text-white"></i>  robo margem</button>
                <button class="btn btn-secondary mt-0 mb-0" type="button"><i class="fa fa-upload text-white" disabled></i> atualizar margem</button>
                <button class="btn btn-secondary mt-0 mb-0" type="button"><i class="fa fa-download text-white" disabled></i> robo whatsApp</button>
                <button class="btn btn-secondary mt-0 mb-0" type="button"><i class="fa fa-upload text-white" disabled></i> atualizar whatsApp</button> -->
                <!-- <button id = "btnSendAllWhatsApp" class="btn btn-secondary mt-4 mb-0" type="button" onclick="sendAllWhatsApp();"><i class="fab fa-whatsapp text-white" disabled></i> enviar</button> -->

                <!-- <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button> -->
            </div>

        </div>

        <div class="block-content">
            <!-- Topics -->
            <table class="table table-striped table-borderless table-vcenter">
                <thead class="thead-light">
                    <tr>
                        <th colspan="2">Contatos</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 150px;">Limite Total</th>
                        </th>
                        <th class="d-none d-md-table-cell" style="width: 150px;">Saldo Devedor</th>
                        <th style="width: 150px;">Limite Disponível</th>
                    </tr>
                </thead>
                <tbody id="myBody">
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

<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
<?php $dm->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>
<?php $dm->get_js('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js'); ?>
<?php $dm->get_js('js/funcoes/funcoes-gerais.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.core.min.js"></script>
<?php $dm->get_js('js/plugins/jsontoexcel/FileSaver.js'); ?>
<?php $dm->get_js('js/plugins/jsontoexcel/jhxlsx.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/plentz/jquery-maskmoney@master/dist/jquery.maskMoney.min.js"></script>


<script>
jQuery(function() {
    Dashmix.helpers(['select2', 'masked-inputs', 'rangeslider']);
});
</script>

<?php require 'inc/_global/views/footer_end.php'; ?>


<script>
const apiWhatsApp = axios.create({
    baseURL: 'https://www.idental.com.br/api/whatsapp/',
    headers: {
        'Authorization': 'by2223n2zz0cpxc0vd5lf312mbial2'
    }
});

const apiCRM = axios.create({
    baseURL: 'https://www.idental.com.br/api/crm/',
    headers: {
        'appAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
    }
});

let originalContacts = [];
let contatcsFiltered = [];

$("#mgAtualInicio").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#mgAtualFim").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#mgUsadaInicio").maskMoney({
    prefix: '% ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

$("#mgUsadaFim").maskMoney({
    prefix: '% ',
    allowNegative: true,
    allowZero: true,
    thousands: '.',
    decimal: ',',
    selectAllOnFocus: true,
    allowEmpty: true,
    affixesStay: false
});

const filterData = (data, maBegin, maEnd, muBegin, muEnd) => {

    const outData = data.filter(d => {

        const margemUsada = ((d.margem_total - d.margem_atual) * 100 / d.margem_total).toFixed(2);

        return (
            (parseFloat(d.margem_atual) >= parseFloat(maBegin)) &&
            (parseFloat(d.margem_atual) <= parseFloat(maEnd)) &&
            (parseFloat(margemUsada) >= parseFloat(muBegin)) &&
            (parseFloat(margemUsada) <= parseFloat(muEnd))
        )
    })

    return outData;

}

const insertDataIntoTable = (data) => {

    var myBody = $('#myBody');

    $(".newTd").remove();


    data.forEach(function(e) {

        myBody.append(`
            <tr id="tr${e.id}" class="newTd">
            <td colspan="2">
                <a class="font-w600 text-dark" href="javascript:void(0);">${e.nome}</a>
                <div class="font-size-sm font-w600 text-muted mb-2">
                    ${e.enderecos[0].cidade}
                </div>
            </td>
            <td class="d-none d-md-table-cell text-right">                            
                R$ ${e.margem_total||'-'}
            </td>
            <td class="d-none d-md-table-cell text-right">                            
                R$ ${e.margem_atual||'-'}
            </td>
            <td class="d-none d-md-table-cell text-right">                            
                R$ ${e.margem_total==null?'-':(e.margem_total - e.margem_atual).toFixed(2)||'-'}
            </td>
            <td class="d-none d-md-table-cell text-right">                            
                % ${e.margem_total==null?'-':((e.margem_total - e.margem_atual)*100/e.margem_total).toFixed(2)||'-'}
            </td>

        </tr>
    `);
    });

}

const loadContacts = async () => {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    const {
        data: dataContacts
    } = await apiCRM.get('contato');

    originalContacts = dataContacts;

    // myFilterMA = $("#filter-margem-atual")[0].dataset;
    // myFilterMU = $("#filter-margem-usada")[0].dataset;

    const maInicio = $("#mgAtualInicio").val();
    const maFim = $("#mgAtualFim").val();
    const muInicio = $("#mgUsadaInicio").val();
    const muFim = $("#mgUsadaFim").val();

    // insertDataIntoTable(filterData(dataContacts,
    //     myFilterMA.from,
    //     myFilterMA.to,
    //     myFilterMU.from,
    //     myFilterMU.to));

    insertDataIntoTable(filterData(dataContacts,
        maInicio,
        maFim,
        muInicio,
        muFim));

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock');
    })

}

const escolherArquivo = () => {
    $('#upload').click();
}

var ExcelToJSON = function() {

    this.parseExcel = function(file) {
        Dashmix.block('state_loading', '.myblock');
        var reader = new FileReader();

        reader.onload = function(e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            workbook.SheetNames.forEach(function(sheetName) {
                // Here is your object
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook
                    .Sheets[
                        sheetName]);
                try {
                    originalContacts = (JSON.parse(JSON.stringify(
                        XL_row_object)));
                } catch (error) {
                    console.log(error);
                    Dashmix.block('state_normal', '.myblock');
                    Dashmix.helpers('notify', {
                        align: 'center',
                        type: 'danger',
                        icon: 'fa fa-check mr-1',
                        message: 'Houve um problema ao fazer upload do arquivo.'
                    });

                }
                contatcsFiltered = originalContacts;
                console.log("contatcsFiltered", contatcsFiltered);
                try {
                    updateContacts(contatcsFiltered);
                } catch (error) {
                    console.log(error);
                    Dashmix.block('state_normal', '.myblock');
                    Dashmix.helpers('notify', {
                        align: 'center',
                        type: 'danger',
                        icon: 'fa fa-check mr-1',
                        message: 'Houve um problema ao salvar o arquivo no banco de dados.'
                    });

                }

                loadContacts();
                Dashmix.block('state_normal', '.myblock');
                Dashmix.helpers('notify', {
                    align: 'center',
                    type: 'success',
                    icon: 'fa fa-check mr-1',
                    message: 'Base de dados atualizada com sucesso.'
                });


            })
        };

        reader.onerror = function(ex) {
            console.log(ex);
        };

        reader.readAsBinaryString(file);
    };
};

document.getElementById('upload').addEventListener('change', handleFileSelect, false);

loadContacts();


function handleFileSelect(evt) {

    var files = evt.target.files; // FileList object
    var xl2json = new ExcelToJSON();
    xl2json.parseExcel(files[0]);
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

const tiraPonto = (text) => {
    return text.replace(/\./g, '');
}

const tiraVirgula = (text) => {
    return text.replace(/,/g, '');
}

const trocaVirgulaPorPonto = (text) => {
    return text.replace(/,/g, '.');
}

const trocaPontoPorVirgula = (text) => {
    return text.replace(/\./g, ',');
}


async function updateContacts(contatcsFiltered) {

    console.log("contatcsFiltered", contatcsFiltered);
    const bodyContact = contatcsFiltered.map(c => {

        return {
            "cpf": c.cpf?.trim(),
            "margem_atual": c["margem atual"].substring(0, 1) === '-' ?
                parseFloat('-' + tiraPonto(tiraVirgula(c["margem atual"].substring(4, c[
                    "margem atual"].length)))) / 100 : parseFloat(tiraPonto(tiraVirgula(c[
                    "margem atual"].substring(4, c["margem atual"].length)))) / 100,
            "margem_total": parseFloat(tiraVirgula(tiraPonto(c["margem total"]))) / 100
        }
    });

    console.log("bodyContact", bodyContact);
    const contactsUpdated = await apiCRM.put("/contato", bodyContact);
    console.log("contactsUpdated",
        contactsUpdated);
}

// $("#filter-margem-atual").ionRangeSlider({
//     onFinish: function(data) {

//         jQuery(function() {
//             Dashmix.block('state_loading', '.myblock');
//         });

//         myFilterMA = data;
//         myFilterMU = $("#filter-margem-usada")[0].dataset;

//         insertDataIntoTable(filterData(originalContacts,
//             myFilterMA.from,
//             myFilterMA.to,
//             myFilterMU.from,
//             myFilterMU.to));

//         jQuery(function() {
//             Dashmix.block('state_normal', '.myblock');
//         })

//     }
// });

// $("#filter-margem-usada").ionRangeSlider({
//     onFinish: function(data) {

//         jQuery(function() {
//             Dashmix.block('state_loading', '.myblock');
//         });

//         myFilterMA = $("#filter-margem-atual")[0].dataset;
//         myFilterMU = data;

//         insertDataIntoTable(filterData(originalContacts,
//             myFilterMA.from,
//             myFilterMA.to,
//             myFilterMU.from,
//             myFilterMU.to));

//         jQuery(function() {
//             Dashmix.block('state_normal', '.myblock');
//         })

//     }
// });

document.getElementById("mgAtualInicio").addEventListener("blur", function() {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    const maInicio = $("#mgAtualInicio").val();
    const maFim = $("#mgAtualFim").val();
    const muInicio = $("#mgUsadaInicio").val();
    const muFim = $("#mgUsadaFim").val();

    insertDataIntoTable(filterData(originalContacts,
        maInicio,
        maFim,
        muInicio,
        muFim));

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock');
    });

});

document.getElementById("mgAtualFim").addEventListener("blur", function() {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    const maInicio = $("#mgAtualInicio").val();
    const maFim = $("#mgAtualFim").val();
    const muInicio = $("#mgUsadaInicio").val();
    const muFim = $("#mgUsadaFim").val();

    insertDataIntoTable(filterData(originalContacts,
        maInicio,
        maFim,
        muInicio,
        muFim));

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock');
    });

});


document.getElementById("mgUsadaFim").addEventListener("blur", function() {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    const maInicio = $("#mgAtualInicio").val();
    const maFim = $("#mgAtualFim").val();
    const muInicio = $("#mgUsadaInicio").val();
    const muFim = $("#mgUsadaFim").val();

    insertDataIntoTable(filterData(originalContacts,
        maInicio,
        maFim,
        muInicio,
        muFim));

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock');
    });

});

document.getElementById("mgUsadaInicio").addEventListener("blur", function() {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    const maInicio = $("#mgAtualInicio").val();
    const maFim = $("#mgAtualFim").val();
    const muInicio = $("#mgUsadaInicio").val();
    const muFim = $("#mgUsadaFim").val();

    insertDataIntoTable(filterData(originalContacts,
        maInicio,
        maFim,
        muInicio,
        muFim));

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock');
    });

});
</script>