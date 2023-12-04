<?php
include "../CONFIG/config.php";
include "../CONFIG/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for<DEV></title>
    <style>
        body {
            background-color: #333333;
            width: 100%;
            height: 100vh;
        }
        h1{
            font-size: 3rem;
        }
        h3{
            font-size: 1.5rem;
        }
        main{
            width: 100%;
            height: 98vh;
        }
        .mensagem{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .cont{
            margin-top: 80px;
            width: 30%;
            height: 30%;
            padding: 5%;
            background-color: white;
            border-radius: 40px;


        }
    </style>
</head>
<body>
    <header>
    <header>
        <div class="navbar-fixed">
            <nav style="background-color: var(--cereja);">
                <div class="nav-wrapper">
                    <div class="brand-logo center"><a href="../index.php">ForDEV</a></div>
                    <a href="#" class="sidenav-trigger right" data-target="mobile-links">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="">Vestuário</a></li>
                        <li><a href="">Colecionáveis</a></li>
                        <li><a href="">Canecas</a></li>
                        <li><a href="">Contatos</a></li>
                        <li><a href="">Sobre</a></li>
                    </ul>
                    <a href="../login.php">
                        <i class="material-icons left" style="margin-left: 40px;">person</i><a href="login.php">Entrar</a>
                    </a>
                </div>

            </nav>

        </div>

        <ul class="sidenav" id="mobile-links">
            <li><a href="../index.php"">Home</a></li>
            <li><a href="">Vestuário</a></li>
            <li><a href="">Colecionáveis</a></li>
            <li><a href="">Canecas</a></li>
            <li><a href="">Contatos</a></li>
            <li><a href="">Sobre</a></li>
        </ul>

    </header>

    </header>
    <main>
        <section class="mensagem"> 
            <div class="cont">
                <h1>Usuário cadastradado com sucesso</h1>
                <h3>Uhu!Você agora é um fordev, obrigada por fazer parte da nossa comunidade</h3>
                <h3>Só porque você agora é parça toma um cupon de desconto de 10% na sua primeira compra</h3>
                <div class="cupom">
                    12345g
                    cupom
                </div>
                <button class="btn"><a style="color: white;" href="../login.php">Login</a></button>
            </div>

        </section>
    </main>
</body>
</html>