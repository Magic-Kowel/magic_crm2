<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoAlto.php') ?>
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
            <div class="form-group btn-lg col-md-6">
                <label>Nombre Puesto</label>
                <input type="text" class="form-control" name="nombrePuesto" placeholder="Nombre" require>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Descripcion Puesto</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcionPuesto"
                    rows="3" require ></textarea>
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
        <div class="table-responsive">
        <table id="table" class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Nombre</th>
                    <th>Descipcion</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Nombre_dep}}</td>
                    <td> {{item.Nombre_pues}}</td>
                    <td>{{item.Descripcion_pues}}</td>
                    <td><button class="btn btn-danger" @click="eliminar(item.Cod_pues)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/puestos/editarPuesto.php?id=' + item.Cod_pues"><i
                                class="fas fa-edit"></i></a></td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appPuesto.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>