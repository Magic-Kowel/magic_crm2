<?php include '../includes/head.php' ?>

<body>
<style>
#myChart {
  height: 100%;
}
</style>
    <?php include_once ('../includes/sesion.php') ?>
    <?php include_once ('../includes/bara_busqueda.php')?>
    <?php
/* Open connection to "zing_db" MySQL database. */
$mysqli = new mysqli("localhost", "root", "", "dbcrm");

/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/* Fetch result set from t_test table */
$data=mysqli_query($mysqli, "SELECT Nombre_cuest,Pregunta_preg,Respuesta_rsp,count(Cod_fk_rsp) as conteo,Tipo_preg FROM `resultado_preg`INNER JOIN cuestionario on `Cod_fk_cuest2`=Cod_cuest INNER JOIN preguntas on `Cod_fk_preg2`=Cod_preg INNER JOIN respsel_preguntas on `Cod_fk_rsp`=Cod_rsp where Tipo_preg=1 and Cod_fk_cuest2=1 GROUP by Respuesta_rsp");

?>
<script>
var myData=[<?php
while($info=mysqli_fetch_array($data))
    echo $info[ 'conteo' ].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
<?php
$data=mysqli_query($mysqli, "SELECT Nombre_cuest,Pregunta_preg,Respuesta_rsp,count(Cod_fk_rsp) as conteo,Tipo_preg FROM `resultado_preg`INNER JOIN cuestionario on `Cod_fk_cuest2`=Cod_cuest INNER JOIN preguntas on `Cod_fk_preg2`=Cod_preg INNER JOIN respsel_preguntas on `Cod_fk_rsp`=Cod_rsp where Tipo_preg=1 and Cod_fk_cuest2=1 GROUP by Respuesta_rsp");
?>
var myLabels=[<?php
while($info=mysqli_fetch_array($data))
    echo '"'.$info[ 'Respuesta_rsp' ].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
</script>

    <main id="app" class="container">

    <div id='myChart'></div>
  
    </main>
    <script>
                zingchart.render({
                    id: "myChart",
                    width: "100%",
                    height: 400,
                    data: {
                        type: 'bar',
                        title: {
                            text: "Data Pulled from MySQL Database"
                        },
                        'scale-x': {
                            labels: myLabels,
                        },
                        series: [{
                            values: myData
                        }]
                    }
                });
            
            </script>
    <?php include '../includes/librerias.php' ?>
    
    <?php
/* Close the connection */
$mysqli->close();
?>
</body>

</html>