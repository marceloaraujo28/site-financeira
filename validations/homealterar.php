<?php
    session_start();
    
    $co84 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["co84"]));
    $co72 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["co72"]));
    $co60 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["co60"]));
    $co48 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["co48"]));
    $co36 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["co36"]));
    $co24 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["co24"]));
    $co12 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["co12"]));

    $co84ok = str_replace(",",".",$co84);
    $co72ok = str_replace(",",".",$co72);
    $co60ok = str_replace(",",".",$co60);
    $co48ok = str_replace(",",".",$co48);
    $co36ok = str_replace(",",".",$co36);
    $co24ok = str_replace(",",".",$co24);
    $co12ok = str_replace(",",".",$co12);



    $campos = array($co84,$co72,$co60,$co48,$co36,$co24,$co12);

    
        foreach($campos as $fields):
            if(empty($fields)): 
                $_SESSION['erro'] = "Verifique se algum campo está vazio";
                header("location: ../pages/alterarhome.php");
                exit;
            endif;    
        endforeach;

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

    $editar = $pdo->prepare("UPDATE simulahome SET co84 = ?, co72 = ?, co60 = ?, co48 = ?, co36 = ?, co24 = ?, co12 = ?");
    $editar->execute([$co84ok, $co72ok, $co60ok, $co48ok, $co36ok, $co24ok, $co12ok]);
    $_SESSION['erro'] = "Valores Alterados";
    header("location: ../pages/alterarhome.php");


    


    
?>