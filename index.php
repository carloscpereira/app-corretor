<?php

//Não exibe alerta e notificação
error_reporting(1);


// if ( $_COOKIE["logado"] != NULL){
if ($_COOKIE['idvendedor'] == 13) {
	header("Location: rel-recepcao-de-vendas.php?tpcontrato=1");
} else {

	if ($_COOKIE['cId'] == '') {
		header("Location: login.php");
	} else {
		header("Location: fuv-oportunidades.php");
	}
}
	// } else {
    //         header("Location: login.php");
    //     }