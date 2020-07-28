<?php include '../includes/head.php' ?>

<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarPreguntas" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">

            <div class="form-group mx-sm-3">
                <label class="col-sm-2 col-form-label  container">Pregunta</label>
                <input :value="formEditar.Pregunta_preg" type="text" placeholder="Pregunta" name="pregunta"
                    class="form-control container" require>
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_preg">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
        </form>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appPreguntas.js"></script>
</body>

</html>