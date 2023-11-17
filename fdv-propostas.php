<?php
    if ( $_COOKIE['logado'] != NULL){            
        $idvendedor = $_COOKIE['idvendedor'];                                                    
    } else{
        header("Location: login.php");
    }    
?>

<?php include('../funcoes/funcoes.php'); ?> 

<?php 
if (isset($_COOKIE['notice'])){

    switch ($_COOKIE['notice']){
        case 'insert success':
            echo "<script> "
            . " var tipo = 'success';"
            . " var mensagem = 'Proposta registrada com sucesso.';"
            . " var alerta = true; </script>";

        break;

        case 'insert fail':
            echo "<script> "
            . " var tipo = 'danger';"
            . " var mensagem = 'Houve uma falha ao tentar gravar a proposta.';"
            . " var alerta = true; </script>";

        break;
    }
}
?>


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
        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Propostas</h1>        
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
            <h3 class="block-title">Propostas (<a class="editable editable-click" href="javascript:void(0)" id="corretor" data-type="select" data-pk="1" data-value="<?php echo $_COOKIE['idvendedor']; ?>" data-title="" style="color: rgb(93, 156, 236);">caregando...</a>)</h3>
            
            <!-- Menu de opcoes -->
            <div class="block-options">
                <a class="editable editable-click" href="javascript:void(0)" id="status" data-type="select" data-pk="1" data-value="1" data-title="Escolha o Status" style="color: rgb(93, 156, 236);">carregando...</a>
            </div>
            <!-- END Menu de opcoes -->

        </div>
        <!--END Titulo -->

        <div class="block-header block-header-default bg-body-dark">
            
            <!-- Search Responsável Financeiro -->
            <div class="input-group">
                <input type="text" class="form-control form-control-alt" id ="pesquisa" placeholder="Buscar pelo Responsável Financeiro...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div>
            <!-- END Search Responsável Financeiro -->

            <div class="block-options">
                <button type="button" class="btn-block-option mr-2" onclick="window.location.href = 'fdv-propostas-manage.php'">
                    <i class="fa fa-plus mr-1"></i> Nova Proposta
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>

        </div>

        <div id="blockPrevistas" class="block-content">
            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                <thead>
                    <tr class="text-uppercase">
                        <th colspan="2">CLIENTES</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Beneficiários</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 200px;">Produto</th>
                        <th class="d-none d-md-table-cell" style="width: 130px;">Valor</th>
                        <th style="width: 170px;"></th>
                    </tr>
                </thead>

                <tbody id="mybody">
                    
                </tbody>
            </table>
        </div>    
    </div>
</div>


<!-- Modal SOLICITAR ASSINATURA -->
<div class="modal fade" id="modalSignature" tabindex="-1" role="dialog" aria-labelledby="modalSignature" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-content">
                    <div class="blockSignature card">
                        <div class="card-body">
                            <h4 class="card-title">Enviar proposta para assinatura</h4>
                            <h6 class="card-subtitle"><code>Escolha a forma de envio da proposta para assinatura. <br>Será enviado para o email e celular informado. Caso deseje enviar para outro numero/email, altere a informação na proposta.</code></h6>
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
                                                    <small class="form-control-feedback font-italic font-bold">Email</small>
                                                    <input id="signatureEmail" name="signatureEmail" class="form-control" maxlength="60" disabled>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <small class="form-control-feedback font-italic font-bold">Celular</small>
                                                    <input id="signatureCelular" name="signatureCelular" class="form-control" disabled> 
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group px-0">
                                    <button class="btn btn-info waves-effect waves-light" onclick="enviarSignaturePorSMS();">Envio por E-mail e SMS</button>
                                    <button class="btn btn-info waves-effect waves-light" onclick="enviarSignaturePorWhatsApp();">Envio por E-mail e WhatsApp</button>
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

<script type="text/javascript" src="../assets/node_modules/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>

<!--Custom JavaScript -->
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/pt-br.min.js"></script>


<!-- Page JS Helpers (Select2) -->
<script>
    var alerta = false;

    jQuery(function(){
        
        Dashmix.helpers(['notify', 'masked-inputs']);

        if (alerta){
            Dashmix.helpers('notify',{align: 'center', type: tipo, icon: 'fa fa-check mr-1', message: mensagem});
        }                        
    });   
</script>

<?php require 'inc/_global/views/footer_end.php'; ?>

