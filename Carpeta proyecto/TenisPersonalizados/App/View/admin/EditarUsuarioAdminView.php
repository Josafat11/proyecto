<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="App/Css/AdminUsuarios.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <?php if ($usuario): ?>
        <form action="?C=UserController&M=Edit" method="post">
            <input type="hidden" name="id" value="<?php echo $usuario['ID_Usuario']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>"><br>
            <label for="apaterno">Apellido Paterno:</label>
            <input type="text" name="apaterno" value="<?php echo $usuario['apellido_paterno']; ?>"><br>
            <label for="amaterno">Apellido Materno:</label>
            <input type="text" name="amaterno" value="<?php echo $usuario['apellido_materno']; ?>"><br>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $usuario['email']; ?>"><br>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>"><br>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" value="<?php echo $usuario['usuario']; ?>"><br>
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $usuario['password']; ?>"><br>
            <!-- Agregar el resto de campos que se deseen editar -->
            <input type="submit" value="Actualizar Usuario">
        </form>
    <?php else: ?>
        <p>No se encontró el usuario.</p>
    <?php endif; ?>

    <!-- Enlace para volver a la página anterior -->
    <a href="?C=UserController&M=ListaUsuarios">Volver</a>
</body>
</html>
