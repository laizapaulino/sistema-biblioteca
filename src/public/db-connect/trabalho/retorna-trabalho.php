<?php
    include_once '../public/db-connect/conexao.php';

    
    $sql = "SELECT * FROM trabalho";
    $trabalho = array();
    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            while ($row = $result->fetch_assoc()) {
                array_push($trabalho, array('nome'=>$row["nome"], 'codigo'=>$row["codigo"],
                'autor_1'=>$row["autor_1"],'autor_2'=>$row["autor_2"],'autor_3'=>$row["autor_3"]));
            }
        }

        
        else{
            //header('Location: login.php?erro_login');
        }
    }else{
        echo mysqli_error($conexao);
        //header('Location: login.php?error');

    }
    
    
    
    
    
?>
