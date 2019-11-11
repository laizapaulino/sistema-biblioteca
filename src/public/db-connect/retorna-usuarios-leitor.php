<?php
    include_once 'conexao.php';

    
    $sql = "SELECT * FROM usuario";
    $usuarios = array();
    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            
            while ($row = $result->fetch_assoc()) {
                
                array_push($usuarios, array('nome'=>$row["nome"], 'cpf'=>$row["cpf"], 'email'=>$row["email"],
                'nascimento'=>$row['nascimento'],'rua'=>$row["endereco_rua"], 
                'numero'=>$row["endereco_numero"], 'cidade' =>$row["endereco_cidade"],
                'estado'=>$row["endereco_estado"], 'bibliotecaria'=>$row["bibliotecaria"]
                ));
                  
            }
            

            /*echo '<pre>';
            print_r($usuarios);
            echo '</pre>';*/
        }

        
        else{
            //header('Location: login.php?erro_login');
        }
    }else{
        echo mysqli_error($conexao);
        //header('Location: login.php?error');

    }
    
    
    
    
    
?>
