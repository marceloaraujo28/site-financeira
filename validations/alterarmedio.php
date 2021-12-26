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

    $cms84 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["cms84"]));
    $cms72 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["cms72"]));
    $cms60 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["cms60"]));
    $cms48 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["cms48"]));
    $cms36 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["cms36"]));
    $cms24 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["cms24"]));
    $cms12 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["cms12"]));

    $cms84ok = str_replace(",",".",$cms84);
    $cms72ok = str_replace(",",".",$cms72);
    $cms60ok = str_replace(",",".",$cms60);
    $cms48ok = str_replace(",",".",$cms48);
    $cms36ok = str_replace(",",".",$cms36);
    $cms24ok = str_replace(",",".",$cms24);
    $cms12ok = str_replace(",",".",$cms12);

    $c84 = $cms84ok / 100;
    $c72 = $cms72ok / 100;
    $c60 = $cms60ok / 100;
    $c48 = $cms48ok / 100;
    $c36 = $cms36ok / 100;
    $c24 = $cms24ok / 100;
    $c12 = $cms12ok / 100;

    $taxa84 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["taxa84"]));
    $taxa72 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["taxa72"]));
    $taxa60 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["taxa60"]));
    $taxa48 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["taxa48"]));
    $taxa36 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["taxa36"]));
    $taxa24 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["taxa24"]));
    $taxa12 = addslashes(preg_replace("/[^0-9,]+/i","",$_POST["taxa12"]));

    $taxa84ok = str_replace(",",".",$taxa84);
    $taxa72ok = str_replace(",",".",$taxa72);
    $taxa60ok = str_replace(",",".",$taxa60);
    $taxa48ok = str_replace(",",".",$taxa48);
    $taxa36ok = str_replace(",",".",$taxa36);
    $taxa24ok = str_replace(",",".",$taxa24);
    $taxa12ok = str_replace(",",".",$taxa12);

    $campos = array($co84,$co72,$co60,$co48,$co36,$co24,$co12,$cms84,$cms72,$cms60,$cms48,$cms36,$cms24,$cms12,
                    $taxa84,$taxa72,$taxa60,$taxa48,$taxa36,$taxa24,$taxa12);

    
        foreach($campos as $fields):
            if(empty($fields)): 
                $_SESSION['erro'] = "Verifique se algum campo está vazio";
                header("location: ../pages/alterar.php");
                exit;
            endif;    
        endforeach;

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

    $editar = $pdo->prepare("UPDATE medio SET co84 = ?, co72 = ?, co60 = ?, co48 = ?, co36 = ?, co24 = ?, co12 = ?,
                                            cms84 = ?, cms72 = ?, cms60 = ?, cms48 = ?, cms36 = ?, cms24 = ?, cms12 = ?,
                                        taxa84 = ?, taxa72 = ?, taxa60 = ?, taxa48 = ?, taxa36 = ?, taxa24 = ?, taxa12 = ?
    ");
    $editar->execute([$co84ok, $co72ok, $co60ok, $co48ok, $co36ok, $co24ok, $co12ok,
                      $c84, $c72, $c60, $c48, $c36, $c24, $c12,
                      $taxa84ok, $taxa72ok, $taxa60ok, $taxa48ok, $taxa36ok, $taxa24ok, $taxa12ok]);
    $_SESSION['erro'] = "Valores Alterados";
    header("location: ../pages/alterar.php");


    


    
?>