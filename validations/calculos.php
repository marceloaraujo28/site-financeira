<?php
    session_start();

    $retorno = addslashes($_POST['retorno']);
    $valor = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["valor"])); //mantem so as virgulas e os numeros
    $parcela = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["parcela"]));

    $valorok = str_replace(",",".",$valor); //substitui as virgulas por pontos
    $parcelaok = str_replace(",",".",$parcela); //substitui as virgulas por pontos

    //conexão 
    try{
        $pdo = new PDO("mysql:dbname=FINANCEIRA;host=localhost","root","");
    }
    catch (PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();
    }
    catch(Exception $e){
        echo "Erro genérico: ".$e->getMessage();
    }
    //fim conexão

    if(empty($retorno)){
        $_SESSION['erro'] = "Selecione um retorno";
        header("location: ../pages/painel.php");
        exit();
    }

    if(empty($valor) && empty($parcela)){
        $_SESSION['erro'] = "Coloque um valor de contrato ou uma parcela";
        header("location: ../pages/painel.php");
        exit();
    }

    
        $sql = $pdo->prepare("SELECT * FROM $retorno");
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

            $_SESSION['taxa84'] = $dados['taxa84'];
            $_SESSION['taxa72'] = $dados['taxa72'];
            $_SESSION['taxa60'] = $dados['taxa60'];
            $_SESSION['taxa48'] = $dados['taxa48'];
            $_SESSION['taxa36'] = $dados['taxa36'];
            $_SESSION['taxa24'] = $dados['taxa24'];
            $_SESSION['taxa12'] = $dados['taxa12'];


            
                $_SESSION['cms84'] = $valorok * $dados['cms84'];
                $_SESSION['cms72'] = $valorok * $dados['cms72'];
                $_SESSION['cms60'] = $valorok * $dados['cms60'];
                $_SESSION['cms48'] = $valorok * $dados['cms48'];
                $_SESSION['cms36'] = $valorok * $dados['cms36'];
                $_SESSION['cms24'] = $valorok * $dados['cms24'];
                $_SESSION['cms12'] = $valorok * $dados['cms12'];
            
            

            header("location: ../pages/painel") ;
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

            $_SESSION['taxa84'] = $dados['taxa84'];
            $_SESSION['taxa72'] = $dados['taxa72'];
            $_SESSION['taxa60'] = $dados['taxa60'];
            $_SESSION['taxa48'] = $dados['taxa48'];
            $_SESSION['taxa36'] = $dados['taxa36'];
            $_SESSION['taxa24'] = $dados['taxa24'];
            $_SESSION['taxa12'] = $dados['taxa12'];

            
                $_SESSION['cms84'] = $_SESSION['valor84'] * $dados['cms84'];
                $_SESSION['cms72'] = $_SESSION['valor72'] * $dados['cms72'];
                $_SESSION['cms60'] = $_SESSION['valor60'] * $dados['cms60'];
                $_SESSION['cms48'] = $_SESSION['valor48'] * $dados['cms48'];
                $_SESSION['cms36'] = $_SESSION['valor36'] * $dados['cms36'];
                $_SESSION['cms24'] = $_SESSION['valor24'] * $dados['cms24'];
                $_SESSION['cms12'] = $_SESSION['valor12'] * $dados['cms12'];
      
            header("location: ../pages/painel") ;
            
        }
        


    
    
    



?>