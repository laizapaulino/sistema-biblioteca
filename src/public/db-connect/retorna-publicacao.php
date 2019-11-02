<?php
    include_once 'conexao.php';

    
    $sql = "SELECT * FROM publicacao";
    $publi = array();
    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            while ($row = $result->fetch_assoc()) {//Verifica se é bibliotecaria
                array_push($publi, array('nome'=>$row["nome"], 'isbn'=>$row["isbn"]));
                
                
                
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
