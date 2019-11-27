<?php
    include_once '../conexao.php';

    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    
    echo $tipo.'<br>'.$valor;
    $sql = "insert into valor_multa values";
    $valores = "('$tipo','$valor');";
    $sql = $sql.$valores;
    //$result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo 'Inserido com sucesso<br>';
        header('Location: ../../../multa/menu_multa.php?OK');
    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../../multa/menu_multa.php?erro');
    }
    
    //echo '<br><hr>'.$sql;
    
?>
