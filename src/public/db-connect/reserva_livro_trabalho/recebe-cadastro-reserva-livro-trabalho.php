<?php
    include_once '../conexao.php';
    session_start();
    print_r($_POST);
    $tipo = $_POST['tipo'];
    $data_hoje = date("Y-m-d H:i:s");
    $data_limite =date('Y-m-d', strtotime("+7 days",strtotime($data_hoje)));
    $cpf = $_SESSION['cpf'];
    if($tipo == "Livros"){
        $livro = $_POST['livro'];
        $sql = "insert into reserva_livro values ";
        
        $valores = "('$livro','$data_limite','$cpf' );";
        $sql = $sql.$valores;
        //$result = mysqli_prepare($conexao, $sql);
        if (mysqli_query($conexao, $sql)) {
            echo 'Inserido com sucesso<br>';
            header('Location: ../../../reserva-livro-trabalho/menu_reserva_livro_trabalho.php?ok');
        }else{
            echo mysqli_error($conexao).'<br>';
            header('Location: ../../../reserva-livro-trabalho/menu_reserva_livro_trabalho.php?erro');
        }

    }
    else{
        $trabalho = $_POST['trabalho'];
        $sql = "insert into reserva_trabalho values ";
        $valores = "('$trabalho','$data_limite','$cpf' );";
        $sql = $sql.$valores;
    
        //$result = mysqli_prepare($conexao, $sql);
        if (mysqli_query($conexao, $sql)) {
            echo 'Inserido com sucesso<br>';
            header('Location: ../../../reserva-livro-trabalho/menu_reserva_livro_trabalho.php?ok');
        }else{
            echo mysqli_error($conexao).'<br>';
            header('Location: ../../../reserva-livro-trabalho/menu_reserva_livro_trabalho.php?erro');
        }

    }
    
    
?>
