<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <main id="app" class="container">
    <h1> <span class="label label-default">Hilo Reporte {{formEditar.Cod_repo}}</span></h1>
    <form id="formRegistro" class="form-group container" autocomplete="off" @submit.prevent="registro"
            enctype="multipart/form-data">
         <!--   <div class="form-group  ">
                <label>Mesaje</label>
                <textarea disabled  :value="formEditar.Detalle_repo"   type="text" class="form-control" name="mesage" placeholder="Mesaje" require></textarea disabled>
            </div>
            -->
            <div class="form-group  ">
                <label>Comentario</label>
                <textarea type="text" class="form-control" name="Comentario" placeholder="Escribe Comentario" require></textarea>
            </div>
            <input type="hidden" name="idReporte" :value="formEditar.Cod_repo">
            <div class="form-group">
                <button type="submit" class="btn btn-lg container" data-toggle="tooltip" title="Agregar"
                    style="background-color: #2FACB2">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </form>
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Hilo</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in listar">
                    <td>
                        Escribio:&nbsp;{{item.Nickname_usr}} <br>
                        Fecha:&nbsp;{{item.Tiempo_hr}} <br>
                        Comentario:&nbsp;{{item.Comentario_mnsj}}</td>
                </tr>
            </tbody>
        </table>

        
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/mensajes.js"></script>

</body>

</html>