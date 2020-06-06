<?php
    require_once("config.php");
    // $sql = new Sql();
    // $alunos = $sql->select("SELECT * FROM aluno");

    // echo json_encode($alunos);

    $aluno = new Aluno();
    $aluno -> loadById(9);
    echo $aluno;


?>