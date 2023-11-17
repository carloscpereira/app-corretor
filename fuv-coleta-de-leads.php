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
            <h1 class="flex-sm-fill fw-light mt-2 mb-0 mb-sm-2">Tratamento de Leads</h1>
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
                <div class="form-group col-4 mt-0 mb-0 custom-control">
                    <label class="mb-4">Registros na tela</label>
                    <input type="text" class="js-rangeslider" id="countReg" name="countReg" data-grid="true"
                        data-skin="big" data-step="100" data-min="0" data-max="5000" data-from="200" data-to="0">

                    <!-- <div class="form-group row mt-0">
                        <div class="col-6">
                            <label>de:</label>
                            <input type="text" id="mgUsadaInicio" class="form-control" value="70,00">
                        </div>
                        <div class="col-6">
                            <label>até:</label>
                            <input type="text" id="mgUsadaFim" class="form-control" value="99,99">
                        </div>
                    </div> -->

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
                            <i class="far fa-fw fa-bell mr-1"></i> Carregar leads para Base
                        </a>
                        <!-- <div role="separator" class="dropdown-divider"></div>

                        <a class="dropdown-item" href="javascript:void(0)" onclick="downloadXls();">
                            <i class="far fa-fw fa-envelope mr-1"></i> Download lista CPF
                        </a>

                        <a class="dropdown-item text-gray" href="javascript:void(0)" disabled>
                            <i class="far fa-fw fa-envelope mr-1"></i> Download lista celulares
                        </a> -->

                        <div role="separator" class="dropdown-divider"></div>

                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-pencil-alt mr-1"></i> Atualizar info de margem
                        </a>

                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-pencil-alt mr-1"></i> Atualizar info de Limites
                        </a>

                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-pencil-alt mr-1"></i> Atualizar info de whatsApp
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
                        <th colspan="2">Oportunidades</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 200px;">Telefones</th>
                        <!-- <th class="d-none d-md-table-cell text-center" style="width: 200px;">Emails</th> -->
                        <th class="d-none d-md-table-cell" style="width: 100px;">Etapa</th>
                        <th style="width: 300px;">Canais de Venda</th>
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

<!-- Modal SOLICITAR ASSINATURA -->
<div class="modal fade" id="modalSignature" tabindex="-1" role="dialog" aria-labelledby="modalSignature"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-content">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Qualificação de Oportunidades</h4>
                            <hr class="m-t-0 m-b-20">

                            <form id="form-envemailboleto" method="post" onsubmit="return false;">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <small
                                                        class="form-control-feedback font-italic font-bold">Nome</small>
                                                    <input id="leadNome" name="leadNome" class="form-control"
                                                        maxlength="60">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <small class="form-control-feedback font-italic font-bold">Celular
                                                        (1)</small>
                                                    <input id="leadCelular1" name="leadCelular1" class="form-control">
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <small class="form-control-feedback font-italic font-bold">Celular
                                                        (2)</small>
                                                    <input id="leadCelular2" name="leadCelular2" class="form-control">
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <small class="form-control-feedback font-italic font-bold">Celular
                                                        (3)</small>
                                                    <input id="leadCelular3" name="leadCelular3" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group px-0">
                                    <button class="btn btn-info waves-effect waves-light"
                                        onclick="salvarLead();">Salvar</button>
                                    <button class="btn btn-primary waves-effect waves-light"
                                        onclick="ligarLead();">Ligar</button>
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

const escolherArquivo = () => {
    $('#upload').click();
}

