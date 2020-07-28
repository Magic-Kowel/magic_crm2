<?php include '../includes/head.php' ?>

<body>

    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
        <div id="formulario" class="form-group container">
            <form id="formRegistro" autocomplete="off" @submit.prevent="registro" enctype="multipart/form-data">
                <div class="form-group  ">
                    <input type="text" class="form-control" placeholder="Cuestionario" name="cuestionario">
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" placeholder="Descripcion" name="descripcionCuestionario"
                        id="textbox-descripcion" class="textbox"></textarea>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn  btn-lg col-md-6 btn-lg " data-toggle="tooltip" title="Agregar"
                        style="background-color: #2FACB2">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" id="forLook-Text" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                    <th>Añadir Pregunta</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>{{item.Cod_cuest}}</td>
                    <td> {{item.Nombre_cuest}}</td>
                    <td>{{item.Detalle_cuest}}</td>
                    <td><button class="btn btn-danger" @click="eliminar(item.Cod_cuest)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/cuestionarios/editarCuestionario.php?id=' + item.Cod_cuest"><i
                                class="fas fa-edit"></i></a></td>
                    <td><center><a class="btn btn-success " role="button" aria-pressed="true"
                            :href="'/magic_crm2/preguntas/index.php?id=' + item.Cod_cuest"><i class="fas fa-plus-square"></i></a></center></td>
                            

                </tr>
            </tbody>
        </table>
    </main>
    <?php include '../includes/librerias.php' ?>
    <script src="../js/appCuestionarios.js"></script>
</body>

</html>