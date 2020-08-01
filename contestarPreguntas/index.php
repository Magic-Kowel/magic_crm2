<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/menuCliente.php')?>
    <main id="app" class="container">
        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" id="forLook-Text" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <template v-for="item in datosFiltrados">
        <div  style=" Display: inline-block  !important; ">
            <div class="card-header " style="width: 25rem; ">
                <img class="card-img-top" src="../img/magic CRM.svg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <td>{{item.Nombre_cuest}}</td>
                    </h5>
                    <p class="card-text">{{item.Detalle_cuest}}</p>
                </div>
                <div class="card-body">
                    <center><a class="btn btn-success container" role="button" aria-pressed="true"
                            :href="'/magic_crm2/contestarPreguntas/preguntas.php?idCuestionario=' + item.Cod_cuest"><i
                                class="fas fa-th-list"></i></a></center>
                </div>
            </div>
        </div>
        </template>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appContestarPregunta.js"></script>
</body>

</html>