<?php
 $host = "localhost";
 $User = "root";
 $pass = "";
 $db = "parcial ppi";
 
 $conexion = mysqli_connect($host, $User, $pass, $db);

 if  (!$conexion) {
    echo "Conexion fallida";
    
 }


?>
