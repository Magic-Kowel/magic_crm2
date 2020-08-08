<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/menuCliente.php')?>
    <main id="app" class="container">
        <h1>
            <center><span class="label label-default"> </span></center>
        </h1>
        <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="contestarPreguntaAbierta(this.idCuestionario,this.idPregunta)"
            enctype="multipart/form-data">
            <div class="form-group  ">
                <label>Respuesta</label>
                <textarea type="text" class="form-control" name="PreguntaAbierta" v-model="respuestaAbierta" placeholder="Escribe Respuesta"
                    require></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg container" data-toggle="tooltip" title="Contestar"
                    style="background-color: #2FACB2">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </form>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appContestarPregunta.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>