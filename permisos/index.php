<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoAlto.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>

    <main id="app" class="container">
        <!--
    <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
            <div class="form-group btn-lg col-md-6">
                <label>Permiso</label>
                <input type="text" class="form-control" name="permiso" placeholder="Permiso" require>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Descripcion Permiso</label>
                <textarea type="text" class="form-control" name="descripcionPermiso" placeholder="Descripcion Permiso" require></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn  btn-lg col-md-6 btn-lg" data-toggle="tooltip" title="Agregar"
                    style="background-color: #2FACB2">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </form>
        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        -->
        <div class="table-responsive">
            <table id="table" class="  table  table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <!--<th>Eliminar</th>
                    <th>Editar</th>-->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in datosFiltrados">
                        <td>{{item.Cod_perm}}</td>
                        <td> {{item.Nombre_perm}}</td>
                        <td>{{item.Descrpcion_perm}}</td>
                        <!--<td><button class="btn btn-danger" @click="eliminar(item.Cod_perm)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/permisos/editarPermisos.php?id=' + item.Cod_perm"><i
                                class="fas fa-edit"></i></a></td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appPermisos.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>