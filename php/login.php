<?php
 session_start();
 include 'conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasenia"]) ? trim($_POST["contrasenia"]) : null;
 $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_contrasenia =
MD5('$contrasena')";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 $_SESSION['isLogged'] = TRUE;
 header("Location: ../../admin/vista/usuario/index.php");
 } else {
 header("Location: ../vista/login.html");
 }

 $conn->close();
?>
