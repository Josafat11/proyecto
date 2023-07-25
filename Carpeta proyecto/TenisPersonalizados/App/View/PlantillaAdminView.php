<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modo Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="App/View/style.css">
    
</head>
<body class="bg-gray-100" background="nike-g9c0804f3a_1920.jpg">
    <!-- Barra de navegación -->
    <nav class="bg-gray-900 text-white py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold sneakart">SneakArt <span class="admin">Admin</span></h1>
                <ul>
                    <li><a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=ProductosController&M=ListaProductos" class="hover:text-gray-300">Productos</a></li>
                    <li><a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=CategoriasController&M=ListaCategoria" class="hover:text-gray-300">Categorias</a></li>
                    <li><a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=UserController&M=ListaUsuarios" class="hover:text-gray-300">UsuariosEdit</a></li>
                    <li><a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=HistorialComprasController&M=VerHistorialCompras" class="hover:text-gray-300">Historial Compras</a></li>
                    <?php
                    // Verificar si el usuario ha iniciado sesión
                    if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                        // Mostrar el nombre del usuario en la barra de navegación
                        echo '<li><span class="text-gray-300">¡Hola, ' . $_SESSION['Nombre'] . '!</span></li>';
                        // Agregar un enlace para cerrar la sesión
                        echo '<li><a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=UserController&M=Logout" class="hover:text-gray-300">Cerrar sesión</a></li>';
                    } else {
                        // Si el usuario no ha iniciado sesión, mostrar las opciones de registro e inicio de sesión
                        echo '<li><a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=SignLoginController&M=Registrarse" class="hover:text-gray-300">Registro</a></li>';
                        echo '<li><a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=SignLoginController&M=IniciarSesion" class="hover:text-gray-300">Iniciar sesión</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
<section class="content">
      <!--Aqui va a ir todo lo que querramos mostrar dentro de la plantilla -->
      <?php include_once($vista); ?>
    </section>
</body>
</html>
<script src="/main.js"></script>
