
<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarPermiso" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">
            
            <div class="form-group mx-sm-3">
                <label  class="col-sm-2 col-form-label  container">Permiso</label>
                <input :value="formEditar.Nombre_perm" type="text" placeholder="Permiso" name="Permiso"
                    class="form-control container" require>
            </div>
            <div class="form-group mx-sm-3">
                <label  class="col-sm-2 col-form-label col-form-label-lg container">Descripcion Permiso</label>
                <textarea :value="formEditar.Descrpcion_perm" type="text" placeholder="Descripcion Permiso"
                    name="DescripcionPermiso"  class="form-control container" rows="3" require></textarea>
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_perm">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appPermisos.js"></script>
</body>

</html>