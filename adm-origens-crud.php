<?php

/**
 * CRUD
 * c{create}; r{read}; u{update}; d{delete}
 */

if (isset($_POST['action'])){
    
    $action = $_POST['action'];
    $obj = $_POST;

    switch ($action) {
        case 'c':
            createObj($obj);
        break;
        case 'r':
            readObj($obj);
        break;
        case 'u':
            updateObj($obj);
        break;
        case 'd':
            deleteObj($obj);
        break;
    }

}

 function creatObj($objeto){

    $campos=null;

    foreach ($objeto as $key => $value) {
        if ($campos == null){
            $campos = "($key";
            $valores = "(";
        } else {
            $campos = ",$key";
        }
    }
    $sql = 'insert into '.$objeto['tabela'].$sql.')';

 }

 function readObj($objeto){

 }

 function updateObj($objeto){

 }

 function deleteObj($objeto){

 }


?>