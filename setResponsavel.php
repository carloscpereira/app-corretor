<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/funcoes-cabecalho.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php
ini_set('display_errors', 'Off');

    $idcontato      = isset($_GET['idcontato'])?$_GET['idcontato']:null;
    $novo           = isset($_GET['novo'])?$_GET['novo']:null;
    $nome           = isset($_GET['nome'])?$_GET['nome']:null;
    $telefone       = isset($_GET['telefone'])?preg_replace('/[^A-Za-z0-9]/', '', $_GET['telefone']):null;
    $email          = isset($_GET['email'])?$_GET['email']:null;
    $cep            = isset($_GET['cep'])?preg_replace('/[^A-Za-z0-9]/', '', $_GET['cep']):null;
    $estado         = isset($_GET['estado'])?(int)getIDEstados($_GET['estado']):null;
    $cidade         = isset($_GET['cidade'])?(int)getIDCidades($_GET['cidade']):null;
    $endereco       = isset($_GET['endereco'])?$_GET['endereco']:null;
    $complemento    = isset($_GET['complemento'])?$_GET['complemento']:null;
    $numero         = isset($_GET['numero'])?$_GET['numero']:null;
    $bairro         = isset($_GET['bairro'])?$_GET['bairro']:null;
    $nomemae        = isset($_GET['nomemae'])?$_GET['nomemae']:null;
    $genero         = isset($_GET['genero'])?$_GET['genero']:null;
    $nascimento     = isset($_GET['nascimento'])?$_GET['nascimento']:null;
    $cpf            = isset($_GET['cpf'])?preg_replace('/[^A-Za-z0-9]/', '', $_GET['cpf']):null;
    $rg             = isset($_GET['rg'])?$_GET['rg']:null;
    $orgao          = isset($_GET['orgao'])?$_GET['orgao']:null;

    if ($novo=="true"){

        $sql = "INSERT INTO contatos_rf (
                idcontato, nome, telefone, email, cep, estado, cidade, 
                endereco, complemento, numero, bairro) 
                VALUES (
                $idcontato, '$nome', '$telefone', '$email','$cep', $estado, $cidade,
                '$endereco', '$complemento', '$numero', '$bairro') RETURNING 
                idcontato, nome, telefone, email, cep, estado, cidade, 
                endereco, complemento, numero, bairro;";

        $result     = pg_query($sql);
        $contato    = pg_fetch_assoc($result);

        if ($result){
            $sql = "INSERT INTO dados_rf (nomemae, genero, nascimento, cpf, rg, orgao, idcontato) 
                    VALUES ('$nomemae',$genero,'$nascimento','$cpf','$rg','$orgao',$idcontato)
                    RETURNING nomemae, genero, nascimento, cpf, rg, orgao;";
            

            $result     = pg_query($sql);
            $dados      = pg_fetch_assoc($result);   
        }      
    } else {
        $sql = "UPDATE contatos_rf SET
            nome = '$nome', telefone = '$telefone', email = '$email', cep = '$cep', 
            estado = $estado, cidade = $cidade, endereco = '$endereco',
            complemento = '$complemento', numero = '$numero', bairro = '$bairro'
            WHERE idcontato = $idcontato
            RETURNING idcontato, nome, telefone, email, cep, estado, cidade, 
            endereco, complemento, numero, bairro;";

        $result     = pg_query($sql);
        $contato    = pg_fetch_assoc($result);

        if ($result){
            $sql = "UPDATE dados_rf 
                    SET nomemae = '$nomemae', genero = $genero, nascimento = '$nascimento',
                    cpf = '$cpf', rg = '$rg', orgao = '$orgao'
                    WHERE idcontato = $idcontato
                    RETURNING nomemae, genero, nascimento, cpf, rg, orgao;";

            $result     = pg_query($sql);
            $dados      = pg_fetch_assoc($result);   
        }      

    }

    array_push($contato, $dados);

    $json = json_encode($contato);
    
    echo $json;


    
?>