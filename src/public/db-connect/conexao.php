<?php
    header('Content-type: text/html; charset=utf-8');
    setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
    

    $servidor = '127.0.0.1';
    $banco = 'sistema-biblioteca';
    $usuario = 'admin';
    $senha = 'p4ul1n0123';
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco) ;
    echo mysqli_error($conexao);
    echo "deu";
?>
