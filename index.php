<?php
    require_once("config.php");
    // $sql = new Sql();
    // $alunos = $sql->select("SELECT * FROM aluno");

    // echo json_encode($alunos);


    // Carrega um aluno
    // $aluno = new Aluno();
    // $aluno -> loadById(9);
    // echo $aluno;


    //Traz uma lista

    // $lista = Aluno::getList();

    // echo json_encode($lista);

    // //Pesquisar
    // $search = Aluno::search("Ferreira");
    // echo json_encode ($search);


    // carrega Aluno com  Autenticação de login e senha
    $aluno = new Aluno();
    $aluno -> login("Maria",1);
    echo $aluno;

?>