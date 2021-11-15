<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeira Cambial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php require_once("menu.php");?>

    <!-- LOGIN -->
    <div class="container mt-4">
        <h1 class="col-md-6 offset-md-3">Entrar no sistema</h1>

        <form method="POST" action="../validations/validar_login" >
                <div class="col-md-6 mt-5 offset-md-3">
                    <label  class="form-label">Usuário</label>
                    <input type="text" name="usuario" class="form-control"  aria-describedby="emailHelp">
                
                </div>
                    <div class="col-md-6 offset-md-3">
                        <label  class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 offset-md-3">Entrar</button>
        </form>    
        <h5 class="col-md-6 mt-3 offset-md-3">
            <?php
                if(isset($_SESSION['erro'])){
                    echo $_SESSION['erro'];
                    unset($_SESSION['erro']);
                }
            ?>
        </h5>
    </div>

    <!-- FIM LOGIN -->
</body>
</html>