

<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/permisoAlto.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarPersonal" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">

            <div class="form-group btn-lg col-md-6">
                <label>Puestos</label>
                <select class="form-control" name="idPuesto"  :value="formEditar.Cod_pues">
                    <option v-for="itemPuestos in listarPuestos"  v-bind:value="itemPuestos.Cod_pues" >
                        {{itemPuestos.Nombre_pues}}</option> 
                </select>
            </div>
            <div class="form-group mx-sm-3">
                <fieldset disabled>
                <label for="inputUser" class="col-sm-2 col-form-label  container">Persona</label>
                <input :value="formEditar.Nombre_prsn" type="text" id="disabledTextInput" placeholder="Persona" name="Persona"
                    class="form-control container" require>
                </fieldset>
            </div>
            <div class="form-group mx-sm-3">
                <fieldset disabled>
                <label for="inputUser" class="col-sm-2 col-form-label  container">Usuario</label>
                <input :value="formEditar.Nickname_usr" type="text" id="disabledTextInput" placeholder="Usuario" name="Usuario"
                    class="form-control container" require>
                </fieldset>
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_prsnl">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appInformacionPersona.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>