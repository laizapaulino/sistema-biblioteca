<?php
    include_once 'conexao.php';

    $url = explode('?',$_SERVER["REQUEST_URI"]);
    $endereco_rua = $_POST['endereco_rua'];
    $endereco_numero = $_POST['endereco_numero'];
    $endereco_cidade = $_POST['endereco_cidade'];
    $endereco_estado = $_POST['endereco_estado'];
    $email = $_POST['email'];

    $sql = "update usuario set endereco_rua = '".$endereco_rua."', endereco_numero= '".$endereco_numero."', endereco_cidade = '".$endereco_cidade."', endereco_estado = '". $endereco_estado."', email ='".$email."';";
    echo $sql;
    $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header("Location: ".$_SERVER['HTTP_REFERER']."?atualizado");

    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../usuario/menu_bibliotecaria.php?erro');
    }
    
    //echo '<br><hr>'.$sql;
    
?>
