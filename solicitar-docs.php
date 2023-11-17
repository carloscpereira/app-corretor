<?php error_reporting(0); ?>
<?php header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/corretor/funcoes-propostas.php');?>
<?php include('../funcoes/corretor/conexao.php');?>


<?php 

    $idvendedor = $_COOKIE['idvendedor'];
   

    if ($_GET['id']!=null){       
       
    $idcontato = $_GET['id'];     
       
    $sql = "SELECT idoperadora, primeirapaga, primeiraparcela, time_assinatura_proposta, proposta_digital, idtipodeproposta, idformadepagamento FROM contatos WHERE idcontato=$idcontato";
    $result = pg_query($sql);
    $data   = pg_fetch_assoc($result);
           
    $idoperadora        = $data['idoperadora'];
    $primeirapaga       = $data['primeirapaga'];
    $primeiraparcela    = $data['primeiraparcela'];
    $dthrassinatura     = $data['time_assinatura_proposta'];
    $propostadg         = $data['proposta_digital'];
    $idtipodeproposta   = $data['idtipodeproposta'];
    $idformadepagamento = $data['idformadepagamento'];

   } else {
    /* Redireciona para página inválida */
   }

?>

<?php require 'inc_global/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<?php $dm->get_css('js/plugins/dropzone/dist/min/dropzone.min.css'); ?>

