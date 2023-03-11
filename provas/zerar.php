<?php
    include_once('conexao.php');
    $sql_zerar="truncate table provas_cepi.turma01";
    $resultado_zerar=$conexao->query($sql_zerar);
    header('Location:paraBD.php');
?>