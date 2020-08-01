<?php include '../includes/head.php' ?>
<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <table class="table table-bordered">
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
    <?php include '../includes/librerias.php' ?>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="../js/resultadosCuestionarios.js"></script>
</body>

</html>