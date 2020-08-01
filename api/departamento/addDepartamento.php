<?php include '../conexion.php';
$Departamento=$_POST['Departamento'];
$DescripcionDepartamento=$_POST['DescripcionDepartamento'];
$sql="SELECT Nombre_dep FROM `departamento` where Nombre_dep='$Departamento'";
$result=$con->query($sql);
$rows=$result->num_rows;
if($rows > 0) {
  echo 'Departamento ya existe';
}else {
    $query="INSERT INTO departamento(`Nombre_dep`, `Descripcion_dep`) VALUES ('$Departamento', '$DescripcionDepartamento')";
    $result=mysqli_query($con, $query);
    if ($result) {
      echo "success";
    }else {
      echo "fail";
    }
}
?>