<?php include('../funcoes/corretor/funcoes-produtos.php');?>
<?php include('../funcoes/funcoes.php'); ?>

<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>


<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Produtos</h1>        
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Produtos</li>
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

            <!-- Search Produtos -->
            <div class="input-group">
                <input type="text" class="form-control" id ="pesquisa" placeholder="Buscar produtos...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </div>
            <!-- END Search Produtos -->


            <div class="block-options">
                <button type="button" class="btn-block-option mr-2" onclick="window.location.href = 'adm-produtos-manage.php'">
                    <i class="fa fa-plus mr-1"></i> Novo Produto
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
                        <th colspan="2">Produto</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Operadora</th>
                        <th class="d-none d-md-table-cell text-center" style="width: 100px;">Vendas</th>
                        <th class="d-none d-md-table-cell" style="width: 200px;">Última Venda</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                $produtos = getProdutos();

                if ($produtos!=null){
                    foreach($produtos as $produto){

                        $idoperadora    = $produto['idoperadora'];
                        $operadora      = primeiro_maiusculo($produto['operadora']);
                        $idproduto      = $produto['idproduto'];
                        $descproduto    = primeiro_maiusculo(utf8_encode($produto['produto']));
                        $idplano        = $produto['idplano'];
                        $plano          = primeiro_maiusculo(utf8_encode($produto['plano']));
                        $idversao       = $produto['idversao'];
                        $versao         = primeiro_maiusculo(utf8_encode($produto['versao']));
                        $vendas         = $produto['vendas'];
                        $idcontato      = $produto['idcontato'];

                        setlocale(LC_TIME, "pt_BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
                        date_default_timezone_set("America/Sao_Paulo");
                        
                        $dtvenda        = strftime("%B %d, %Y", strtotime($produto['datahora']));

                        $idvendedor     = $produto['idvendedor'];
                        $vendedor       = nome_sobrenome($produto['vendedor']);
                             
                ?>                
                    <tr class="bloco">
                        <td colspan="2">
                            <a class="font-w600" href="adm-produtos-manage.php?id=<?php echo $idproduto; ?>"><?php echo $descproduto; ?></a>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="javascritp:void(0);"><?php echo $plano; ?></a> ver. <em><?php echo $versao; ?></em>
                            </div>
                        </td>
                        
                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="javascript:void(0)"><?php echo $operadora; ?></a>
                        </td>

                        <td class="d-none d-md-table-cell text-center">
                            <a class="font-w600" href="javascript:void(0)"><?php echo $vendas; ?></a>
                        </td>
                        <td class="d-none d-md-table-cell">
                        <?php if ($vendedor != null){ ?>
                            <span class="font-size-sm">por <a href="javascript:void(0);"><?php echo $vendedor; ?></a><br>em <em><?php echo $dtvenda;?></em></span>
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
<?php require 'inc/_global/views/footer_end.php'; ?>

<script>
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

</script>