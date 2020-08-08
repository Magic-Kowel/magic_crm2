<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/permisoMedio.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="idOpcion" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">
            <div class="form-group mx-sm-3">
                <label class="col-sm-2 col-form-label  container">Pregunta</label>
                <input :value="formEditar.Respuesta_rsp" type="text" placeholder="Pregunta" name="opcion"
                    class="form-control container" require>
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_rsp">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
        </form>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appOpciones.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>