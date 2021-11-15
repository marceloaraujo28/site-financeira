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

    // BUSCAR DADOS BANCO ALTO

    $sql = $pdo->prepare("SELECT * FROM simulahome");
    $sql->execute();
    $fixo = $sql->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="js/calculo.js" defer></script>
    <script src="js/disable.js" defer></script>
    <title>Financeira Cambial</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        $(document).ready(function(){
            $('#cpf,.cpf').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
</head>
<body>
    <!-- MENU -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#simulacao">Simulação</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#faleconosco">Fale conosco</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#localizacao">Localização</a>
                </li>
                
                
            </ul>
            <?php
                if(isset($_SESSION['nome'])){
                    echo "<form class='d-flex'>";
                    echo "<a class='nav-link'><font color='white'>Bem-Vindo ".$_SESSION['nome']."</font></a>";
                    echo "<a href='pages/painel'><button type='button' class='btn btn-primary'>PAINEL</button></a>-
                         <a href='pages/sair'><button type='button' class='btn btn-primary'>SAIR</button></a>
                    ";
                    echo "</form>";
                }else{
                    echo "<form class='d-flex'>";
                        echo "<a href='pages/login'><button type='button' class='btn btn-primary'>Login</button></a>";
                    echo "</form>";
                }
                
            ?>
                    
            </div>
        </div>
        </nav>
    <!-- FIM MENU -->
            <div id="simulacao" class="container">
                    <?php
                        if(isset($_SESSION['erro'])){
                            echo "<div class='alert alert-danger text-center' role='alert'>";
                                echo $_SESSION['erro'];
                            echo "</div>";
                            unset($_SESSION['erro']);
                        }
                    ?>
                    <form action="validations/calculohome" method="post">
                            <div class="card mt-5 w-100">
                                <div class="card-header text-center">
                                    <b>Simulador</b>
                                </div>
                                <div class="card-body float-left w-100">
                                        <div class="form-group col-8 d-flex container justify-content-between">
                                        
                                            <label class="form-check-label mr-2" for="cl_1"><b>Valor:</b></label>
                                            <div class="inputWithIcon">
                                                <input name="valor" id="cpf" class="form-control valor  pl-2" type="text" maxlength="50">
                                                <a id="pesquisaCliente1" onclick="pesqC1"><i class="fas fa-search olho mt-2"></i></a>
                                            </div>

                                            <label class="form-check-label mr-2" for="produto"><b>Parcela: </b></label>
                                            <div class="inputWithIcon">
                                                <input name="parcela" id="cpf" class="form-control parcela pl-2" type="text" maxlength="50">
                                                <a id="pesquisaProduto" onclick="pesqP"><i class="fas fa-search olho mt-2"></i></a>
                                            </div>

                                            <button type="submit" class="btn btn-primary form-check-label mr-2">Simular</button>
                                    
                                        </div>
                            </div>
                        </div>
                    </form>

                    <?php
                            if(isset($_SESSION['valor84'])){
                                echo "<div class='container col-8'>";
                                echo "<table class='table'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th scope='col'>VALOR</th>";
                                            echo "<th scope='col'>PRAZO</th>";
                                            echo "<th scope='col'>PARCELA</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor84'],2,",",".");"</th>";unset($_SESSION['valor84']);
                                            echo "<th scope='col'>84x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p84'],2,",",".");"</th>";unset($_SESSION['p84']);
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor72'],2,",",".");"</th>";unset($_SESSION['valor72']);
                                            echo "<th scope='col'>72x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p72'],2,",",".");"</th>";unset($_SESSION['p72']);
                                            
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor60'],2,",",".");"</th>";unset($_SESSION['valor60']);
                                            echo "<th scope='col'>60x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p60'],2,",",".");"</th>";unset($_SESSION['p60']);
                                            
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor48'],2,",",".");"</th>";unset($_SESSION['valor48']);
                                            echo "<th scope='col'>48x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p48'],2,",",".");"</th>";unset($_SESSION['p48']);
                                            
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor36'],2,",",".");"</th>";unset($_SESSION['valor36']);
                                            echo "<th scope='col'>36x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p36'],2,",",".");"</th>";unset($_SESSION['p36']);
                                           
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor24'],2,",",".");"</th>";unset($_SESSION['valor24']);
                                            echo "<th scope='col'>24x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p24'],2,",",".");"</th>";unset($_SESSION['p24']);
                                           
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['valor12'],2,",",".");"</th>";unset($_SESSION['valor12']);
                                            echo "<th scope='col'>12x</th>";
                                            echo "<th scope='col'>R$ ".number_format($_SESSION['p12'],2,",",".");"</th>";unset($_SESSION['p12']);
                                            
                                        echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            echo "</div>";
                            }else{
                                echo "<div class='container col-8'>";
                                echo "<table class='table'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th scope='col'>VALOR</th>";
                                            echo "<th scope='col'>PRAZO</th>";
                                            echo "<th scope='col'>PARCELA</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        echo "<tr>";
                                            echo "<th scope='col'>R$ 1.000,00";
                                            echo "<th scope='col'>84x</th>";
                                            echo "<th scope='col'>R$ ". number_format(1000 * $fixo['co84'],2,",",".");
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ 1.000,00";
                                            echo "<th scope='col'>72x</th>";
                                            echo "<th scope='col'>R$ ". number_format(1000 * $fixo['co72'],2,",",".");
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ 1.000,00";
                                            echo "<th scope='col'>60x</th>";
                                            echo "<th scope='col'>R$ ". number_format(1000 * $fixo['co60'],2,",",".");
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                            echo "<th scope='col'>R$ 1.000,00";
                                            echo "<th scope='col'>48x</th>";
                                            echo "<th scope='col'>R$ ". number_format(1000 * $fixo['co48'],2,",",".");
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ 1.000,00";
                                            echo "<th scope='col'>36x</th>";
                                            echo "<th scope='col'>R$ ". number_format(1000 * $fixo['co36'],2,",",".");
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ 1.000,00";
                                            echo "<th scope='col'>24x</th>";
                                            echo "<th scope='col'>R$ ". number_format(1000 * $fixo['co24'],2,",",".");
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<th scope='col'>R$ 1.000,00";
                                            echo "<th scope='col'>12x</th>";
                                            echo "<th scope='col'>R$ ". number_format(1000 * $fixo['co12'],2,",",".");
                                        echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            echo "</div>";
                            }
                        ?>


            </div>

            <div id="faleconosco">
                <h1>Fale conosco</h1>
                <div class="boxcontatos1">
                     <h2>TELEFONE FIXO</h2>
                     <table class="tablebox">
                         <tr>
                             <td>16 382144444</td>
                             <td><img src="img/telefone.svg" width="30" height="15"></td>
                         </tr>
                     </table>
                </div>
                <div class="boxcontatos2">
                     <h2>WHATSAPP</h2>
                     <table class="tablebox">
                         <tr>
                             <td>16 382144444</td>
                             <td><img src="img/WhatsApp.svg" width="20" height="20"></td>
                         </tr>
                         <tr>
                             <td>16 382144444</td>
                             <td><img src="img/WhatsApp.svg" width="20" height="20"></td>
                         </tr>
                     </table>
                </div>
            </div>

            <div id="localizacao">
                <h1>Localização</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3466.371076937615!2d-51.10035238489351!3d-29.6800194820163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951943b7e7c04cd9%3A0xc10b5de8c6627117!2sFinanceira%20Cambial%20-%20Empr%C3%A9stimos!5e0!3m2!1spt-BR!2sbr!4v1636912042499!5m2!1spt-BR!2sbr" width="947" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            
            </div>
           


</body>
</html>