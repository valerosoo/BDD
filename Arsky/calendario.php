<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="icon" type="image/png" href="Logo Arskyv2.png">
    <link rel="stylesheet" href="calendario.css">
</head>
<body>
    <header>
        <div id="img_div">
            <img id="img_logo" src="Logo_Arskyv2.png">
        </div>
        <div class="arsky_text">
            <p>Argentina</p>
            <p>Skyes</p>
        </div>
        <div id="div_bloque_celeste_header">
            <a class="a" href="">Mis Vuelos</a>
            <a class="a" href="">Destinos Populares</a>
            <a class="a" href="#Buscar_vuelos">Comprar Vuelos</a>
        </div>
        <div id="div_ayuda_header">
            <img src="https://cdn-icons-png.flaticon.com/512/0/827.png">
            <p>Ayuda</p>
        </div>
        <div id="div_bloque_celeste_header2">
            <?php
            $servername = "127.0.0.1"; 
            $username = "alumno";      
            $password = "alumnoipm";            
            $database = "ARSKY";
            $conexion = mysqli_connect($servername, $username, $password, $database);
            if (!$conexion) {
            die("Connection failed: " . mysqli_connect_error());
            }
            if(isset($_SESSION['DNI'])){
            ?> <a class="a" href="logout.php"><?php echo $_SESSION['Nombre']. "  " .$_SESSION['Apellido']; ?></a> <?php
            }
            else{
            ?>
            <a class="a" href="Login_ArSky.php">Iniciar sesion</a>
            <?php
            }
            ?>
        </div>
    </header>
    <main>
        <div class="div_centrar">
            <h1>Mis Vuelos</h1>
        </div>
        <div id="div_vuelos">
        <?php
            if (isset($_SESSION['DNI'])) {
                $dni = $_SESSION['DNI']; // Asumiendo que el DNI está almacenado en la sesión

                $sql = "SELECT Asiento_ID, Vuelo.* FROM Cliente join Compra on DNI=Cliente_ID join Boleto on Compra.ID=Compra_ID join Vuelo on Vuelo.ID = Vuelo_ID WHERE DNI = '$dni'"; // Asegúrate de que esta tabla y columna existen
                $result = mysqli_query($conexion, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="card">
                            <div class="card-details">
                                <p class="text-title">Origen: <?php echo $row['Origen']; ?></p>
                                <p class="text-title">Destino: <?php echo $row['Destino']; ?></p>
                                <p class="text-body">Hora salida: <?php echo $row['Fecha_Salida']; ?></p>
                                <p class="text-body">Hora llegada: <?php echo $row['Fecha_Llegada']; ?></p>
                                <p class="text-body">Asiento: <?php echo $row['Asiento_ID']; ?></p>
                                <p class="text-body">Código de vuelo: <?php echo $row['ID']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No tienes vuelos programados.</p>";
                }
            } else {
                echo "<p>Inicia sesión para ver tus vuelos.</p>";
            }
            ?>
        </div>
    </main>
    <footer>
        <div class="main_footer">
            <div class="div_footer">
                <h1>Somos Arsky</h1>
                <p class="text-footer">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Consequuntur molestiae qui eum dolorem, tenetur, possimus maxime veniam ex laboriosam
                perspiciatis ullam iusto, soluta consequatur saepe est. Qui voluptatum praesentium magni!</p>
                <a class="text-footer_a" href="www.google.com">¡Conocenos!</a> 
            </div>
            <div class="div_footer">
                <h1>FAQ</h1>
                <ul>
                    <li class="text-footer">ownviownvownvowenv</li>
                    <li class="text-footer">iowbndenienione</li>
                    <li class="text-footer">uorjiojijiodioior</li>
                    <li class="text-footer">ioouihef0hwo0ihied</li>
                    <li class="text-footer">qwuiobheòihw+0j</li>
                    <li class="text-footer">efniuweweoifni</li>
                </ul>
            </div>
            <div class="div_footer">
                <h1>Politicas, Terminos y Condiciones</h1>
                <p class="text-footer">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Eum impedit molestias, veritatis pariatur voluptatum quibusdam 
                doloremque nostrum neque autem culpa in quaerat animi earum 
                praesentium distinctio officiis vero dignissimos maxime!</p>
            </div>
        </div>
        <span class="redes-footer">
            <p class="text-body">¡Seguinos en nuestras redes!</p>
            <img src="instagram.png">
            <img src="twitter.png">
            <img src="facebook.png">
        </span>
    </footer>
</body>
</html>