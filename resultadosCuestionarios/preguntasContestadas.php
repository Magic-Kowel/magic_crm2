<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
    <h1><center><span class="label label-default">{{identificadorPregunta.Nombre_cuest}}</span></center></h1>
        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" id="forLook-Text" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Preguntas</th>
                    <th>Respuestas</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>Pregunta:&nbsp;{{item.Pregunta_preg}}</td>
                    <td v-if="item.Tipo_preg==1" ><center><a class="btn btn-info " data-toggle="tooltip" title="Resultados " role="button" aria-pressed="true"
                    :href="'/magic_crm2/resultadosCuestionarios/chart.php?id=' + item.Cod_preg"><i class="fas fa-chart-bar"></i></a></center></td>
                    <td v-if="item.Tipo_preg==0" ><center><a class="btn btn-light " data-toggle="tooltip" title="Resultados " role="button" aria-pressed="true"
                    :href="'/magic_crm2/resultadosCuestionarios/respuestasAbiertas.php?id=' + item.Cod_preg"><i class="fas fa-file-alt"></i></a></center></td>
                </tr>
            </tbody>
        </table>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appPreguntas.js"></script>

</body>

</html>