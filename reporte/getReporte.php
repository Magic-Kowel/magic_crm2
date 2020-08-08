<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoBajo.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>

    <main id="app" class="container">
    <h1> <span class="label label-default">Lista de Reportes</span></h1>
    <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"></span>
            </div>
        </div>
        <div class="table-responsive">
        <table id="table" class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion del Reporte</th>
                    <th>Numero de Contrato</th>
                    <th>Hilo conversación</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Cod_repo}}</td>
                    <td> {{item.Detalle_repo}}</td>
                    <td>{{item.Contrato_repo}}</td>
                    <td><a class="btn btn-success " role="button" aria-pressed="true"
                            :href="'/magic_crm2/mensajes/index.php?id=' + item.Cod_repo"><i class="fas fa-comment-dots"></i></a></td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appReporte.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>