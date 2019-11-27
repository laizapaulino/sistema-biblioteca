<?php
    //include_once '../../../public/db-connect/usuario/retorna-usuarios-leitor.php';
    $url = explode('/', $_SERVER['REQUEST_URI']);
   //echo '<pre>';
   //print_r($url);
   //echo '</pre>';
   
   //echo $pagina[0];
   if ($url[4]=='db-connect'){
        include_once '../conexao.php';
   }else{
        include_once '../public/db-connect/conexao.php';
   }
    
    $sql = "SELECT reserva_livro.*, publicacao.nome FROM publicacao, exemplar, reserva_livro where exemplar.codigo_id = reserva_livro.exemplar and publicacao.isbn = exemplar.isbn;";
    $reserva_livro = array();
    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            
            while ($row = $result->fetch_assoc()) {
                
                array_push($reserva_livro, array('codigo'=>$row["exemplar"], 'nome'=>$row["nome"],'data_limite'=>$row["data_limite"], 'cpf'=>$row["cpf"]));
                  
            }
            //echo '<pre>';
            //print_r($reserva_livro);
            //echo '</pre>';
        }

        
        else{
            //header('Location: login.php?erro_login');
        }
    }else{
        echo mysqli_error($conexao);
        //header('Location: login.php?error');

    }

    $sql = "SELECT reserva_trabalho.* , trabalho.nome FROM reserva_trabalho join trabalho on reserva_trabalho.codigo = trabalho.codigo;";
    $reserva_trabalho = array();
    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            
            while ($row = $result->fetch_assoc()) {
                
                array_push($reserva_trabalho, array('codigo'=>$row["codigo"], 'nome'=>$row["nome"],  'data_limite'=>$row["data_limite"], 'cpf'=>$row["cpf"]));
                  
            }
            //echo '<pre>';
            //print_r($reserva_trabalho);
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