<!-- Page Content -->
<div class="content content-boxed">
    <!-- Invoice -->
    <div class="block block-fx-shadow">

    
        <div class="block-content">            
            <div class="text-center">
                <?php 
                    if ($idoperadora==1){
                        echo "<img src='./assets/media/images/logo_idental.png'>";
                    } else {
                        echo "<img src='./assets/media/images/logo_atemde.png'>";
                    }
                ?>
                <p class="font-size-h3 font-w300 mt-3 mb-0">
                    PROPOSTA DOS PLANOS DE ASSISTÊNCIA ODONTOLÓGICA
                </p>

            </div>
            
            <?php $dm->get_js('js/plugins/dropzone/dropzone.min.js'); ?>   
            
            <div class="p-sm-4 p-xl-7">
                <h4 class="content-heading text-center">ANEXO DE DOCUMENTOS</h4>
                
                <!--Obter documentos do RF-->
                <?php $rfinanceiro = getRFinanceiro($idcontato);
                $idrf = $rfinanceiro[0]['id'];
                $nomerf = strtoupper($rfinanceiro[0]['nome']); ?>
                <h6><?php echo $nomerf; ?>(Responsável Financeiro)</h6>
                
                <div class="custom-control 
                            custom-switch 
                            custom-control-primary mb-1">
                    <input 
                           type="checkbox"
                           class="custom-control-input"
                           id="rdrg"
                           unchecked>
                    <label 
                           class="custom-control-label"
                           for="rdrg"
                           style="margin: 0 10px;">
                        RG frente e verso em uma imagem só.</label>
                </div>
                
                <div class="custom-control 
                            custom-switch 
                            custom-control-primary mb-1">
                    <input 
                           type="checkbox" 
                           class="custom-control-input"
                           id="rdcpf"
                           unchecked>
                    <label 
                           class="custom-control-label"
                           for="rdcpf"  
                           style="margin: 0 10px;">
                        CPF incluso no RG.</label>
                </div>
                <br>                                
                <!--id="1": tipo de contato: responsavel financeiro-->
                <div class="tpcontato row form-group items-push mb-0" id="1">
                    <!-- RG FRENTE -->
                    <div class="col-lg-3" id="1">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (Frente)<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrgrffr">
                                <input type="hidden" 
                                       name="tipodedocumento" value="1">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" 
                                       name="id" value="<?php echo $idrf;?>">
                            </form> 
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: RG FRENTE -->
                    
                    <!-- RG VERSO-->
                    <div class="col-lg-3" id="2">
                        <!-- RG (verso - Imagem Servidor)-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;" />
                            <br>

                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (Verso)<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM RG (verso - Imagem Servidor)-->

                        <!-- RG (verso)-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrgrffu">
                                <input type="hidden" 
                                       name="tipodedocumento" value="2">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" 
                                       name="id" value="<?php echo $idrf;?>">
                            </form> 
                        </div>
                        <!-- FIM RG (verso)-->
                    </div>
                    <!-- FIM: RG VERSO-->
                    
                    <!-- RG -->
                    <div class="col-lg-3" id="3">
                        <!-- RG (frente e verso - Imagem Servidor)-->
                        <div class="imagem">
                            <img class="img-thumbnail" id="img-view-rgrf" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (frente e verso)<br>click para remover</small>
                                </span>
                            </button>                        


                        </div>                
                        <!-- FIM RG (frente e verso - Imagem Servidor)-->                    

                        <!-- RG Frente e Verso Nova Imagem -->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrgrf">
                                <input type="hidden" 
                                       name="tipodedocumento" value="3">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" 
                                       name="id" value="<?php echo $idrf;?>">
                            </form> 

                        </div>
                        <!-- FIM RG Frente e Verso Nova Imagem -->
                    </div>
                    <!-- FIM: RG -->

                    <!-- CPF-->
                    <div class="col-lg-3" id="4">
                        <!-- CPF Imagem Servidor-->
                        <div class="imagem">
                            <img class="img-thumbnail"width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>CPF<br>click para remover</small>
                                </span>
                            </button>


                        </div>                
                        <!-- FIM CPF Imagem Servidor-->

                        <!-- CPF Nova Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzcpfrf">
                                <input type="hidden" 
                                       name="tipodedocumento" value="4">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" 
                                       name="id" value="<?php echo $idrf;?>">
                            </form>                                                        

                        </div>
                        <!-- FIM CPF Nova Imagem-->
                    </div>
                    <!-- FIM: CPF-->

                    <!-- Comprovante de Residencia-->
                    <div class="col-lg-3" id="5">
                        <!-- Comprovante de Residencia Imagem Servidor-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block" >
                                <span class="text-center">
                                    <small>Comprovante de Residência<br>click para remover</small>
                                </span>
                            </button>                            
                        
                        </div>                
                        <!-- FIM Comprovante de Residencia Imagem Servidor-->

                        <!-- Comprovonte de Residência-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzres">
                                <input type="hidden" 
                                       name="tipodedocumento" value="5">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                                                        

                        </div>
                        <!-- FIM Comprovonte de Residência-->
                    </div>
                    <!-- FIM: Comprovante de Residencia-->

                    <!-- forma de pagamento CREDITO-->
                    <?php if (($idformadepagamento==1)||($idformadepagamento==2)){ ?>
                    
                    <!-- cartão de crédito frente-->
                    <div class="col-lg-3" id="10">
                        <!-- cartão de crédito FRENTE IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Cartão de Crédito (frente)<br>click para remover</small>
                                </span>
                            </button>


                        </div>                
                        <!-- FIM cartão de crédito FRENTE IMAGEM SERVIDOR-->

                        <!-- cartão de crédito FRENTE-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropccfrente">
                                <input type="hidden" 
                                       name="tipodedocumento" value="10">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            

                        </div>
                        <!-- FIM cartão de crédito FRENTE-->
                    </div>
                    <!-- FIM: cartão de crédito frente-->
                    
                    <!-- cartão de crédito verso-->
                    <div class="col-lg-3" id="11">
                        <!-- cartão de crédito VERSO IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Cartão de Crédito (Verso)<br>click para remover</small>
                                </span>
                            </button>

                        </div>                
                        <!-- FIM cartão de crédito VERSO IMAGEM SERVIDOR-->

                        <!-- cartão de crédito VERSO -->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropccverso">
                                <input type="hidden" 
                                       name="tipodedocumento" value="11">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            
 
                        </div>
                        <!-- FIM cartão de crédito VERSO-->
                    
                    </div>
                    <!-- FIM: cartão de crédito verso-->
                    <?php } ?>
                    <!-- FIM forma de pagamento CREDITO-->                    
                    
                    <!-- forma de pagamento CONSIGNADO-->
                    <?php if ($idformadepagamento==2){ ?>   
                    
                    <!-- Contra-Cheque-->
                    <div class="col-lg-3" id="12">
                        <!-- Contra-Cheque IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Contra-Cheque<br>click para remover</small>
                                </span>
                            </button>

    
                        </div>                
                        <!-- FIM Contra-Cheque IMAGEM SERVIDOR-->

                        <!-- contra-cheque NOVA IMAGEM-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropccheque">
                                <input type="hidden" 
                                       name="tipodedocumento" value="12">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            

                        </div>
                        <!-- FIM contra-cheque NOVA IMAGEM-->
                    </div>
                    <!-- FIM: Contra-Cheque-->
                    <?php } ?>
                    <!-- FIM forma de pagamento CONSIGNADO-->
                    
                    <!-- forma de pagamento DEBITO-->
                    <?php if (($idformadepagamento==3)||($idformadepagamento==2)){ ?>
                    
                    <!-- cartão de débito frente-->
                    <div class="col-lg-3" id="14">
                        <!-- cartão de débito FRENTE IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Cartão de Débito<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM cartão de débito FRENTE IMAGEM SERVIDOR-->

                        <!-- cartão de débito FRENTE-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropcdfrente">
                                <input type="hidden" 
                                       name="tipodedocumento" value="14">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            
 
                        </div>
                        <!-- FIM cartão de débito FRENTE-->
                    </div>
                    <!-- FIM: cartão de débito frente-->
                    
                    <?php } ?>
                    <!-- FIM forma de pagamento DEBITO-->                         

                    <!-- Recibo de Pagamento-->
                    <?php if (($primeirapaga=='t')||($primeiraparcela=='O')){?>
                    <!-- Recibo-->
                    <div class="col-lg-3" id ="7">
                        <!-- Recibo IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Recibo de Pagamento<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM Recibo IMAGEM SERVIDOR-->

                        <!-- Recibo NOVA CAPTURA-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="droprecibo">
                                <input type="hidden" 
                                       name="tipodedocumento" value="7">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            

                        </div>
                        <!--FIM Recibo NOVA CAPTURA-->
                    </div>
                    <!-- FIM: Recibo-->
                    <?php } ?>
                    <!-- FIM Recibo de Pagamento-->
                    
                    <?php if ($propostadg=='f'){?> 
                    <!-- Proposta Física-->
                    <div class="col-lg-3" id="8">
                        <!-- Proposta Física IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block" id="">
                                <span class="text-center">
                                    <small>Proposta Física<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM Proposta Física IMAGEM SERVIDOR-->

                        <!-- Proposta Física-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropproposta">
                                <input type="hidden" 
                                       name="tipodedocumento" value="8">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            
                        </div>
                        <!-- FIM Proposta Física-->
                    </div>
                    <!-- FIM: Proposta Física-->
                    
                    <!-- Aditivo -->
                    <div class="col-lg-3" id="9">
                        <!-- Aditivo IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Aditivo de Contrato<br>click para remover</small>
                                </span>
                            </button>                            
                        </div>                
                        <!-- FIM Aditivo IMAGEM SERVIDOR-->

                        <!-- Aditivo de Contrato -->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropaditivo">
                                <input type="hidden" 
                                       name="tipodedocumento" value="9">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            
                        </div>
                        <!-- FIM Aditivo de Contrato -->
                    </div>
                    <!-- FIM: Aditivo -->
                    <?php } ?>

                    <?php if (($idformadepagamento==2)&&($propostadg=='f')){?>
                    <!-- Requerimento -->
                    <div class="col-lg-3" id="13">
                        <!-- Requerimento IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Requerimento de Averbação<br>click para remover</small>
                                </span>
                            </button>
                        </div> 
                        <!-- FIM Requerimento IMAGEM SERVIDOR-->

                        <!-- Requerimento de Averbação -->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropraverbacao">
                                <input type="hidden" 
                                       name="tipodedocumento" value="13">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            

                        </div>
                        <!-- FIM Requerimento de Averbação -->
                    </div>
                    <!-- FIM: Requerimento -->
                    <?php } ?>

                    <!-- Declaração de Abrangência-->
                    <div class="col-lg-3" id="16">
                        <!-- Declaração de Abrangência IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Declaração de Abrangência<br>click para remover</small>
                                </span>
                            </button>
                        </div> 
                        <!-- FIM Declaração de Abrangência IMAGEM SERVIDOR-->

                        <!-- Declaração de Abrangência -->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropabrangencia">
                                <input type="hidden" 
                                       name="tipodedocumento" value="16">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            
                        </div>
                        <!-- FIM Declaração de Abrangência -->
                    </div>
                    <!-- FIM: Declaração de Abrangência-->
                    
                    <!-- forma de pagamento DEBITO-->
                    <?php if (($idformadepagamento==3)||($idformadepagamento==2)){ ?>
                    
                    <!-- Autorização de Débito-->
                    <div class="col-lg-3" id="17">
                        <!-- Autorização de Débito IMAGEM SERVIDOR-->
                        <div class="imagem">
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>Autorização de Débito<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM Autorização de Débito IMAGEM SERVIDOR-->

                        <!-- Autorização de Débito-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropautdebito">
                                <input type="hidden" 
                                       name="tipodedocumento" value="17">
                                <input type="hidden" 
                                       name="tipodecontato" value="1">
                                <input type="hidden" name="id" value="<?php echo $idrf;?>">
                            </form>                            
 
                        </div>
                        <!-- Autorização de Débito -->
                    </div>
                    <!-- FIM: Autorização de Débito-->
                    <?php } ?>
                    
                </div>
                                
                <!-- FIM Obter documentos do RF-->
                    
                <!--Script dropzone RESPONSAVEL-->
                <script>                    
                    
                    var $rgrf        = null;
                    var $rgrffr      = null;
                    var $rgrffu      = null;
                    var $cpfrf       = null;
                    var $resrf       = null;
                    var $rendarf     = null;
                    var $recibo      = null;
                    var $proposta    = null;
                    var $raverbacao  = null;
                    var $aditivo     = null;
                    var $creditof    = null;
                    var $creditov    = null;
                    var $debitof     = null;
                    var $ccheque     = null;
                    var $abrangencia = null;
                    var $autdebito   = null;
                    
                    
                    /*RG (frente)*/
                    Dropzone.options.dropzrgrffr = {
                        dictDefaultMessage :'RG (frente)<br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgrffr = file.name;                                
                            });
                        }                        
                    };
                    /*FIM RG (frente)*/
                        
                    /*RG (fundo)*/
                    Dropzone.options.dropzrgrffu = {
                        dictDefaultMessage :'RG (verso)<br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgrffu = file.name;
                            });
                        }                        
                    };
                    /*FIM RG*/
                        
                    /*RG */
                    Dropzone.options.dropzrgrf = {
                        dictDefaultMessage :'RG <br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgrf = file.name;
                            });
                        }                        
                    };
                    /*FIM RG*/
                        
                    /*CPF*/
                    Dropzone.options.dropzcpfrf = {
                        dictDefaultMessage :'CPF<br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $cpfrf = file.name;
                            });
                        }                 
                    };
                    /*FIM CPF*/
                        
                    /*Comprovante de Residência*/
                    Dropzone.options.dropzres = {
                        dictDefaultMessage :'C. de Residência<br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $resrf = file.name;
                            });
                        }                 
                    };
                    /*FIM Comprovante de Residência*/

                    /*Cartão de Crédito - Frente*/
                    Dropzone.options.dropccfrente = {
                        dictDefaultMessage :'Cto Crédito (frente)<br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $creditof = file.name;
                            });
                        }                 
                    };
                    /*Cartão de Crédito - Fundo*/

                    /*Cartão de Crédito - Verso*/
                    Dropzone.options.dropccverso = {
                        dictDefaultMessage :'Cto Crédito (verso)<br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $creditov = file.name;
                            });
                        }                 
                    };
                    /*Cartão de Crédito - Verso*/

                    /*Cartão de Débito - Frente*/
                    Dropzone.options.dropcdfrente = {
                        dictDefaultMessage :'Cto Débito<br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $debitof = file.name;
                            });
                        }                 
                    };
                    /*Cartão de Débito - frente*/
                                        
                    /*contra-Cheque*/
                    Dropzone.options.dropccheque = {
                        dictDefaultMessage :'Contra-Cheque<br><?php echo 'de '.nome_sobrenome($nomerf);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $ccheque = file.name;
                            });
                        }                 
                    };
                    /*FIM Contra-Cheque*/
                    

                    /*Recibo*/
                    Dropzone.options.droprecibo = {
                        dictDefaultMessage :'Recibo de Pagamento<br> da primeira parcela',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $recibo = file.name;
                            });
                        }                 
                    };
                    /*FIM Recibo*/
                    
                    /*Proposta*/
                    Dropzone.options.dropproposta = {
                        dictDefaultMessage :'Proposta Fisica',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $proposta = file.name;
                            });
                        }                 
                    };
                    /*FIM Proposta*/
                    
                    /*Requerimento de Averbação*/
                    Dropzone.options.dropraverbacao = {
                        dictDefaultMessage :'Requerimento de Averbação',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $raverbacao = file.name;
                            });
                        }                 
                    };
                    /*FIM Requerimento de Averbação*/
                    
                    /*Aditivo de Contrato*/
                    Dropzone.options.dropaditivo = {
                        dictDefaultMessage :'Aditivo de Contrato',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $aditivo = file.name;
                            });
                        }                 
                    };
                    /*FIM Aditivo de Contrato*/
                    
                    /*Declaração de Abrangência*/
                    Dropzone.options.dropabrangencia = {
                        dictDefaultMessage :'Decl de Abrangência',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $abrangencia = file.name;
                            });
                        }                 
                    };
                    /*FIM declaração de Abrangência*/
                    
                    /*Autorização de Débito*/
                    Dropzone.options.dropautdebito = {
                        dictDefaultMessage :'Aut de Débito',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $autdebito = file.name;
                            });
                        }                 
                    };
                    /*FIM declaração de Abrangência*/
                    
                </script>
                <!--FIM Script dropzone RESPONSAVEL-->
                    
                <!--Obter documentos do Titular-->
                <?php $titular = getTitular($idcontato);
                $idtit = $titular[0]['id'];
                $nometit = strtoupper($titular[0]['nome']); ?>
                    
                
                <?php
                if ($nomerf<>$nometit){?>
                <h6><?php echo $nometit; ?> (Titular)</h6>
                
                <div class="custom-control 
                            custom-switch 
                            custom-control-primary mb-1">
                    <input 
                           type="checkbox"
                           class="custom-control-input"
                           id="rdrgt"
                           unchecked>
                    <label 
                           class="custom-control-label"
                           for="rdrgt"
                           style="margin: 0 10px;">
                        RG frente e verso em uma imagem só.</label>
                </div>
                
                <div class="custom-control 
                            custom-switch 
                            custom-control-primary mb-1">
                    <input 
                           type="checkbox" 
                           class="custom-control-input"
                           id="rdcpft"
                           unchecked>
                    <label 
                           class="custom-control-label"
                           for="rdcpft"  
                           style="margin: 0 10px;">
                        CPF incluso no RG.</label>
                </div>                
                                                

                <!--id="2": tipo de contato: titular-->
                <div class="tpcontato row form-group items-push mb-0" id="2">
            
                    <!-- RG FRENTE -->
                    <div class="col-lg-3" id="1">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (Frente)<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrgtitf">
                                <input type="hidden" 
                                       name="tipodecontato" value="2">
                                <input type="hidden" 
                                       name="tipodedocumento" value="1">
                                <input type="hidden" 
                                       name="id" value="<?php echo $idtit;?>">
                            </form> 
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: RG FRENTE -->                    
                    
                    <!-- RG VERSO -->
                    <div class="col-lg-3" id="2">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (Verso)<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrgtitv">
                                <input type="hidden" 
                                       name="tipodecontato" value="2">
                                <input type="hidden" 
                                       name="tipodedocumento" value="2">
                                <input type="hidden" 
                                       name="id" value="<?php echo $idtit;?>">
                            </form> 
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: RG VERSO -->                    
                    
                    <!-- RG FRENTE E VERSO -->
                    <div class="col-lg-3" id="3">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (Frente e Verso)<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrgtit">
                                <input type="hidden" 
                                       name="tipodecontato" value="2">
                                <input type="hidden" 
                                       name="tipodedocumento" value="3">
                                <input type="hidden" 
                                       name="id" value="<?php echo $idtit;?>">
                            </form> 
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: RG FRENTE E VERSO -->                    

                    <!-- CPF -->
                    <div class="col-lg-3" id="4">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>CPF<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzcpftit">
                                <input type="hidden" 
                                       name="tipodecontato" value="2">
                                <input type="hidden" 
                                       name="tipodedocumento" value="4">
                                <input type="hidden" name="id" value="<?php echo $idtit;?>">
                            </form>                                                        
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: CPF -->                    

                </div>

                <!--Script dropzone TITULAR-->
                <script>
                    var $rgtitf = null;
                    var $rgtitv = null;
                    var $rgtit  = null;
                    var $cpftit = null;
                    
                    /*RG (frente) Titular*/
                    Dropzone.options.dropzrgtitf = {
                        dictDefaultMessage :'RG(frente)<br><?php echo 'de '.nome_sobrenome($nometit); ?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgtitf = file.name;
                            });
                        }                      
                    };
                    /*FIM RG(frente) Titular*/
    
                    /*RG (verso) Titular*/
                    Dropzone.options.dropzrgtitv = {
                        dictDefaultMessage :'RG (verso)<br><?php echo 'de '.nome_sobrenome($nometit); ?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgtitv = file.name;
                            });
                        }                      
                    };
                    /*FIM RG Titular*/
    
                    /*RG (frente e verso) Titular*/
                    Dropzone.options.dropzrgtit = {
                        dictDefaultMessage :'RG<br><?php echo 'de '.nome_sobrenome($nometit); ?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgtit = file.name;
                            });
                        }                      
                    };
                    /*FIM RG (frente e verso) Titular*/
    
                    /*CPF Titular*/
                    Dropzone.options.dropzcpftit = {
                        dictDefaultMessage :'CPF<br><?php echo 'de '.nome_sobrenome($nometit); ?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $cpftit = file.name;
                            });
                        }               
                    };
                    /*FIM CPF Titular*/
                </script>
                <!--FIM Script dropzone TITULAR-->
                    
                <?php } ?>
                <!--FIM Obter documentos do Titular-->
                    
                <!--Obter documentos dos dependentes -->
                <?php $dependentes = getDependentes($idcontato);?>
                <?php if ($dependentes!= null){?>
                <h5>DEPENDENTES</h5>
                <?php } ?>
                <?php
                foreach($dependentes as $dependente){
                    $iddep      = $dependente['id'];
                    $nomedep    = strtoupper($dependente['nome']); ?>
                <h6><?php echo $nomedep; ?></h6>

                <div class="custom-control 
                            custom-switch 
                            custom-control-primary mb-1">
                    <input 
                           type="checkbox"
                           class="custom-control-input"
                           id="rdrg<?php echo $iddep;?>"
                           unchecked>
                    <label 
                           class="custom-control-label"
                           for="rdrg<?php echo $iddep;?>"
                           style="margin: 0 10px;">
                        RG frente e verso em uma imagem só.</label>
                </div>
                
                <div class="custom-control 
                            custom-switch 
                            custom-control-primary mb-1">
                    <input 
                           type="checkbox" 
                           class="custom-control-input"
                           id="rdcpf<?php echo $iddep;?>"
                           unchecked>
                    <label 
                           class="custom-control-label"
                           for="rdcpf<?php echo $iddep;?>"  
                           style="margin: 0 10px;">
                        CPF incluso no RG.</label>
                </div>                
                

                <!--id="3": tipo de contato: dependentes-->
                <div class="tpcontato row form-group items-push mb-0" id="3">
                    
                    <!-- RG FRENTE -->
                    <div class="col-lg-3" id="1">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (Frente)<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrgf<?php echo $iddep;?>">
                                <input type="hidden" 
                                       name="tipodecontato" value="3">
                                <input type="hidden" 
                                       name="tipodedocumento" value="1">
                                <input type="hidden" name="id" value="<?php echo $iddep;?>">
                            </form> 
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: RG FRENTE -->                    
                    
                    <!-- RG VERSO -->
                    <div class="col-lg-3" id="2">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (Verso)<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrgv<?php echo $iddep;?>">
                                <input type="hidden" 
                                       name="tipodecontato" value="3">
                                <input type="hidden" 
                                       name="tipodedocumento" value="2">
                                <input type="hidden" name="id" value="<?php echo $iddep;?>">
                            </form> 
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: RG VERSO -->                    
                    
                    <!-- RG FRENTE E VERSO -->
                    <div class="col-lg-3" id="3">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>RG (Frente e Verso)<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzrg<?php echo $iddep;?>">
                                <input type="hidden" 
                                       name="tipodecontato" value="3">
                                <input type="hidden" 
                                       name="tipodedocumento" value="3">
                                <input type="hidden" name="id" value="<?php echo $iddep;?>">
                            </form>
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: RG FRENTE E VERSO -->                    

                    <!-- RG CPF -->
                    <div class="col-lg-3" id="4">
                        <!-- Imagem Servidor-->
                        <div class="imagem">  
                            <img class="img-thumbnail" width="100%" height="100%" style="height:160px;"/>
                            <br>
                            <button type="button" class="btn btn-link remove_image btn-block">
                                <span class="text-center">
                                    <small>CPF<br>click para remover</small>
                                </span>
                            </button>
                        </div>
                        <!-- FIM:Imagem Servidor)-->

                        <!-- Captura Imagem-->
                        <div class="captura">
                            <form action="upload-docs.php" class="dropzone" id="dropzcpf<?php echo $iddep;?>">
                                <input type="hidden" 
                                       name="tipodecontato" value="3">
                                <input type="hidden" 
                                       name="tipodedocumento" value="4">        
                                <input type="hidden" name="id" value="<?php echo $iddep;?>">
                            </form>                                                        
                        </div>
                        <!-- FIM: Captura Imagem-->
                    </div>
                    <!-- FIM: CPF -->                    
                </div>
    
                <!--Script dropzone Dependentes-->
                <script>
                    var $rgf<?php echo $iddep;?>;
                    var $rgv<?php echo $iddep;?>;
                    var $rg<?php echo $iddep;?>;
                    var $cpf<?php echo $iddep;?>;
                    
                    /*RG (frente) Dependente*/
                    Dropzone.options.dropzrgf<?php echo $iddep;?> = {
                        dictDefaultMessage :'RG (frente)<br><?php echo 'de '.nome_sobrenome($nomedep);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgf<?php echo $iddep;?> = file.name;
                            });
                        }                   
                    };
                    /*FIM RG (frente) Dependente*/
    
                    /*RG (verso) Dependente*/
                    Dropzone.options.dropzrgv<?php echo $iddep;?> = {
                        dictDefaultMessage :'RG (verso)<br><?php echo 'de '.nome_sobrenome($nomedep);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgv<?php echo $iddep;?> = file.name;
                            });
                        }                   
                    };
                    /*FIM RG (verso) Dependente*/

                    /*RG (frente e verso) Dependente*/
                    Dropzone.options.dropzrg<?php echo $iddep;?> = {
                        dictDefaultMessage :'RG<br><?php echo 'de '.nome_sobrenome($nomedep);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $rgv<?php echo $iddep;?> = file.name;
                            });
                        }                   
                    };
                    /*FIM RG (frente e verso) Dependente*/
    
                    /*CPF Dependente*/
                    Dropzone.options.dropzcpf<?php echo $iddep;?> = {
                        dictDefaultMessage :'CPF<br><?php echo 'de '.nome_sobrenome($nomedep);?>',
                        uploadMultiple : false,
                        maxFiles : 1,
                        autoProcessQueue: true,
                        acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
                        resizeWidth: 600,
                        resizeHeight: 800,
                        init: function () {
                            this.on("success", function (file, response) {
                                $cpf<?php echo $iddep;?> = file.name;
                            });
                        }             
                    };
                    /*FIM CPF Dependente*/
                </script>
                <!--FIM Script dropzone Dependente-->

                <?php } ?>
                <!--FIM Obter documentos dos Dependentes-->
                
                <h4 class="content-heading"></h4>
                
                <!--     Botões -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group row items-push mb-0">
                            <div class="col-md-4">
                                <a class="border border-info block block-rounded block-link-pop" href="be_pedidos.php">
                                    <div class="block-content block-content-full">
                                        <span class="d-block text-center">
                                            <i class="si si-action-undo fa-2x mb-2 text-black-50"></i>
                                            <br>
                                            Voltar
                                        </span>
                                    </div>
                                </a>                                
                            </div>
                                                        
                            <?php if ( 
                                    ($idvendedor==4)||
                                    ($idvendedor==11)
                                    )
                                    {?>
                            <div class="col-md-4">
                                <a class="border border-danger block block-rounded block-link-pop" 
                                   href="javascript:void(0)" 
                                   onclick="submeterProposta2();">
                                    <div class="block-content block-content-full">
                                        <span class="d-block text-center">
                                            <i class="si si-cloud-upload fa-2x mb-2 text-black-50"></i>
                                            <br>
                                            Submeter (gestor)
                                        </span>
                                    </div>
                                </a>                                
                            </div>
                            <?php } else { ?>
                            <div class="col-md-4">
                                <a class="border border-info block block-rounded block-link-pop" 
                                   href="javascript:void(0)" 
                                   onclick="submeterProposta2();">
                                    <div class="block-content block-content-full">
                                        <span class="d-block text-center">
                                            <i class="si si-cloud-upload fa-2x mb-2 text-black-50"></i>
                                            <br>
                                            Submeter Proposta
                                        </span>
                                    </div>
                                </a>                                
                            </div>
                            
                            <?php } ?>
                            
                        </div>
                            
                    </div>
                </div>                    
                <!-- FIM Botões -->
            </div>
        </div>
        <!-- END Invoice -->
    </div>
    <!-- END Page Content -->
    
