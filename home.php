<?php 
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contenido</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Highcharts -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/sankey.js"></script>
  <script src="https://code.highcharts.com/modules/dependency-wheel.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://code.highcharts.com/themes/adaptive.js"></script>

  <style>
      body {
          font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      }
      #container {
          height: 500px;
      }
  </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"> DEV</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="usuarios.php">usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="personal.php">personal</a>
          </li>
        </ul>
        <a class="btn btn-danger" href="index.php">Cerrar sesión</a>
      </div>
    </nav>

    <!-- Highcharts -->
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            Gráfico tipo dependency wheel que muestra flujos de datos.
        </p>
    </figure>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Highcharts Config -->
    <script>
      Highcharts.chart("container", {
        title: { text: "Highcharts Dependency Wheel" },
        series: [{
          keys: ["from", "to", "weight"],
          data: [
            ["Brazil", "Portugal", 5],
            ["Brazil", "France", 1],
            ["Brazil", "Spain", 1],
            ["Brazil", "England", 1],
            ["Canada", "Portugal", 1],
            ["Canada", "France", 5],
            ["Canada", "England", 1]
          ],
          type: "dependencywheel",
          name: "Flujos",
          dataLabels: {
            color: "#333",
            style: { textOutline: "none" },
            textPath: { enabled: true },
            distance: 10,
          },
          size: "95%",
        }],
      });
    </script>
</body>
</html>
