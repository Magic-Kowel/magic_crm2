<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoBajo.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>

    <main id="app" class="container">

        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="Buscar" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="table-responsive">
        <table id="table" class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Tiempo de Atencion</th>
                    <th>Descripcion</th>
                    <th>Numero de Contrato</th>
                    <th>Hilo</th>
                    <th>Canalización</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td v-if="item.Estado_Ate ==1"><button  class="btn btn-success"> <i class="fas fa-toggle-on"></i></button></td>
                    <td v-if="item.Estado_Ate ==0"><button @click="actualizarEstado(item.Cod_ate , item.Estado_ate)" class="btn btn-danger"><i class="fas fa-toggle-off"></i></button></td>
                    <td> {{item.Tiempo_ate}}</td>
                    <td>{{item.Detalle_repo}}</td>
                    <td>{{item.Contrato_repo}}</td>
                    <td><a class="btn btn-success " role="button" aria-pressed="true"
                            :href="'/magic_crm2/mensajes/index.php?id=' + item.Cod_fk_repo1"><i class="fas fa-comment-dots"></i></a></td>
                    <td><a class="btn btn-success " role="button" aria-pressed="true"
                            :href="'/magic_crm2/canalizacion/index.php?canalizacion='+ item.Cod_fk_repo1+'&idAtencion='+item.Cod_ate"><i class="fas fa-address-book"></i></a></td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appAtencion.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>