<?php header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/corretor/funcoes-recepcao-de-vendas.php'); ?>
<?php include('../funcoes/corretor/conexao.php'); ?>
<?php include('../funcoes/funcoes.php'); ?>

<?php

function getPlanos($idcontato){
        
    $sql=" SELECT  
    count(idproduto) as qtde, 
    idproduto,
    produto, 
    plano, 
    versao,
    valor,
    sum(valor) as total
    from beneficiarios_no_plano_vi 
    where idcontato =$idcontato
    group by idproduto, produto, plano, versao, valor";
            

    $result = pg_query($sql);

    $data   = pg_fetch_all($result);
        
    return $data;
}

function getBeneficiarios($idcontato){

    $sql="SELECT distinct 
            beneficiario,
            vinculo,
            vinculotheme,
            idbeneficiario,
            beneficiario,
            telefone1,
            telefone2,
            email,
            nomedamae,
            generoid,
            genero,
            nascimento,
            cpf,
            rg,
            emissor,
            cns,
            endereco,
            numero,
            complemento,
            bairro,
            idcidade,
            cidade,
            idestado,
            estado,
            cep,
            produto,
            valor 
            from beneficiarios_no_plano_vi where idcontato =$idcontato ORDER BY vinculo DESC";
    

    $result = pg_query($sql);
    $data   = pg_fetch_all($result);
    
    
    return $data;
    
}



