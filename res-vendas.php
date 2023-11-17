<?php
if ($_COOKIE['logado'] != null) {
    $idvendedor = $_COOKIE['idvendedor'];
} else {
    header('Location: login.php');
} ?>

<?php include('../funcoes/corretor/funcoes-propostas.php'); ?>


<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $dm->get_css(
    'js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'
); ?>
<?php $dm->get_css(
    'js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'
); ?>

<?php $dm->get_css('js/plugins/select2/css/select2.min.css'); ?>


<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Resultado de Vendas</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Resultado de Vendas</li>
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

            <!-- Operadora de Seguro -->
            <div class="col-md-6">

                <select class="js-select2 form-control" id="idcorretor" style="width: 100%;"
                    data-placeholder="Escolha o corretor..">
                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->

                    <?php
                    $resultados = getSupervisores($idvendedor); //vendedores
                    foreach ($resultados as $vendedores) {

                        $descricao = utf8_encode(
                            ucwords(strtolower($vendedores['vendedor']))
                        );
                        $id = $vendedores['idvendedor'];
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $descricao; ?></option>
                    <?php
                    }
                    ?>

                </select>

            </div>
            <!-- Fim Operadora de Seguro -->

            <!-- Operadora de Seguro -->
            <div class="col-md-2">
                <input type="text" class="js-masked-date js-datepicker form-control" id="dtini" data-week-start="1"
                    data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy"
                    placeholder="dd/mm/yyyy">
            </div>
            <!-- Fim Operadora de Seguro -->


            <!-- Operadora de Seguro -->
            <div class="col-md-2">
                <input type="text" class="js-masked-date js-datepicker form-control" id="dtfim" data-week-start="1"
                    data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy"
                    placeholder="dd/mm/yyyy">
            </div>
            <!-- Fim Operadora de Seguro -->

            <div class="block-options">
                <button type="button" class="btn-block-option mr-2" onclick="pesquisar();">
                    <i class="fa fa-search mr-1"></i> Pesquisar
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option"
                    data-action="fullscreen_toggle"></button>
            </div>

        </div>
        <div class="content content-boxed">
            <!-- Invoice -->
            <div class="block block-fx-shadow">

                <div class="block-header block-header-default">
                    <h3 class="block-title">RELATÓRIO DE VENDAS</h3>

                    <div class="block-options">
                        <!-- Print Page functionality is initialized in Helpers.print() -->

                        <button type="button" id="btn-imprimir1" class="btn-block-option"
                            onclick="Dashmix.helpers('print');">
                            <i class="si si-printer mr-1"></i> Imprimir
                        </button>

                    </div>
                </div>

                <div class="block-content rel-vendas">

                </div>
            </div>

        </div>
        <!-- END Topics -->
    </div>
    <!-- END Page Content -->

    <?php require 'inc/_global/views/page_end.php'; ?>
    <?php require 'inc/_global/views/footer_start.php'; ?>

    <!-- Page JS Plugins -->
    <?php $dm->get_js(
        'js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'
    ); ?>
    <?php $dm->get_js(
        'js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'
    ); ?>

    <?php $dm->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
    <?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>

    <!-- Page JS Helpers (Select2) -->

    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
    <script>
    jQuery(function() {
        Dashmix.helpers(['select2', 'datepicker', 'masked-inputs']);
    });
    </script>


    <?php require 'inc/_global/views/footer_end.php'; ?>


    <script>
    function pesquisar() {

        var grupoPai = $(".rel-vendas");
        var corretorid = $("#idcorretor").val();
        var corretor = $("#idcorretor option:selected").text();
        var dtini = $("#dtini").val();
        var dtfim = $("#dtfim").val();
        var lista = '';

        $.ajax({
            type: 'POST',
            url: 'retorna-ativos-periodo.php',
            data: {
                idsupervisor: corretorid,
                dtinicio: dtini,
                dtfim: dtfim
            },
            success: function(response) {

                // console.log(response);
                dados = JSON.parse(response);

                $(".vendas").remove();

                if (dados.length <= 0) return;

                var table = `<table class="vendas table table-sm table-vcenter">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell" style="width: 100px;" >CONSULTOR</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;"   >ATIVACAO</th>
                                    <th class="d-none d-sm-table-cell" style="width: 100px;" >PAGAMENTO</th>
                                    <th class="d-none d-sm-table-cell" style="width: 100px;" >PRODUTO</th>
                                    <th class="d-none d-sm-table-cell" style="width: 20px;"   >QTDE</th>
                                    <th class="d-none d-sm-table-cell" style="width: 50px;"  >VALOR</th>
                                </tr>
                            </thead>
                            <tbody>`;

                var column = '';

                var oldVendedor = '';
                var subTotal = 0;
                var subTotalProposta = 0;

                var somaTotal = 0;
                var totalProposta = 0;

                dados.forEach((i) => {

                    var vendedor = (nomeSN(i.vendedor));
                    var dtcadastro = i.dtcadastro;

                    // var data = new Date();
                    // var dataFormatada = ("0" + data.getDate()).substr(-2) + "/" 
                    //                     + ("0" + (data.getMonth() + 1)).substr(-2) + "/" + data.getFullYear();

                    var dtativacao = getFormattedDate(i.dtativacao);
                    var formadepagamento = i.formadepagamento;
                    var produto = i.produto;
                    var quantidade = i.quantidade;
                    var valor = i.valor;

                    somaTotal += parseFloat(valor);
                    totalProposta += parseInt(i.quantidade);

                    if (oldVendedor == vendedor) {
                        column += `<tr>
                                    <td class="font-w600">            ${vendedor}</td>
                                    <td class="font-w600">            ${dtativacao}</td>
                                    <td class="font-w600">            ${formadepagamento}</td>
                                    <td class="font-w600">            ${produto}</td>
                                    <td class="font-w600 text-center">${quantidade}</td>
                                    <td class="font-w600 text-right"> R$ ${mascaraValor(valor)}</td>
                                </tr>`;
                        subTotalProposta += parseInt(i.quantidade);
                        subTotal += parseFloat(valor);
                    } else {

                        if (oldVendedor != '') {
                            column += `<tr>
                                    <td class="font-w600"></td>
                                    <td class="font-w600"></td>
                                    <td class="font-w600"></td>
                                    <td class="font-w600 text-bold text-right" style="width: 100px;">SUBTOTAL</td>
                                    <td class="font-w600 text-center">${subTotalProposta}</td>
                                    <td class="font-w600 text-right"> R$ ${mascaraValor(subTotal)}</td>
                                </tr>`;
                            subTotalProposta = 0;
                            subTotal = 0;
                        }
                        column += `</tbody></table>` + table + `
                            <tr>
                                    <td class="font-w600">            ${vendedor}</td>
                                    <td class="font-w600">            ${dtativacao}</td>
                                    <td class="font-w600">            ${formadepagamento}</td>
                                    <td class="font-w600">            ${produto}</td>
                                    <td class="font-w600 text-center">${quantidade}</td>
                                    <td class="font-w600 text-right"> R$ ${mascaraValor(valor)}</td>
                                </tr>`;
                        subTotalProposta += parseInt(i.quantidade);
                        subTotal += parseFloat(valor);
                        oldVendedor = vendedor;
                    }


                });

                column += `<tr>
                                    <td class="font-w600"></td>
                                    <td class="font-w600"></td>
                                    <td class="font-w600"></td>
                                    <td class="font-w600 text-bold text-right" style="width: 100px;">SUBTOTAL</td>
                                    <td class="font-w600 text-center">${subTotalProposta}</td>
                                    <td class="font-w600 text-right"> R$ ${mascaraValor(subTotal)}</td>
                                </tr>`;

                column += `<tr>
                                    <td class="font-w600"></td>
                                    <td class="font-w600"></td>
                                    <td class="font-w600"></td>
                                    <td class="font-w600 text-bold text-right">TOTAL GERAL</td>
                                    <td class="font-w600 text-center">${totalProposta}</td>
                                    <td class="font-w600 text-right"> R$ ${mascaraValor(somaTotal)}</td>
                                </tr>`;


                table = column + `</tbody></table>`;

                // console.log(dados);
                grupoPai.append(table);
                // $("#qtdpessoas").empty();
                // $("#qtdpessoas").append((dados.length)+" pessoa(s)");
            }
        });
    }

    function getFormattedDate(data) {
        var date = new Date(data);
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        var formatterDay;
        if (day < 10) {
            formatterDay = '0' + day;
        } else {
            formatterDay = day;
        }

        var formatterMonth;
        if (month < 10) {
            formatterMonth = '0' + month;
        } else {
            formatterMonth = month;
        }

        return formatterDay + '/' + formatterMonth + '/' + year;

    }

    function nomeSN(str) {
        var tamanho = str.split(' ').length;
        var fnome = str.split(' ').slice(0, 1).join(' ');
        var lnome = str.split(' ').slice(tamanho - 1, tamanho).join(' ');
        return fnome + ' ' + lnome;
    }

    function firstUpper(string, separator = ' ') {
        console.log(string)
        return string
            .split(separator)
            .map((word) => word[0].toUpperCase() + word.slice(1).toLowerCase())
            .join(separator);


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
    </script>