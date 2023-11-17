<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/corretor/conexao.php'); ?>

<?php

if ($_GET != null){

    $idcontrato        = $_GET['idcontrato'];
    $idposvendas       = $_COOKIE['idvendedor'];

 
    $sql = "UPDATE contatos SET 
                    dtposvendas = CURRENT_TIMESTAMP, 
                    idposvendas = {$idposvendas}
            WHERE idcontato = {$idcontrato}";
    
    
    $result         = pg_query($sql);

    if ($result){
        echo true;
    } else {echo false;}

}
    
?>    
     