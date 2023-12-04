<?php
include "../CONFIG/config.php";
include "../CONFIG/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header></header>
    <main>
    <section class="cadastro">
            <div class="row">
                <div>
                    <h1 style="color: white;">Cadastro Cliente</h1>
                </div>

                <form method="post" action="">

                    <div class="container">
                        <div class=".input-field col s12 l8 ">
                            <label for="estUsuario">Usuário:</label>
                            <input type="text" placeholder="Usuário" minlength="6" name="estUsuario" id="estUsuario" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8 ">
                            <label for="estSenha">Senha:</label>
                            <input type="password" placeholder="Senha" minlength="8" name="estSenha" id="estSenha" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8">
                            <label for="estNome">Nome:</label>
                            <input type="text" placeholder="Nome" minlength="8" name="estNome" id="estNome" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8">
                            <label for="estEmail">Email:</label>
                            <input type="text" placeholder="Email" name="estEmail" id="estEmail" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8">
                            <label for="estTelefone">Telefone:</label>
                            <input type="text" placeholder="telefone" minlength="8" name="estTelefone" id="estTelefone" class="validate" require>
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
session_start();


if (isset($_POST['btnloginest'])) {
    $estUsuario = filter_input(INPUT_POST, 'estUsuario');
    $estSenha = $_POST['estSenha'];
  

    if (empty($estUsuario) || empty($estSenha)) {
        if (!isset($_SESSION['tentativas_login'])) {
            $_SESSION['tentativas_login'] = 0;
        
        }
 
        $_SESSION['tentativas_login']++;
        //header('Location:loginAdministrativo.php');
        //exit();
    } else { 
        $query = "SELECT estSenha FROM tabestoquista WHERE estUsuario = :estusuario";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':estusuario', $estUsuario);
        $stmt->execute();
        $hashSalvo = $stmt->fetchColumn(); 
        
        if ($hashSalvo && password_verify($estSenha, $hashSalvo)) {
            $_SESSION['usernameest'] = $estUsuario;
            header('Location: painelEstoquista.php');
            exit();
            
        } else {
            if (!isset($_SESSION['tentativas_login'])) {
                $_SESSION['tentativas_login'] = 0;
                $_SESSION['tentativas_login']++;
            
            };
           //header('Location:loginAdministrativo.php');
           //exit();
        }
    }
}
?>

