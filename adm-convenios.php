<?php include('../funcoes/corretor/funcoes-convenios.php'); ?>
<?php include('../funcoes/funcoes.php'); ?>


<?php
if (isset($_COOKIE['notice'])) {

    switch ($_COOKIE['notice']) {
        case 'insert success':
            echo "<script> "
                . " var tipo = 'success';"
                . " var mensagem = 'Convênio registrado com sucesso.';"
                . " var alerta = true; </script>";

            break;

        case 'insert fail':
            echo "<script> "
                . " var tipo = 'danger';"
                . " var mensagem = 'Houve uma falha ao tentar gravar o convênio.';"
                . " var alerta = true; </script>";

            break;
    }
}

?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Convênios</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Convênios</li>
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

            <!-- Search Convenios -->
            <div class="input-group">
                <input type="text" class="form-control" id="pesquisa" placeholder="Buscar convênios...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div>
            <!-- END Search Convenios -->


            <div class="block-options">
                <button type="button" class="btn-block-option mr-2"
                    onclick="window.location.href = 'adm-convenios-manage.php'">
                    <i class="fa fa-plus mr-1"></i> Novo Convênio
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
                        <th colspan="2">Convênio</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Produtos</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Vendas</th>
                        <th class="d-none d-md-table-cell" style="width: 200px;">Última Venda</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $convenios = pg_fetch_all(getConvenios());

                    if ($convenios != null) {
                        foreach ($convenios as $convenio) {

                            $idconvenio     = $convenio['id'];
                            $descricao      = primeiro_maiusculo(utf8_encode($convenio['descricao']));
                            $idseguradora   = $convenio['idseguradora'];
                            $idparse        = $convenio['idparse'];
                            $vendas         = $convenio['vendas'];

                            setlocale(LC_TIME, "pt_BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
                            date_default_timezone_set("America/Sao_Paulo");

                            $dtvenda        = strftime("%B %d, %Y", strtotime($convenio['dtvenda']));

                            $vendedor       = nome_sobrenome($convenio['vendedor']);

                    ?>

                    <tr class="bloco">
                        <td colspan="2">
                            <a class="font-w600"
                                href="adm-convenios-manage.php?id=<?php echo $idconvenio; ?>"><?php echo $descricao; ?></a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="adm-convenios-produtos.php?id=1">0</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="javascript:void(0)"><?php echo $vendas; ?></a>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <?php if ($vendedor != null) { ?>
                            <span class="font-size-sm">por <a
                                    href="javascript:void(0);"><?php echo $vendedor ?></a><br>em
                                <em><?php echo $dtvenda; ?></em></span>
                            <?php } ?>
                        </td>
                    </tr>

                    <?php } ?>
                    <?php } ?>

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

<!-- Page JS Helpers (Select2) -->
<script>
var alerta;
jQuery(function() {
    Dashmix.helpers(['select2']);
});

jQuery(function() {
    if (alerta) {
        Dashmix.helpers('notify', {
            align: 'center',
            type: tipo,
            icon: 'fa fa-check mr-1',
            message: mensagem
        });
    }
});
</script>

<?php require 'inc/_global/views/footer_end.php'; ?>

<script>
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