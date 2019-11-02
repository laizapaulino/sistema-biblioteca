<?php
    include_once 'conexao.php';

    $nome = $_POST['nome_usuario'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $endereco_rua = $_POST['endereco_rua'];
    $endereco_numero = $_POST['endereco_numero'];
    $endereco_cidade = $_POST['endereco_cidade'];
    $endereco_estado = $_POST['endereco_estado'];
    $senha = $_POST['senha'];
    echo $nome.'<br>'.$cpf.'<br>'.$email.'<br>'.$nascimento.
    '<br>'.$endereco_rua.'<br>'.$endereco_numero.'<br>'.$endereco_cidade.'<br>'.$endereco_estado.'<br>'.$senha;

    $sql = "insert into usuario values";
    $valores = "('$cpf','$email','$senha','$nome','$nascimento','$endereco_rua','$endereco_numero','$endereco_cidade','$endereco_estado',false);";
    $sql = $sql.$valores;
    //$result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo 'Inserido com sucesso<br>';
    }else{
        echo mysqli_error($conexao).'<br>';
    }
    
    //echo '<br><hr>'.$sql;
    header('Location: pagina_inicial.php');
?>
