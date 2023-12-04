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
           
                <div>
                    <h1>Cadastro Fornecedor</h1>
                </div>

                <form method="post" action="">

                    <div class="container">

                        <div class="row">
                            <div class=".input-field col s12 l8">
                                <label for="forNome">Fornecedor:</label>
                                <input type="text" placeholder="Nome" name="forNome" id="forNome" class="validate" require>
                            </div>
                        </div>

                        <div class="row">
                            <div class=".input-field col s12 l8">
                                <label for="forEmail">Email:</label>
                                <input type="text" placeholder="Email" name="forEmail" id="forEmail" class="validate" require>
                            </div>
                        </div>

                        <div class="row">
                            <div class=".input-field col s12 l8">
                                <label for="forTelefone">Telefone:</label>
                                <input type="text" placeholder="telefone" name="forTelefone" id="forTelefone" class="validate" require>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class=".input-field col s12 l8">
                                <label for="forEndereco">Endereco:</label>
                                <input type="text" placeholder="endereço" minlength="8" name="forEndereco" id="forEndereco" class="validate" require>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <label for="textarea1">Descrição</label>
                                <textarea id="textarea1" class="materialize-textarea" name="forObservacao"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                    <button class="btn col l1 offset-l2" name="btncadastrar">Cadastrar</button>
                    </div>

                </form>


          


        </section>
    </main>
</body>

</html>

<?php

if (isset($_POST['btncadastrar'])) {
    $forNome = filter_input(INPUT_POST, 'forNome');
    $forEmail = filter_input(INPUT_POST, 'forEmail');
    $forTelefone = filter_input(INPUT_POST, 'forTelefone');
    $forEndereco = filter_input(INPUT_POST, 'forEndereco');
    $forObservacao = filter_input(INPUT_POST, 'forObservacao');

    $sql = $conexao->prepare("INSERT INTO tabfornecedor (nomeFornecedor, telefoneFornecedor, emailFornecedor,observacaoFornecedor, enderecoFornecedor) VALUES (:fornome, :fortelefone, :foremail, :forobservacao, :forendereco)");
    $sql->bindValue(':fornome', $forNome);
    $sql->bindValue(':foremail', $forEmail);
    $sql->bindValue(':forendereco', $forEndereco);
    $sql->bindValue(':fortelefone', $forTelefone);
    $sql->bindValue(':forobservacao', $forObservacao);
    $sql->execute();
    header('Location:../ESTOQUISTA/painelEstoquista.php');
}

?>