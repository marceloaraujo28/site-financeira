<?php
    try{
        $pdo = new PDO("mysql:dbname=financeira;host=localhost","root","");
    }
    catch (PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();
    }
    catch(Exception $e){
        echo "Erro genérico: ".$e->getMessage();
    }
?>