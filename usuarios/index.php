<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoAlto.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">

    <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
            <div class="form-group btn-lg col-md-6">
                <label>Permiso</label>
                <select class="form-control" name="idPermiso">
                    <option v-for="itemPermisos in listarPermisos" v-bind:value="itemPermisos.Cod_perm">
                        {{itemPermisos.Nombre_perm}}</option>
                </select>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Nombre de Usuario</label>
                <input type="text" class="form-control" name="nombreUsuario" placeholder="Nombre de Usuario" require>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Clave de Usuario</label>
                <input type="text" class="form-control" name="claveUsiario" placeholder="Clave de Usuario" require pattern="[A-Za-z0-9]{8,15}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn  btn-lg col-md-6 btn-lg" data-toggle="tooltip" title="Agregar"
                    style="background-color: #2FACB2">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </form>
        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="Buscar" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="table-responsive">
        <table id="table" class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Nivel Permiso</th>
                    <th>Nombre Usuario</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Nombre_perm}}</td>
                    <td> {{item.Nickname_usr}}</td>
                    <td><button class="btn btn-danger" @click="eliminar(item.Cod_usr)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/usuarios/editarUsuarios.php?id=' + item.Cod_usr"><i
                                class="fas fa-edit"></i></a></td>
                </tr>
            </tbody>
        </table>
        </div>

    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appUsuarios.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>