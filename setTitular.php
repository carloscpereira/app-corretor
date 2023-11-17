<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    $id             = isset($_GET['id'])?$_GET['id']:null;
    $novo           = isset($_GET['novo'])?$_GET['novo']:null;
    $nome           = isset($_GET['nome'])?$_GET['nome']:null;
    $vinculo        = isset($_GET['vinculo'])?$_GET['vinculo']:null;
    $genero         = isset($_GET['genero'])?$_GET['genero']:null;
    $nascimento     = isset($_GET['nascimento'])?$_GET['nascimento']:null;
    $cpf            = isset($_GET['cpf'])?preg_replace('/[^A-Za-z0-9]/', '', $_GET['cpf']):null;
    $rg             = isset($_GET['rg'])?$_GET['rg']:null;
    $orgao          = isset($_GET['orgao'])?$_GET['orgao']:null;
    $mae            = isset($_GET['mae'])?$_GET['mae']:null;
    $idproduto      = isset($_GET['idproduto'])?$_GET['idproduto']:null;
    $produto        = isset($_GET['produto'])?$_GET['produto']:null;
    $valor          = isset($_GET['valor'])?$_GET['valor']:null;


    /** tabela: contatos */
    $sql = "UPDATE contatos SET    	
                nome = '$nome',
                idproduto = $idproduto,
                idvinculo = $vinculo,
                valortotal = $valor
            WHERE idcontato = $id  RETURNING idcontato, nome, idproduto, idvinculo, valortotal";

    $result     = pg_query($sql);
    $titular    = pg_fetch_assoc($result);

    $sqlSelectDados = "SELECT * dados WHERE idcontato = $id LIMIT 1";
    $resultSelectDados = pg_query($sqlSelectDados);
    
    if($result) {
        if(pg_num_rows($resultSelectDados) > 0) {
            $dadosContato = pg_fetch_assoc($result);
            $iddado = $dadosContato['iddado'];

            $sql = "UPDATE dados SET 
                nomedamae = '$mae',
                genero = $genero,
                nascimento '$nascimento',
                cpf '$cpf',
                rg  '$rg',
                orgao '$orgao' 
                WHERE iddado = $iddado
                RETURNING nomedamae, genero, nascimento, cpf, rg, orgao";    
        } else {
            $sql = "INSERT INTO dados ( 
                    idcontato,
                    nomedamae,
                    genero,
                    nascimento,
                    cpf,
                    rg ,
                    orgao) VALUES (
                    $id,            
                    '$mae',
                    $genero,
                    '$nascimento',
                    '$cpf',
                    '$rg',
                    '$orgao') RETURNING nomedamae, genero, nascimento, cpf, rg, orgao";
        }

        $result     = pg_query($sql);
        $data       =  pg_fetch_assoc($result);

        $json = json_encode(array_merge($titular, $data));
        
        echo $json;
    }else {
        return false;
    }

    // if ($result){
    //     /** tabela: dados */
    //     if ($novo){
    //         $sql = "INSERT INTO dados ( 
    //                 idcontato,
    //                 nomedamae,
    //                 genero,
    //                 nascimento,
    //                 cpf,
    //                 rg ,
    //                 orgao) VALUES (
    //                 $id,            
    //                 '$mae',
    //                 $genero,
    //                 '$nascimento',
    //                 '$cpf',
    //                 '$rg',
    //                 '$orgao') RETURNING nomedamae, genero, nascimento, cpf, rg, orgao";
    //     } else {
    //         $sql = "UPDATE dados SET 
    //             nomedamae = '$mae',
    //             genero = $genero,
    //             nascimento '$nascimento',
    //             cpf '$cpf',
    //             rg  '$rg',
    //             orgao '$orgao' 
    //             WHERE idcontato = $id
    //             RETURNING nomedamae, genero, nascimento, cpf, rg, orgao";            
    //     }

    //     $result     = pg_query($sql);
    //     $data       =  pg_fetch_assoc($result);

    //     $json = json_encode(array_merge($titular, $data));
        
    //     echo $json;
    // } else { 
    //     echo false;
    // }
    
    
?> 