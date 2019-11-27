<?php
    include_once '../conexao.php';

    $url = explode('?',$_SERVER["REQUEST_URI"]);

    
    if($url[1]== 'trabalho'){
        $data = $url[3];
        $data_devolucao =date('Y-m-d', strtotime("+7 days",strtotime($data)));
        $sql = "update emprestimo_trabalho set data_devolucao = '".$data_devolucao."';";
    
    print_r($sql);
    $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header("Location: ".$_SERVER['HTTP_REFERER']."?atualizado");
    }else{
        echo mysqli_error($conexao).'<br>';
        header("Location: ".$_SERVER['HTTP_REFERER']."?erro");
    }
    }
    
    if($url[1]== 'livro'){
        $data = explode('%',$url[3])[0];
        $data_devolucao =date('Y-m-d', strtotime("+7 days",strtotime($data)));
        
        $sql = "update emprestimo_livro set data_devolucao = '".$data_devolucao."';";
        echo $sql;
        print_r($sql);
        $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header("Location: ".$_SERVER['HTTP_REFERER']."?atualizado");
    }else{
        echo mysqli_error($conexao).'<br>';
        header("Location: ".$_SERVER['HTTP_REFERER']."?erro");
    }
    }
    
?>
