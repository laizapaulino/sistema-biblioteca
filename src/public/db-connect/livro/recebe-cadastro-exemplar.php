<?php
    session_start();
    if (!isset($_SESSION["usuario"]) ){
        //header('Location: ../pagina_inicial.php');
    }
    else{
      if($_SESSION["tipo"]=='leitor')
        //header('Location: ../pagina_inicial.php');
        echo $_SESSION["tipo"];
    }
    
    include_once '../conexao.php';

    $codigo = $_POST['id_exemplar'];
    $isbn = $_POST['isbn'];

    echo $codigo.'<br>'.$isbn.'<br>';

    print_r($_POST);
    
    $sql = "insert into exemplar values";
    $valores = "('$isbn','$codigo',0);";
    $sql = $sql.$valores;
    //$result = mysqli_prepare($conexao, $sql);
    if (mysqli_query($conexao, $sql)) {
        echo 'Inserido com sucesso<br>';
        header('Location: ../../../livros/menu_exemplar.php?ok');
    }else{
        echo mysqli_error($conexao).'<br>';
        header('Location: ../../../livros/menu_exemplar.php?erro');
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

*/
?>