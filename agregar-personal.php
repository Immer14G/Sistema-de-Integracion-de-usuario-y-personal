<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
include_once('./conf/conf.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Agregar personal</title>
    <style>
        .contenido{
            margin:40px;
        }
    </style>
</head>
<body>
    <?php include_once('nav.php'); ?>
    <div class="contenido">
    <div class="card shadow p-4">
        <h3 class="mb-4 text-center">Agregar Personal</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" id="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="Telefono" id="telefono" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dui" class="form-label">DUI</label>
                <input type="text" name="dui" id="dui" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
                <input type="date" name="fechaRegistro" id="fechaRegistro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="Direccion" id="direccion" class="form-control">
            </div>

            <div class="mb-3">
                <label for="colonia" class="form-label">Colonia</label>
                <input type="text" name="colonia" id="colonia" class="form-control">
            </div>

            <div class="mb-3">
                <label for="calle" class="form-label">Calle</label>
                <input type="text" name="calle" id="calle" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="apartamento" class="form-label">Apartamento</label>
                <input type="text" name="apartamento" id="apartamento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="estadoCivil" class="form-label">Estado Civil</label>
                <input type="text" name="EstadoCivil" id="estadoCivil" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fotografia" class="form-label">Fotografía</label>
                <input type="file" name="Fotografia" id="fotografia" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-50">Enviar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['Nombre'];
    $telefono = $_POST['Telefono'];
    $dui = $_POST['dui'];
    $fechaR = $_POST['fechaRegistro'];
    $direccion = $_POST['Direccion'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $apartamento = $_POST['apartamento'];
    $estadoCivil = $_POST['EstadoCivil'];

   
    $fotoNombre = "";
    if (!empty($_FILES['Fotografia']['name'])) {
        $carpeta = "uploads/";
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        $fotoNombre = $carpeta . basename($_FILES['Fotografia']['name']);
        move_uploaded_file($_FILES['Fotografia']['tmp_name'], $fotoNombre);
    }
        $validarDui = "SELECT COUNT(*) as total FROM personal WHERE dui = '$dui'";
            $res = mysqli_query($con, $validarDui);
            $row = mysqli_fetch_assoc($res);

    if ($row['total'] > 0) {
        echo "<script>alert('❌ El DUI ya está registrado, intente con otro.'); window.location='agregar-personal.php';</script>";
        exit;
    }
    
    $insertar = "INSERT INTO personal 
        (Nombre, Telefono, dui, fechaRegistro, Direccion, colonia, calle, apartamento, EstadoCivil, Fotografia)
        VALUES 
        ('$nombre','$telefono','$dui','$fechaNac','$direccion','$colonia','$calle','$apartamento','$estadoCivil','$fotoNombre')";

    $ejecucion = mysqli_query($con, $insertar);

    if ($ejecucion) {
        echo "<script>alert('Registro agregado con éxito'); window.location='personal.php';</script>";
    } else {
        echo "<script>alert('Error al registrar'); window.location='agregar-personal.php';</script>";
    }
}
?>
