<?php include '../includes/head.php' ?>

<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarCuestionario" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">

            <div class="form-group mx-sm-3">
                <label class="col-sm-2 col-form-label  container">Nombre</label>
                <input :value="formEditar.Nombre_cuest" type="text" placeholder="Nombre" name="nombreCuestionario"
                    class="form-control container" require>
            </div>
            <div class="form-group mx-sm-3">
                <label class="col-sm-3 col-form-label col-form-label-lg container">Descripcion Cuestionario</label>
                <textarea :value="formEditar.Detalle_cuest" type="text" placeholder="Descripcion Cuestinario"
                    name="DescripcionCuestionario" class="form-control container" rows="3" require></textarea>
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_cuest">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
        </form>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appCuestionarios.js"></script>
</body>

</html>