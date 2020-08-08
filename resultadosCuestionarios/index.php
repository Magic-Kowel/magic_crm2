<?php include '../includes/head.php' ?>

<body>

    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoMedio.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" id="forLook-Text" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="table-responsive">
        <table id="table" class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Preguntas</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Cod_cuest}}</td>
                    <td> {{item.Nombre_cuest}}</td>
                    <td>{{item.Detalle_cuest}}</td>
                    <td><center><a class="btn btn-success " role="button" aria-pressed="true"
                            :href="'/magic_crm2/resultadosCuestionarios/preguntasContestadas.php?id=' + item.Cod_cuest"><i class="far fa-list-alt"></i></a></center></td>
                            

                </tr>
            </tbody>
        </table>
        </div>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appCuestionarios.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>