<!-- Modal OBSERVACAO -->
    <div class="modal fade" id="modal-obs" tabindex="-1" role="dialog" aria-labelledby="modal-obs" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">

                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">OBSERVAÇÕES</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>                

                    <form id="form-obs" method="post">
                        <div class="block-content">
                            <!-- Block Tabs Default Style -->
                            
                            <div class="row">
                                <input type="hidden" name="idcontato" value="<?php echo $idcontato; ?>">
                                <div class="col-lg-12 form-group">
                                    <label for="obscontato"></label>
                                    <textarea name="obscontato" class="form-control" rows="4"></textarea>
                                </div>
                            </div>

                            <!-- END Block Tabs Default Style -->
                        </div>

                        <div class="block-content block-content-full text-right bg-light">
                            <button type="button" id = "save-obs" class="btn btn-sm btn-primary" data-dismiss="modal">Enviar Observação</button>                
                            
                            <button type="button" id = "no-save-obs" class="btn btn-sm btn-danger-light" data-dismiss="modal">Não tenho Observações</button>
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<!-- END Modal OBSERVACAO-->    

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>        

<?php require 'inc/_global/views/footer_end.php'; ?>

<!-- Page JS Plugins -->
<?php $dm->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>
    
<?php require 'inc/_global/views/footer_end.php'; ?>
    
    <script> 
        
        $("#save-obs").on("click", function() {
            vurl = 'salvarobservacao.php';
                        
            $.ajax({
                type: 'GET',
                url: vurl,
                data: $('#form-obs').serialize(),
               success:function(response){
                   console.log(response);                
            
                   $retorno    = response;
                   $array      = $retorno.split("|");   
                   
                   window.location.replace('proposta-submetida.php');

               },
                error:function(response){
                    alert(response);
                }
                
            });

            return true;
        });          
         
        $("#no-save-obs").on("click", function() {                        
            window.location.replace('proposta-submetida.php');
            return true;
        });
        
        
        /*Chamada da listagem de imagens do SERVIDOR*/
        /*Responsavel Financeiro*/
        list_image(<?php echo $idrf;  ?>, 1);
        /*Titular*/
        list_image(<?php echo $idtit; ?>, 2);
        /*Dependentens*/
        <?php
        foreach($dependentes as $dependente){
            $iddep      = $dependente['id']; ?>
        
        list_image(<?php echo $iddep; ?>, 3);
        <?php } ?>
        /*FIM: Dependentens*/
        /*FIM: Chamada da listagem de imagens do SERVIDOR*/
        
        function notificacao(){
            Dashmix.helpers('notify',
                            {align: 'center',
                             type: "danger",
                             icon: 'fa fa-check mr-1',
                             message: "Remova a imagem antes de modificar."});       
        }
        
        function list_image(idcontato, idtipodecontato){
            
            $('.imagem').hide();
            var tpcontato   = $(".tpcontato").filter("#"+idtipodecontato);

            $.ajax({
                url:"listar-documentos.php",
                method:"POST",
                data:{idcontato:idcontato, idtipodecontato:idtipodecontato},                
                success:function(response){
                    
                    imagens =  JSON.parse(response);
                    
                    if (imagens.length > 0){
                        for(i = 0; i < imagens.length; i++) {
                            
                            /*Declarações*/
                            var rest_tpdoc = imagens[i].idtipodedocumento;
                            var rest_img   = imagens[i].documento;
                            
                            var tpdoc       = tpcontato.find('div').filter("#"+rest_tpdoc);
                            var dvimagem    = tpdoc.find(".imagem");
                            var dvcaptura   = tpdoc.find(".captura");

                            var img         = dvimagem.find('img');
                            var btn         = dvimagem.find('button');
                            /*FIM: Declarações*/
                            
                            /*tratar visibilidade*/
                            if (rest_img==null){
                                dvimagem.hide();
                                dvcaptura.show();
                            } else {
                                dvimagem.show();
                                dvcaptura.hide();
                            }
                            /*FIM: tratar visibilidade*/
                            
                            /*atribui doxcumentos*/
                            img.attr('src',''+rest_img+'');
                            btn.attr('id',''+rest_img+'');
                            /*FIM atribui doxcumentos*/
                            
                        }
                    }
                }
            });
            
        }
                
        $(document).on('click', '.remove_image', function(){
            var name        = $(this).attr('id');
            var tpcontato   = $(this).parent().parent();
            var dvimagem    = tpcontato.find('.imagem:eq(0)');
            var dvcaptura   = tpcontato.find('.captura:eq(0)');

            $.ajax({
                url:"remover-documento.php",
                method:"POST",
                data:{name:name},
                success:function(data){
                    dvimagem.hide();
                    dvcaptura.show();
                }
            })
        });        
        
        function submeterProposta(){
            var $enviar = true;
            
            /*Dependentes*/
            <?php
            $dependentes = getDependentes($idcontato);
            foreach($dependentes as $dependente){
                $iddep = $dependente['id'];
                $nomedep = $dependente['nome']; ?>
            
            

            if (!$('#rdcpf<?php echo $iddep;?>').is(':checked')) {
                if ($cpf<?php echo $iddep;?> == null){
                    Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o CPF de <?php echo nome_sobrenome($nomedep);?>'});
                    $enviar = false;
                }
            }

            if ($('#rdrg<?php echo $iddep;?>').is(':checked')) {
                if ($rg<?php echo $iddep;?> == null){
                    Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG de <?php echo nome_sobrenome($nomedep);?>'});
                    $enviar = false;
                } 
            } else {
                if ($rgv<?php echo $iddep;?> == null){
                    Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG (verso) de <?php echo nome_sobrenome($nomedep);?>'});
                    $enviar = false;
                } 


                if ($rgf<?php echo $iddep;?> == null){
                    Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG (frente) de <?php echo nome_sobrenome($nomedep);?>'});
                    $enviar = false;
                } 
            }
                        
            <?php } ?>
            
            /* Titular */

            <?php 
                if ($nometit<>$nomerf){ ?>
                  if (!$('#rdcpft').is(':checked')) {
                      if ($cpftit == null){
                          Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o CPF de <?php echo nome_sobrenome($nometit);?>'});
                          $enviar = false;
                      }                      
                  } 

                 if ($('#rdrgt').is(':checked')) {
                     if ($rgtit == null){
                         Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG de <?php echo nome_sobrenome($nometit);?>'});
                         $enviar = false;
                     } 
                 } else {
                     if ($rgtitf == null){
                         Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG (verso) de <?php echo nome_sobrenome($nometit);?>'});
                         $enviar = false;
                     } 
                     if ($rgtitv == null){
                         Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG (frente) de <?php echo nome_sobrenome($nometit);?>'});
                         $enviar = false;
                     } 
                     
                 } 
            <?php } ?>
            
            
            /*responsavel financeiro*/
            
            <?php if (($idformadepagamento==2)&&($propostadg=='f')){?>
            if ($raverbacao == null){
                Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o Requerimento de Averbação'});
                $enviar = false;
            } 
            <?php } ?>
            
            <?php if ($propostadg=='f'){?>
            if ($proposta == null){
                Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe a Proposta Física'});
                $enviar = false;
            } 
            <?php } ?>
            
            <?php if (($primeirapaga =='t')||($primeiraparcela=='O')){?>
            <?php } ?>
            
            
            if ($resrf == null){
                Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o COMPROVONTE de RESIDÊNCIA de <?php echo nome_sobrenome($nomerf);?>'});
                $enviar = false;
            } 
            
            
            /*Verificação do CPF do RF se está no RG*/
            if (!$('#rdcpf').is(':checked')) {
                    
                if ($cpfrf == null){
                    Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o CPF de <?php echo nome_sobrenome($nomerf);?>'});
                    $enviar = false;
                }
            }

            
            /*Verificação se RG é frente e Fundo*/
            if ($('#rdrg').is(':checked')) {
                if ($rgrf == null){
                    Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG de <?php echo nome_sobrenome($nomerf);?>'});            
                    $enviar = false;
                }
            } else {            
                if ($rgrffu == null){
                    Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG (verso) de <?php echo nome_sobrenome($nomerf);?>'});            
                    $enviar = false;
                } 

                if ($rgrffr == null){
                    Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'Anexe o RG (frente) de <?php echo nome_sobrenome($nomerf);?>'});            
                    $enviar = false;
                } 
            }
            
                                    
            if ($enviar==true){
                                
                $idcontato      = getParameter('id');
                $supervisao     = getParameter('s');
                $credenciamento = getParameter('c');
                $menor          = getParameter('m');
                $env            = getParameter('env');
                $gr             = getParameter('gr');
                
                $.ajax({
                    url:"submeter-proposta.php",
                    method:"POST",
                    data:{idcontato:$idcontato, supervisao:$supervisao, credenciamento:$credenciamento,menor:$menor, env:$env, gr:$gr},
                    success:function(response)
                    {           
                        typeof response;
                       if (response){
                           $('#modal-obs').modal('show');
                       } else {
                           Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'houve um problema ao enviar sua proposta. Entre em contato com a operadora.'});
                           
                       }
                    }
                })                
            }
            
        } 
        
        function submeterProposta2(){

            var $enviar=true;
            
            if ($enviar==true){
                                
                $idcontato      = getParameter('id');
                $supervisao     = getParameter('s');
                $credenciamento = getParameter('c');
                $menor          = getParameter('m');
                $env            = getParameter('env');
                $gr             = getParameter('gr');
                
                $.ajax({
                    url:"submeter-proposta.php",
                    method:"POST",
                    data:{idcontato:$idcontato, supervisao:$supervisao, credenciamento:$credenciamento,menor:$menor, env:$env, gr:$gr},
                    success:function(response)
                    {           
                        typeof response;
                       if (response){
                           $('#modal-obs').modal('show');
                       } else {
                           Dashmix.helpers('notify',{align: 'center', type: 'danger', icon: 'fa fa-check mr-1', message: 'houve um problema ao enviar sua proposta. Entre em contato com a operadora.'});
                           
                       }
                    }
                })                
            }
            
        }

        function getParameter(theParameter) {
            var params = window.location.search.substr(1).split('&');

            for (var i = 0; i < params.length; i++) {
                var p = params[i].split('=');
                if (p[0] == theParameter) {
                    return decodeURIComponent(p[1]);
                }
            }
            return false;
            }        
    
        $(document).ready(function() {
                        
            /*Dependentes*/
            <?php
            $dependentes = getDependentes($idcontato);
            foreach($dependentes as $dependente){
                $iddep = $dependente['id'];?>
                            
                /*RG do dependente*/
                $('#rdrg<?php echo $iddep; ?>').click(function() {
                    if ($('#rdrg<?php echo $iddep; ?>').is(':checked')) {
                        $('#dvrgf<?php echo $iddep; ?>').hide();
                        $('#dvrgv<?php echo $iddep; ?>').hide();
                        $('#dvrg<?php echo $iddep; ?>').show();
                    } else {
                        $('#dvrgf<?php echo $iddep; ?>').show();
                        $('#dvrgv<?php echo $iddep; ?>').show();
                        $('#dvrg<?php echo $iddep; ?>').hide();            
                    }
                });
                /*FIM RG do dependente*/

                /*CPF do dependente*/            
                $('#rdcpf<?php echo $iddep; ?>').click(function() {
                    if ($('#rdcpf<?php echo $iddep; ?>').is(':checked')) {                    
                        $('#dvcpf<?php echo $iddep; ?>').hide();                    
                    } else {
                        $('#dvcpf<?php echo $iddep; ?>').show();
                    }
                });
                /*FIM CPF do dependente*/
            
            <?php } ?>

            var resp        = $(".tpcontato").filter("#1");
            var rgfresp     = resp.find('div').filter("#1");
            var rgvresp     = resp.find('div').filter("#2");
            var rgfvresp    = resp.find('div').filter("#3");
            var cpfresp     = resp.find('div').filter("#4");
                        
            var tit         = $(".tpcontato").filter("#2");
            var rgftit      = tit.find('div').filter("#1");
            var rgvtit      = tit.find('div').filter("#2");
            var rgfvtit     = tit.find('div').filter("#3");
            var cpftit      = tit.find('div').filter("#4");
            
            if (rgfvresp.find(".imagem").is(":visible")){
                $('#rdrg').prop('checked', true);
                rgfresp.hide();
                rgvresp.hide();
                rgfvresp.show();
            } 
            else {
                $('#rdrg').prop('checked', false);
                rgfresp.show();
                rgvresp.show();
                rgfvresp.hide();
            }
                                              
            
            
            
            /*RG do Responsavel Financeiro*/                
            $('#rdrg').click(function() {
                if ($('#rdrg').is(':checked')) {
                    if ((rgfresp.find(".imagem").is(":visible"))||
                        (rgvresp.find(".imagem").is(":visible"))){
                        
                        $('#rdrg').prop('checked', false); 
                        notificacao();          
                        
                    } else {                    
                        rgfresp.hide();
                        rgvresp.hide();
                        rgfvresp.show();
                    }
                } else {
                    if ((rgfvresp.find(".imagem").is(":visible"))){
                        
                        $('#rdrg').prop('checked', true); 
                        notificacao();          
                        
                    } else {                    
                        rgfresp.show();
                        rgvresp.show();
                        rgfvresp.hide();
                    }
                }
            });
            /*FIM RG do Responsavel Financeiro*/
            
            /*CPF do Responsavel Financeiro*/            
            $('#rdcpf').click(function() {
                if ($('#rdcpf').is(':checked')) {
                    if (cpfresp.find(".imagem").is(":visible")){
                        
                        $('#rdcpf').prop('checked', false); 
                        notificacao();          
                        
                    } else {                    
                        cpfresp.hide();
                    }
                } else {
                    cpfresp.show();
                }
            });
            /*FIM CPF do Responsavel Financeiro*/
        
            
            /*RG do Titular*/                
            $('#rdrgt').click(function() {
                if ($('#rdrgt').is(':checked')) {
                    if ((rgftit.find(".imagem").is(":visible"))||
                        (rgvtit.find(".imagem").is(":visible"))){
                        
                        $('#rdrgt').prop('checked', false); 
                        notificacao();          
                        
                    } else {                    
                        rgftit.hide();
                        rgvtit.hide();
                        rgfvtit.show();
                    }
                } else {
                    if ((rgfvtit.find(".imagem").is(":visible"))){
                        
                        $('#rdrgt').prop('checked', true); 
                        notificacao();          
                        
                    } else {                    
                        rgftit.show();
                        rgvtit.show();
                        rgfvtit.hide();
                    }
                }
            });
            /*FIM RG do Titular*/
            
            /*CPF do titular*/
            $('#rdcpft').click(function() {
                if ($('#rdcpft').is(':checked')) {
                    if (cpftit.find(".imagem").is(":visible")){
                        
                        $('#rdcpft').prop('checked', false); 
                        notificacao();          
                        
                    } else {                    
                        cpfresp.hide();
                    }
                } else {
                    cpfresp.show();
                }
            });
            /*FIM CPF do Titular*/
            
                        
            
        }); 
                
</script>    
    
    