<script type="text/javascript">

    moment().locale("pt-br");

    $(function() {

        $('#status').editable({
            mode: 'inline',
            source: [
                {value:1, text:'Propostas pendentes'},
                {value:2, text:'Em Aprovação na operadora'},
                {value:3, text:'Propostas ativadas'}
                
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


        $('#corretor').on('save', function(e, params) {
            getPropostas(params.newValue, null);
        });
        
        $('#status').on('save', function(e, params) {
            getPropostas(null, params.newValue);
        });

    });

    function liberarEnvio(id){

        $(`#icoEnvio${id}`).removeClass('text-gray');
        $(`#icoEnvio${id}`).addClass('text-info');

        Dashmix.helpers('notify', {
                        align: 'center',
                        type: 'success',
                        icon: 'fa fa-check mr-1',
                        message: `Proposta #${id} acabou de ser paga.`
                    });

    }

  /*Filtrar os blocos com base no filtro*/
    $(function(){ 
        $("#pesquisa").keyup(function(){
            var texto = $(this).val();

            $(".bloco").each(function(){
                var resultado = $(this).text().toUpperCase().indexOf(' '+texto.toUpperCase());

                if(resultado < 0) {
                    $(this).fadeOut();
                }else {
                    $(this).fadeIn();
                }
            }); 
        });
    });

    function openModalSignature(idproposta=null){

        return new Promise((resolve, reject) => {
            $.ajax({
                type: "GET",
                url:"getPropostaSignature.php",
                data: {proposta: idproposta},
                sync:true,
                success: (res) => {
                    resolve(res);
                },
                error: (err) => {
                    reject(err);
                },
            });

        })
        .then(result =>{

            const dados = JSON.parse(result);
            // console.log('dados',dados);

            $("#signatureNome").val(dados.nome);
            $("#signatureCodex").val(dados.codex);
            $("#signatureIdcontato").val(dados.idcontato);
            $("#signatureEmail").val(dados.email);
            $("#signatureCelular").val(dados.telefone).mask("(99) 9 9999-9999");

            $("#modalSignature").modal();

        })
        .catch(err =>{});

    }

    function enviarSignaturePorSMS(){
        $("#modalSignature").modal('hide');

        // Dashmix.block('state_loading', '.blockSignature');
        const codex = $("#signatureCodex").val();
        // const link = `http://localhost/projetos/app/pagamentos/assinatura_proposta.php?d=${codex}&p=${codex}`;
        const link = `https://www.idental.com.br/app/pagamentos/assinatura_proposta.php?d=${codex}&p=${codex}`;
        const numero = $("#signatureCelular").val().replace(/[^\d]+/g,'');
        const mensagem = `Para assinar sua PROPOSTA, acesse ${link}`;


        const data = {
            username: 'algaridental',
            password: 'Grup0At3md3',
            to: `55${numero}`,
            text: `${mensagem}`
        };

        // console.log(data);        

        return new Promise((resolve, reject) => {
            $.ajax({
                type: "GET",
                url:"http://107.20.199.106/sms/1/text/query",
                data: data,
                sync:true,
                success: (res) => {
                    // console.log(res);
                    resolve(res);
                },
                error: (err) => {
                    reject(err);
                },
            });
        }).then(result=>{
            Dashmix.helpers('notify', {
                        align: 'center',
                        type: 'success',
                        icon: 'fa fa-check mr-1',
                        message: 'SMS enviado com sucesso.'
                    });
        });
    }

    function enviarSignaturePorWhatsApp(){

        const codex = $("#signatureCodex").val();
        const link = `https://www.idental.com.br/app/pagamentos/assinatura_proposta.php?d=${codex}&p=${codex}`;
        // const link = `http://localhost/projetos/app/pagamentos/assinatura_proposta.php?d=${codex}&p=${codex}`;
        const numero = $("#signatureCelular").val().replace(/[^\d]+/g,'');
        const mensagem = `Para assinar sua PROPOSTA, acesse ${link}`;

        console.log(link);


        const data = {
            "message": `${mensagem}`,
            "number": `55${numero}`
        };

        // console.log(data);    
        
        $("#modalSignature").modal('hide');

        Dashmix.helpers('notify', {
                        align: 'center',
                        type: 'warning',
                        icon: 'fa fa-check mr-1',
                        message: 'Estamos tentando enviar a proposta. Agurde.'
                    });


        return new Promise((resolve, reject) => {
            $.ajax({
                type: "POST",
                url:"https://v4.chatpro.com.br/chatpro-ndtjpwd8tt/api/v1/send_message",
                data: JSON.stringify(data),
                headers: {
                "Authorization": "by2223n2zz0cpxc0vd5lf312mbial2"
                },
                options: {
                contentType: "application/json"
                },
                success: (res) => {
                    // console.log(res);
                    resolve(res);
                },
                error: (err) => {
                    reject(err);
                },
            });
        }).then(result=>{

            Dashmix.helpers('notify', {
                        align: 'center',
                        type: 'success',
                        icon: 'fa fa-check mr-1',
                        message: 'WhatsApp enviado com sucesso.'
                    });

        }).catch(err =>{
            console.log("ERRO: ",err);
            Dashmix.helpers('notify', {
                        align: 'center',
                        type: 'danger',
                        icon: 'fa fa-check mr-1',
                        message: 'Houve um problema ao tentar enviar a proposta por WhatsApp.'
                    });

        });
    }


    function getCorretores() {
        return new Promise((resolve, reject) => {
            $.ajax({
                type: "GET",
                url:"getCorretores.php",
                sync:true,
                success: (res) => {
                    resolve(res);
                },
                error: (err) => {
                    reject(err);
                },
            });
        });
    }
 
    getCorretores()
        .then(result =>{
            /** X-Editable */
            $('#corretor').editable({
                mode: 'inline',
                source: JSON.parse(result),
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

            getPropostas();

        })
        .catch(err =>{
            console.log("ERRO: ",err)
    });


    function enviarProposta(idcontato){
        window.location.href = `https://www.idental.com.br/corretor/solicitar-docs-new.php?id=${idcontato}`;
    }

    function getPropostas(corretor = null, status = null) {

        const filtroCorretor    = (corretor == null ? $('#corretor').data().editable.value : corretor);
        let filtroStatus        = (status   == null ? $('#status'  ).data().editable.value : status);

        let detailStatus;
        let themeStatus;

        switch (String(filtroStatus)) {
                case '1':
                    filtroStatus = ' (0, 1, 3, 6, 8, 9)';
                    detailStatus = 'pendente';
                    themeStatus  = 'warning';
                    break;
                case '2':
                    filtroStatus = ' (2, 4, 7, 10, 11, 13)';
                    detailStatus = 'em análise';
                    themeStatus  = 'info';
                    break;
                case '3':
                    filtroStatus = ' (5)';
                    detailStatus = 'ativada';
                    themeStatus  = 'success';
                    break;
        }

        let url = 'getPropostas.php';

        // console.log(url);
        $(".propostas").remove();
        Dashmix.block('state_loading', '.myblock');

        var propostasPai = $("#mybody");

        $.ajax({
            type: 'GET',
            url: url,
            data: {corretor:filtroCorretor, status:filtroStatus},
            success: function(response) {

                // console.log(response);

                const propostas = JSON.parse(response);

                // console.log('filtroStatus',filtroStatus);
                // console.log('filtroCorretor',filtroCorretor);

                if (!propostas) {
                    Dashmix.block('state_normal', '.myblock');
                    return;
                }

                propostas.forEach((i) => {
                    const idgrupo             = i.idgrupo;
                    const idvendedor          = i.idvendedor;
                    const vendedor            = primeira_maiuscula(primeiroUltimoNome(i.vendedor));
                    const idcontato           = i.idcontato;
                    const nome                = primeira_maiuscula(i.nome);
                    const datahora            = moment(i.datahora,"YYYY-MM-DD").format("DD/MM/YYYY");;
                    const telefone            = mascaraDeTelefone(i.telefone);
                    const email               = i.email;
                    const produto             = i.produto;
                    const status              = i.status;
                    const idstatus            = i.idstatus;
                    const formadepagamento    = i.formadepagamento;
                    const beneficiarios       = i.beneficiarios;
                    const cpf                 = i.cpf;
                    const valor               = 'R$ ' + mascaraValor(i.valor);
                    const dtassinatura        =  moment(i.dtassinatura,"YYYY-MM-DD").format("DD/MM/YYYY");
                    const dtpagamento         =  moment(i.dtpagamento,"YYYY-MM-DD").format("DD/MM/YYYY");

                    const textBtnEnvio          = i.dtassinatura?'text-info':'text-gray';
                    const enabledBtnEnvio       = i.dtassinatura?'':'disabled';

                    // const textBtnEnvio          = 'text-gray';
                    // const enabledBtnEnvio       = '';



                    propostasPai.append(`<tr class="bloco propostas">
                        <td colspan="2">
                            <a class="font-w600" href="fdv-propostas-manage.php?id=${idcontato}">${nome}</a>
                            <span class="badge badge-${themeStatus} js-popover-enabled" 
                                    data-toggle="popover"
                                    data-placement="top" 
                                    data-content="${status}" 
                                    data-original-title="" 
                                    title="">
                                ${detailStatus}
                            </span>

                            <div class="font-size-sm tt-muted mt-1"></div>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="javascript:void(0);">${vendedor}</a> em <em>${datahora}</em>
                            </div>
                        </td>

                        <td class="d-none d-md-table-cell text-center">
                            <i class="font-w600">${beneficiarios}</i>
                        </td>

                        <td class="d-none d-md-table-cell text-center">
                            <span class="font-size-sm">
                                <a href="javascript:void(0);">${produto}</a>
                                <br>
                                <em>${formadepagamento}</em>
                            </span>
                        </td>
                        
                        <td class="d-none d-md-table-cell">
                            <span class="font-w600">${valor}</span>
                        </td>
                        
                        <td>
                            <a href="javascript:void(0);" onclick="openModalSignature(${idcontato});"><i class="fa fa-2x fa-mail-bulk text-info-light ml-2"></i></a>
                            <a href="javascript:void(0);"><i class="fa fa-2x fa-paperclip text-info-light"></i></a>                            
                            <a href="javascript:void(0);" onclick="enviarProposta(${idcontato});" ${enabledBtnEnvio}><i id="icoEnvio${idcontato}" class="fa fa-2x fa-share-square ${textBtnEnvio} ml-2"></i></a>
                            <a href="javascript:void(0);"><i class="fa fa-2x fa-history text-primary-light"></i></a>                            

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
        const {data: response} = msg;
    
        // {
        //     system: [all, vendas, analise]
        //     user: all,
        //     id: idproposta,
        //     acao: [enviar, bloquear, liberar]
        // }

        
        const proposta = JSON.parse(response);

        console.log(proposta);

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

</script>


