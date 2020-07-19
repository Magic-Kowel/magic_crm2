
<?php include '../includes/head.php' ?>
<body>
    <?php include '../includes/sesion.php' ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form class="form-group container" id="editarDepartamento" autocomplete="off" @submit.prevent="editar"
            enctype="multipart/form-data">
            <div class="form-group mx-sm-3">
                <label for="inputUser" class="col-sm-2 col-form-label  container">Departamento</label>
                <input :value="formEditar.Nombre_dep" type="text" placeholder="Departamento" name="Departamento"
                    class="form-control container">
            </div>
            <div class="form-group mx-sm-3">
                <label for="inputPass" class="col-sm-2 col-form-label col-form-label-lg container">Descripcion</label>
                <input :value="formEditar.Descripcion_dep" type="text" placeholder="Descripcion"
                    name="DescripcionDepartamento" id="textbox-descripcion" class="form-control container">
            </div>
            <input type="hidden" name="id" :value="formEditar.Cod_dep">
            <button type="submit" class="btn btn-warning container" data-toggle="tooltip" title="Editar"><i
                    class="fas fa-edit"></i></button>
            </div>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appDepartamento.js"></script>
</body>

</html>