<?php
    include_once '../conexao.php';

    $url = explode('?',$_SERVER["REQUEST_URI"]);
    $codigo = $_POST['codigo'];
    $url2 = explode('?', $_SERVER['HTTP_REFERER']);
    
    $sql = "update exemplar set codigo_id = '".$codigo."' where isbn= '".$url[1]."' and codigo_id = '".$url[2]."';";
    echo $sql;
    $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header("Location: ".$url[0]."?".$codigo."?atualizado");

    }else{
        echo mysqli_error($conexao).'<br>';
        header("Location: ".$url2[0]."?".$codigo."?erro"); #AQUI NÔA DA CERTO
    }
    
    
?>
