<?php
session_start();
include "config\header.php";

$tentativas = isset($_SESSION['tentativas_login']) ? $_SESSION['tentativas_login'] : 0;

if($tentativas == 3){
    unset($_SESSION['tentativas_login']);
    header('Location:CLIENTES/formcadastroCliente.php');
}
?>
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Login - for<dev>
    </title>
    <style>
        body {
            background-color: #333333;
            width: 100%;
            height: 80vh;
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
        <div class="move-down-desktop valign-wrapper">
            <div class="col s12 m12 l6 ">
                <div class="neonborder">
                    <form style="padding:50px;" method="post" action="">
                        <label for="cliusuario">Usuário:</label>
                        <input type="text" require name="cliusuario">
                        <label for="clisenha">Senha:</label>
                        <input type="password" require name="clisenha">
                        <button class="btn hoverable" style="background-color: #b72646;" type="submit" name="btnlogin">Entrar</button>
                    </form>

                    <a href="CLIENTES/formcadastroCliente.php" style="color:white; margin-left: 50px; ">Pô, peraí, você ainda não é um fordever? <b> Então vêm se cadastrar aqui <b> </a>
                    

                </div>
            </div>

        </div>


    </main>
    <footer></footer>
</body>

</html>

<?php
session_start();
require_once '../CONFIG/config.php';

if (isset($_POST['btnlogin'])) {
    $cliUsuario = filter_input(INPUT_POST, 'cliusuario');
    $cliSenha = $_POST['clisenha'];

    if (empty($cliUsuario) || empty($cliSenha)) {
        if (!isset($_SESSION['tentativas_login'])) {
            $_SESSION['tentativas_login'] = 0;
        }

        $_SESSION['tentativas_login']++;
        //header('Location: ../login.php');
        //exit();
    } else {
        $query = "SELECT clienteSenha FROM tabcliente WHERE clienteUsuario = :cliusuario";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':cliusuario', $cliUsuario);
        $stmt->execute();
        $hashSalvo = $stmt->fetchColumn();

        if ($hashSalvo && password_verify($cliSenha, $hashSalvo)) {
            $_SESSION['username'] = $cliUsuario;
            header('Location: painelcliente.php');
            exit();
        } else {
            if (!isset($_SESSION['tentativas_login'])) {
                $_SESSION['tentativas_login']++;
            }

           // header('Location: ../login.php');
           // exit();
        }
    }
}
?>
