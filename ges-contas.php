<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Contas</h1>        
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Contas</li>
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

            <!-- Search Contas -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar corretores...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div>
            <!-- END Search Contas -->


            <div class="block-options">
                <button type="button" class="btn-block-option mr-2" onclick="window.location.href = 'ges-contas-manage.php'">
                    <i class="fa fa-plus mr-1"></i> Nova Conta
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
                        <th colspan="2">Corretor</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Vendas</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 150px;">Última Venda</th>
                        <th class="d-none d-md-table-cell" style="width: 120px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <a class="font-w600" href="adm-produtos-manage.php?id=2">Andrea Souza</a>
                            <span class ="badge badge-danger">suspenso</span>
                            <div class="font-size-sm text-muted mt-1">
                                <em>Super. </em><a href="#"><?php echo 'Lilia Garcia'; ?></a> desde <em>May 26, 2018</em>
                            </div>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="adm-convenios.php?id=1">23</a>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <span class="font-size-sm">para <a href="#"><?php $dm->get_name(); ?></a><br>on <em>June 2, 2018</em></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <i class="fa fa-2x fa-envelope text-info"></i>
                            <!-- <i class="fa fa-2x fa-thumbs-down text-danger-light ml-2"></i> -->
                            <i class="fa fa-2x fa-circle text-success-light ml-2"></i>                    
                        </td>

                    </tr>

                    <tr>
                        <td colspan="2">
                            <a class="font-w600" href="adm-produtos-manage.php?id=2">Izabel Seixas</a>
                            <span class ="badge badge-success">ativo</span>
                            <div class="font-size-sm text-muted mt-1">
                                <em>Super. </em><a href="#"><?php echo 'Lilia Garcia'; ?></a> desde <em>May 26, 2018</em>
                            </div>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="adm-convenios.php?id=1">23</a>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <span class="font-size-sm">para <a href="#"><?php $dm->get_name(); ?></a><br>on <em>June 2, 2018</em></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <i class="fa fa-2x fa-envelope text-info"></i>
                            <i class="fa fa-2x fa-circle text-danger-light ml-2"></i>
                            <!-- <i class="fa fa-2x fa-thumbs-up text-success-light ml-2"></i>                     -->
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
