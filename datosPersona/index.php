<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">

    <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
            <div class="form-group btn-lg col-md-6">
                <label>Nombre Persona</label>
                <input type="text" class="form-control" name="nombrePersona" placeholder="Nombre Persona" require>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Fecha Nacimiento</label>
                <input type="date" class="form-control" name="nacimientoPersona" placeholder=">Fecha Nacimiento" require>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Celular</label>
                <input type="text" class="form-control" name="celularPersona" placeholder="Celular" require>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Coreo</label>
                <input type="email" class="form-control" name="coreoPersona" placeholder="Coreo" require>
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
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Cod_prsn}}</td>
                    <td> {{item.Nombre_prsn}}</td>
                    <td>{{item.Nacimiento_prsn}}</td>
                    <td>{{item.Celular_prsn}}</td>
                    <td>{{item.Correo_prsn}}</td>
                    <td><button class="btn btn-danger" @click="eliminar(item.Cod_prsn)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/datosPersona/editarPersona.php?id=' + item.Cod_prsn"><i
                                class="fas fa-edit"></i></a></td>
                </tr>
            </tbody>
        </table>

    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/datosPersona.js"></script>

</body>

</html>