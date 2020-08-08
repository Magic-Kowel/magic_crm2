<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoMedio.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
    <h1><center><span class="label label-default">{{titulo.Pregunta_preg}}</span></center></h1>
    <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
            <div class="form-group  ">
                <label>Opcion</label>
                <input type="text" class="form-control" name="opcion" placeholder="Escribe Opcion" require>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg container" data-toggle="tooltip" title="Agregar"
                    style="background-color: #2FACB2">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </form>
        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" id="forLook-Text" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="table-responsive">
        <table id="table" class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>Pregunta:&nbsp;{{item.Respuesta_rsp}}</td>
                    <td><button class="btn btn-danger" @click="eliminar(item.Cod_rsp)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/opciones/editarOpciones.php?id=' + item.Cod_rsp +'&idPregunta='+this.idPregunta"><i
                                class="fas fa-edit"></i></a></td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appOpciones.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>