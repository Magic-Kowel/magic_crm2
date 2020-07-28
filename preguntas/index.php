<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
    <h1><center><span class="label label-default">{{formCuestionario[1].Nombre_cuest}}</span></center></h1>
    <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
            <div class="form-group  ">
                <label>Pregunta</label>
                <input type="text" class="form-control" name="pregunta" placeholder="Escribe Pregunta" require>
            </div>
            <input type="hidden" name="idCuestionario" :value="formCuestionario[1].Cod_fk_cuest1">
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
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Preguntas</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td>Pregunta:&nbsp;{{item.Pregunta_preg}}</td>
                    <td><button class="btn btn-danger" @click="eliminar(item.Cod_preg)"><i
                                class="fas fa-trash-alt"></i></button></td>
                    <td><a class="btn btn-warning " role="button" aria-pressed="true"
                            :href="'/magic_crm2/preguntas/editarPreguntas.php?id=' + item.Cod_preg"><i
                                class="fas fa-edit"></i></a></td>
                </tr>
            </tbody>
        </table>

        
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appPreguntas.js"></script>

</body>

</html>