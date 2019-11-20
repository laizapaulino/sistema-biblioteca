<?php
    include_once '../conexao.php';

    $url = explode('?',$_SERVER["REQUEST_URI"]);
    $nome = $_POST['nome'];
    $autor_1 = $_POST['autor_1'];
    $autor_2 = $_POST['autor_2'];
    $autor_3 = $_POST['autor_3'];
    
    $sql = "update trabalho set nome = '".$nome."', autor_1 = '".$autor_1."', autor_2 = '".$autor_2."', autor_3 = '".$autor_3."' where codigo ='".$url[1]."';";
    
    print_r($sql);
    $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header("Location: ".$_SERVER['HTTP_REFERER']."?atualizado");
    }else{
        echo mysqli_error($conexao).'<br>';
        header("Location: ".$_SERVER['HTTP_REFERER']."?erro");
    }
    
?>