const loadContacts = async () => {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    var myBody = $('#myBody');

    $(".newTd").remove();

    const {
        data: dataContacts
    } = await apiCRM.get('contato');
    console.log(dataContacts);

    dataContacts.forEach(function(e) {

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
                        ${telefones}
                    </td>
                    <td class="d-none d-md-table-cell">
                    <span class="font-w600">CAPTURA</span>
                    </td>
                    <td>
                    <span class="font-w600">${e.empresa}</span>
                    </td>
                </tr>
            `);
    });

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock');
    });
}

const isCellPhone = (phone) => {
    /*********
     * 71991059159 - 11
     * 
     * 7191059159  - 10
     * 7134832700  - 10
     * 
     * 991059159   - 9
     * 
     * 91059159    - 8
     * 34832700    - 8
     * 
     */

    if (phone.length < 8) {
        return false;
    } else if (phone.length == 8) {
        if (phone.substring(0, 1) == '9') {
            return true;
        } else {
            return false;
        }
    } else if (phone.length == 10) {
        if (phone.substring(3, 2) != '3') {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

const addDigitCellPhone = (number) => {

    /**
     * 071991059159 - 12 
     * 71991059159 - 11
     * 7191059159  - 10
     * 991059159   - 9
     * 91059159    - 8
     * 
     * 7183885820 
     * 7134832700 - 8
     * 34832700 - 7
     */

    let newNumber = '';

    if (isCellPhone(number)) {
        switch (number.length) {
            case 11:
                newNumber = number;
                break;
            case 10:
                if (number.substring(2, 3) === '9' || number.substring(2, 3) === '8') {
                    newNumber = number.substring(0, 2) + '9' + number.substring(2, number
                        .length);
                }
                break;
            case 8:
                if (number.substring(0, 1) === '9' || number.substring(0, 1) === '8') {
                    newNumber = '9' + number;
                }
                break;
        }
    }

    return newNumber || number;

}

const sliceCellPhone = (phone) => {
    /***********
     * 7198687437771986280298 - 22
     */
    const lengthPhone = phone.replace(/\D/g, '').length;

    switch (lengthPhone) {
        case 22:
            return [phone.substring(0, 11), phone.substring(11, phone.length)];
            break;
        case 21:
            if (phone.substring(2, 1) != '8' && phone.substring(2, 1) != '9') {
                return [phone.substring(0, 10), phone.substring(10, phone.length)];
            } else {
                return [phone.substring(0, 11), phone.substring(11, phone.length)];
            }
            break;
        case 20:
            if (phone.substring(2, 1) != '8' && phone.substring(2, 1) != '9') {
                return [phone.substring(0, 9), phone.substring(9, phone.length)];
            } else {
                return [phone.substring(0, 11), phone.substring(11, phone.length)];
            }
            break;
    }
}

const organizeContacts = (contacts) => {

    // console.log("contacts", contacts);
    const returnContacts = contacts.map(c => {

        /**separa caso tenha 2 numeros por tel */
        // c.tel1 = sliceCellPhone(c.tel1, 1);
        // c.tel2 = sliceCellPhone(c.tel2, 1);



        /**Adicionar o NONO dígito */
        c.tel1 = c.tel1 != null ? addDigitCellPhone(c.tel1.replace(/\D/g, '')) : null;
        c.tel2 = c.tel2 != null ? addDigitCellPhone(c.tel2.replace(/\D/g, '')) : null;
        c.tel3 = c.tel3 != null ? addDigitCellPhone(c.tel3.replace(/\D/g, '')) : null;
        c.tel4 = c.tel4 != null ? addDigitCellPhone(c.tel4.replace(/\D/g, '')) : null;
        c.tel5 = c.tel5 != null ? addDigitCellPhone(c.tel5.replace(/\D/g, '')) : null;
        c.tel6 = c.tel6 != null ? addDigitCellPhone(c.tel6.replace(/\D/g, '')) : null;
        c.tel7 = c.tel7 != null ? addDigitCellPhone(c.tel7.replace(/\D/g, '')) : null;
        c.tel8 = c.tel8 != null ? addDigitCellPhone(c.tel8.replace(/\D/g, '')) : null;
        c.tel9 = c.tel9 != null ? addDigitCellPhone(c.tel9.replace(/\D/g, '')) : null;
        c.tel10 = c.tel10 != null ? addDigitCellPhone(c.tel10.replace(/\D/g, '')) :
            null;

        // tel11 = tel11 != null ? addDigitCellPhone(tel11.replace(/\D/g, '')) : null;
        // tel12 = tel12 != null ? addDigitCellPhone(tel12.replace(/\D/g, '')) : null;
        // tel13 = tel13 != null ? addDigitCellPhone(tel13.replace(/\D/g, '')) : null;
        // tel14 = tel14 != null ? addDigitCellPhone(tel14.replace(/\D/g, '')) : null;
        // tel15 = tel15 != null ? addDigitCellPhone(tel15.replace(/\D/g, '')) : null;
        // tel16 = tel16 != null ? addDigitCellPhone(tel16.replace(/\D/g, '')) : null;
        // tel17 = tel17 != null ? addDigitCellPhone(tel17.replace(/\D/g, '')) : null;
        // tel18 = tel18 != null ? addDigitCellPhone(tel18.replace(/\D/g, '')) : null;
        // tel19 = tel19 != null ? addDigitCellPhone(tel19.replace(/\D/g, '')) : null;
        // tel20 = tel20 != null ? addDigitCellPhone(tel20.replace(/\D/g, '')) : null;


        return {
            nome: c.nome,
            tipo: c.tipo,
            margem: c.margem,
            nascimento: c.nascimento,
            idade: c.idade,
            cpf: c.cpf.replace(/\D/g, ''),
            matricula: c.matricula,
            endereco: c.endereco,
            complemento: c.complemento,
            numero: c.numero,
            bairro: c.bairro,
            cidade: c.cidade,
            estado: c.estado,
            cep: c.cep,
            email: c.email,
            telefones: [
                c.tel1 != null && c.tel1.length <= 11 ? {
                    numero: c.tel1,
                    tipo: isCellPhone(c.tel1) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel2 != null && c.tel2.length <= 11 ? {
                    numero: c.tel2,
                    tipo: isCellPhone(c.tel2) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel3 != null && c.tel3.length <= 11 ? {
                    numero: c.tel3,
                    tipo: isCellPhone(c.tel3) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel4 != null && c.tel4.length <= 11 ? {
                    numero: c.tel4,
                    tipo: isCellPhone(c.tel4) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel5 != null && c.tel5.length <= 11 ? {
                    numero: c.tel5,
                    tipo: isCellPhone(c.tel5) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel6 != null && c.tel6.length <= 11 ? {
                    numero: c.tel6,
                    tipo: isCellPhone(c.tel6) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel7 != null && c.tel7.length <= 11 ? {
                    numero: c.tel7,
                    tipo: isCellPhone(c.tel7) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel8 != null && c.tel8.length <= 11 ? {
                    numero: c.tel8,
                    tipo: isCellPhone(c.tel8) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel9 != null && c.tel9.length <= 11 ? {
                    numero: c.tel9,
                    tipo: isCellPhone(c.tel9) ? `2` : `4`,
                    principal: false
                } : {},
                c.tel10 != null && c.tel10.length <= 11 ? {
                    numero: c.tel10,
                    tipo: isCellPhone(c.tel10) ? `2` : `4`,
                    principal: false
                } : {},
            ].filter(t => t.numero != null),
            secretaria: c.secretaria,
            lotacao: c.lotacao,
            tiposervidor: c.tiposervidor
        }


    });


    console.log("returnContacts", returnContacts);
    return returnContacts;

}

$('#hasCelular').on('select2:select', function(e) {
    var id = parseInt(e.params.data.id, 10);

    // console.log("id",id);

    switch (id) {
        case 1:
            contatcsFiltered = originalContacts.filter((c) => {
                return (c.tel1 || c.tel2);
            });

            break;
        case 2:
            contatcsFiltered = originalContacts.filter((c) => {
                return !(c.tel1 || c.tel2);
            });

            break;

        default:
            contatcsFiltered = originalContacts;
            break;
    }


    loadContacts();

});

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
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(
                    workbook
                    .Sheets[
                        sheetName]);
                try {
                    originalContacts = organizeContacts(JSON.parse(JSON
                        .stringify(
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
                try {
                    insertContacts(contatcsFiltered);
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

function abrirPessoa(id) {

    $("#leadNome").val(newContats[id].nome);
    $("#leadCelular1").val(newContats[id].tel1);
    $("#leadCelular2").val(newContats[id].tel2);
    $("#leadCelular3").val("");
    $("#modalSignature").modal();
}

async function enviarMensagemWhatsApp(id, telefone) {

    const celular = telefone.replace('(', '').replace(')', '').replace('-', '').replace(' ',
        '');
    console.log(celular);

    try {
        const mensEnviada = await apiWhatsApp.post("/send-media", {
            "sender": "juniorferreira",
            "number": `55${celular}`,
            "caption": "Escrever aqui a mensagem que vai acompanhar a imagem",
            "file": "./docs/jr-cartao-interativo.pdf"
        });

        console.log(mensEnviada);

        jQuery(function() {
            Dashmix.helpers('notify', {
                align: 'center',
                type: 'success',
                icon: 'fa fa-check mr-1',
                message: 'Mensagem enviada com sucesso.'
            });
        });

        $(`#tr${id}`).remove();

    } catch (error) {

        console.log(error);

        jQuery(function() {
            Dashmix.helpers('notify', {
                align: 'center',
                type: 'danger',
                icon: 'fa fa-block mr-1',
                message: 'Houve uma falha ao tentar enviar a mensagem.'
            });
        });


    }

    // $("#modalConteudoWhatsApp").modal('hide');
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

async function insertContacts(contatcsFiltered) {

    console.log("contatcsFiltered", contatcsFiltered);
    const bodyContact = contatcsFiltered.map(c => {

        return {
            "nome": c.nome?.trim().replace(/[^\w\s]/gi, ''),
            "genero": 1,
            "estadocivil": 1,
            "nacionalidade": 1,
            "nascimento": c.nascimento,
            "cpf": c.cpf?.trim(),
            // "rg": c.rg,
            // "orgaoemissor": ,
            "empresa": "GOVERNO DO ESTADO DA BAHIA",
            "departamento": c.lotacao?.trim().replace(/[^\w\s]/gi, ''),
            "cargo": c.tipo?.trim().replace(/[^\w\s]/gi, ''),
            "origemdocontato": 1,
            "enderecos": [{
                "endereco": c.endereco?.trim().replace(/[^\w\s]/gi, ''),
                "complemento": c.complemento?.trim().replace(/[^\w\s]/gi, ''),
                "numero": c.numero?.trim().replace(/[^\w\s]/gi, ''),
                "cep": c.cep?.trim(),
                "bairro": c.bairro?.trim().replace(/[^\w\s]/gi, ''),
                "cidade": c.cidade?.trim().replace(/[^\w\s]/gi, ''),
                "estado": "BA",
                "tipodeendereco": 1,
                "principal": true
            }],
            "emails": [{
                "email": c.email,
                "tipodeemail": 1,
                "principal": true
            }],
            "telefones": c.telefones
        }
    });

    console.log("bodyContact", bodyContact);
    const newContats = await apiCRM.post("/contato", bodyContact);
    console.log("newContats", newContats);
}


$("#countReg").ionRangeSlider({
    onFinish: function(data) {

        jQuery(function() {
            Dashmix.block('state_loading', '.myblock');
        });

        alert('filtrando... teste!');

        // myFilterMA = $("#filter-margem-atual")[0].dataset;
        // myFilterMU = data;

        // insertDataIntoTable(filterData(originalContacts,
        //     myFilterMA.from,
        //     myFilterMA.to,
        //     myFilterMU.from,
        //     myFilterMU.to));

        jQuery(function() {
            Dashmix.block('state_normal', '.myblock');
        })

    }
});
</script>