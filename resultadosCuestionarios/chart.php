<?php include '../includes/head.php' ?>
<body>
<?php include_once ('../includes/sesion.php') ?>
<?php include_once ('../includes/bara_busqueda.php')?>
<style type="text/css">
          #chart-container {
            height: 80%;
            width: 80%;

          }
      </style>
  <main id="app" class="container">
      <div id="chart-container" class="container">
          <canvas id="mycanvas"></canvas>
      </div>
  </main>
  <?php include '../includes/librerias.php' ?>
  <!-- javascript -->
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="../js/resultadosCuestionarios.js"></script>
</body>

</html>