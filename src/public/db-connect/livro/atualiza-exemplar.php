<?php
    include_once '../conexao.php';

    $url = explode('?',$_SERVER["REQUEST_URI"]);
    $codigo = $_POST['codigo'];
    $url2 = explode('?', $_SERVER['HTTP_REFERER']);
    echo $url[0].' '.$url[1].'<br>'.$codigo;
    $sql = "update exemplar set codigo_id = '".$codigo."' where isbn= '".$url[1]."' and codigo_id = '".$url[2]."';";
    echo $sql;
    $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header('Location: ../../../livros/detalhes_exemplar.php?'.$url[1].'?'.$codigo);
        //header("Location: ".$url[0]."?",$url[1].$codigo);

    }else{
        echo mysqli_error($conexao).'<br>';
        //header("Location: ".$url2[0]."?".$codigo);
    }
    
    
?>
