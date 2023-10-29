<?php
    session_start();

    include_once('conexion.php');

    

if (isset($_POST['usuario']) && isset($_POST['nombre_completo']) && isset($_POST['contrasena'])) {
    function validar($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }


    $usuario =  validar($_POST['usuario']);
    $nombre_completo =  validar($_POST['nombre_completo']);
    $contrasena =  validar($_POST['contrasena']);
    

    $usuarios_Datos = 'usuario=' . $usuario . '&nombre_completo=' . $nombre_completo;
    

    if (empty($usuario)) {
        header("Location: CrearCuenta.php?error=El usuario es requerido&$usuarios_Datos");
        exit();
    }elseif (empty($nombre_completo)) {
        header("Location: CrearCuenta.php?error=El nombre completo es requerido&$usuarios_Datos");
        exit();
    }elseif (empty($contrasena)) {
        header("Location: CrearCuenta.php?error=La contraseña es requerida&$usuarios_Datos");
        exit();
    
    } else {
        //hashing
        $contrasena = md5($contrasena);

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $query = $conexion->query($sql);

        if (mysqli_num_rows($query) > 0) {
            header("Location: CrearCuenta.php?error=El nombre de usuario ya existe&$usuarios_Datos");
            exit();
        }else {
            $sql2 = "INSERT INTO usuarios(nombre_completo, usuario, contrasena) VALUES ('$nombre_completo','$usuario','$contrasena')";
            $query2 = $conexion->query($sql2);

            if ($query2) {
                header("Location: index.html");     
                exit();
            }else {
                header("Location: CrearCuenta.php?error=Error desconocido&$usuarios_Datos");
                exit();
            }
        }
    }

} else {
    header("Location: CrearCuenta.php");
    exit();
}