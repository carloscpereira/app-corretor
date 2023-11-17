<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    if (isset($_GET['proposta'])){

        $proposta = $_GET['proposta'];

        $sql = "
            SELECT DISTINCT 't' as tpbeneficiario,
                    c.idcontato                    as idbeneficiario,
                    c.nome,
                    d.cpf,
                    d.rg,
                    d.orgao,
                    d.genero,
                    d.nascimento,
                    c.cns,
                    d.nomedamae,
                    c.valortotal                   as valor,
                    c.idproduto,
                    retira_acentuacao(p.descricao) as produto,
                    coalesce(c.idvinculo, 14)      as idvinculo
            FROM contatos c
                    LEFT JOIN dados d on c.idcontato = d.idcontato
                    LEFT JOIN produto p on c.idproduto = p.id
            WHERE c.idcontato = $proposta
                            UNION
            SELECT DISTINCT 'd'                       as tpbeneficiario,
                    d.dependenteid            as idbeneficiario,
                    d.nome,
                    d.cpf,
                    d.rg,
                    d.orgaoemissor,
                    d.idgenero,
                    d.nascimento,
                    d.cns,
                    d.nomedamae,
                    d.valor,
                    d.idproduto,
                    retira_acentuacao(p2.descricao),
                    coalesce(d.idvinculo, 22) as idvinculo
            FROM dependentes d
                    LEFT JOIN produto p2 on d.idproduto = p2.id
            WHERE d.titularid = $proposta;
        ";

        $result         = pg_query($sql);
        $beneficiarios  = pg_fetch_all($result);

        $json = json_encode($beneficiarios);
        
        echo $json;
    
    }
    
?>    
     