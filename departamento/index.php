<?php include '../includes/head.php' ?>

<body>
 
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <div id="formulario" class="form-group container">
            <form id="formRegistro" autocomplete="off" @submit.prevent="registro" enctype="multipart/form-data">
                <input type="text" class="form-control" placeholder="Departamento" name="Departamento">
                <input type="text" class="form-control" placeholder="Descripcion" name="DescripcionDepartamento"
                    id="textbox-descripcion" class="textbox">
                <div class="form-group ">
                    <button type="submit" class="btn  btn-lg col-md-6 btn-lg " data-toggle="tooltip" title="Agregar"
                        style="background-color: #2FACB2">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="forLook">
            <input type="search" v-model="buscar" placeholder="buscar" id="forLook-Text" required>
            <button type="button" id="button-search"><i class="fas fa-search"></i></button>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Cod_dep}}</td>
                    <td> {{item.Nombre_dep}}</td>
                    <td>{{item.Descripcion_dep}}</td>
                    <td><button class="btn btn-danger" @click="eliminar(item.Cod_dep)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/departamento/editar.php?id=' + item.Cod_dep"><i
                                class="fas fa-edit"></i></a></td>

                </tr>
            </tbody>
        </table>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appDepartamento.js"></script>
</body>

</html>