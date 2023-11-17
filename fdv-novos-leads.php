<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Leads</h1>        
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
    <div class="block">
        <div class="block-header block-header-default">
            <!-- Search Campanha -->
            <div class="input-group input-group-lg">
                <input type="text" class="form-control form-control-alt" placeholder="Search..">
                <span class="input-group-text border-0 bg-body">
                <i class="fa fa-fw fa-search"></i>
                </span>
            </div>

            <!-- <div class="input-group">
                <input type="text" class="form-control" placeholder="Filtrar pela origem ou campanha...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div> -->

            <!-- END Search Campanha -->

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
        <div class="block-content">
            <!-- Topics -->
            <table class="table table-striped table-borderless table-vcenter">
                <thead class="thead-light">
                    <tr>
                        <th colspan="2">Propostas</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Beneficiários</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 200px;">Produto</th>
                        <th class="d-none d-md-table-cell" style="width: 100px;">Valor</th>
                        <th style="width: 180px;">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <a class="font-w600" href="fdv-propostas-manage.php?id=2">Dina Mendes Costa</a>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="be_pages_generic_profile.php"><?php echo "Facebook"; ?></a> campanha <em>MaxiOrto</em>
                            </div>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="adm-convenios.php?id=1">2</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                        <span class="font-size-sm"><a href="be_pages_generic_profile.php"><?php echo "Ortodontia"; ?></a><br><em>Boleto Bancário</em></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                        <span class="font-w600">R$ 91,50</span>
                        </td>
                        <td>
                        <span class="font-w600">(71) 9 9999-9200</span>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <a class="font-w600" href="fdv-propostas-manage.php?id=2">Thiago Carvalho</a>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="be_pages_generic_profile.php"><?php echo "Instagram"; ?></a> campanha <em>MaxiOrto</em>
                            </div>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="adm-convenios.php?id=1">1</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                        <span class="font-size-sm"><a href="be_pages_generic_profile.php"><?php echo "Ortodontia"; ?></a><br><em>Boleto Bancário</em></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                        <span class="font-w600">R$ 91,50</span>
                        </td>
                        <td>
                        <span class="font-w600">(71) 9 9999-9200</span>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <a class="font-w600" href="fdv-propostas-manage.php?id=2">Maria Luiza Pereira</a>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="be_pages_generic_profile.php"><?php echo "Site Idental"; ?></a> campanha <em>SEO Google</em>
                            </div>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="adm-convenios.php?id=1">2</a>
                        </td>
                        <td class="d-none d-md-table-cell text-center">
                        <span class="font-size-sm"><a href="be_pages_generic_profile.php"><?php echo "Ortodontia"; ?></a><br><em>Boleto Bancário</em></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                        <span class="font-w600">R$ 91,50</span>
                        </td>
                        <td>
                        <span class="font-w600">(71) 9 9999-9200</span>
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


