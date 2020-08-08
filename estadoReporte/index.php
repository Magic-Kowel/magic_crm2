<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/menuCliente.php')?>

    <main id="app" class="container">

        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="table-responsive">
        <table id="table" class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Tiempo de Atencion</th>
                    <th>Descripcion</th>
                    <th>Numero de Contrato</th>
                    <th>Canalizacion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td> {{item.Tiempo_ate}}</td>
                    <td>{{item.Detalle_repo}}</td>
                    <td>{{item.Contrato_repo}}</td>
                    <td><a class="btn btn-success " role="button" aria-pressed="true"
                            :href="'/magic_crm2/estadoReporte/estadoReporte.php?canalizacion=' + item.Cod_fk_repo1"><i class="fas fa-address-book"></i></a></td>
                </tr>
            </tbody>
        </table>

    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appAtencion.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>