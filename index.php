<?php
    require_once("config.php");
    $sql = new Sql();
    $alunos = $sql->select("SELECT * FROM aluno");

    echo json_encode($alunos);


?>