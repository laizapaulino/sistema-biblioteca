<?php
    include_once 'conexao.php';

    
    $sql = "SELECT * FROM exemplar";
    $exemplar = array();
    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            while ($row = $result->fetch_assoc()) {//Verifica se é bibliotecaria
                array_push($exemplar, array('isbn'=>$row["isbn"],
                'codigo'=>$row['codigo_id']));
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
