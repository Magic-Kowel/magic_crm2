
<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarCanalizacion" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">
            <div class="form-group btn-lg col-md-6">
                <label>Departamento</label>
                <select class="form-control" name="idDepartamento" :value="formEditar.Cod_fk_dep2">
                    <option v-for="itemDepartamento in listarDepartamentos" v-bind:value="itemDepartamento.Cod_dep">
                        {{itemDepartamento.Nombre_dep}}</option>
                </select>
            </div>
            
            <div class="form-group btn-lg col-md-6">
                <label>Usuarios</label>
                <select class="form-control" name="idUsuarios"  :value="formEditar.Cod_fk_usr1" >
                    <option v-for="itemUsuario in listarUsuarios" v-bind:value="itemUsuario.Cod_usr">
                        {{itemUsuario.Nickname_usr}}</option>
                </select>
            </div>
            
            <input type="hidden" name="id" :value="formEditar.Cod_can">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
            </form>
    </main>
    <?php include '../includes/librerias.php' ?>
    
    <script src="../js/appCanalizacion.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>