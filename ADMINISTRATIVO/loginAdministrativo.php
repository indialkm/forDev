<?php
include "../CONFIG/config.php";
include "../CONFIG/header.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for<dev> System</title>

</head>

<body>


    <main>

        <div class="row">

            <section>
                <div class="caixaloginadmin">
                    <h2>LOGIN ADMINISTRATIVO</h2>
                    <div class="col s12 m6 l6">
                        <form action="" method="post">
                            <div class="row">
                                <div class=".input-field col s12 l6 ">
                                    <label for="adminUsuario">Administrativo: </label>
                                    <input type="text" placeholder="Admin" require name="adminUsuario">
                                </div>
                            </div>
                            <div class="row">
                                <div class=".input-field col s12 l6 ">
                                    <label for="adminSenha">Senha: </label>
                                    <input type="password" placeholder="Senha" require name="adminSenha">
                                </div>
                            </div>
                            <button class="btn" type="submit" name="btnlogin">ENTRAR</button>
                        </form>
                    </div>
                </div>
            </section>

            <section class="loginestoque">
                <h2>LOGIN ESTOQUISTA</h2>
                <div class="col s12 m6 l6">
                    <div class="caixaloginestoquista">
                        <form action="../ESTOQUISTA/entrarestoquista.php" method="post">

                            <div class="row">
                                <div class=".input-field col s12 l4 ">
                                    <label for="estUsuario">Estoquista: </label>
                                    <input type="text" placeholder="Estoquista" require name="estUsuario" id="estUsuario">
                                </div>
                            </div>

                            <div class="row">
                                <div class=".input-field col s12 l4 ">
                                    <label for="estSenha">Senha: </label>
                                    <input type="password" placeholder="Senha" require name="estSenha" id="estSenha">
                                </div>
                            </div>
                            <button class="btn" type="submit" name="btnloginest">ENTRAR</button>
                        </form>
                    </div>
                </div>
        </div>
        </section>

        </div>
    </main>

    <footer></footer>

</body>

</html>

<?php
session_start();


if (isset($_POST['btnlogin'])) {
    $adminUsuario = filter_input(INPUT_POST, 'adminUsuario');
    $adminSenha = $_POST['adminSenha'];


    if (empty($adminUsuario) || empty($adminSenha)) {
        if (!isset($_SESSION['tentativas_login'])) {
            $_SESSION['tentativas_login'] = 0;
        }

        $_SESSION['tentativas_login']++;
        header('Location:loginAdministrativo.php');
        exit();
    } else {

        $query = "SELECT adminSenha FROM tabadministrativo WHERE adminUsuario = :adminusuario";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':adminusuario', $adminUsuario);
        $stmt->execute();
        $hashSalvo = $stmt->fetchColumn();

        if ($hashSalvo && password_verify($adminSenha, $hashSalvo)) {
            $_SESSION['usernameadmin'] = $adminUsuario;
            header('Location: painelAdministrativo.php');
            exit();
        } else {
            if (!isset($_SESSION['tentativas_login'])) {
                $_SESSION['tentativas_login'] = 0;
                $_SESSION['tentativas_login']++;
            };
            header('Location:loginAdministrativo.php');
            exit();
        }
    }
}







?>