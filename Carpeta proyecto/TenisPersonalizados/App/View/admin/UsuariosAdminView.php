<div>
    <link rel="stylesheet" href="App/Css/AdminUsuarios.css">
    <h1>Lista de Usuarios</h1>
    <?php
if (isset($_SESSION['mensaje'])) {
    echo '<div class="mensaje">' . $_SESSION['mensaje'] . '</div>';
    unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
}
?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['ID_Usuario']; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['apellido_paterno']; ?></td>
                    <td><?php echo $usuario['apellido_materno']; ?></td>
                    <td><?php echo $usuario['usuario']; ?></td>
                    <td><?php echo $usuario['rol']; ?></td>
                    <td>
                    <a href="?C=UserController&M=EditarUsuario&ID_Usuario=<?php echo $usuario['ID_Usuario']; ?>">Editar</a>
                    <a href="?C=UserController&M=EliminarUsuario&ID_Usuario=<?php echo $usuario['ID_Usuario']; ?> "onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
