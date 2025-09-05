<?php

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$dui = isset($_POST['dui']) ? $_POST['dui'] : '';
$nacimiento = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : '';
$departamento = isset($_POST['departamento']) ? $_POST['departamento'] : '';
$distrito = isset($_POST['distrito']) ? $_POST['distrito'] : '';
$colonia = isset($_POST['colonia']) ? $_POST['colonia'] : '';
$calle = isset($_POST['calle']) ? $_POST['calle'] : '';
$casa = isset($_POST['casa']) ? $_POST['casa'] : '';

$fechaNacimiento = new DateTime($nacimiento);
$hoy = new DateTime();

$edad = $hoy->diff($fechaNacimiento)->y;

$fechaRegistro =date('d-m-Y H:i:s') ;
echo "<h2>Datos recibidos:</h2>";
echo "Nombre: $nombre <br>";
echo "Teléfono: $telefono <br>";
echo "DUI: $dui <br>";
echo "Fecha de nacimiento: $nacimiento <br>";
echo "Departamento: $departamento <br>";
echo "Distrito: $distrito <br>";
echo "Dirección: $colonia, $calle, $casa <br>";
echo "Foto:  <br>" . $imagen;
echo "Edad: $edad  <br>";
echo "Fecha de Registro: $fechaRegistro <br>";
?>