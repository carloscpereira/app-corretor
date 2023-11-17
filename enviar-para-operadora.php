<?php session_start(); ?>
<?php header('Content-Type: text/html; charset=utf8'); ?>

<?php
    if ( $_COOKIE['logado'] == NULL){
        header("Location: op_auth_signin.php");
    }

include('funcoes.php'); ?>

<?php 
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
?>


<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>


<!-- Hero -->
<div>
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <!--<h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gestão de Pedidos</h1>-->
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="si si-home" href="be_principal.php"></a></li>
                    <li class="breadcrumb-item"><a href="be_pedidos.php">Contatos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Enviar (modo gerente)</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content invisible" data-toggle="appear">
    <form class="js-validation" action="be_pedidos_pagamento.php" method="post">
        <!-- Block Tabs Alternative Style -->

        <div class="block-content tab-content">                     
            <div class="bg-body-light block-header">
                <h3 class="block-title">Defina para qual estágio do processo será encaminhada a proposta.</h3>
            </div>
            <br>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group row items-push mb-0">
                        <div class="col-md-4">
                            <a class="border border-info block block-rounded block-link-pop" href="be_pedidos.php?id=<?php echo $_GET['id'];?>&cmd=2&env=10">
                                <div class="block-content block-content-full">
                                    <span class="d-block text-center">
                                        <i class="fa fa-crosshairs fa-3x mb-2 text-black-50"></i> <br>
                                        ANÁLISE
                                    </span>

                                </div>
                            </a>                                
                        </div>

                        <div class="col-md-4">
                            <a class="border border-info block block-rounded block-link-pop" href="be_pedidos.php?id=<?php echo $_GET['id'];?>&cmd=2&env=13">
                                <div class="block-content block-content-full">
                                    <span class="d-block text-center">
                                        <i class="fa fa-comments fa-3x mb-2 text-black-50"></i> <br>
                                        PÓS-VENDAS
                                    </span>

                                </div>
                            </a>                                
                        </div>

                        <div class="col-md-4">
                            <a class="border border-info block block-rounded block-link-pop" href="be_pedidos.php?id=<?php echo $_GET['id'];?>&cmd=2&env=2">
                                <div class="block-content block-content-full">
                                    <span class="d-block text-center">
                                        <i class="fa fa-check fa-3x mb-2 text-black-50"></i> <br>
                                        PRÉ-ATIVAÇÃO
                                    </span>

                                </div>
                            </a>                                
                        </div>

                    </div>
                </div>
            </div>            
        </div>
        

        <!-- END Block Tabs Alternative Style -->                 
    </form>
    
    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>
<?php require 'inc/_global/views/footer_end.php'; ?>


<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $dm->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>

<?php $dm->get_js('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js'); ?>

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
<script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>


<!-- Page JS Code -->
<?php $dm->get_js('js/pages/validar_campos.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>

<script src="stacksnippets.net/scripts/snippet-javascript-console.min.js?v=1"></script>

<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
        
<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">


<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
<!-- Page JS Code -->
    <script>jQuery(function(){
            if (alerta){
                Dashmix.helpers('notify',{align: 'center', type: tipo, icon: 'fa fa-check mr-1', message: mensagem});
            }                        
        });
    </script>