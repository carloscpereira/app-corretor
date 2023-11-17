<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Seguradoras</h1>        
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Seguradoras</li>
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

            <!-- Search Seguradoras -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar seguradoras...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div>
            <!-- END Search Seguradoras -->


            <div class="block-options">
                <button type="button" class="btn-block-option mr-2" onclick="window.location.href = 'adm-seguradoras-manage.php'">
                    <i class="fa fa-plus mr-1"></i> Nova Seguradora
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>

        </div>
        <div class="block-content">
            <!-- Topics -->
            <table class="table table-striped table-borderless table-vcenter">
                <thead class="thead-light">
                    <tr>
                        <th colspan="2">Seguradora</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Produtos</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Vendas</th>
                        <th class="d-none d-md-table-cell" style="width: 200px;">Última Venda</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <a class="font-w600" href="adm-seguradoras-manage.php?id=1">Atemde Odonto</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="adm-produtos.php?id=2">30</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="javascript:void(0)">1320</a>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <span class="font-size-sm">by <a href="be_pages_generic_profile.php"><?php $dm->get_name(); ?></a><br>on <em>June 13, 2018</em></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a class="font-w600" href="adm-seguradoras-manage.php?id=2">Idental Assistência Odontológica</a>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="be_pages_generic_profile.php"><?php $dm->get_name(); ?></a> on <em>May 26, 2018</em>
                            </div>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="adm-produtos.php?id=2">23</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="javascript:void(0)">3202</a>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <span class="font-size-sm">by <a href="be_pages_generic_profile.php"><?php $dm->get_name(); ?></a><br>on <em>June 2, 2018</em></span>
                        </td>
                    </tr>
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
<?php require 'inc/_global/views/footer_end.php'; ?>
