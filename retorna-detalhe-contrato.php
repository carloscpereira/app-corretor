<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/corretor/conexao.php'); ?>

<?php

if ($_GET != null){

    $idproposta        = $_GET['idproposta'];
 
    $sql = "SELECT
                o.operadora,
                v.idvendedor,
                retira_acentuacao(v.vendedor) as vendedor,
                c.idcontato,
                retira_acentuacao(c.nome) as titular,
                retira_acentuacao(r.nome) as responsavel,
                c.idtipodeproposta,
                r.telefone,
                r.email,
                c.idconvenio,
                retira_acentuacao(cv.descricao) as convenio,
                c.datahora as dtcadastro,
                c.dtanalista as dtativacao,
                c.idformadepagamento,
                retira_acentuacao(f.formadepagamento) as formadepagamento,
                c.idproduto,
                retira_acentuacao(p.descricao) as produto,

                count(d.dependenteid) + 1 as beneficiarios,
                sum(c.valortotal) + sum(coalesce(d.valor,0)) as valor
            FROM contatos c
            LEFT JOIN dependentes d on d.titularid = c.idcontato
            INNER JOIN contatos_rf r on r.idcontato = c.idcontato
            INNER JOIN vendedores v on v.idvendedor = c.idvendedor
            INNER JOIN enderecos e on e.idcontato = c.idcontato
            INNER JOIN municipio m on m.municipio_codigo = e.cidade
            INNER JOIN status s on c.idstatus = s.id
            LEFT JOIN convenios cv on cv.id = c.idconvenio
            INNER JOIN formasdepagamento f on c.idformadepagamento = f.id
            LEFT JOIN produto p on c.idproduto = p.id
            INNER JOIN operadora o ON o.id = c.idoperadora

            WHERE 
            c.dtposvendas is null and
            c.dtanalista is not null and
            c.idstatus = 5 and 
            cast(c.dtanalista as date) {$periodo} 
            {$tipoproposta}

            group by 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17
            order by c.dtanalista DESC";
    
    $result         = pg_query($sql);
    $contratos      = pg_fetch_all($result);
    
    $json = json_encode($contratos);
    echo $json;

}
    
?>    
     