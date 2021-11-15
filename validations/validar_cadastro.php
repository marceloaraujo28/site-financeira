<?php
    require_once 'crud.php';
    $u = new Usuario();
    session_start();

     $usuario = addslashes($_POST['usuario']);
     $senha = addslashes($_POST['senha']);
     $nome = addslashes($_POST['nome']);

     if(!empty($usuario) && !empty($senha) && !empty($nome)){
        $u->conectar();
        if($u->msgErro == ""){
            if($u->cadastrar($usuario,$senha,$nome)){
                header("location: ../pages/cadastrar");
                $_SESSION['success'] = "Usuário Cadastrado com sucesso!";
            }else{
                $_SESSION['erro'] = "Usário ja cadastrado no sistema!";
                header("location: ../pages/cadastrar");
            }

        }else{
            $_SESSION['erro'] = $u->msgErro;
        }
     }else{
        $_SESSION['erro'] = "Usuário ou senha não preenchidos!";
        header("location: ../pages/cadastrar");
     }
?>