<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>

    <main id="app" class="container">
    <h1> <span class="label label-default">Lista de Deportes</span></h1>
    <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion Reporte</th>
                    <th>Numero de Contrato</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Cod_repo}}</td>
                    <td> {{item.Detalle_repo}}</td>
                    <td>{{item.Contrato_repo}}</td>
                </tr>
            </tbody>
        </table>

    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appReporte.js"></script>

</body>

</html>