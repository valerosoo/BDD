<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style_register.css">
    <link rel="icon" href="Logo_Arskyv2.png">
</head>
<body>
    <main>
        <div id="div_borde_login">
            <div id="div_fondo_login">
            <h1>Registrarse</h1>
                <form id="formulario_login" action="conexion.php" method="post">
                     
                    <p>Nombre</p>
                    <input class="input_login" type="text" name ="Nombre" placeholder="Nombre">
                    <p>Apellido</p>
                    <input class="input_login" type="text" name= "Apellido" placeholder="Apellido">
                    <p>Documento</p>
                    <input class="input_login" type="number" name="Documento" placeholder="12345678">
                    <p>Fecha de nacimiento</p>
                    <input class="input_login" type="date" name="FechaNacimiento">
                    <p>Teléfono</p>
                    <input class="input_login" type="number" name="Telefono" placeholder="ex: 5491112345678">
                    <p>Contraseña</p>
                    <input class="input_login" type="password" name="Contrasenia" placeholder="Contraseña">
                    <div id="div_boton_login">
                        <button
                            style="box-shadow: inset 0 2px 4px 0 rgb(2 6 23 / 0.3), inset 0 -2px 4px 0 rgb(203 213 225);" type="submit"
                            class="inline-flex cursor-pointer items-center gap-1 rounded border border-slate-300 bg-gradient-to-b from-slate-50 to-slate-200 px-4 py-2 font-semibold hover:opacity-90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-300 focus-visible:ring-offset-2 active:opacity-100">Proceed
                        </button>
                    </div>
                    <p>Ya tengo una cuenta   <a href="Login_ArSky.php">iniciar sesión</a></p>
                </form>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>