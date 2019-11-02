<?php
    session_start();
    if (!isset($_SESSION["usuario"]) )
        header('Location: ../public/pagina_inicial.php');
    else{
      if($_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    }

    include_once 'conexao.php';

    $nome = $_POST['nome_publicacao'];
    $ano = $_POST['ano'];
    $autor_1 = $_POST['autor_1'];
    $autor_2 = '';
    $autor_3 = '';
    $editora = $_POST['editora'];
    $isbn = $_POST['isbn'];
    echo $nome.'<br>'.$ano.'<br>'.$autor_1.'<br>'.$editora.
    '<br>'.$isbn.'<br>';

    $sql = "insert into publicacao values";
    $valores = "('$isbn','$nome','$ano','$autor_1','$autor_2','$autor_3','$editora');";
    $sql = $sql.$valores;
    //$result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo 'Inserido com sucesso<br>';
    }else{
        echo mysqli_error($conexao).'<br>';
    }
    
    header('Location: ../../livros/menu_publicacao.php');


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

*/
?>