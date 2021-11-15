<?php 
session_start();

try{
    $pdo = new PDO("mysql:dbname=FINANCEIRA;host=localhost","root","");
  }
  catch (PDOException $e){
    echo "Erro com banco de dados: ".$e->getMessage();
  }
  catch(Exception $e){
    echo "Erro genérico: ".$e->getMessage();
    exit();
  }

        $id = $_GET['id'];

      $sql = $pdo->prepare("SELECT * FROM users WHERE id='$id'");
      $sql->execute();
      $dados = $sql->fetch();

?>
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
        <?php
            if(isset($_SESSION['erro'])){
                echo "<div class='alert alert-danger text-center' role='alert'>";
                    echo $_SESSION['erro'];
                echo "</div>";
                unset($_SESSION['erro']);
            }
        ?>
        <h1 class="col-md-6 offset-md-3">Alterar Usuário no Sistema</h1>
        <form method="POST" action="../validations/alterarusuario" >
                <div class="col-md-6 mt-5 offset-md-3">
                    <label  class="form-label">Nome</label>
                    <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" class="form-control">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label  class="form-label">Usuário</label>
                    <input type="text" name="usuario" value="<?php echo $dados['usuario']; ?>" class="form-control"  aria-describedby="emailHelp">
                </div>
                
                <div class="col-md-6 offset-md-3">
                    <label  class="form-label">Nivel</label>
                    <input type="number" name="nivel" value="<?php echo $dados['nivel']; ?>" class="form-control"  aria-describedby="emailHelp">
                </div>
                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                <button type="submit" class="btn btn-primary mt-3 offset-md-3">Alterar</button>

        </form>    
    </div>
    <?php
        if(isset($_SESSION['ok'])){
            echo '<script language="javascript">';
            echo 'alert("'.addslashes($_SESSION['ok']).'");';
            echo '</script>';
            unset($_SESSION['ok']);
          }
    ?>
</body>
</html>