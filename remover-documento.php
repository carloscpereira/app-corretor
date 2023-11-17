<?php

if (isset($_POST["documentoid"])) {

    include('conexao.php');

    $source = $_POST["source"];
    $documentoid = $_POST["documentoid"];
    unlink($source);

    $sql = "DELETE FROM documentos WHERE id =$documentoid";
    $result = pg_query($sql);

    echo $result;
}