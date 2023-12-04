<?php
include "../CONFIG/config.php";
include "../CONFIG/header.php";

if (isset($_POST['btncasprd'])) {
    $prodEstoqueNome = filter_input(INPUT_POST, 'prodEstoqueNome');
    $prodEstoquePreco = filter_input(INPUT_POST, 'prodEstoquePreco');
    $prodEstoqueQuantidade = filter_input(INPUT_POST, 'prodEstoqueQuantidade');
    $prodEstoqueTipo = filter_input(INPUT_POST, 'prodEstoqueTipo');
    $prodEstoqueDescricao = filter_input(INPUT_POST, 'prodEstoqueDescricao');
    $prodEstoqueData = filter_input(INPUT_POST, 'prodEstoqueData');
    $FK_fornecedorID = filter_input(INPUT_POST, 'FK_fornecedorID');

    $dataFormatada = DateTime::createFromFormat('d/m/Y', $prodEstoqueData);
    $dataParaBanco = $dataFormatada->format('Y-m-d');

    $sql = $conexao->prepare("INSERT INTO tabprodutoestoque (prodEstoqueNome, prodEstoquePreco, prodEstoqueDescricao, prodEstoqueQuantidade, prodEstoqueTipo, dataproduto, FK_fornecedorID) VALUES (:PEnome, :PEpreco, :PEdescricao, :Peqtd, :PEtipo, :PEdata,:PEfornecedor)");
    $sql->bindValue(':PEnome', $prodEstoqueNome);
    $sql->bindValue(':PEpreco', $prodEstoquePreco);
    $sql->bindValue(':Peqtd', $prodEstoqueQuantidade);
    $sql->bindValue(':PEtipo', $prodEstoqueTipo);
    $sql->bindValue(':PEdescricao', $prodEstoqueDescricao);
    $sql->bindValue(':PEdata', $dataParaBanco);
    $sql->bindValue(':PEfornecedor', $FK_fornecedorID);
    $sql->execute();
    //header('Location:loginEstoquista.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header></header>
    <main>
        <section>
            <h1>Cadastrar Produto no Estoque</h1>
            <form action="" method="post">


                <div class="row">
                    <div class="input-field col s6">
                        <label for="prodEstoqueNome">Produto:</label>
                        <input type="text" require name="prodEstoqueNome">
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s6">
                        <label for="prodEstoquePreco">Preço:</label>
                        <input type="number" id="preco" name="prodEstoquePreco" step="0.01" min="0.00">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <label for="prodEstoqueQuantidade">Quantidade:</label>
                        <input type="number" require name="prodEstoqueQuantidade ">
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s6">
                        <select name="prodEstoqueTipo">
                            <label>Tipo:</label>
                            <option value="" disabled selected>Escolha o tipo do produto</option>
                            <option value="1">Produtos para Loja</option>
                            <option value="2">Produtos Externos</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <label for="textarea1">Descrição</label>
                        <textarea id="textarea1" class="materialize-textarea" name="prodEstoqueDescricao"></textarea>

                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <label for="data">Selecione a Data</label>
                        <input type="text" class="datepicker" id="estdata" name="prodEstoqueData">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <select name="FK_fornecedorID">
                            <label>Tipo:</label>
                            <option value="" disabled selected>Escolha o fornecedor</option>
                            <?php
                            $sqlFornecedores = $conexao->query("SELECT nomeFornecedor FROM tabfornecedor");
                            while ($row = $sqlFornecedores->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option>' . $row['nomeFornecedor'] . '</option>';
                            }
                            ?>

                        </select>
                    </div>
                </div>	


                <div class="row">
                    <div class="col s12 m6 l6 offset-s2">
                        <button class="btn" type="submit" name="btncasprd">CADASTRAR PRODUTO</button>
                    </div>
                </div>

            </form>



        </section>


    </main>
    <footer></footer>
    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var options = {
                format: 'dd/mm/yyyy', // Formato da data exibido para o usuário
                i18n: {
                    cancel: 'Cancelar',
                    clear: 'Limpar',
                    done: 'Ok'
                }
            };
            var instances = M.Datepicker.init(elems, options);
        });
    </script>
</body>

</html>

<?php

if(isset($_POST['btncasprd'])){
    $prodEstoqueNome = filter_input(INPUT_POST,'prodEstoqueNome'); //filtr_input = ele vai fazer uma filtragem da entrada e atribuir o campo txt e input_pot é o comando que vai fazer a busca e colocar na variavel nome
    $prodEstoquePreco = filter_input(INPUT_POST,'prodEstoquePreco');
    $prodEstoqueQuantidade = filter_input(INPUT_POST,'prodEstoqueQuantidade');
    $prodEstoqueTipo = filter_input(INPUT_POST,'prodEstoqueTipo');
    $prodEstoqueDescricao = filter_input(INPUT_POST,'prodEstoqueDescricao');
    $prodEstoqueData = filter_input(INPUT_POST,'prodEstoqueData');

    
    $sql = $conexao -> prepare("INSERT INTO tabprodutoestoque (prodEstoqueNome, prodEstoquePreco, prodEstoqueDescricao, prodEstoqueQuantidade,prodEstoqueTipo,dataproduto) VALUES (:PEnome, :PEpreco, :PEdescricao, :Peqtd, :PEtipo, :PEdata)");
    $sql -> bindValue (':PEnome', $prodEstoqueNome);
    $sql -> bindValue (':PEpreco',$prodEstoquePreco);
    $sql -> bindValue (':Peqtd', $prodEstoqueQuantidade);
    $sql -> bindValue (':PEtipo', $prodEstoqueTipo);
    $sql -> bindValue (':PEdescricao',$prodEstoqueDescricao);
    $sql -> bindValue (':PEdata', $prodEstoqueData);
    $sql -> execute();
    header('Location:..ADMINISTRATIVO/loginAdministrativo.php');
}

?>
