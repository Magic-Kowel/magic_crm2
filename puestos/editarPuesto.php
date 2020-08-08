<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/permisoAlto.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarPuesto" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">
            
            <div class="form-group btn-lg col-md-6">
                <label>Departamento</label>
                <select name="idDepartamento" :value="formEditar.Cod_dep" class="form-control" >
                    <option  v-for="itemDepartamento in listarDepartamentos" v-bind:value="itemDepartamento.Cod_dep">
                        {{itemDepartamento.Nombre_dep}}</option>

                </select>
            </div>
            <div class="form-group mx-sm-3">
                <label for="inputUser" class="col-sm-2 col-form-label  container">Departamento</label>
                <input :value="formEditar.Nombre_pues" type="text" placeholder="Puesto" name="Puesto"
                    class="form-control container" require>
            </div>
            <div class="form-group mx-sm-3">
                <label for="inputPass" class="col-sm-2 col-form-label col-form-label-lg container">Descripcion</label>
                <textarea :value="formEditar.Descripcion_pues" type="text" placeholder="Descripcion"
                    name="DescripcionPuesto" id="textbox-descripcion" class="form-control container" rows="3" require></textarea>
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_pues">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appPuesto.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>