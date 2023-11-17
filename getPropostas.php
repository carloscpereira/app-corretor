<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    if ($_GET != null){
        $corretor   = $_GET['corretor'];
        $status     = $_GET['status'];
    
        $sql = "WITH RECURSIVE arvore_vendedores (id) AS
        (
            SELECT 
            idvendedor
            FROM vendedores 
            WHERE idsupervisor =$corretor
            
            UNION ALL

            SELECT 
            vendedores.idvendedor
            FROM vendedores 
            INNER JOIN arvore_vendedores ON vendedores.idsupervisor = arvore_vendedores.id

        )

        SELECT distinct
        v.idgrupo,
        v.idvendedor,
        retira_acentuacao(v.vendedor) as vendedor,
        c.idcontato, 
        retira_acentuacao(r.nome) as nome,
        retira_acentuacao(c.nome) as titular,
        datahora, 
        c.telefone, 
        c.email, 
        retira_acentuacao(p.descricao) AS produto,
        p.theme as ptheme,
        retira_acentuacao(st.status) as status,
        c.idstatus,
        st.id,
        st.theme,
        st.theme as sttheme,
        c.empresadigitada as empresa,
        retira_acentuacao(m.municipio_nome) as cidade,
        retira_acentuacao(fpg.formadepagamento) as formadepagamento,
        dr.cpf,
        (c.valortotal +  (select coalesce(sum(d.valor),0) from dependentes d where d.titularid = c.idcontato )) as valor,
        (1 + (select count(d.*) from dependentes d where d.titularid = c.idcontato )) as beneficiarios,
        c.time_assinatura_proposta as dtassinatura,
        c.datapagamentoprimeira as dtpagamento

        FROM contatos c
        LEFT JOIN contatos_rf r on r.idcontato = c.idcontato
        LEFT JOIN dados_rf dr ON dr.idcontato = r.idcontato
        INNER JOIN vendedores v on v.idvendedor = c.idvendedor
        INNER JOIN status st on st.id = c.idstatus
        LEFT JOIN formasdepagamento fpg ON fpg.id = c.idformadepagamento
        LEFT JOIN produto p ON p.id = c.idproduto  
        LEFT JOIN enderecos e ON e.idcontato = r.idcontato
        LEFT JOIN municipio m ON m.municipio_codigo = e.cidade 
        WHERE v.idvendedor = $corretor
        and c.idstatus in $status

        UNION ALL

        SELECT distinct
        v.idgrupo,
        v.idvendedor,
        retira_acentuacao(v.vendedor) as vendedor,
        c.idcontato, 
        retira_acentuacao(r.nome) as nome, 
        retira_acentuacao(c.nome) as titular,
        datahora, 
        c.telefone, 
        c.email, 
        retira_acentuacao(p.descricao) AS produto,
        p.theme as ptheme,
        retira_acentuacao(st.status) as status,
        c.idstatus,
        st.id,
        st.theme,
        st.theme as sttheme,
        c.empresadigitada as empresa,
        retira_acentuacao(m.municipio_nome) as cidade,
        retira_acentuacao(fpg.formadepagamento) as formadepagamento,
        dr.cpf,
        (c.valortotal +  (select coalesce(sum(d.valor),0) from dependentes d where d.titularid = c.idcontato )) as valor,
        (1 + (select count(d.*) from dependentes d where d.titularid = c.idcontato )) as beneficiarios,
        c.time_assinatura_proposta as dtassinatura,
        c.datapagamentoprimeira as dtpagamento

        FROM contatos c 
        LEFT JOIN contatos_rf r on r.idcontato = c.idcontato
        LEFT JOIN dados_rf dr ON dr.idcontato = r.idcontato
        INNER JOIN vendedores v on v.idvendedor = c.idvendedor
        INNER JOIN status st on st.id = c.idstatus
        LEFT JOIN formasdepagamento fpg ON fpg.id = c.idformadepagamento
        LEFT JOIN produto p ON p.id = c.idproduto  
        LEFT JOIN enderecos e ON e.idcontato = r.idcontato
        LEFT JOIN municipio m ON m.municipio_codigo = e.cidade 

        WHERE v.idvendedor in (select * from arvore_vendedores)
        and c.idstatus in $status
        
        ORDER BY datahora DESC
        ";
        
        $result     = pg_query($sql);
        $corretores = pg_fetch_all($result);
        
        $json = json_encode($corretores);
        echo $json;
    }

?>    
     