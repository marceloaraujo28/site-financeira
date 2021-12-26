<?php
    session_start();
    $valor = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["valor"])); //mantem so as virgulas e os numeros
    $parcela = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["parcela"]));

    $valorok = str_replace(",",".",$valor); //substitui as virgulas por pontos
    $parcelaok = str_replace(",",".",$parcela); //substitui as virgulas por pontos

    //conexão 
    try{
        $pdo = new PDO("mysql:dbname=financeira;host=localhost","root","");
    }
    catch (PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();
    }
    catch(Exception $e){
        echo "Erro genérico: ".$e->getMessage();
    }
    //fim conexão

    if(empty($valor) && empty($parcela)){
        $_SESSION['erro'] = "Coloque um valor de contrato ou uma parcela";
        header("location: ../index.php");
        exit();
    }

    $sql = $pdo->prepare("SELECT * FROM simulahome");
    $sql->execute();
    $dados = $sql->fetch();

    if(!empty($valor)){
            
        $_SESSION['valor12'] = $valorok; $_SESSION['valor24'] = $valorok; $_SESSION['valor36'] = $valorok; $_SESSION['valor48'] = $valorok;
        $_SESSION['valor60'] = $valorok; $_SESSION['valor72'] = $valorok; $_SESSION['valor84'] = $valorok;
        
        $_SESSION['p84'] = $valorok * $dados['co84'];
        $_SESSION['p72'] = $valorok * $dados['co72'];
        $_SESSION['p60'] = $valorok * $dados['co60'];
        $_SESSION['p48'] = $valorok * $dados['co48'];
        $_SESSION['p36'] = $valorok * $dados['co36'];
        $_SESSION['p24'] = $valorok * $dados['co24'];
        $_SESSION['p12'] = $valorok * $dados['co12'];

        
        

        header("location: ../index.php") ;
    }
    if(!empty($parcela)){
        $_SESSION['p12'] = $parcelaok; $_SESSION['p24'] = $parcelaok; $_SESSION['p36'] = $parcelaok; $_SESSION['p48'] = $parcelaok;
        $_SESSION['p60'] = $parcelaok; $_SESSION['p72'] = $parcelaok; $_SESSION['p84'] = $parcelaok;
        
        $_SESSION['valor84'] = $parcelaok / $dados['co84'];
        $_SESSION['valor72'] = $parcelaok / $dados['co72'];
        $_SESSION['valor60'] = $parcelaok / $dados['co60'];
        $_SESSION['valor48'] = $parcelaok / $dados['co48'];
        $_SESSION['valor36'] = $parcelaok / $dados['co36'];
        $_SESSION['valor24'] = $parcelaok / $dados['co24'];
        $_SESSION['valor12'] = $parcelaok / $dados['co12'];
  
        header("location: ../index.php") ;
        
    }

?>