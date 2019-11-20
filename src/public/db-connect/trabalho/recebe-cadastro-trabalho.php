<?php
    session_start();
    if (!isset($_SESSION["usuario"]) )
        header('Location: ../public/pagina_inicial.php');
    else{
      if($_SESSION["tipo"]=='leitor')
        header('Location: ../public/pagina_inicial.php');
    }

    include_once '../conexao.php';

    $nome = $_POST['nome_trabalho'];
    $ano = $_POST['ano'];
    $autor_1 = $_POST['autor_1'];
    $autor_2 = $_POST['autor_2'];
    $autor_3 = $_POST['autor_3'];
    $codigo = $_POST['codigo'];
    echo $nome.'<br>'.$ano.'<br>'.$autor_1.'<br>'.$editora.
    '<br>'.$codigo.'<br>';

    $sql = "insert into trabalho values";
    $valores = "('$codigo','$nome','$ano','$autor_1','$autor_2','$autor_3', false);";
    $sql = $sql.$valores;
    //$result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo 'Inserido com sucesso<br>';
        header('Location: ../../../trabalho/menu_trabalho.php?ok');
    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../../trabalho/menu_trabalho.php?erro');
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