<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeira Cambial</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/calculo.js" defer></script>
    <script src="../js/disable.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script>
        $(document).ready(function(){
            $('#cpf,.cpf').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>

</head>
<body>  
     <?php require_once("menu.php");?>
    <div class="container mt-5">
    <?php
            if(isset($_SESSION['erro'])){
                echo "<div class='alert alert-danger text-center' role='alert'>";
                    echo $_SESSION['erro'];
                echo "</div>";
                unset($_SESSION['erro']);
            }
        ?>
        <div class="card col-12">
            <div class="card-header text-center">
                    <b>Simular Margem</b>
                </div>
            <div class="margem">
                        <table>
                            <tr>
                                <td>RENDA: </td>
                                <td>DESCONTOS: </td>
                                <td>MARGEM: </td>
                            </tr>
                            <tr>
                                <td><input  name="campo1" id="cpf" class="campo1"></td>
                                <td><input  name="campo2" class="campo2 cpf"></td>
                                <td><input  name="campo3" class="campo3 cpf" ></td>
                            </tr>
                        </table>           
                </div>

                <div class="parcelas">
                    <form action="../validations/calculos" method="post">
                        <div class="card mt-3">
                            <div class="card-header text-center">
                                <b>Selecione um retorno</b>
                            </div>

                            <div class="container col-5 d-flex container justify-content-between">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="retorno" id="inlineRadio1" value="alto" checked>
                                    <label class="form-check-label" for="inlineRadio1">Alto</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="retorno" id="inlineRadio2" value="medio">
                                    <label class="form-check-label" for="inlineRadio2">Medio</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="retorno" id="inlineRadio3" value="zerado">
                                    <label class="form-check-label" for="inlineRadio3">Zerado</label>
                                </div>
                            
                            </div>
                        

                        </div>

                        <div class="card mt-3 w-100">
                            <div class="card-header text-center">
                                <b>Parcelas</b>
                            </div>
                            <div class="card-body btn-parcelas float-left w-100">

                                    <div class="form-group col-8 d-flex container justify-content-between">
                                        <label class="form-check-label mr-2" for="cl_1"><b>Valor:</b></label>
                                        <div class="inputWithIcon">
                                            <input name="valor" id="cpf" class="form-control valor pl-2" type="text" maxlength="50">
                                            <a id="pesquisaCliente1" onclick="pesqC1"><i class="fas fa-search olho mt-2"></i></a>
                                        </div>

                                        <label class="form-check-label mr-2" for="produto"><b>Parcela: </b></label>
                                        <div class="inputWithIcon">
                                            <input name="parcela" id="cpf" class="form-control cpf parcela pl-2" type="text" maxlength="50">
                                            <a id="pesquisaProduto" onclick="pesqP"><i class="fas fa-search olho mt-2"></i></a>
                                        </div>

                                        <button type="submit" class="btn btn-primary form-check-label mr-2">Simular</button>
                                
                                    </div>

                            </div>
                        <?php
                            if(isset($_SESSION['valor84'])){
                                echo "<div class='container col-8'>";
                                echo "<table class='table'>";
                                    echo "<thead>";
                                        echo "<tr class='color-table'>";
                                            echo "<th scope='col'>VALOR</th>";
                                            echo "<th scope='col'>PRAZO</th>";
                                            echo "<th scope='col'>PARCELA</th>";
                                            echo "<th scope='col'>JUROS%</th>";
                                            echo "<th scope='col'>CMS  <button type='button' onclick='ocultarcampo()' style='background: transparent; margin-left: 4px; border: none;'><img src='../img/olho.svg' style='width: 20px; height: 20px;'></button></th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor84'],2,",",".");"</th>";unset($_SESSION['valor84']);
                                            echo "<th scope='col'>84x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p84'],2,",",".");"</th>";unset($_SESSION['p84']);
                                            echo "<th scope='col'>".number_format($_SESSION['taxa84'],2,",",".");"</th>";unset($_SESSION['taxa84']);
                                            echo "<th scope='col'><span class='ocultar'>R$ ".number_format($_SESSION['cms84'],2,",",".");"</span></th>";unset($_SESSION['cms84']);
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor72'],2,",",".");"</th>";unset($_SESSION['valor72']);
                                            echo "<th scope='col'>72x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p72'],2,",",".");"</th>";unset($_SESSION['p72']);
                                            echo "<th scope='col'>".number_format($_SESSION['taxa72'],2,",",".");"</th>";unset($_SESSION['taxa72']);
                                            echo "<th scope='col'><span class='ocultar'>R$ ".number_format($_SESSION['cms72'],2,",",".");"</span></th>";unset($_SESSION['cms72']);
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor60'],2,",",".");"</th>";unset($_SESSION['valor60']);
                                            echo "<th scope='col'>60x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p60'],2,",",".");"</th>";unset($_SESSION['p60']);
                                            echo "<th scope='col'>".number_format($_SESSION['taxa60'],2,",",".");"</th>";unset($_SESSION['taxa60']);
                                            echo "<th scope='col'><span class='ocultar'>R$ ".number_format($_SESSION['cms60'],2,",",".");"</span></th>";unset($_SESSION['cms60']);
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor48'],2,",",".");"</th>";unset($_SESSION['valor48']);
                                            echo "<th scope='col'>48x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p48'],2,",",".");"</th>";unset($_SESSION['p48']);
                                            echo "<th scope='col'>".number_format($_SESSION['taxa48'],2,",",".");"</th>";unset($_SESSION['taxa48']);
                                            echo "<th scope='col'><span class='ocultar'>R$ ".number_format($_SESSION['cms48'],2,",",".");"</span></th>";unset($_SESSION['cms48']);
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor36'],2,",",".");"</th>";unset($_SESSION['valor36']);
                                            echo "<th scope='col'>36x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p36'],2,",",".");"</th>";unset($_SESSION['p36']);
                                            echo "<th scope='col'>".number_format($_SESSION['taxa36'],2,",",".");"</th>";unset($_SESSION['taxa36']);
                                            echo "<th scope='col' class='ocultar'>R$ ".number_format($_SESSION['cms36'],2,",",".");"</span></th>";unset($_SESSION['cms36']);
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor24'],2,",",".");"</th>";unset($_SESSION['valor24']);
                                            echo "<th scope='col'>24x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p24'],2,",",".");"</th>";unset($_SESSION['p24']);
                                            echo "<th scope='col'>".number_format($_SESSION['taxa24'],2,",",".");"</th>";unset($_SESSION['taxa24']);
                                            echo "<th scope='col'><span class='ocultar'>R$ ".number_format($_SESSION['cms24'],2,",",".");"</span></th>";unset($_SESSION['cms24']);
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor12'],2,",",".");"</th>";unset($_SESSION['valor12']);
                                            echo "<th scope='col'>12x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p12'],2,",",".");"</th>";unset($_SESSION['p12']);
                                            echo "<th scope='col'>".number_format($_SESSION['taxa12'],2,",",".");"</th>";unset($_SESSION['taxa12']);
                                            echo "<th scope='col'><span class='ocultar'>R$ ".number_format($_SESSION['cms12'],2,",",".");"</span></th>";unset($_SESSION['cms12']);
                                        echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            echo "</div>";
                            }
                        ?>

                        </div>


                    </form>
                </div>
        </div>
            
    </div>
    <script >
        function ocultarcampo(){
            var trcms = document.getElementsByClassName("ocultar");
 
            for(let i = 0; i < trcms.length; i++){
                if(trcms[i].style.display == "none"){
                    trcms[i].style.display = "block";
                }else{
                    trcms[i].style.display = "none";
                    
                }
                
            }
        }
    </script>

</body>
</html>