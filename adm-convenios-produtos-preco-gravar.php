<?php include('../funcoes/corretor/conexao.php');?>

<?php 

if ($_POST!=null){

    $acao = $_POST['acao'];

    // var_dump($_POST);
    if (isset($_POST['id'])){
        $idpreco    = $_POST['id'];
    }

    $operadora  = $_POST['operadora'];
    $convenio   = $_POST['convenio'];
    $produto    = $_POST['produto'];
    $fpagamento = $_POST['fpagamento'];
    $valor      = $_POST['valor'];

    /**Create - Novo */
    switch ($acao) {
        case 'c':
            $sql = "INSERT INTO tabeladeprecos 
            (idoperadora, idconvenio, idproduto, idformadepagamento, valor) VALUES(
            $operadora, $convenio, $produto, $fpagamento, $valor)";
            break;

        case 'u':
            $sql = "UPDATE tabeladeprecos SET
            idoperadora = $operadora,
            idconvenio = $convenio,
            idproduto = $produto,
            idformadepagamento = $fpagamento,
            valor = $valor 
            WHERE id = $idpreco";
            break;

    }

    $result = pg_query($sql);

    // var_dump ($sql);
    setcookie('notice', 'insert success', time()+1);
    header("Location: adm-convenios-produtos.php");

}