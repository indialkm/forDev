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
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Painel Administrativo</title>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses', 'Profit'],
        ['2014', 1000, 400, 200],
        ['2015', 1170, 460, 250],
        ['2016', 660, 1120, 300],
        ['2017', 1030, 540, 350]
      ]);

      var options = {
        chart: {
          title: 'Company Performance',
          subtitle: 'Sales, Expenses, and Profit: 2014-2017',
        },
        bars: 'horizontal', // Required for Material Bar Charts.
        width: '100%',
        height: 500,
        responsive: true
      };

      var chart = new google.charts.Bar(document.getElementById('barchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>

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
      <li><a href="#!"><i class="material-icons">cloud</i>Home</a></li>
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
      <h1 class="col offset-l4">Vendas do mês</h1>

      <div class="col s12 m6 l9 offset-l2">
       
       <div class="col s12 m4 l4">
          <div style="border: solid black 2px; height: 500px;"></div>
        </div>
        
        <div id="barchart_material" style="height: 500px;" class="col s12 m6 l6  offset-l2"></div>
        
      </div>

    </div>

    <div class="row" style="margin-top: 40px;">
      <div class=" col s12 m8 l9 offset-l2" >
        <div style="border: solid black 2px; height: 300px;"></div>
      </div>
    </div>

  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);
    });


    $('.sidenav').sidenav('draggable');
    $('.sidenav').sidenav('draggable', true);
  </script>
</body>

</html>