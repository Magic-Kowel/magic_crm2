<?php include '../includes/head.php' ?>

<body>
    <main id="app" class="container">
    <h1> <span class="label label-default">Generar Reporte</span></h1>
    <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
            <div class="form-group  ">
                <label>Descripcion Reporte</label>
                <textarea type="text" class="form-control" name="descripcionReporte" placeholder="Descripcion Reporte" require></textarea>
            </div>
            <div class="form-group ">
                <label>Numero de contrato</label>
                <input type="text" class="form-control" name="numeroContrato" placeholder="Numero Reporte" require   pattern="[0-9]{1,1000}" >
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-lg container" data-toggle="tooltip" title="Agregar"
                    style="background-color: #2FACB2">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </form>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appReporte.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>