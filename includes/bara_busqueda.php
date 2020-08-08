<div id='cssmenu'>
    <ul>
        <li><a href='../login/salir.php'><span>Salir</span></a></li>
        <li v-if="nivel==1" class='active has-sub'><a href='#'><span>Logistica</span></a>
            <ul>
                <li class='last'><a href='http://localhost/magic_crm2/departamento/'><span>Departamentos</span></a>
                </li>
                <li class='last'><a href='http://localhost/magic_crm2/puestos/'><span>Puestos</span></a></li>
                <li class='last'><a href='http://localhost/magic_crm2/permisos/'><span>Permisos</span></a></li>
            </ul>
        </li>
        <li v-if="nivel==1" class='active has-sub'><a href='#'><span>Recursos Humanos</span></a>
            <ul>
                <li class='last'><a href='http://localhost/magic_crm2/datosPersona/'><span>Personas</span></a></li>
                <li class='last'><a href='http://localhost/magic_crm2/usuarios/'><span>Usuarios</span></a></li>
                <li class='last'><a href='http://localhost/magic_crm2/informacionPersona/'><span>Personal</span></a></li>
            </ul>
        </li>
        <li class='active has-sub'><a href='#'><span>Atención</span></a>
            <ul>
                <li v-if="nivel==1 || nivel==3" class='has-sub'><a href='#'><span>Reportes</span></a>
                    <ul>
                        <li class='last'><a href='http://localhost/magic_crm2/reporte/'><span>Generar
                                    Reporte</span></a></li>
                        <li class='last'><a href='http://localhost/magic_crm2/reporte/getReporte.php'><span>Ver
                                    Reporte</span></a></li>
                    </ul>
                </li>
                <li  v-if="nivel==1 || nivel==3"  class='last'><a href='http://localhost/magic_crm2/atencion/'><span>Ver
                                    Atencion</span></a></li>
                <li v-if="nivel==1 || nivel==2" class='has-sub'><a href='#'><span>Cuestionarios</span></a>
                    <ul>
                        <li class='last'><a href='http://localhost/magic_crm2/cuestionarios/'><span>Generar
                        Cuestionario</span></a></li>
                        <li class='last'><a href='http://localhost/magic_crm2/resultadosCuestionarios/'><span>Ver
                                    Resultados</span></a></li>
                    </ul>
                </li>

            </ul>
        </li>

        <li><a href='http://localhost/magic_crm2/principal'><span>Inicio</span></a></li>
        <li><a href='#' ><span> <?php echo $_SESSION['user'];?></span></a></li>

    </ul>
</div>
<script src="../js/reaponsiMenu.js"></script>