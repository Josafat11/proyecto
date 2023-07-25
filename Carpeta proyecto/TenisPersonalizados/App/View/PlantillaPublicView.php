<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Tenis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="App/View/style.css">
    
</head>
<body class="bg-gray-100" background="nike-g9c0804f3a_1920.jpg">
    <!-- Barra de navegación -->
    <nav class="bg-gray-900 text-white py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold sneakart">SneakArt <span class="admin">Unete ¡ES GRATIS!</span></h1>
                <ul class="flex space-x-4">
                    <li><a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados" class="hover:text-gray-300">Inicio</a></li>
                    <li><a href="?C=AcercaDNController&M=NosotrosNoRegistrado" class="hover:text-gray-300">Acerca de nosotros</a></li>
                    <li><a href="?C=ContactoController&M=ContactoNoRegistrado" class="hover:text-gray-300">Contacto</a></li>
                    <li><a href="?C=SignLoginController&M=Registrarse" class="hover:text-gray-300">Registro</a></li>
                    <li><a href="?C=SignLoginController&M=IniciarSesion" class="hover:text-gray-300">Iniciar sesión</a></li>

                </ul>
            </div>
        </div>
    </nav>
<section class="content">
      <!--Aqui va a ir todo lo que querramos mostrar dentro de la plantilla -->
      <?php if (isset($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
      <?php include_once($vista); ?>
    </section>
</body>
</html>
<script src="/main.js"></script>
