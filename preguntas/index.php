<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/permisoMedio.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
    <h1><center><span class="label label-default">{{identificadorPregunta.Nombre_cuest}}</span></center></h1>
    <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
            <div class="form-group  ">
                <label>Pregunta</label>
                <input type="text" class="form-control" name="pregunta" placeholder="Escribe Pregunta" require>
            </div>
            <div v-if="estado==1" class="form-group">
                <button  @click.prevent="cambiarEstado"  data-toggle="tooltip" title="Pregunta Abierta" class="btn btn-success"><i class="fas fa-toggle-on"></i></button>
                <input type="hidden" name="estado" value='1'>
                
            </div>
            <div v-if="estado==0" class="form-group">
                <button  @click.prevent="cambiarEstado" data-toggle="tooltip" title="Pregunta Cerrada"  class="btn btn-secondary"><i class="fas fa-toggle-off"></i></button>
                <input type="hidden" name="estado" value='0'> 
            </div>
            <input type="hidden" name="idCuestionario" :value="this.itemId.id">
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
                    <th>Preguntas</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                    <th>Ver Respuestas</th>
                    <th>Añadir Opciones</th>
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

                    <td v-if="item.Tipo_preg==1"><center><a class="btn btn-info " data-toggle="tooltip" title="Resultados " role="button" aria-pressed="true"
                    :href="'/magic_crm2/resultadosCuestionarios/chart.php?id=' + item.Cod_preg"><i class="fas fa-chart-bar"></i></a></center></td>

                    <td v-if="item.Tipo_preg==0"></td>

                    <td v-if="item.Tipo_preg==1"><center><a  class="btn btn-success " data-toggle="tooltip" title="Agregar Pregunta Abierta" role="button" aria-pressed="true"
                            :href="'/magic_crm2/opciones/index.php?idPregunta=' + item.Cod_preg"><i class="fas fa-plus-square"></i></a></center></td>
                    <td v-if="item.Tipo_preg==0"><center><a class="btn btn-secondary " data-toggle="tooltip" title="Agregar Pregunta Cerrada" role="button" aria-pressed="true"
                            ><i class="far fa-plus-square"></i></a></center></td>
                </tr>
            </tbody>
        </table>
        </div>
        
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appPreguntas.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>
</body>

</html>