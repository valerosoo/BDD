<?php
// Obtiene los datos del formulario
$cliente_documento = $_POST['Documento'] ?? '';
$cliente_contrasenia = $_POST['Contraseniaphp'] ?? '';

// Verifica si los campos están vacíos
if (empty($cliente_documento) || empty($cliente_contrasenia)) {
    echo "<h1>Todos los campos son obligatorios.</h1>";
    echo "<p>Por favor, completa todos los campos.</p>";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'Login_ArSky.php'; // Redirigir al formulario
            }, 3000);
          </script>";   
    exit();
}

// Configuración de la base de datos
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

$res = mysqli_query($conexion, "SELECT Contrasenia, Nombre, Apellido FROM Cliente WHERE DNI = $cliente_documento");
$fila = mysqli_fetch_assoc($res);   
$hashed_password = $fila["Contrasenia"];
$cliente_nombre = $fila["Nombre"];
$cliente_apellido = $fila["Apellido"];
// Verifica si la contraseña es correcta
if ($hashed_password && password_verify($cliente_contrasenia, $hashed_password)) {
    session_start();
    $_SESSION['DNI'] = $cliente_documento; // Guarda el DNI en la sesión
    $_SESSION['Nombre'] = $cliente_nombre;
    $_SESSION['Apellido'] = $cliente_apellido;
    ?>
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Redirigiendo...</title>
        <link href="login6.css" rel="stylesheet">
    </head>
    <body>
    <main>
        <div id='div_borde_login'>
            <div id='div_fondo_login'>
                <p>¡Inicio de sesión exitoso! Redirigiendo...</p>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 3000);
        </script>
    </main>  
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error de Inicio</title>
        <link href="login6.css" rel="stylesheet">
    </head>
    <body>
    <main>
        <div id='div_borde_login'>
            <div id='div_fondo_login'>
                <h1>No existe ninguna cuenta con ese documento o la contraseña es incorrecta.</h1>
                <p>Haga clic <a href="Register_ArSky.php">aquí</a> para registrarse</p>
                <p>Haga clic <a href="Login_ArSky.php">aquí</a> para intentar iniciar sesión de nuevo</p>
            </div>
        </div>
    </main>  
    </body>
    </html>
    <?php
}
?>
