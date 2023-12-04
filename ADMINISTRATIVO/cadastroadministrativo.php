<?php
include "../CONFIG/config.php";
include "../CONFIG/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                            <label for="adminUsuario">Usuário:</label>
                            <input type="text" placeholder="Usuário" name="admUsuario" id="admUsuario" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8 ">
                            <label for="adminSenha">Senha:</label>
                            <input type="password" placeholder="minímo de 6 caracteres" minlength="6" name="admSenha" id="admSenha" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8">
                            <label for="adminNome">Nome:</label>
                            <input type="text" placeholder="Nome" minlength="8" name="admNome" id="admNome" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8">
                            <label for="adminEmail">Email:</label>
                            <input type="text" placeholder="Email" name="admEmail" id="admEmail" class="validate" require>
                        </div>

                        <div class=".input-field col s12 l8">
                            <label for="adminTelefone">Telefone:</label>
                            <input type="text" placeholder="telefone" minlength="8" name="admTelefone" id="admTelefone" class="validate" require>
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
include "../CONFIG/config.php";
include "../CONFIG/header.php";

if(isset($_POST['btncadastrar'])){
    $admUsuario = filter_input(INPUT_POST,'admUsuario'); //filtr_input = ele vai fazer uma filtragem da entrada e atribuir o campo txt e input_pot é o comando que vai fazer a busca e colocar na variavel nome
    $admSenha = $_POST['admSenha'];
    $admNome = filter_input(INPUT_POST,'admNome');
    $admEmail = filter_input(INPUT_POST,'admEmail');
    $admTelefone = filter_input(INPUT_POST,'admTelefone');

    $hashSenha = password_hash($admSenha, PASSWORD_DEFAULT);
    
    $sql = $conexao -> prepare("INSERT INTO tabadministrativo (adminUsuario, adminSenha, adminNome, adminEmail,adminTelefone) VALUES (:admusuario, :admsenha, :admnome, :admemail, :admtelefone)");
    $sql -> bindValue (':admusuario', $admUsuario);
    $sql -> bindValue (':admsenha', $hashSenha);
    $sql -> bindValue (':admnome', $admNome);
    $sql -> bindValue (':admemail', $admEmail);
    $sql -> bindValue (':admtelefone', $admTelefone);
    $sql -> execute();
    header('Location:loginAdministrativo.php');
}



?>