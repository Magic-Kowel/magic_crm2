<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>

    <main id="app" class="container">

        <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
            <div class="form-group btn-lg col-md-6">
                <label>Puestos</label>
                <select class="form-control" name="idPuesto" :value="formEditar.Nombre_pues" require>
                    <option v-for="itemPuestos in listarPuestos" v-bind:value="itemPuestos.Cod_pues">
                        {{itemPuestos.Nombre_pues}}</option>
                </select>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Persona</label>
                <select class="form-control" name="idPersona" >
                    <option v-for="itemPersona in  listarPersona" v-bind:value="itemPersona.Cod_prsn">
                        {{itemPersona.Nombre_prsn}}</option>
                </select>
            </div>
            <div class="form-group btn-lg col-md-6">
                <label>Usuario</label>
                <select class="form-control" name="idUsuario" >
                    <option v-for="itemUsuario in listarUsuarios" v-bind:value="itemUsuario.Cod_usr">
                        {{itemUsuario.Nickname_usr}}</option>
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
                    <th>ID</th>
                    <th>Nombre Persona</th>
                    <th>Fecha Nacimiento</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Departamento</th>
                    <th>Puesto</th>
                    <th>Nick Name</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados"> 
                    <td>{{item.Cod_prsnl}}</td>
                    <td>{{item.Nombre_prsn}}</td>
                    <td> {{item.Nacimiento_prsn}}</td>
                    <td>{{item.Celular_prsn}}</td>
                    <td>{{item.Correo_prsn}}</td>
                    <td>{{item.Nombre_dep}}</td>
                    <td>{{item.Nombre_pues}}</td>
                    <td>{{item.Nickname_usr}}</td>
                    <td><button class="btn btn-danger" @click="eliminar(item.Cod_prsnl)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/informacionPersona/editarInformacionPersona.php?id=' + item.Cod_prsnl"><i
                                class="fas fa-edit"></i></a></td>
                </tr>
            </tbody>
        </table>

    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appInformacionPersona.js"></script>

</body>

</html>