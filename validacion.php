<?php
include_once('./conf/conf.php');
$correo= isset($_POST['email']) ? $_POST['email']:"";
$pwd=  isset($_POST['pwd']) ? $_POST['pwd']:"";
$pwdFormat= MD5($pwd);

$consulta="SELECT email, pwd FROM usuario WHERE email= '$correo' AND pwd='$pwdFormat'";
$ejecucion= mysqli_query($con,$consulta);
$usuario = mysqli_fetch_assoc($ejecucion);

session_start();

$validar = mysqli_num_rows($ejecucion);
if($validar > 0){
    $_SESSION['usuario'] = $usuario['email'];  
    header('Location: home.php');
    exit();
} else {
    header('Location: index.php?error=error');
    exit();
}
?>
