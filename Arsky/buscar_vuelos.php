<?php
session_start();

$origen = $_POST['origen'];
$destino = $_POST['destino'];
$dia_salida = $_POST['dia_salida'];
$dia_llegada = $_POST['dia_llegada'];
$clase = $_POST['clase'];
$fechas_flex = isset($_POST['fechas_flex']);

$servername = "127.0.0.1"; 
$username = "alumno";      
$password = "alumnoipm";            
$database = "ARSKY";

// Crea una conexión a la base de datos
$conexion = mysqli_connect($servername, $username, $password, $database);

// Verifica la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($fechas_flex)){
        $fechas_flex='false';
    }
    if(!$fechas_flex){
        $rta_sin_flex=mysqli_query($conexion, "SELECT * FROM Vuelo where '$origen'=Origen and '$destino'=Destino and '$dia_salida'=Fecha_Salida and '$dia_llegada'=Fecha_Llegada");
        echo $rta_sin_flex;
    }

    mysqli_query($conexion, "INSERT INTO Destinos_Populares (destino, total_busquedas) VALUES ('$destino', 1) ON DUPLICATE KEY UPDATE total_busquedas = total_busquedas + 1");
}


?>