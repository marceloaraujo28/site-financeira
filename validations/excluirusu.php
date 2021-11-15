<?php
    session_start();
    require_once 'crud.php';
    $u = new Usuario();

    $id = $_GET['id'];

    $u->conectar();
    $u->excluir($id);
    header("location: ../pages/alterarusers");
    $_SESSION['ok'] = 'Usuario Excluido com Sucesso';
?>