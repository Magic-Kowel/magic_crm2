
<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/permisoAlto.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarPersona" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">
            
            <div class="form-group mx-sm-3">
                <label for="inputUser" class="col-sm-2 col-form-label  container">Nombre Persona</label>
                <input :value="formEditar.Nombre_prsn" type="text" placeholder="Nombre Persona" name="nombrePersona"
                    class="form-control container" require>
            </div>
            <div class="form-group mx-sm-3">
                <label for="inputPass" class="col-sm-2 col-form-label col-form-label-lg container">Fecha Nacimiento</label>
                <input :value="formEditar.Nacimiento_prsn" type="date" placeholder="Fecha Nacimiento"
                    name="fechaNacimiento" class="form-control container" rows="3" require> 
            </div>
            <div class="form-group mx-sm-3">
                <label for="inputPass" class="col-sm-2 col-form-label col-form-label-lg container">Telefono</label>
                <input :value="formEditar.Celular_prsn" type="text" placeholder="Telefono"
                    name="telefonoPersona" class="form-control container" rows="3" require> 
            </div>
            <div class="form-group mx-sm-3">
                <label for="inputPass" class="col-sm-2 col-form-label col-form-label-lg container">Coreo</label>
                <input :value="formEditar.Correo_prsn" type="email" placeholder="Coreo"
                    name="correoPersona"  class="form-control container" rows="3" require>
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_prsn">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/datosPersona.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>