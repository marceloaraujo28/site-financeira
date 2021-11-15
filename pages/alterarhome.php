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

    // BUSCAR DADOS BANCO A

    $sql = $pdo->prepare("SELECT * FROM simulahome");
    $sql->execute();
    $home = $sql->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Financeira Cambial</title>
    <script>
        $(document).ready(function(){
            $('.cpf').mask('000.000.000.000.000,00000', {reverse: true});
        });
    </script>
</head>
<body>
    <?php require_once("menu.php");?>
    <div class="container col-10">
      <!-- ALTO -->
        <form action="../validations/homealterar.php" method="post">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"><font color="red">HOME</font>  </th>
                    <th scope="col" class="text-center">x84</th>
                    <th scope="col" class="text-center">x72</th>
                    <th scope="col" class="text-center">x60</th>
                    <th scope="col" class="text-center">x48</th>
                    <th scope="col" class="text-center">x36</th>
                    <th scope="col" class="text-center">x24</th>
                    <th scope="col" class="text-center">x12</th>
                  </tr>
                </thead>
            <tbody>
              <tr>
                <th scope="row" class="text-center">Coeficientes</th>
                <td><input name="co84" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($home['co84'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co72" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($home['co72'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co60" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($home['co60'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co48" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($home['co48'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co36" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($home['co36'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co24" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($home['co24'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co12" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($home['co12'],5,",",".");?>" type="text" maxlength="50"></td>
              </tr>
              
              
              <tr>
                <th scope="row"></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><button type="submit" class="btn btn-primary w-100">Alterar</button></th>
              </tr>
            </tbody>
          </table>
        </form>

<?php
    if(isset($_SESSION['erro'])){
      echo '<script language="javascript">';
      echo 'alert("'.addslashes($_SESSION['erro']).'");';
      echo '</script>';
      unset($_SESSION['erro']);
    }
  ?>

</body>
</html>