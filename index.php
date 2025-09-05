<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Inicio de sesión</title>
</head>
<body class="container mt-5">
  <h2 class="mb-4">Iniciar Sesión</h2>
  <form action="validacion.php" method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Correo</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" required>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
  </form>
</body>
</html>
