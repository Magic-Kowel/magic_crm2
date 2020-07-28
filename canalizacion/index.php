<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">

            <div class="form-group btn-lg col-md-6">
                <label>Departamento</label>
                <select class="form-control" name="idDepartamento">
                    <option v-for="itemDepartamento in listarDepartamentos" v-bind:value="itemDepartamento.Cod_dep">
                        {{itemDepartamento.Nombre_dep}}</option>
                </select>
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
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Captura</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Nickname_usr}}</td>
                    <td> {{item.Nombre_dep}}</td>
                    <td> {{item.captura}}</td>
                </tr>
            </tbody>
        </table>

    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appCanalizacion.js"></script>

</body>

</html>