<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aerolineas ArSky</title>
    <link href="index11.css" rel="stylesheet">
    <link rel="icon" href="Logo_Arskyv2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="animation-container">
        <img src="Logo_Arskyv2.png" alt="Logo" id="animation-logo">
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    // Agrega la clase 'no-scroll' al body para evitar el scroll
    document.body.classList.add('no-scroll');
    
    // Espera que la animación termine
    const animationContainer = document.getElementById('animation-container');
    
    // Escuchar el evento de finalización de la animación
    animationContainer.addEventListener('animationend', function() {
        // Remover la clase 'no-scroll' y añadir 'loaded'
        document.body.classList.remove('no-scroll');
        document.body.classList.add('loaded');
        
        // Ocultar el contenedor de la animación
        animationContainer.style.display = 'none';
    });
});

    </script>
<header>
    <div id="img_div">
        <img id="img_logo" src="Logo_Arskyv2.png">
    </div>
    <div class="arsky_text">
        <p>Argentina</p>
        <p>Skyes</p>
    </div>
    <div id="div_bloque_celeste_header">
        <a class="a" href="calendario.php">Mis Vuelos</a>
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
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-inner">
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
      <div class="carousel-item active">
        <img src="https://aeropuertoelcalafate.com/contenido/SLIDE58d95110f2353.jpg" class="d-block">
      </div>
      <div class="carousel-item">
        <img src="https://resizer.iproimg.com/unsafe/1280x720/filters:format(webp)/assets.iprofesional.com/assets/jpeg/2024/03/568979_landscape.jpeg" class="d-block">
      </div>
      <div class="carousel-item">
        <img src="https://aviones.com/wp-content/uploads/2021/11/LV-CTC-Aerolineas-Argentinas-Aviacionline-1-scaled-boeing-750x375@2x.jpg" class="d-block">
      </div>
      
    </div>
    
    <div id="div_mis_vuelos">
    <h2>Buscar Vuelos</h2>
    <section id="Buscar_vuelos">
    <form id="form_buscar_vuelos" action="buscar_vuelos.php" method="POST">
        <div id="div_form_input">
            <div>
                <p class="buscar_vuelos_p">Origen:</p>
                <select class="input_login" class="input_login" name="origen" id="origen-select">
                <option value="" disabled selected>Seleccione una provincia</option>
                    <?php
                    $servername = "127.0.0.1"; 
                    $username = "alumno";      
                    $password = "alumnoipm";            
                    $database = "ARSKY";

                    $conn = new mysqli($servername, $username, $password, $database);
                    $sql = "SELECT Provincia FROM Sede";
                    $result = $conn->query($sql);
                    $conexion = mysqli_connect($servername, $username, $password, $database);
                    if (!$conexion) {
                      die("Connection failed: " . mysqli_connect_error());
                    }
                    if ($result->num_rows > 0) {
                        // Salida de cada fila
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row['Provincia']) . "'>" . htmlspecialchars($row['Provincia']) . "</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No hay provincias disponibles</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div>
                <p class="buscar_vuelos_p">Destino:</p>
                <select class="input_login" class="input_login" name="destino" id="origen-select">
                <option value="" disabled selected>Seleccione una provincia</option>
                    <?php
                    $servername = "127.0.0.1"; 
                    $username = "alumno";      
                    $password = "alumnoipm";            
                    $database = "ARSKY";

                    $conn = new mysqli($servername, $username, $password, $database);
                    $sql = "SELECT Provincia FROM Sede";
                    $result = $conn->query($sql);
                    $conexion = mysqli_connect($servername, $username, $password, $database);
                    if (!$conexion) {
                      die("Connection failed: " . mysqli_connect_error());
                    }
                    if ($result->num_rows > 0) {
                        // Salida de cada fila
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row['Provincia']) . "'>" . htmlspecialchars($row['Provincia']) . "</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No hay provincias disponibles</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div>
                <p class="buscar_vuelos_p">Día de salida</p>
                <input class="input_login" type="date" name="dia_salida">
            </div>
            <div>
                <p class="buscar_vuelos_p">Día de llegada</p>
                <input class="input_login" type="date" name="dia_llegada">
            </div>
            <div>
                <p class="buscar_vuelos_p">Clase</p>
                <select class="input_login" name="clase">
                    <option>Económica</option>
                    <option>Business</option>
                    <option>VIP</option>
                </select>
            </div>
        </div>
        <div class="div_boton_fechas_flex">
            <p class="buscar_vuelos_p">Fechas flexibles</p>
            <input checked="true" type="checkbox" class="switch" name="fechas_flex">
        </div>
        <div>
            <button class="button">Send</button>
        </div>
    </form>
    </section>
    </div>
<div class="metodo-pago">
    <div id="texto-metodo-pago">
        <h1> Métodos de pago </h1>
    </div>
    <div id="img-pago">
        <img class="img-pago_img" src="mercadopago.png">
        <img class="img-pago_img" src="american-express.png">
        <img class="img-pago_img" src="visa.png">
        <img class="img-pago_img" src="mastercard.png">

    </div>
</div>

<div id="dest-pop-1">
    <?php
    // Consulta para obtener el destino más popular
    $sql = "SELECT destino, descripcion, imagen FROM Destinos_Populares ORDER BY total_busquedas DESC LIMIT 1";
    $result = $conexion->query($sql);

    // Verifica si hay resultados
    if ($result && $row = $result->fetch_assoc()) {?>
        <div class="card" style="width: 18rem;">
        <img src="<?php $row['imagen'] ?>">
        <div class="card-body">
            <h5 class="card-title"><?php $row['destino'] ?></h5>
            <p class="card-text"><?php $row['descripcion'] ?></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
    </div>
    <?php
    } else {
        echo "No hay destinos disponibles.";
    }
    ?>
</div>


<form action="send-email.php" method="post">
    <div id="div_novedades">
        <div>
            <h1>Mantente al tanto de</h1>
            <h1>novedades y descuentos</h1>
        </div>
        <div class="input-wrapper">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <g data-name="Layer 2">
                <g data-name="inbox">
                  <rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect>
                  <path d="M20.79 11.34l-3.34-6.68A3 3 0 0 0 14.76 3H9.24a3 3 0 0 0-2.69 1.66l-3.34 6.68a2 2 0 0 0-.21.9V18a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3v-5.76a2 2 0 0 0-.21-.9zM8.34 5.55a1 1 0 0 1 .9-.55h5.52a1 1 0 0 1 .9.55L18.38 11H16a1 1 0 0 0-1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 0-1-1H5.62z"></path>
                </g>
              </g>
            </svg>
            
            <input type="text" name="email" class="input" placeholder="info@gmail.com" />
          
            <button class="Subscribe-btn">
                Subscribe
              </button>      
        </div>
    </div>
</form>
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
    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html>