<?php

include "../CONFIG/config.php";
include "../CONFIG/header.php";



?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for<DEV>
    </title>
    <style>
        body {
            background-color: #333333;
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav style="background-color: var(--cereja);">
                <div class="nav-wrapper">
                    <div class="brand-logo center"><a href="index.php">ForDEV</a></div>
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
                    <a href="login.php">
                        <i class="material-icons left" style="margin-left: 40px;">person</i><a href="login.php">Entrar</a>
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

    </header>

    <main>
        <section class="cadastro">
            <div class="row">
                <div>
                    <h1 style="color: white;">Cadastro Cliente</h1>
                </div>

                <form method="post" action="">

                    <div class="container">
                        <div class=".input-field col s12 l8 ">
                            <label for="cliUsuario">Usuário:</label>
                            <input type="text" placeholder="Usuário" minlength="6" name="cliUsuario" id="cliUsuario" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8 ">
                            <label for="cliSenha">Senha:</label>
                            <input type="password" placeholder="Senha" minlength="8" name="cliSenha" id="cliSenha" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8">
                            <label for="cliNome">Nome:</label>
                            <input type="text" placeholder="Nome" minlength="8" name="cliNome" id="cliSenha" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8">
                            <label for="cliEmail">Email:</label>
                            <input type="text" placeholder="Email" minlength="8" name="cliEmail" id="cliEmail" class="validate" require>
                        </div>

                    </div>

                    <button class="btn flex center-block" name="btncadastrar">Cadastrar</button>

                </form>


            </div>


        </section>


    </main>

</body>

</html>

<?php 
 require_once '../CONFIG/config.php';
 
 if(isset($_POST['btncadastrar'])){
    $cliUsuario = filter_input(INPUT_POST,'cliUsuario'); //filtr_input = ele vai fazer uma filtragem da entrada e atribuir o campo txt e input_pot é o comando que vai fazer a busca e colocar na variavel nome
    $cliSenha = $_POST['cliSenha'];
    $cliNome = filter_input(INPUT_POST,'cliNome');
    $cliEmail = filter_input(INPUT_POST,'cliEmail');

    $hashSenha = password_hash($cliSenha, PASSWORD_DEFAULT);
    
    $sql = $conexao -> prepare("INSERT INTO tabcliente (clienteUsuario, clienteSenha, clienteNome, clienteEmail) VALUES (:cliusuario, :clisenha, :clinome, :cliemail)");
    $sql -> bindValue (':cliusuario', $cliUsuario);
    $sql -> bindValue (':clisenha', $hashSenha);
    $sql -> bindValue (':clinome', $cliNome);
    $sql -> bindValue (':cliemail', $cliEmail);
    $sql -> execute();
    header('Location:cadastrosucesso.php');
}
?>
