<?php
    require_once 'crud.php';
    $u = new Usuario;
    session_start();

     $usuario = addslashes($_POST['usuario']);
     $senha = addslashes($_POST['senha']);

     if(!empty($usuario) && !empty($senha)){
        $u->conectar();
        if($u->msgErro == ""){
            if($u->logar($usuario,$senha)){
                header("location: ../pages/painel");
                $_SESSION['nome'] = $_SESSION['nome'];
            }else{
                $_SESSION['erro'] = "Verifique seu usuário e sua senha!";
                header("location: ../pages/login");
            }

        }else{
            $_SESSION['erro'] = $u->msgErro;
        }
     }else{
        $_SESSION['erro'] = "Usuário ou senha não preenchidos!";
        header("location: ../pages/login");
     }
?>