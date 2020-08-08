<?php include '../includes/head.php' ?>
<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoMedio.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
    <div class="table-responsive">
    <table id="table" class=" table  table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Respuestas</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in listar">
                    <td> {{item.Abierta_resp}}</td>
                </tr>
            </tbody>
        </table>
    </main>
    </div>
    <?php include '../includes/librerias.php' ?>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="../js/resultadosCuestionarios.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>