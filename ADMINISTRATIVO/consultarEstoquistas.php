<?php
include "../CONFIG/config.php";
include "../CONFIG/header.php";

//Sessão e edições do menu, aqui ele esta tendo certeza que a sessão foi iniciada e tem também a query de pesquisa do Slect para encontrar nome, email e fotinha do adm
session_start();

if (!isset($_SESSION['usernameadmin'])) {
    header('Location: pagina_de_login.php');
    exit();
}

try {

    $query = "SELECT adminNome, adminEmail, adminFoto FROM tabadministrativo LIMIT 1";
    $stmt = $conexao->query($query);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $adminNome = $row['adminNome'];
    $adminEmail = $row['adminEmail'];
    $adminFoto = $row['adminFoto'];
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>

<body>
    <section class="navegacao">
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="../assets/imagens/sidenav/fundo-sidenav.jpg" style="width: 500px;">
                    </div>
                    <a href="#user"><img class="circle" src="../uploads/admin01.jpg"></a>
                    <a href="#name"><span class="white-text name"><?php echo "$adminNome"; ?></span></a>
                    <a href="#email"><span class="white-text email"><?php echo "$adminEmail"; ?></span></a>
                </div>
            </li>
            <li><a href="painelAdministrativo.php"><i class="material-icons">cloud</i>Home</a></li>
            <li><a href="consultarEstoquistas.php">Estoque</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect" href="consultarClientes.php">Clientes</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect" href="sairsessao.php">Sair</a></li>
        </ul>
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large hide-on-large-only"><i class="material-icons">menu</i></a>
    </section>


    <main>
        
    <div class="row">
            <h1 class="col s12 m12 l8 offset-l3">Estoquistas</h1>
        </div>

        <div class="row">

            <div class="col s12 m12 l8 offset-l3">
                <div style="border: solid 2px black; height: 400px;"></div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l5 offset-l3">
            <div style="border: solid 2px black; height: 400px;"></div>
            </div>
            
            <div>
            <div class="col s12 m12 l3 ">
            <div style="border: solid 2px black; height: 400px;"></div>

            </div>
        </div>

    </main>


</body>

</html>