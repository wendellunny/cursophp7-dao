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


    // // carrega Aluno com  Autenticação de login e senha
    // $aluno = new Aluno();
    // $aluno -> login("Maria",1);
    // echo $aluno;

    //Inserir no Banco

    // $aluno = new Aluno("Aline",2);
    

    // $aluno->insert();
    // echo $aluno;

    //Editar no Banco

    //  $aluno = new Aluno();
    //  $aluno ->loadById(20);
    //  $aluno->update("Matheus",9);

    //Deletar Usuario

    $aluno = new Aluno();
    $aluno -> loadById(9);
    $aluno -> delete();

    echo $aluno;

?>