if (isset($_GET['d'])){
         
        $codigo = $_GET['d'];
                 
         /* 1 - Cartão de Credito
            2 - Consignado em Folha
            3 - Débito em Conta
            4 - Boleto Bancário
         */
         $sql = "SELECT 
                    c.idvendedor,
                    v.vendedor,
                    c.idcontato,
                    c.idtipodeproposta,
                    tpp.tipodeproposta,
                    tpp.theme as themetipoproposta,
                    c.nome,
                    c.telefone,
                    c.email,
                    c.datahora,
                    c.valortotal,
                    c.envioassinatura,
                    c.datahoraassinatura,
                    c.idtipodeplano,  
                    tp.tipodeplano,
                    c.cns,
                    c.idoperadora,
                    o.operadora,
                    c.idcentrodecusto,
                    cc.centrodecusto,
                    c.empresadigitada,
                    
                    c.idproduto,
                    p.descricao as produto,
                    pl.descricao as plano,
                    vp.descricao as versao,
                    c.telefone2,
                    c.time_envio_proposta,
                    c.time_assinatura_proposta,
                    c.assinatura_proposta,
                    c.obscontato, 
                    
                    d.nomedamae,
                    d.genero as idgenero,
                    g.genero,
                    d.estadocivil as idestadocivil,
                    ec.estadocivil,
                    d.nacionalidade as idnacionalidade,
                    n.nacionalidade,
                    d.nascimento,
                    d.cpf,
                    d.rg,
                    d.orgao,
                    
                    e.cep,
                    e.estado as idestado,
                    u.nome_da_uf as estado,
                    c.estadodigitado,                    
                    u.sigla,
                    e.cidade as idcidade,
                    c.cidadedigitada,
                    m.municipio_nome as cidade,
                    e.bairro,
                    
                    e.endereco,
                    e.complemento,
                    e.numero,
                    
                    /*  forma de pagamento*/
                    c.idformadepagamento,
                    fp.formadepagamento,
                    
                    /*  consignado*/
                    c.idorgao,
                    org.orgao,
                    c.matricula,
                    c.numeroade,
                    c.inicio_averbacao,
                    
                    /*  cartão de crédito*/
                    ct.idbandeiracartao,
                    bdc.bandeiracartao,
                    ct.numerocartao,
                    ct.validademes,
                    ct.validadeano,
                    ct.nome as nomenocartao,
                    ct.codigoverificacao,
                    ct.melhordia as credmelhordia,
                    
                    /*  cartão de débito*/
                    cct.numero as numero_conta,
                    cct.digito,
                    cct.tipocontaid,
                    tpc.descricao as tipodeconta,
                    cct.agenciaid,
                    ag.codigo as agencia,
                    cct.agenciadigitada,
                    coalesce(ag.bancoid,cct.bancoid) as bancoid,
                    bco.descricao as banco,
                    cct.operacao,
                    cct.melhordia as debmelhordia,
                    
                    /*  responsável financeiro*/
                    crf.idcontatorf,
                    crf.nome as nome_rf,
                    crf.telefone as telefone_rf,
                    crf.email as email_rf,
                    crf.cep as cep_rf,
                    crf.estado as idestado_rf,
                    urf.nome_da_uf as estado_rf,
                    crf.estadodigitado,
                    urf.sigla as sigla_rf,
                    crf.cidade as idcidade_rf,
                    mrf.municipio_nome as cidade_rf,
                    crf.cidadedigitada,
                    crf.bairro as bairro_rf,
                    
                    crf.endereco as endenreco_rf,
                    crf.complemento as complemento_rf,
                    crf.numero as numero_rf,
                    crf.cns as cns_rf,
                    crf.telefone2 as telefone2_rf,
                    
                    /*  dados do responsável financeiro  */
                    drf.nomemae as nomemae_rf,
                    drf.genero as idgenero_rf,
                    grf.genero as genero_rf,
                    drf.estadocivil as idestadocivil_rf,
                    ecrf.estadocivil as estadocivil_rf,
                    drf.nacionalidade as idnacionalidade_rf,
                    drf.nascimento as nascimento_rf,
                    drf.cpf as cpf_rf,
                    drf.rg as rg_rf,
                    drf.orgao as orgao_rf,
                    
                    sup.vendedor as supervisor,
                    pos.vendedor as posvendas,
                    ana.vendedor as analista,
                    
                    c.dtsupervisao,
                    c.dtposvendas,
                    c.dtanalista,
                    
                    c.primeirapaga,
                    c.primeiraparcela,
                    c.vencimento,
                    
                    c.obssupervisor,
                    c.obsposvendas,
                    
                    c.idsubmetedor,
                    sub.vendedor as submetedor,
                    
                    alt.vendedor as alterador
                    
                    FROM contatos c
                    INNER JOIN dados d 		 	 	ON d.idcontato = c.idcontato
                    LEFT JOIN enderecos e 		 	ON e.idcontato = c.idcontato
                    LEFT JOIN uf u 			 	ON u.codigo = e.estado
                    LEFT JOIN municipio m 		 	ON m.municipio_codigo = e.cidade                      
                    INNER JOIN vendedores v    	   ON v.idvendedor = c.idvendedor
                    LEFT JOIN vendedores sup  	   ON sup.idvendedor = c.idsupervisao
                    LEFT JOIN vendedores pos  	   ON pos.idvendedor = c.idposvendas
                    LEFT JOIN vendedores ana  	   ON ana.idvendedor = c.idanalista
                    LEFT JOIN vendedores sub       ON sub.idvendedor = c.idsubmetedor
                    LEFT JOIN vendedores alt       ON alt.idvendedor = c.idalterador
                    
                    INNER JOIN tiposdeplano tp 	 	ON tp.id = c.idtipodeplano
                    INNER JOIN operadora o 		 	ON o.id = c.idoperadora
                    INNER JOIN produto p 		 	ON p.id = c.idproduto
                    INNER JOIN plano pl 		 	ON pl.id = p.planoid
                    INNER JOIN versaoplano vp	 	ON vp.id = p.versaoid
                    INNER JOIN tiposdeproposta tpp  ON tpp.id = c.idtipodeproposta
                    
                    LEFT JOIN centrosdecusto cc 	ON cc.id = c.idcentrodecusto
                    LEFT JOIN genero g			 	ON g.generoid = d.genero
                    LEFT JOIN estadocivil ec	 	ON ec.estadocivilid = d.estadocivil
                    LEFT JOIN nacionalidade n	 	ON n.nacionalidadeid = d.nacionalidade
                    LEFT JOIN formasdepagamento fp 	ON fp.id = c.idformadepagamento
                    LEFT JOIN orgao org				ON org.idorgao = c.idorgao
                    
                    LEFT JOIN contatos_rf crf		ON crf.idcontato = c.idcontato
                    LEFT JOIN dados_rf drf			ON drf.idcontato = c.idcontato
                    LEFT JOIN uf urf				ON urf.codigo = crf.estado
                    LEFT JOIN municipio mrf			ON mrf.municipio_codigo = crf.cidade
                    LEFT JOIN genero grf			ON grf.generoid = drf.genero
                    LEFT JOIN estadocivil ecrf		ON ecrf.estadocivilid = drf.estadocivil
                    LEFT JOIN nacionalidade nrf		ON nrf.nacionalidadeid = drf.nacionalidade
                    
                    LEFT JOIN cartoes ct			ON ct.idcontato = c.idcontato
                    LEFT JOIN bandeiracartao bdc	ON bdc.idbandeiracartao = ct.idbandeiracartao
                    
                    LEFT JOIN conta cct 			ON cct.pessoaid = c.idcontato
                    LEFT JOIN agencia ag			ON ag.id = cct.agenciaid
                    LEFT JOIN banco bco				ON bco.id = coalesce(ag.bancoid,cct.bancoid)
                    LEFT JOIN tipoconta tpc			ON tpc.id = cct.tipocontaid
                    
                    where c.idcontato=$codigo";
                  
        $result = pg_query($sql);

        $data = pg_fetch_array($result);

        $idcontatorf                 = $data['idcontatorf'];
        $vencimento                 = $data['vencimento'];
        
        $primeirapaga                 = $data['primeirapaga'];
        $primeiraparcela              = $data['primeiraparcela'];

        $supervisor                   = strtoupper(utf8_encode($data['supervisor']));
        $posvendas                    = strtoupper(utf8_encode($data['posvendas']));
        $analista                     = strtoupper(utf8_encode($data['analista']));
        $alterador                    = strtoupper(utf8_encode($data['alterador']));


        $dtsupervisao = null;
        $dtposvendas = null;
        $dtanalista = null;

        if ($data['dtsupervisao']!=null){
            $dtsupervisao   = date('d/m/Y à\s H:i:s', strtotime($data['dtsupervisao']));
        } 
    
        if ($data['dtposvendas']!=null){
            $dtposvendas    = date('d/m/Y à\s H:i:s', strtotime($data['dtposvendas']));
        }
    
        if ($data['dtanalista']!=null){
            $dtanalista     = date('d/m/Y à\s H:i:s', strtotime($data['dtanalista']));
        }
            

        $obssuper                   = $data['obssupervisor'];
        $obsposvendas               = $data['obsposvendas'];
        $obsanalista                = $data['obscontato'];
    
        $idvendedor                 = $data['idvendedor'];
        $vendedor                   = strtoupper(utf8_encode($data['vendedor']));
    
        $idsubmetedor               = $data['idsubmetedor'];
        $submetedor                 = $data['submetedor'];
    
        $idtipodeproposta           = $data['idtipodeproposta'];
        $tipodeproposta             = utf8_encode($data['tipodeproposta']);
        $themetipoproposta          = $data['themetipoproposta'];
        $idcontato                  = $data['idcontato'];
        $nome                       = strtoupper(utf8_encode($data['nome']));

        $telefone                   = formatPhone($data['telefone']);

        $email                      = strtolower($data['email']);
        $datahora                   = date('d/m/Y', strtotime($data['datahora'])); 
        $valortotal                 = number_format($data['valortotal'], 2, ',', '.');
        $envioassinatura            = $data['envioassinatura'];
        $datahoraassinatura         = date('d/m/Y', strtotime($data['datahoraassinatura']));
        $idtipodeplano              = $data['idtipodeplano'];
        $tipodeplano                = strtoupper(utf8_encode($data['tipodeplano']));
        $cns                        = $data['cns'];
        $idoperadora                = $data['idoperadora'];
        $operadora                  = strtoupper(utf8_encode($data['operadora']));
        $idcentrodecusto            = $data['idcentrodecusto'];
        $centrodecusto              = strtoupper(utf8_encode($data['centrodecusto']));
    
        $empresa                    = strtoupper(utf8_encode($data['empresadigitada']));
        $idproduto                  = $data['idproduto'];
        $produto                    = strtoupper(utf8_encode($data['produto']));
        $plano                      = strtoupper(utf8_encode($data['plano']));
        $versao                     = strtoupper(utf8_encode($data['versao']));
        $telefone2                  = formatPhone($data['telefone2']);
        $time_envio_proposta        = date('d/m/Y', strtotime($data['time_envio_proposta']));
    
        if ($data['time_assinatura_proposta']!=null){
            $time_assinatura_proposta   = date('d/m/Y à\s H:m:s', strtotime($data['time_assinatura_proposta']));
        }
        
        $assinatura_proposta        = $data['assinatura_proposta'];
        $obs                        = $data['obscontato'];
    
        $nomedamae                  = strtoupper(utf8_encode($data['nomedamae']));
        $idgenero                   = $data['idgenero'];
        $genero                     = strtoupper(utf8_encode($data['genero']));
        $idestadocivil              = $data['idestadocivil'];
        $estadocivil                = strtoupper(utf8_encode($data['estadocivil']));
        $idnacionalidade            = $data['idnacionalidade'];
        $nacionalidade              = strtoupper(utf8_encode($data['nacionalidade']));
        
        if ($data['nascimento']==NULL){
            $nascimento             = NULL;
        } else {
            $nascimento             = date('d/m/Y', strtotime($data['nascimento']));    
        }
        
        $cpf                        = mask($data['cpf'], '###.###.###-##');
        $rg                         = mask($data['rg'], '##.###.###/##');
        $orgao                      = strtoupper($data['orgao']);
        $cep                        = mask($data['cep'], '#####-###');
        $idestado                   = $data['idestado'];
        $estado                     = strtoupper(utf8_encode($data['estado']));
        $sigla                      = strtoupper($data['sigla']);
        $idcidade                   = $data['idcidade'];
        $cidade                     = strtoupper(utf8_encode($data['cidade']));        
        $bairro                     = strtoupper(utf8_encode($data['bairro']));
        $endereco                   = strtoupper(utf8_encode($data['endereco']));
        $complemento                = strtoupper(utf8_encode($data['complemento']));
        $numero                     = $data['numero'];
        $idformadepagamento         = $data['idformadepagamento'];
        $formadepagamento           = strtoupper(utf8_encode($data['formadepagamento']));
        $idorgao                    = $data['idorgao'];
        $orgao                      = strtoupper(utf8_encode($data['orgao']));
        $matricula                  = $data['matricula'];
        $numeroade                  = $data['numeroade'];
        $dtaverbacao                = $data['inicio_averbacao'];
        $idbandeiracartao           = $data['idbandeiracartao'];
        $bandeiracartao             = strtoupper($data['bandeiracartao']);
        $numerocartao               = mask($data['numerocartao'],'#### #### #### ####');
        $validademes                = $data['validademes'];
        $validadeano                = $data['validadeano'];
        $nomenocartao               = strtoupper(utf8_encode($data['nomenocartao']));
        $codigoverificacao          = $data['codigoverificacao'];
        $credmelhordia              = $data['credmelhordia'];
        $numero_conta               = $data['numero_conta'];
        $digito                     = $data['digito'];
        $tipocontaid                = $data['tipocontaid'];
        $agenciaid                  = $data['agenciaid'];
        $agencia                    = strtoupper($data['agencia']);
        $agenciadigitada            = strtoupper($data['agenciadigitada']);
        $bancoid                    = $data['bancoid'];
        $banco                      = strtoupper(utf8_encode($data['banco']));
        $operacao                   = $data['operacao'];
        $debmelhordia               = $data['debmelhordia'];
        $nome_rf                    = strtoupper(utf8_encode($data['nome_rf']));
        $telefone_rf                = formatPhone($data['telefone_rf']);
        $email_rf                   = strtolower($data['email_rf']);
        $cep_rf                     = mask($data['cep_rf'],'#####-###');

        $idestado_rf                = $data['idestado_rf'];
        if ($idestado_rf ==0){
            $estadodigitado_rf = strtoupper($data['estadodigitado']);
        } else {
            $estadodigitado_rf = '';
            $estado_rf                  = strtoupper(utf8_encode($data['estado_rf']));    
        }
        
        $sigla_rf                   = strtoupper($data['sigla_rf']);
        
        $idcidade_rf                = $data['idcidade_rf'];                
        if ($idcidade_rf==0){
            $cidadedigitada_rf = strtoupper($data['cidadedigitada']);
        } else {    
            $cidadedigitada_rf = '';
            $cidade_rf                  = strtoupper(utf8_encode($data['cidade_rf']));
        }
            
        $bairro_rf                      = strtoupper(utf8_encode($data['bairro_rf']));

        
        $endereco_rf                = strtoupper(utf8_encode($data['endenreco_rf']));
        $complemento_rf             = strtoupper(utf8_encode($data['complemento_rf']));
        $numero_rf                  = $data['numero_rf'];
        $cns_rf                     = $data['cns_rf'];
        $telefone2_rf               = formatPhone($data['telefone2_rf']);
        $nomemae_rf                 = strtoupper(utf8_encode($data['nomemae_rf']));
        $idgenero_rf                = $data['idgenero_rf'];
        $genero_rf                  = strtoupper(utf8_encode($data['genero_rf']));
        $idestadocivil_rf           = $data['idestadocivil_rf'];
        $estadocivil_rf             = strtoupper(utf8_encode($data['estadocivil_rf']));
        $idnacionalidade_rf         = $data['idnacionalidade_rf'];
        
        if ($data['nascimento_rf']==NULL){
            $nascimento_rf          = NULL;
        } else {
            $nascimento_rf          = date('d/m/Y', strtotime($data['nascimento_rf']));    
        }

        
        $cpf_rf                     = mask($data['cpf_rf'],'###.###.###-##');
        $rg_rf                      = mask($data['rg_rf'],'##.###.###/##');
        $orgao_rf                   = strtoupper($data['orgao_rf']);  
        
        
     } 
