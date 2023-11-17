<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
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
        <form enctype="multipart/form-data">
            <input id="upload" type=file name="files[]" class="d-none">
        </form>

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-info">
                        <div class="my-3">
                            <i class="fa fa-2x fa-chalkboard-teacher text-white-75"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="font-w600">Upload de Leads</div>
                        <div class="font-size-sm text-muted">+30.000 leads</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-light" href="javascript:void(0)" onclick="carregarDados();">
                            <i class="fa fa-briefcase text-muted mr-1"></i> Carregar Dados
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-warning">
                        <div class="my-3">
                            <i class="fa fa-2x fa-calculator text-white-75"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="font-w600">Margem</div>
                        <div class="font-size-sm text-muted">+12.000 atualizados</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-light" href="javascript:void(0)">
                            <i class="fa fa-briefcase text-muted mr-1"></i> Atualizar Margem
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-danger">
                        <div class="my-3">
                            <i class="fa fa-2x fa-globe text-white-75"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="font-w600">Cred Cesta</div>
                        <div class="font-size-sm text-muted">+2.354 atualizados</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-light" href="javascript:void(0)">
                            <i class="fa fa-briefcase text-muted mr-1"></i> Atualizar Limites
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded text-center">
                    <div class="block-content block-content-full bg-success">
                        <div class="my-3">
                            <i class="fa fa-2x fa-mobile text-white-75"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="font-w600">WhatsApp</div>
                        <div class="font-size-sm text-muted">+3.000 Atualizados</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-sm btn-light" href="javascript:void(0)">
                            <i class="fa fa-briefcase text-muted mr-1"></i> Atualizar WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END Topics -->
</div>
<!-- END Page Content -->


<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
<?php $dm->get_js('js/funcoes/funcoes-gerais.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.core.min.js"></script>
<?php $dm->get_js('js/plugins/jsontoexcel/FileSaver.js'); ?>
<?php $dm->get_js('js/plugins/jsontoexcel/jhxlsx.js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js"></script>


<?php require 'inc/_global/views/footer_end.php'; ?>


<script>
const apiCRM = axios.create({
    baseURL: 'https://www.idental.com.br/api/crm/',
    headers: {
        'appAuthorization': 'ad57fb31-4d9a-4cc7-8231-43f414507e7f'
    }
});

let originalContacts = [];

const loadCountLeads = () => {

    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    /**********
     * Aqui o código
     */

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock')
    })

}

const loadCountMargem = () => {
    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    /**********
     * Aqui o código
     */

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock')
    })

}

const loadCountLimite = () => {
    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    /**********
     * Aqui o código
     */

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock')
    })

}

const loadCountWhatsApp = () => {
    jQuery(function() {
        Dashmix.block('state_loading', '.myblock');
    });

    /**********
     * Aqui o código
     */

    jQuery(function() {
        Dashmix.block('state_normal', '.myblock')
    })

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

                originalContacts = (JSON.parse(JSON.stringify(
                    XL_row_object)));

            })
        };

        reader.onerror = function(ex) {
            console.log(ex);
        };

        reader.readAsBinaryString(file);
        Dashmix.block('state_normal', '.myblock');
    };
};

function handleFileSelect(evt) {

    var files = evt.target.files; // FileList object
    myFiles = files;
    // var xl2json = new ExcelToJSON();
    // xl2json.parseExcel(files[0]);

}

async function insertContacts(data) {

    console.log("data", data);
    const bodyContact = data.map(c => {

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

// async function updateMargem(data) {

// }

// async function updateLimite(data) {

// }

// async function updateWhatsApp(data) {

// }

document.getElementById('upload').addEventListener('change', handleFileSelect, false);

const carregarDados = async () => {

    return new Promise((resolve, reject) => {
            $('#upload').click();
        })
        .then(() => {
            Dashmix.block('state_normal', '.myblock');
            console.log('carregarDados');
        });

}
</script>