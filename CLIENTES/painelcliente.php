<?php
include "../CONFIG/config.php";
include "../CONFIG/header.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for<DEV></title>
</head>
<body>
    <header>

    </header>
    <main>
    <div class="navbar-fixed">
            <nav style="background-color: var(--cereja);">
                <div class="nav-wrapper">
                    <div class="brand-logo center"><a href="../index.php">ForDEV</a></div>
                    <a href="#" class="sidenav-trigger right" data-target="mobile-links">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="">Vestuário</a></li>
                        <li><a href="">Colecionáveis</a></li>
                        <li><a href="">Canecas</a></li>
                        <li><a href="">Contatos</a></li>
                        <li><a href="">Sobre</a></li>
                    </ul>
                    <a href="login.php">
                        <i class="material-icons left" style="margin-left: 40px;">person</i><a href="../login.php">Entrar</a>
                    </a>
                </div>

            </nav>

        </div>

        <ul class="sidenav" id="mobile-links">
            <li><a href="">Home</a></li>
            <li><a href="">Vestuário</a></li>
            <li><a href="">Colecionáveis</a></li>
            <li><a href="">Canecas</a></li>
            <li><a href="">Contatos</a></li>
            <li><a href="">Sobre</a></li>
        </ul>
    </main>
    <footer>


    </footer>
    
</body>
</html>