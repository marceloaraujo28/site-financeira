<!-- MENU -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index">Home</a>
                </li>
                <?php
                    if(isset($_SESSION['nivel'])){
                        echo "<li class='nav-item'>";
                            echo "<a class='nav-link' aria-current='page' href='painel'>Simular</a>";
                        echo "</li>";
                    }
                      
                ?>
                <?php
                    if(isset($_SESSION['nivel'])){
                        if($_SESSION['nivel'] > 1){
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' aria-current='page' href='cadastrar'>Cadastrar Usuários</a>";
                            echo "</li>";

                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' aria-current='page' href='alterar'>Alterar Coeficientes</a>";
                            echo "</li>";

                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' aria-current='page' href='alterarhome'>Alterar Coeficientes Home</a>";
                            echo "</li>";

                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' aria-current='page' href='alterarusers'>Lista de Usuários</a>";
                            echo "</li>";
                        }
                    }
                      
                ?>
            </ul>
            <?php
                if(isset($_SESSION['nome'])){
                    echo "<form class='d-flex'>";
                    echo "<a class='nav-link'><font color='white'>Bem-Vindo ".$_SESSION['nome']."</font></a>";
                    echo "<a href='sair'><button type='button' class='btn btn-primary'>SAIR</button></a>";
                    echo "</form>";
                }else{
                    echo "<form class='d-flex'>";
                        echo "<a href='login'><button type='button' class='btn btn-primary'>Login</button></a>";
                    echo "</form>";
                }
                
            ?>
                    
            </div>
        </div>
        </nav>
    <!-- FIM MENU -->