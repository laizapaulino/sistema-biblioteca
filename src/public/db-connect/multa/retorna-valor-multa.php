<?php
    //include_once '../../../public/db-connect/usuario/retorna-usuarios-leitor.php';
    $url = explode('/', $_SERVER['REQUEST_URI']);
   //echo '<pre>';
   //print_r($url);
   //echo '</pre>';
   
   $pagina= explode('.',$url[4]);
   //echo $pagina[0];
   if ($pagina[0]=='retorna-valor-multa'){
        include_once '../conexao.php';
   }else{
        include_once '../public/db-connect/conexao.php';
   }
    
    $sql = "SELECT * FROM valor_multa";
    $valor_multa = array();
    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            
            while ($row = $result->fetch_assoc()) {
                
                array_push($valor_multa, array('tipo'=>$row["tipo"], 'valor'=>$row["valor"]));
                  
            }
           // echo '<pre>';
            //print_r($valor_multa);
            //echo '</pre>';
        }

        
        else{
            //header('Location: login.php?erro_login');
        }
    }else{
        echo mysqli_error($conexao);
        //header('Location: login.php?error');

    }
    
    
    
    
    
?>
