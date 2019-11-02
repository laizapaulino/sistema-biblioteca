<?php
    include_once 'conexao.php';

    $cpf = mysqli_real_escape_string($conexao,$_POST['cpf']);
    $senha = mysqli_real_escape_string($conexao,$_POST['senha']);
    echo $cpf.' - ' . $senha;
    
    $sql = "SELECT * FROM usuario where cpf = ".$cpf." and senha = '".$senha."';";
    //$valores = "('$cpf','$email','$senha','$nome','$nascimento','$endereco_rua','$endereco_numero','$endereco_cidade','$endereco_estado',false);";
    //$sql = $sql.$valores;
    echo $sql;

    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            echo "Correspondencias: " . mysqli_num_rows($result);
            while ($row = $result->fetch_assoc()) {//Verifica se é bibliotecaria
                printf ("%s (%d)\n", $row["nome"], $row["bibliotecaria"]);
                if($row["bibliotecaria"] == 1){
                    $_SESSION["usuario"]=$row['nome'];
                    $_SESSION["tipo"]='bibliotecaria';

                    header('Location: ../../usuario/menu_bibliotecaria.php');
                }
                else if($row["bibliotecaria"] == 0){
                    $_SESSION["usuario"]=$row['nome'];
                    $_SESSION["tipo"]='leitor';
                    header('Location: ../../usuario/menu_leitor.php?'.$_SESSION["usuario"]);
                    
                }
            }
            
        }
        else{
            //header('Location: login.php?erro_login');
        }
    }else{
        echo mysqli_error($conexao);
        header('Location: ../../usuario/login.php?error');

    }
    
    
    
    
    
?>
