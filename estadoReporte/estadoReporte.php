<?php include '../includes/head.php' ?>

<body>
    <?php include_once ('../includes/menuCliente.php')?>
    <main id="app" class="container">
        <div class="input-group mb-3">
            <input class="form-control" type="search" v-model="buscar" placeholder="buscar" required>
            <div class="input-group-append">
                <span id="button-search" class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="table-responsive">
        <table id="table" class="  table  table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Captura</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in datosFiltrados">
                    <td v-if="item.Estado_ate ==1"  class=" btn-success" ><center><i class="fas fa-check-circle"></i></center></td>
                    <td v-if="item.Estado_ate ==0" class=" btn-danger"><center><i class="fas fa-times"></i></center></td>
                    <td>{{item.Nickname_usr}}</td>
                    <td>{{item.Nombre_dep}}</td>
                    <td>{{item.captura}}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
    <?php include '../includes/librerias.php' ?>

    <script src="../js/appCanalizacion.js"></script>
    <script src="../js/validarNivelUsuario.js"></script>

</body>

</html>