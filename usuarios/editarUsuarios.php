<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/permisoAlto.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarUsuarios" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">
            <div class="form-group btn-lg col-md-6">
                <label>Permiso</label>
                <select name="idPermiso" :value="formEditar.Cod_perm" class="form-control" >
                    <option  v-for="itemPermisos in listarPermisos"  v-bind:value="itemPermisos.Cod_perm">
                    {{itemPermisos.Nombre_perm}}</option>

                </select>
            </div>
            <div class="form-group mx-sm-3">
                <label for="inputUser" class="col-sm-2 col-form-label  container">Nombre Usuario</label>
                <input :value="formEditar.Nickname_usr" type="text" placeholder="Nombre Usuario" name="nombreUsuario"
                    class="form-control container" require>
            </div>
            <div class="form-group mx-sm-3">
                <label for="inputPass" class="col-sm-2 col-form-label col-form-label-lg container">Clave Usuario</label>
                <input type="text" placeholder="Clave Usuari"
                    name="claveUsuario" id="textbox-descripcion" class="form-control container" rows="3" require pattern="[A-Za-z0-9]{8,15}">
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_usr">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appUsuarios.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>