else {
    header("Location: ../loja/index.php");
}
?>



<?php require 'inc/_global/config.php'; ?>
<?php //require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>


<!-- Page Content -->
<div class="content content-boxed">
    <!-- Invoice -->
    <div class="block block-fx-shadow">

        <div class="block-header block-header-default">
            <h3 class="block-title">#PROP<?php echo $idcontato;?></h3>
            
            <div class="block-options">
                <!-- Print Page functionality is initialized in Helpers.print() -->
                            
                <button type="button" id="btn-imprimir1" class="btn-block-option" onclick="Dashmix.helpers('print');">
                    <i class="si si-printer mr-1"></i> Imprimir
                </button>
                
                <button type="button" class="btn-block-option"><a href="rel-recepcao-de-vendas.php?">
                    <i class="si si-action-undo mr-1"></i> Voltar</a>
                </button>                
                                
            </div>
        </div>
        
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
                CONSULTOR: <b><?php echo $vendedor; ?></b>                            
                <br>                        
                
                <?php if (($idsubmetedor!=$idvendedor)&&($idsubmetedor!=null)){ ?>
                <span class='badge text-danger'>PROPOSTA SUBMETIDA POR </span>
                <span class='badge badge-danger'><?php echo strtoupper($submetedor);?></span>  
                <br>
                <?php } ?>                
                
                <?php if ($alterador!=null){?>
                <span class='badge text-danger'>PROPOSTA FINALIZADA POR </span>
                <span class='badge badge-danger'><?php echo strtoupper($alterador);?></span>  
                <br>
                <?php } ?>
                
                <?php if($time_assinatura_proposta<>null){ ?>
                <small><b>ASSINADO EM: </b><?php echo $time_assinatura_proposta; ?></small>
                <small><b>CÓDIGO: </b><?php echo $assinatura_proposta; ?></small>
                <br>
                <?php } else {?>

                <small><b>EXISTE PROPOSTA IMPRESSA</b></small>
                <br>
                <?php } ?>
                
                <?php if($dtsupervisao!=null){ ?>
                <small><b>SUPERVISIONADO POR: </b><?php echo $supervisor; ?></small>
                <small><b> EM: </b><?php echo $dtsupervisao; ?></small>
                <br>
                <?php } ?>
                
                <?php if($dtposvendas!=null){ ?>
                <small><b>FEITO PÓS VENDAS POR: </b><?php echo $posvendas; ?></small>
                <small><b> EM: </b><?php echo $dtposvendas; ?></small>
                <br>
                <?php } ?>
                
                <?php if($dtanalista!=null){ ?>
                <small><b>CONTRATO FEITO POR: </b><?php echo $analista; ?></small>
                <small><b> EM: </b><?php echo $dtanalista; ?></small>
                <br>
                <?php } ?>

                <?php if (($primeirapaga=='t')|| (($primeiraparcela<>null) && ($primeiraparcela<>' ')) ){ ?>
                    <?php if (($primeiraparcela=='V')){ ?>
                        <small class="text-primary"><b>PRIMEIRA PARCELA PAGA AO VENDEDOR</b></small>
                    <?php } else if ($primeiraparcela=='O'){?>
                        <small class="text-success"><b>PRIMEIRA PARCELA PAGA À OPERADORA</b></small>
                    <?php } else { ?>
                        <small class="text-success"><b>A PRIMEIRA PARCELA JÁ FOI PAGA</b></small>                    
                    <?php } ?>
                <br>                
                <?php } else {?>
                <small class="text-danger"><b>RECEBER A PRIMEIRA PARCELA NA OPERADORA</b></small>
                <br>                
                <?php } ?>

                <?php if ($vencimento!=null){ ?>
                <br>
                <strong>VENCIMENTO PARA TODO DIA <?php echo $vencimento;?></strong>
                <br>
                <?php } ?>
                                            
                
            </div>
                        
            
            <div class="p-sm-4 p-xl-7">                
                
                <h4 class="content-heading">PROPOSTA</h4>
                <div>                    
                    <div class="row">
                        <div class="col-6">
                            <span class="text-muted"><small><b>PLANO</b></small></span>
                        </div>
                        <div class="col-2">
                            <span class="text-muted"><small><b>VALOR(UN)</b></small></span>
                        </div>
                        <div class="col-2">
                            <span class="text-muted"><small><b>QTDE</b></small></span>
                        </div>
                        <div class="col-2">
                            <span class="text-muted"><small><b>TOTAL</b></small></span>
                        </div>
                    </div>
                    <?php 
                    $presult = getPlanos($idcontato);

                    foreach($presult as $planos){
                        $idproduto   = $planos['idproduto'];
                        $produto     = $planos['produto'];
                        $plano       = $planos['plano'];
                        $versao      = $planos['versao'];
                        $valor       = $planos['valor'];   
                        $qtdprod     = $planos['qtde'];
                        $total       = $planos['total'];
                    ?>
                    <div class="row">
                        <div class="col-6">
                            <p class="font-w600 mb-1"><?php echo utf8_encode($produto);?></p>
                        </div>
                        <div class="col-2">
                            <p class="font-w600 mb-1"><?php echo 'R$ '.number_format($valor, 2, ',', '.');?></p>
                        </div>
                        <div class="col-2">
                            <p class="font-w600 mb-1"><?php echo $qtdprod;?></p>
                        </div>
                        <div class="col-2">
                            <p class="font-w600 mb-1"><?php echo 'R$ '.number_format($total, 2, ',', '.');?></p>
                        </div>
                    </div>
                    <?php } ?>                      
                </div>                                
                <h4 class="content-heading"></h4>
                <div>                    
                    <div class="row">
                        <div class="col-2">
                            <span class="text-muted"><small><b>TIPO DE CONTRATO</b></small></span>
                        </div>
                        <div class="col-2">
                            <span class="text-muted"><small><b>PLANO PARA</b></small></span>
                        </div>
                        <div class="col-6">
                            <span class="text-muted"><small><b>EMPRESA/PREFEITURA/REPARTIÇÃO PÚBLICA</b></small></span>
                        </div>
                        <div class="col-2">
                            <span class="text-muted"><small><b>PAGAMENTO</b></small></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <p class="font-w600 mb-1">
                                <small>
                                    <span id="tipodeproposta" class="text-uppercase">
                                        <?php echo $tipodeproposta; ?>
                                    </span>
                                </small></p>
                        </div>
                        <div class="col-2">
                            <p class="font-w600 mb-1">
                                <small>
                                    <span id="tipodeplano" class="text-uppercase">
                                        <?php echo $tipodeplano;?>
                                    </span>
                                </small>
                            </p>
                        </div>
                        <div class="col-6">
                            <p class="font-w600 mb-1">
                                <small>
                                    <span id ="centrodecusto" class="text-uppercase">
                                        <?php echo $centrodecusto; ?>
                                    </span>
                                </small>
                            </p>
                        </div>
                        <div class="col-2">
                            <p class="font-w600 mb-1">
                                <small>
                                    <span id="formadepagamento" class="text-uppercase">
                                        <?php echo $formadepagamento; ?>
                                    </span>
                                </small>
                            </p>
                        </div>
                    </div>                    
                </div>                  
                <br>           
                
                <p class="content-heading font-w600 mb-1">
                    <span class="badge-pill badge-success">RESPONSÁVEL FINANCEIRO</span>
                </p>
                
                <p class="font-w600 mb-1">DADOS</p>
                
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-4">
                        <address>                            
                            <div class="text-muted">
                                <small><b>Nome: </b></small>
                                <span id="nome_rf" class="text-uppercase"><?php echo $nome_rf; ?></span>
                            </div>
                            <div class="text-muted">
                                <small>
                                    <b>Tels: </b>
                                    <span id="telefone_rf"><?php echo $telefone_rf; ?></span> / 
                                    <span id ="telefone2_rf"><?php echo $telefone2_rf; ?></span>
                                </small>
                            </div>
                            <div class="text-muted">
                                <small>
                                    <b>e-Mail: </b>
                                    <span id = "email_rf" class="text-lowercase"><?php echo $email_rf; ?></span>
                                </small>
                            </div>
                        </address>
                    </div>
                    <!-- END Company Info -->

                    <div class="col-4">
                        <address>
                            <small>
                                Mãe   : 
                                <span id="nomemae_rf" class="text-uppercase"><?php echo $nomemae_rf; ?></span>
                            </small><br> 
                            <small>
                                Gênero: 
                                <span id="genero_rf" class="text-uppercase"><?php echo $genero_rf; ?></span>
                            </small><br>
                            <small>
                                Nascimento : 
                                <span id="nascimento_rf"><?php echo $nascimento_rf; ?></span>
                            </small><br>
                        </address>
                    </div>

                    <div class="col-4">
                        <address>
                            <small>
                                CPF: 
                                <span id="cpf_rf"><?php echo $cpf_rf; ?></span>
                                    <?php 
                                if (!validaCPF($cpf_rf)){
                                    echo "<span class='text-danger'>CPF INVÁLIDO!!</span>";
                                } ?>                                    
                            </small><br> 
                            <small>
                                RG/EMISSOR: 
                                <span id="rg_rf"><?php echo $rg_rf; ?></span>  
                                <span id="orgao_rf" class="text-uppercase"><?php echo $orgao_rf; ?></span>
                            </small><br>
                            <small>
                                CNS: 
                                <span id="cns_rf"><?php echo $cns_rf; ?></span>
                            </small><br>
                        </address>
                    </div>
                </div>

                <p class="font-w600 mb-1">ENDEREÇO</p>

                <div class="row">
                    <!-- Company Info -->
                    <div class="col-12">
                        <address>
                            <small>
                                <span id="cendereco" class="text-uppercase"><?php echo $endereco_rf; ?></span>, Nª 
                                <span id="cnumero" class="text-uppercase"><?php echo $numero_rf; ?></span>                                    
                                <span id="ccomplemento" class="text-uppercase"><?php echo $complemento_rf; ?></span>
                                <br>
                                <span id="cbairro" class="text-uppercase"><?php echo $bairro_rf; ?></span>
                                <br>
                                <span id="ccidade" class="text-uppercase"><?php echo $cidade_rf; ?></span>, 
                                <span id="cestado" class="text-uppercase"><?php echo $estado_rf; ?></span>
                                <br>
                                <span id="ccep"><?php echo $cep_rf; ?></span>
                            </small>
                        </address>
                    </div>
                    <!-- END Company Info -->

                </div>
                
                

                <p class="font-w600 mb-1">SOBRE O PAGAMENTO</p>
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-4">
                        <p class="font-w500 mb-2">DADOS DA CONTA</p>
                        <address>                            
                            <div class="text-muted">
                                <small>
                                    <b>Banco: </b><span id ="banco" class="text-uppercase"><?php echo $banco; ?></span>
                                    </small>
                            </div>
                            <div class="text-muted">
                                <small>
                                    <b>Agência: </b><span id="agencia" class="text-uppercase <?php if ($agenciaid==null){echo 'text-danger';}?>"><?php
                                    if ($agenciaid==null){
                                        echo $agenciadigitada;
                                    } else {   
                                        echo $agencia;
                                    }
                                    ?></span>
                                </small>
                            </div>
                            <div class="text-muted">
                                <small>
                                    <b>Oper/Conta/Dígito: </b>
                                    <?php 
                                    if ($operacao==NULL){ ?>
                                    <span id="numero_conta"><?php echo $numero_conta; ?></span> - 
                                    <span id="digito"><?php echo $digito; ?></span>
                                    <?php } else {?>
                                    (<span id="operacao"><?php echo $operacao;?></span>) 
                                    <span id="numero_conta"><?php echo $numero_conta; ?></span> - 
                                    <span id="digito"><?php echo $digito; ?></span>
                                    <?php }?>
                                </small>
                            </div>
                            <div class="text-muted">
                                <small>
                                    <b>Melhor dia p/ débito: </b>
                                    <span id="debmelhordia"><?php echo $debmelhordia; ?></span>
                                </small>
                            </div>
                        </address>
                    </div>
                    <!-- END Company Info -->

                    <div class="col-4">
                            
                        <p class="font-w500 mb-2">DADOS DO CARTÃO</p>
                        <address>
                            <small>
                                Bandeira: 
                                <span id="bandeiracartao" class="text-uppercase"><?php echo $bandeiracartao; ?></span>
                            </small><br> 
                            <small>
                                Número do cartão: 
                                <span id="numerocartao"><?php echo $numerocartao; ?></span>
                            </small><br>
                            <small>
                                Validade (Mês/Ano): 
                                <span id="validademes"><?php echo $validademes; ?></span>/
                                <span id ="validadeano"><?php echo $validadeano; ?></span> CCV: 
                                <span id ="ccv"><?php echo $codigoverificacao; ?></span>
                            </small><br>
                                
                            <small>
                                Melhor dia p/ crédito: 
                                <span id="credmelhordia"><?php echo $credmelhordia; ?></span>
                            </small>

                        </address>
                    </div>

                    <div class="col-4">
                        <p class="font-w500 mb-2">DADOS DA CONSIGNAÇÃO</p>
                            
                        <address>
                            <small>
                                Repartição p/ Verbas: 
                                <span id ="orgao" class="text-uppercase"><?php echo $orgao; ?></span>
                            </small><br> 
                            <small>
                                Matrícula: 
                                <span id="matricula"><?php echo $matricula; ?></span>
                            </small>
                            <br>
                            <small>
                                Nº de ADE: 
                                <span id="numeroade"><?php echo $numeroade; ?></span>
                            </small><br>
                            <small>
                                Data Início Averbação: 
                                <span id="dtaverbacao"><?php echo $dtaverbacao; ?></span>
                            </small><br>
                                
                        </address>
                    </div>
                </div> 
                               
                <div class="block-options text-left">
                    <h4 class="content-heading">BENEFICIÁRIOS</h4>
                </div>

                <?php 
                $beneficiarios = getBeneficiarios($idcontato);
                
                $doc = 2;
                foreach($beneficiarios as $beneficiario){ 
                    $idbeneficiario   = $beneficiario['idbeneficiario'];
                    $bvinculo         = $beneficiario['vinculo']; 
                    $bvinculotheme    = $beneficiario['vinculotheme'];     
                    
                    $produtobenef     = utf8_encode($beneficiario['produto']); 
                    $valorbenef       = number_format($beneficiario['valor'], 2, ',', '.');
                    
                    
                    $bnome            = strtoupper(utf8_encode($beneficiario['beneficiario']));
                    $btelefone1       = $beneficiario['telefone1'];
                    $btelefone2       = $beneficiario['telefone2'];
                    $bemail           = $beneficiario['email'];
                    $bnomedamae       = strtoupper(utf8_encode($beneficiario['nomedamae']));
                    $generoid         = $beneficiario['generoid'];
                    $bgenero          = strtoupper(utf8_encode($beneficiario['genero']));
                    $bnascimento      = $beneficiario['nascimento'];
                    if ($bnascimento !=NULL){
                        $bnascimento      = date('d/m/Y', strtotime($bnascimento));
                    }
                    
                    $idade            = retornaIdade($beneficiario['nascimento']);
                    $bcpf             = $beneficiario['cpf'];
                    $brg              = $beneficiario['rg'];
                    $bemissor         = strtoupper(utf8_encode($beneficiario['emissor']));
                    $bcns             = $beneficiario['cns'];
                    $bendereco        = strtoupper(utf8_encode($beneficiario['endereco']));
                    $bnumero          = $beneficiario['numero'];
                    $bcomplemento     = strtoupper(utf8_encode($beneficiario['complemento']));
                    $bbairro          = strtoupper(utf8_encode($beneficiario['bairro']));
                    $bcidade          = strtoupper(utf8_encode($beneficiario['cidade']));
                    $bidestado        = $beneficiario['idestado'];
                    $bestado          = strtoupper(utf8_encode($beneficiario['estado']));
                    $bcep             = $beneficiario['cep'];      
                    
                    $doc              = $doc + 1;
                    
                ?>

                <p class="font-w600 mb-1"><span class="badge-pill badge-<?php echo $bvinculotheme; ?>"><?php echo $bvinculo;?></span>
                </p>

                <p class="font-w600 mb-1"><strong><?php echo $produtobenef.' (R$ '.$valorbenef.')'; ?></strong></p>
                <br>
                    
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-6">
                        <p class="font-w600 mb-1">DADOS</p>
                    </div>
                        
                    <div class="col-3"></div>
                    
                    <div class="col-3">
                        <p class="font-w600 mb-1">ENDEREÇO</p>
                    </div>
                </div>                        
                    
                <div class="row">
                    <!-- início dos dados do beneficiário -->
                    <div class="col-3">                            
                        <address>
                            <div class="text-muted">
                                <span id="nome-<?php echo $idbeneficiario;?>">
                                    <?php echo $bnome; ?>
                                </span>
                            </div>
                            <div class="text-muted">
                                <small><b>Tels: </b>
                                    <span id="tel1-<?php echo $idbeneficiario;?>">
                                        <?php echo $btelefone1; ?>
                                    </span> / 
                                    <span id="tel2-<?php echo $idbeneficiario;?>">
                                        <?php echo $btelefone2; ?>
                                    </span>
                                </small>
                            </div>
                            <div class="text-muted text-lowercase">
                                <small><b>e-Mail: </b>
                                    <span id="email-<?php echo $idbeneficiario;?>">
                                        <?php echo $bemail; ?>
                                    </span>
                                </small>
                            </div>
                        </address>
                    </div>
                    <!-- FIM dos dados do beneficiário  -->

                    <div class="col-3">
                        <address>
                            <small>Mãe   : </small>
                            <span class="text-uppercase" id="nomedamae-<?php echo $idbeneficiario;?>">
                                <?php echo $bnomedamae; ?>
                            </span><br> 
                            <small>Gênero: </small>
                            <span class="text-uppercase" id="genero-<?php echo $idbeneficiario;?>">
                                <?php echo $bgenero; ?><br>
                            </span>
                                
                            <small>Nascimento : </small>
                            <span id="nascimento-<?php echo $idbeneficiario;?>">
                                <?php echo $bnascimento; ?><br>
                            </span>

                            <small>Idade : </small>
                            <span id="idade-<?php echo $idbeneficiario;?>">
                                <?php echo $idade; ?> ANOS<br>
                            </span>                                
                        </address>
                    </div>

                    <div class="col-3">
                        <address>
                            <small>CPF: </small>
                            <span class="text-uppercase" id="cpf-<?php echo $idbeneficiario;?>">
                                <?php echo $bcpf; ?>
                            </span><br> 
                            <small>RG/EMISSOR: </small>
                            <span id="rg-<?php echo $idbeneficiario;?>">
                                <?php echo $brg; ?>
                            </span>
                            <span class="text-uppercase" id="emissor-<?php echo $idbeneficiario;?>">
                                <?php echo $bemissor; ?><br>
                            </span>                                
                            <small>CNS: </small>
                            <span id="cns-<?php echo $idbeneficiario;?>">
                                <?php echo $bcns; ?>
                            </span>
                            <br>
                        </address>
                    </div>

                    <div class="col-3">
                        <address>
                            <div class="text-muted text-uppercase">
                                <small>
                                    <span id="cidade-<?php echo $idbeneficiario;?>">
                                        <?php echo $bcidade; ?>
                                    </span>, 
                                    <span id="estado-<?php echo $idbeneficiario;?>">
                                        <?php echo $bestado; ?>
                                    </span>
                                </small>
                            </div>
                            <div class="text-muted text-uppercase">
                                <small>
                                    <span id="endereco-<?php echo $idbeneficiario;?>">
                                        <?php echo $bendereco; ?>
                                    </span>, Nª 
                                    <span id="numero-<?php echo $idbeneficiario;?>">
                                        <?php echo $bnumero; ?>
                                    </span> 
                                    <span id="complemento-<?php echo $idbeneficiario;?>">
                                        <?php echo $bcomplemento; ?>
                                    </span> - 
                                    <span id="bairro-<?php echo $idbeneficiario;?>">
                                        <?php echo $bbairro; ?>
                                    </span>
                                </small>
                            </div>
                            <div class="text-muted text-uppercase">
                                <small>
                                    <span id="cep-<?php echo $idbeneficiario;?>">
                                        <?php echo 'CEP '.$bcep; ?>
                                    </span>
                                </small>
                            </div>
                        </address>
                    </div>
                </div>        
                                                
                <?php } ?>
                
                
            </div>
        
            <div class="block-header block-header-default">
                <h3 class="block-title">#PROP<?php echo $idcontato;?></h3>

                <div class="block-title text-center" id="conferente2" style="visibility:hidden">
                    <span class="text-muted">
                        <small>
                            <i>conferido em <?php echo date('d/m/y à\s H:i:s').', por '.$_COOKIE['nome'];?></i>
                        </small>
                    </span>
                </div>
            
            
                <div class="block-options">
                    <!-- Print Page functionality is initialized in Helpers.print() -->
                
                    <button type="button" id="btn-imprimir2" class="btn-block-option" onclick="Dashmix.helpers('print');">
                        <i class="si si-printer mr-1"></i> Imprimir
                    </button>
                                
                    <button type="button" class="btn-block-option"><a href="be_acompanhamento.php">
                        <i class="si si-action-undo mr-1"></i> Voltar</a>
                    </button>            
                    
                </div>
            </div>
        </div>
        <!-- END Invoice -->
    </div>
    <!-- END Page Content -->
 
<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>
<?php require 'inc/_global/views/footer_end.php'; ?>  