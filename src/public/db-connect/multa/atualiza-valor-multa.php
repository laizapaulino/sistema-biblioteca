<?php
    include_once '../conexao.php';

    $url = explode('?',$_SERVER["REQUEST_URI"]);
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    
    $sql = "update valor_multa set valor = '".$valor."' where tipo = '".$url[1]."';";
    echo $sql;
    $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header("Location: ".$_SERVER['HTTP_REFERER']);

    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../../usuario/menu_bibliotecaria.php?erro');
    }
    
    //echo '<br><hr>'.$sql;
    
?>
