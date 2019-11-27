<?php
    include_once '../conexao.php';

    $url = explode('?',$_SERVER["REQUEST_URI"]);
    print_r($url);
    
    if($url[1]== 'trabalho'){
        $a =explode('%',explode('-',$url[3])[2]);
        $data = explode('-',$url[3])[0].'-'.explode('-',$url[3])[1].'-'.$a[0];
        echo "a";
       
        print_r($data);
        $data_limite =date('Y-m-d', strtotime("+7 days",strtotime($data)));
        $sql = "update reserva_trabalho set data_limite = '".$data_limite."' where codigo = '".$url[2]."';";
    
    print_r($sql);
    $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header("Location: ".$_SERVER['HTTP_REFERER']."?atualizado");
    }else{
        echo mysqli_error($conexao).'<br>';
       // header("Location: ".$_SERVER['HTTP_REFERER']."?erro");
    }
    }
    
    if($url[1]== 'livro'){
        $a =explode('%',explode('-',$url[3])[2]);
        $data = explode('-',$url[3])[0].'-'.explode('-',$url[3])[1].'-'.$a[0];
        echo "a";
       
        print_r($data);
        $data_limite =date('Y-m-d', strtotime("+7 days",strtotime($data)));
        $sql = "update reserva_livro set data_limite = '".$data_limite."' where exemplar = '".$url[2]."';";
    
    print_r($sql);
    $result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo "Atualizado com sucesso<br>";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else{
        echo mysqli_error($conexao).'<br>';
        header("Location: ".$_SERVER['HTTP_REFERER']."?erro");
    }
    }
    
?>
