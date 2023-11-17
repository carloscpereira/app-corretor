<?php //include('../funcoes/corretor/funcoes-dashboard.php'); 
?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>


<input type="hidden" id="corretorid" value>
<!-- Hero -->
<div class="bg-white border-bottom">
    <div class="content py-0">
        <ul class="nav nav-tabs nav-tabs-alt border-bottom-0 justify-content-center justify-content-md-start">
            <li class="nav-item">
                <a class="nav-link text-body-color py-4 active" href="">
                    <i class="fa fa-rocket fa-fw text-gray"></i> <span class="d-none d-md-inline ml-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-body-color py-4" href="fdv-propostas.php">
                    <i class="fa fa-check-square fa-fw text-gray"></i> <span
                        class="d-none d-md-inline ml-1">Propostas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-body-color py-4" href="">
                    <i class="fa fa-chart-line fa-fw text-gray"></i> <span
                        class="d-none d-md-inline ml-1">Resultados</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-body-color py-4" href="">
                    <i class="fa fa-id-card fa-fw text-gray"></i> <span class="d-none d-md-inline ml-1">Cards</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-body-color py-4" href="">
                    <i class="fa fa-bezier-curve fa-fw text-gray"></i> <span
                        class="d-none d-md-inline ml-1">Contas</span>
                </a>
            </li>
            <li class="nav-item ml-auto d-none d-md-flex align-items-center">
                <button type="button" class="btn btn-sm btn-success d-none d-lg-inline-block mb-1"
                    onclick="window.location.href = 'fdv-propostas-manage.php'">
                    <i class="fa fa-magic fa-fw mr-1"></i> Nova Proposta
                </button>
            </li>
        </ul>
    </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<div class="content">
    <!-- Bitcoin Overview -->
    <div class="block block-rounded block-bordered">
        <!-- Main Chart -->
        <div class="block block-rounded block-mode-loading-refresh invisible" data-toggle="appear">
            <div class="block-header block-header-default">
                <h3 class="block-title">Contratos Ativos</h3>
                <div class="block-options">
                    <div class="btn-group btn-group-sm btn-group-toggle mr-2" data-toggle="buttons" role="group"
                        aria-label="Earnings Select Date Group">
                        <label class="btn btn-light" data-toggle="dashboard-chart-set-week">
                            <input type="radio" name="dashboard-chart-options" id="dashboard-chart-options-week"
                                checked> Semana
                        </label>
                        <label class="btn btn-light" data-toggle="dashboard-chart-set-month">
                            <input type="radio" name="dashboard-chart-options" id="dashboard-chart-options-month"> Mês
                        </label>
                        <label class="btn btn-light active" data-toggle="dashboard-chart-set-year">
                            <input type="radio" name="dashboard-chart-options" id="dashboard-chart-options-year"> Ano
                        </label>
                    </div>
                    <button type="button" class="btn-block-option align-middle" data-toggle="block-option"
                        data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full border-bottom">
                <div class="row text-center" id="dadoscomparativos">
                    <div class="col-lg-4 py-3 dadositem">
                        <div class="font-size-h1 font-w300 text-black mb-0">
                            40
                        </div>
                        <div class="font-size-sm font-w700 text-muted text-uppercase">
                            contratos (abril)
                        </div>
                    </div>
                    <div class="col-lg-4 py-3 dadositem">
                        <div class="font-size-h1 font-w300 text-black mb-0">
                            <span class="text-success">+</span> 3.500
                        </div>
                        <div class="font-size-sm font-w700 text-muted text-uppercase">
                            REL À MARÇO (qtd)
                        </div>
                    </div>
                    <div class="col-lg-4 py-3 dadositem">
                        <div class="font-size-h1 font-w300 text-black mb-0">
                            <span class="text-success">+</span> 133%
                        </div>
                        <div class="font-size-sm font-w700 text-muted text-uppercase">
                            REL À MARÇO (%)
                        </div>
                    </div>
                </div>
            </div>


            <div class="block-content block-content-full overflow-hidden">
                <div class="pull-x pull-b">
                    <!-- Chart.js Dashboard Earnings Container -->
                    <canvas class="js-ativos" style="height: 340px;"></canvas>
                </div>
            </div>
        </div>
        <!-- END Main Chart -->

    </div>
    <!-- END Bitcoin Overview -->
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php //$dm->get_js('js/plugins/chart.js/Chart.bundle.min.js'); 
?>

<!-- Page JS Code -->
<?php //$dm->get_js('js/graficos/chart_ativos.js'); 
?>

<?php require 'inc/_global/views/footer_end.php'; ?>