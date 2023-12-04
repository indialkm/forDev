<?php
include "config/header.php";; ?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>for<dev>
    </title>
</head>

<body>
    <header>
         
        <div class="navbar-fixed">
            <nav class="nav-extended" style="background-color: var(--cereja);">
                <div class="nav-wrapper">
                    
                    <a href="#" class="sidenav-trigger right" data-target="mobile-links">
                        <i class="material-icons">menu</i>
                    </a>                    
                    <a href="login.php">
                        <i class="material-icons left" style="margin-left: 40px;">person</i><a href="login.php">Entrar</a>
                    </a>
                    <div class="brand-logo center"><a href="index.php">ForDEV</a></div>
                </div>
           
            <div class="nav-content">
            <ul class="right hide-on-med-and-down">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="">Vestuário</a></li>
                        <li><a href="">Colecionáveis</a></li>
                        <li><a href="">Contatos</a></li>
                        <li> <!--ropdown Trigger -->
                            <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>
                        </li>
                 </ul>

        
        </div>
        </nav>

        </div>
        <!-- SIDEBAR -->
        <ul class="sidenav" id="mobile-links">
            <li><a href="">Home</a></li>
            <li><a href="">Vestuário</a></li>
            <li><a href="">Colecionáveis</a></li>
            <li><a href="">Contatos</a></li>
        </ul>

        <!-- DROPDOWN -->
        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a href="#!">three</a></li>
            <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
            <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
        </ul>


    </header>
    <main>
        <section class="banner">
            <div class="carousel carousel-slider">
                <a class="carousel-item" href="#one!"><img src="assets/imagens/index/BANNER01.jpg"></a>
                <a class="carousel-item" href="#one!"><img src="assets/imagens/index/BANNER02.jpg"></a>
            </div>
        </section>
        <section class="categoria">
            <h3>Categorias</h3>
        </section>
        <section class="entrega">
            <h3>Entregas</h3>
        </section>
        <section class="produtos">
            <h2 class="product-category">Favoritos</h2>
            <button class="pre-btn"><i class="material-icons">arrow_back_ios_new</i></button>
            <button class="nxt-btn"><i class="material-icons">arrow_forward_ios</i></button>
        </section>
        <section class="promocao">
            <h3>Promoção</h3>
        </section>
    </main>

    <footer>
        <a href=""></a>
    </footer>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.dropdown-trigger').dropdown();
        });

        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });
    </script>
</body>

</html>