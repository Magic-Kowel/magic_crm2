<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/menuCliente.php')?>
    <main id="app" class="container">
        <h1>
            <center><span class="label label-default"> </span></center>
        </h1>
        <div class="table-responsive">
        <table id="table" class="  table  table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>
                            <center>Contestar</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in listarOpciones">
                        <td>Opcion :&nbsp;{{item.Respuesta_rsp}}</td>
                        <td>
                            <center><button @click="contestarPregunta(this.idCuestionario,this.idPregunta,item.Cod_rsp)"
                                    class="btn btn-success"><i class="fas fa-check"></i></button></center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appContestarPregunta.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>