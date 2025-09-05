<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
include_once('./conf/conf.php');


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$seleccion = "SELECT * FROM personal WHERE id=$id";
$ejecutar = mysqli_query($con, $seleccion);
$datos = mysqli_fetch_assoc($ejecutar);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Editar Personal</title>
    <style>
        .contenido {
            margin: 40px;
        }
    </style>
</head>
<body>
<?php include_once('nav.php'); ?>

<div class="contenido">
    <form action="" method="POST" enctype="multipart/form-data" class="form-control">
        <label for="Nombre" class="form-label">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" required value="<?php echo $datos['Nombre']; ?>">

        <label for="Telefono" class="form-label">Teléfono</label>
        <input type="text" name="Telefono" id="Telefono" class="form-control" required value="<?php echo $datos['Telefono']; ?>">


        <label for="Direccion" class="form-label">Dirección</label>
        <input type="text" name="Direccion" id="Direccion" class="form-control" value="<?php echo $datos['Direccion']; ?>">

        <label for="colonia" class="form-label">Colonia</label>
        <input type="text" name="colonia" id="colonia" class="form-control" value="<?php echo $datos['colonia']; ?>">

        <label for="calle" class="form-label">Calle</label>
        <input type="text" name="calle" id="calle" class="form-control" required value="<?php echo $datos['calle']; ?>">

        <label for="apartamento" class="form-label">Apartamento</label>
        <input type="text" name="apartamento" id="apartamento" class="form-control" required value="<?php echo $datos['apartamento']; ?>">

        <label for="EstadoCivil" class="form-label">Estado Civil</label>
        <input type="text" name="EstadoCivil" id="EstadoCivil" class="form-control" required value="<?php echo $datos['EstadoCivil']; ?>">

        <label for="Fotografia" class="form-label">Fotografía</label><br>
        <?php if (!empty($datos['Fotografia'])) { ?>
            <img src="<?php echo $datos['Fotografia']; ?>" alt="Foto actual" width="100"><br>
        <?php } ?>
        <input type="file" name="Fotografia" id="Fotografia" class="form-control">

        <br>
        <input type="submit" class="btn btn-primary" value="Actualizar">
    </form>
</div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['Nombre'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $apartamento = $_POST['apartamento'];
    $estadoCivil = $_POST['EstadoCivil'];

  
    $fotoNueva = $datos['Fotografia'];
    if (!empty($_FILES['Fotografia']['name'])) {
        $carpeta = "uploads/";
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        $fotoNueva = $carpeta . basename($_FILES['Fotografia']['name']);
        move_uploaded_file($_FILES['Fotografia']['tmp_name'], $fotoNueva);
    }

    
    $update = "UPDATE personal SET 
        Nombre='$nombre',
        Telefono='$telefono',
        Direccion='$direccion',
        colonia='$colonia',
        calle='$calle',
        apartamento='$apartamento',
        EstadoCivil='$estadoCivil',
        Fotografia='$fotoNueva'
        WHERE id=$id";

    if (mysqli_query($con, $update)) {
        echo "<script>alert('Datos actualizados correctamente'); window.location='personal.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar: " . mysqli_error($con) . "');</script>";
    }
}
?>
