<?php
    session_start();
    if (!isset($_SESSION["usuario"]) )
        header('Location: ../public/pagina_inicial.php');
    else{
      if($_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    }

    include_once '../conexao.php';
    include_once '../retorna-exemplar.php';
    for ($i=0; $i < sizeof($exemplar); $i++) { 
        if($exemplar[$i]['isbn'] == $_POST['isbn']){
        ## ATUALIZA O STAUTUS DO EXEMPLAR
            $sql = "update exemplar set status = 1 where codigo_id= '".$_POST['isbn']."' ;";

            $result = mysqli_prepare($conexao, $sql);
            if (mysqli_query($conexao, $sql)) {
                echo "<br>Atualizado com sucesso<br>";
        
            }
        }
    }
    

    print_r($_POST);
    $codigo = $_POST['isbn'];
    $usuario = $_POST['cpf2'];
    $data_hoje = date("Y-m-d H:i:s");
    $data_devolucao =date('Y-m-d', strtotime("+7 days",strtotime($data_hoje)));
    echo $data_devolucao;

    $sql = "insert into emprestimo_livro values";
    $valores = "('$codigo','$usuario','$data_devolucao');";
    $sql = $sql.$valores;
    //$result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo 'Inserido com sucesso<br>';
        header('Location: ../../../emprestimo/menu_emprestimo.php');
    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../../emprestimo/menu_emprestimo.php');
    }
    
    


/*CREATE TABLE publicacao(
	isbn integer PRIMARY KEY,
    nome varchar(40),
    ano integer,
    autor_1 varchar(40),
    autor_2 varchar(40),
    autor_3 varchar(40),
    editora varchar(25)
    
);

CREATE TABLE exemplar(
	isbn integer,
    codigo_id integer primary key,
    status boolean,
    FOREIGN KEY (isbn) REFERENCES publicacao(isbn)

    
);

CREATE TABLE trabalho(
    codigo integer primary key,
    nome varchar(40),
    nome_instituicao varchar(40),
    ano integer,
    autor_1 varchar(40),
    autor_2 varchar(40),
    autor_3 varchar(40),
    status boolean
    
);

*/
?>