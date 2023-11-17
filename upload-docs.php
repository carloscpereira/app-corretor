<?php error_reporting(0); ?>
<?php include('conexao.php'); ?>
<?php

$folder_name = '../assets/media/docs/';

if (!empty($_FILES)) {
    $temp_file = $_FILES['file']['tmp_name'];
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    $new_file = md5($_POST['tipodedocumentoid'] . '-' . $_POST['pessoaid']) . '.' . $ext;

    $location = $folder_name . $new_file;

    if (move_uploaded_file($temp_file, $location)) {
        // Le o arquivo binario da imagem
        $data = file_get_contents($location);

        // transforma em hexadecimal
        $escaped = bin2hex($data);

        $tipodedocumentoid = $_POST['tipodedocumentoid'];
        $pessoaid          = $_POST['pessoaid'];

        $sql = "INSERT INTO documentos(pessoaid, tipodedocumentoid ,urldodocumento) VALUES($pessoaid, $tipodedocumentoid, '$location') returning id, tipodedocumentoid, urldodocumento";
        $result = pg_query($sql);

        $documentos     = pg_fetch_all($result);

        $json = json_encode($documentos);

        echo $json;
    }
}


?>