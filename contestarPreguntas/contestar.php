<?php include '../includes/head.php' ?>

<body>
<?php include_once ('../includes/menuCliente.php')?>
    <main id="app" class="container">
    <h1><center><span class="label label-default">{{formCuestionario[0].Nombre_cuest}}</span></center></h1>
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Preguntas</th>
                    <th><center>Contestar</center></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in listarPreguntas">
                    <td>Pregunta :&nbsp;{{item.Pregunta_preg}}</td>
                    <td><center><button class="btn btn-success"  @click="contestar(item.Cod_preg)"><i class="fas fa-check"></i></button></center></td>
                </tr>
            </tbody>
        </table>

        
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appContestarPreguntas.js"></script>

</body>

</html>