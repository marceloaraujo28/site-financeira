<?php
    require_once 'crud.php';
    $u = new Usuario();
    session_start();

    $usuario = addslashes($_POST['usuario']);
    $nivel = addslashes($_POST['nivel']);
    $nome = addslashes($_POST['nome']); 
    $id = addslashes($_POST['id']); 

    if($nivel < 1 || $nivel > 2){
        $_SESSION['erro'] = "NIVEL ACEITOS 1(COMUM) E 2(ADMIN)";
        header("location: ../pages/altusu?id=$id");
        exit();
    }

    if(empty($usuario) || empty($nivel) || empty($nome)){
        $_SESSION['erro'] = "Algum campo esta vazio";
        header("location: ../pages/altusu?id=$id");
    }else{
       $u->conectar();
       $u->alterar($id, $nome, $usuario, $nivel);
       $_SESSION['ok'] = "Alterado com Sucesso!";
       header("location: ../pages/alterarusers");
    }


    



?>