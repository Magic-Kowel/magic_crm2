<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/menuCliente.php')?>
    <main id="app" class="container">
        <h1>
            <center><span class="label label-default"></span></center>
        </h1>
        <template  v-for="item in listarPreguntas">
            <div class="card">
                <h5 class="card-header">Pregunta :&nbsp;{{item.Pregunta_preg}}</h5>
                <div v-if="item.Tipo_preg==1" class="card-body">
                    <center><a class="btn btn-success container " role="button" aria-pressed="true"
                            :href="'/magic_crm2/contestarPreguntas/opciones.php?idCuestionario='+this.idCuestionario+'&idPregunta='+item.Cod_preg+'&tipo='+item.Tipo_preg"><i
                                class="fas fa-th-list"></i></a></center>
                </div>
                <div v-if="item.Tipo_preg==0" class="card-body">
                    <center><a class="btn btn-secondary container " role="button" aria-pressed="true"
                            :href="'/magic_crm2/contestarPreguntas/preguntaAbierta.php?idCuestionario='+this.idCuestionario+'&idPregunta='+item.Cod_preg+'&tipo='+item.Tipo_preg"><i
                                class="fas fa-th-list"></i></a></center>
                </div>
            </div>
            <br>
        </template>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appContestarPregunta.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>