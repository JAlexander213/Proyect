<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro - EcoConciencia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="pag1">
    <div class="contenedor">
        <div class="tarjeta" id="tarjeta">
            <div class="frente">
                <h2 class="Titulo">Iniciar Sesión</h2>
                <form action="procesar.php" method="POST">
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit" name="login" id="btnEntrar">Entrar</button>
                </form>
                <p class="cambiar-form" onclick="voltearTarjeta()">¿No tienes cuenta? Regístrate</p>
            </div>
            <div class="atras">
                <h2 class="Titulo">Registrarse</h2>
                <form action="procesar.php" method="POST">
                    <input type="text" name="nombre" placeholder="Nombre Completo" required>
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                    <input type="text" name="usuario" placeholder="Usuario" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit" name="register" id="btnRegistrar">Registrarse</button>
                </form>
                <p class="cambiar-form" onclick="voltearTarjeta()">¿Ya tienes cuenta? Inicia sesión</p>
            </div>
        </div>
    </div>

    <script>
        function voltearTarjeta() {
            document.getElementById('tarjeta').classList.toggle('volteado');
        }
    </script>
</body>
</html>
