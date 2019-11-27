<?php
   $url = explode('/', $_SERVER['REQUEST_URI']);
   //echo '<pre>';
   //print_r($url);
   //echo '</pre>';
   
   $pagina= explode('.',$url[4]);
  
   if ($pagina[0]=='retorna-emprestimo-livro'){
        include_once '../conexao.php';
   }else{
        include_once '../public/db-connect/conexao.php';
   }

   // include_once '../conexao.php';
    
    $sql = "SELECT emprestimo_livro.*, exemplar.codigo_id, exemplar.status, publicacao.* FROM emprestimo_livro, exemplar, publicacao where publicacao.isbn = exemplar.isbn and exemplar.codigo_id = emprestimo_livro.codigo";
    $emprestimo_livro = array();
    if( $result = mysqli_query($conexao, $sql)){

        if ( mysqli_num_rows($result) > 0){
            while ($row = $result->fetch_assoc()) {
                array_push($emprestimo_livro, 
                    array('nome'=>$row["nome"], 
                        'codigo'=>$row["codigo"],
                        'autor_1'=>$row["autor_1"],
                        'autor_2'=>$row["autor_2"],
                        'autor_3'=>$row["autor_3"],
                        'status'=>$row['status'],
                        'data_devolucao'=>$row['data_devolucao'],
                        'usuario'=>$row['usuario']                        
                        )
                    );
            }
            //echo '<pre>';
            //print_r($emprestimo_livro);
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
