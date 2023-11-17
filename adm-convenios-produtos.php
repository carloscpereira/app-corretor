<?php include('../funcoes/corretor/funcoes-convenios.php');?>
<?php include('../funcoes/funcoes.php');?>


<?php 
if (isset($_COOKIE['notice'])){

    switch ($_COOKIE['notice']){
        case 'insert success':
            echo "<script> "
            . " var tipo = 'success';"
            . " var mensagem = 'Preço registrado com sucesso.';"
            . " var alerta = true; </script>";

        break;

        case 'insert fail':
            echo "<script> "
            . " var tipo = 'danger';"
            . " var mensagem = 'Houve uma falha ao tentar gravar o preço.';"
            . " var alerta = true; </script>";

        break;
    }
}

?>



<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $dm->get_css('js/plugins/select2/css/select2.min.css'); ?>


<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gerenciando Preços</h1>        
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="adm-convenios.php">Convênios</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Preços</li>
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
                <input type="text" class="form-control" id="pesquisa" placeholder="Digite o convênio ou produto...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <a href="#"><i class="fa fa-fw fa-search"></i></a>
                    </span>
                </div>
            </div>
            <!-- END Search Produtos -->

            <div class="block-options">
                <button type="button" class="btn-block-option mr-2" onclick="window.location.href = 'adm-convenios-produtos-preco.php'">
                    <i class="fa fa-plus mr-1"></i> Novo Preço
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
                        <th colspan="2" class="d-none d-md-table-cell text-center" style="width: 100px;">Operadora</th>
                        <th class="d-none d-md-table-cell" style="width: 150px;">Preço</th>
                        <th class="d-none d-md-table-cell" style="width: 150px;">Forma Pgto</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                $precos = pg_fetch_all(getPrecos());
                

                if ($precos!=null){
                    foreach($precos as $preco){

                        $idpreco            = $preco['idpreco'];
                        $idoperadora        = $preco['idoperadora'];
                        $operadora          = primeiro_maiusculo(utf8_encode($preco['operadora']));
                        $idproduto          = $preco['idproduto'];
                        $produto            = primeiro_maiusculo(utf8_encode($preco['produto']));
                        $idconvenio         = $preco['idconvenio'];
                        $convenio           = primeiro_maiusculo($preco['convenio']);
                        $idplano            = $preco['idplano'];
                        $plano              = primeiro_maiusculo(utf8_encode($preco['plano']));
                        $idversao           = $preco['idversao'];
                        $versao             = primeiro_maiusculo(utf8_encode($preco['versao']));
                        $formadepagamento   = primeiro_maiusculo(utf8_encode($preco['formadepagamento']));
                        $valor              = $preco['valor'];
                
                             
                ?>                

                    <tr class="bloco">
                        <td colspan="2">
                            <a class="font-w600" href="adm-convenios-produtos-preco.php?id=<?php echo $idpreco; ?>"><?php echo $produto; ?></a>
                            <div class="font-size-sm text-muted mt-1">
                                <a href="adm-convenios-manage.php?id=<?php echo $idconvenio; ?>"><?php echo $convenio; ?></a> 
                            </div>
                        </td>
                        <td colspan="2" class="d-none d-md-table-cell text-center">
                        <span class="font-size-sm"><?php echo $operadora; ?></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <span class="font-size-md">R$ <?php echo $valor; ?></span>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <span class="font-size-md"><?php echo $formadepagamento; ?></span>
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

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/select2/js/select2.full.min.js'); ?>
<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>

<!-- Page JS Helpers (Select2) -->
<script>

    jQuery(function(){ Dashmix.helpers(['select2']); });

    jQuery(function(){
                if (alerta){
                    Dashmix.helpers('notify',{align: 'center', type: tipo, icon: 'fa fa-check mr-1', message: mensagem});
                }                        
            });
            
</script>


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
