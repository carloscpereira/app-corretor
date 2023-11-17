<?php include('../funcoes/corretor/conexao.php');?>

<?php 

if ($_POST!=null){

    $acao = $_POST['acao'];

    // var_dump($_POST);
    if (isset($_POST['id'])){
        $idconvenio    = $_POST['id'];
    }

    $convenio       = $_POST['convenio'];
    $idseguradora   = $_POST['operadora'];
    $idtconvenio    = $_POST['tconvenio'];
    $idparse        = $_POST['cresultado'];

    /**Create - Novo */
    switch ($acao) {
        case 'c':
            $sql = "INSERT INTO convenios 
            (descricao, idseguradora, idparse, idtipodeplano) VALUES(
            '$convenio', $idseguradora, $idparse, $idtconvenio)";
            break;

        case 'u':
            $sql = "UPDATE convenios SET
            descricao = '$convenio',
            idseguradora = $idseguradora,
            idparse = $idparse,
            idtipodeplano = $idtconvenio
            WHERE id = $idconvenio";
            break;

    }

    $result = pg_query($sql);

    // var_dump ($sql);

    if ($result){
        setcookie('notice', 'insert success', time()+1);
    } else {
        setcookie('notice', 'insert fail', time()+1);
    }
    header("Location: adm-convenios.php");

}