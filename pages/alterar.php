<?php 

session_start();
include_once "../validations/verificanivel.php";
    try{
      $pdo = new PDO("mysql:dbname=financeira;host=localhost","root","");
    }
    catch (PDOException $e){
      echo "Erro com banco de dados: ".$e->getMessage();
    }
    catch(Exception $e){
      echo "Erro genérico: ".$e->getMessage();
      exit();
    }

    // BUSCAR DADOS BANCO ALTO

    $sql = $pdo->prepare("SELECT * FROM alto");
    $sql->execute();
    $alto = $sql->fetch();

    // BUSCAR DADOS BANCO MEDIO

    $sql1 = $pdo->prepare("SELECT * FROM medio");
    $sql1->execute();
    $medio = $sql1->fetch();

    // BUSCAR DADOS BANCO ZERADO

    $sql2 = $pdo->prepare("SELECT * FROM zerado");
    $sql2->execute();
    $zero = $sql2->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Financeira Cambial</title>
    <script>
        $(document).ready(function(){
            $('.cpf').mask('000.000.000.000.000,00000', {reverse: true});
        });
        $(document).ready(function(){
            $('.taxa').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
</head>
<body>
    <?php require_once("menu.php");?>
    <div class="container col-10">
      <!-- ALTO -->
        <form action="../validations/alteraralto.php" method="post">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"><font color="red">ALTA</font>  </th>
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
                <td><input name="co84" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($alto['co84'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co72" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($alto['co72'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co60" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($alto['co60'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co48" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($alto['co48'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co36" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($alto['co36'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co24" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($alto['co24'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co12" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($alto['co12'],5,",",".");?>" type="text" maxlength="50"></td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Comissao</th>
                <td><input name="cms84" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($alto['cms84'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms72" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($alto['cms72'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms60" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($alto['cms60'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms48" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($alto['cms48'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms36" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($alto['cms36'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms24" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($alto['cms24'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms12" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($alto['cms12'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Juros</th>
                <td><input name="taxa84" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($alto['taxa84'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa72" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($alto['taxa72'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa60" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($alto['taxa60'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa48" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($alto['taxa48'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa36" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($alto['taxa36'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa24" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($alto['taxa24'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa12" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($alto['taxa12'],2,",",".");?>" type="text" maxlength="50"></td>
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


        <!-- MÉDIO -->
        <form action="../validations/alterarmedio.php" method="post">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"><font color="red">MEDIO</font>  </th>
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
                <td><input name="co84" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($medio['co84'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co72" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($medio['co72'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co60" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($medio['co60'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co48" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($medio['co48'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co36" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($medio['co36'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co24" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($medio['co24'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co12" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($medio['co12'],5,",",".");?>" type="text" maxlength="50"></td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Comissao</th>
                <td><input name="cms84" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($medio['cms84'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms72" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($medio['cms72'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms60" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($medio['cms60'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms48" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($medio['cms48'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms36" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($medio['cms36'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms24" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($medio['cms24'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="cms12" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format(($medio['cms12'] * 100),2,",",".");?>" type="text" maxlength="50"></td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Juros</th>
                <td><input name="taxa84" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($medio['taxa84'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa72" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($medio['taxa72'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa60" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($medio['taxa60'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa48" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($medio['taxa48'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa36" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($medio['taxa36'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa24" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($medio['taxa24'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa12" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($medio['taxa12'],2,",",".");?>" type="text" maxlength="50"></td>
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


        <!-- BAIXO -->
        <form action="../validations/alterarbaixo.php" method="post">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"><font color="red">ZERADO</font>  </th>
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
                <td><input name="co84" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($zero['co84'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co72" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($zero['co72'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co60" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($zero['co60'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co48" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($zero['co48'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co36" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($zero['co36'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co24" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($zero['co24'],5,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="co12" id="cpf" class="cpf form-control  pl-2" value="<?php echo number_format($zero['co12'],5,",",".");?>" type="text" maxlength="50"></td>
              </tr>
              <tr>
                <th scope="row" class="text-center">Juros</th>
                <td><input name="taxa84" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($zero['taxa84'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa72" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($zero['taxa72'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa60" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($zero['taxa60'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa48" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($zero['taxa48'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa36" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($zero['taxa36'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa24" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($zero['taxa24'],2,",",".");?>" type="text" maxlength="50"></td>
                <td><input name="taxa12" id="cpf" class="taxa form-control  pl-2" value="<?php echo number_format($zero['taxa12'],2,",",".");?>" type="text" maxlength="50"></td>
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
    </div>
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