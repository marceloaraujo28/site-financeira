<?php
    session_start();
    include_once "../validations/verificanivel.php";

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

    
      $sql = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
      $sql->execute();
      $dados = $sql->fetchAll();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Ususuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php require_once("menu.php");?>
    <div class="container col-md-7">
      
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Usuário</th>
                <th scope="col">Nivel</th>
                <th scope="col">ALTERAR</th>
                <th scope="col">EXCLUIR</th>
              </tr>
            </thead>
            <tbody>
                  <?php
                    foreach($dados as $dado){
                      echo "<tr>";
                        echo "<th scope='row'>".$dado['id']."</th>";
                        echo "<td>".$dado['nome']."</td>";
                        echo "<td>".$dado['usuario']."</td>";
                        echo "<td>".$dado['nivel']."</td>";
                        echo "<td><a href='altusu?id=".$dado['id']."' class='btn btn-primary'>Alterar</a></td>";
                        echo "<td><a href='../validations/excluirusu?id=".$dado['id']."' class='btn btn-primary'>Excluir</a></td>";
                      echo "</tr>";
                    }
                  
                  ?>
            </tbody>
         </table>
        
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