<?php include('conexao.php');?>
<?php

    $folder_name = '../assets/media/docs/';

    if(!empty($_FILES)){
        $temp_file = $_FILES['file']['tmp_name'];
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        
        $new_file = md5($_POST['tipodedocumento'].'-'.$_POST['tipodecontato'].'-'.$_POST['id']).'.'.$ext;
        
        $location = $folder_name.$new_file;
                
        if (move_uploaded_file($temp_file, $location)){
            // Le o arquivo binario da imagem
            $data = file_get_contents( $location );
  
            // transforma em hexadecimal
            $escaped = bin2hex( $data );
        
            $tipodedocumento = $_POST['tipodedocumento'];
            $tipodecontato   = $_POST['tipodecontato'];
            $id              = $_POST['id'];
                        
            $sql = "INSERT INTO sch_docs.documentos(idcontato, idtipodedocumento, idtipodecontato,documento) VALUES($id, $tipodedocumento, $tipodecontato, '$location')";
            $result = pg_query($sql);
            
            echo $sql;
                        
        }
                
    }

    if(isset($_POST["name"])){
        $filename = $folder_name.$_POST["name"];
        unlink($filename);
    }

    $result = array();

    $files = scandir('assets/media/docs/');


    if(false !== $files){
        foreach($files as $file){
            if('.' !=  $file && '..' != $file){
                $output .= '
                <div class="col-lg-3">
                    <img class= "img-fluid img-thumbnail" src="'.$folder_name.$file.'">
                </div>';
            }
        }
    }

    echo $output;


?>