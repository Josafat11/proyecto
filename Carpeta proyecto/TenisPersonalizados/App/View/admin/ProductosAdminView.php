<!-- ProductosAdminView.php -->
<div>
<link rel="stylesheet" href="App/Css/AdminUsuarios.css">
    <h1>Lista de Productos</h1>
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
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tallas Disponibles</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <?php if ($producto['tallas_disponibles'] >= 1): ?>
                    <tr>
                        <td><?php echo $producto['ID_Producto']; ?></td>
                        <td><?php echo $producto['categoria_id']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['tallas_disponibles']; ?></td>
                        <td><img src="<?php echo $producto['imagen_url']; ?>" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;"></td>
                        <td>
                            <a href="?C=ProductosController&M=MostrarFormularioEditar&ID_Producto=<?php echo $producto['ID_Producto']; ?>">Editar</a>
                            <a href="?C=ProductosController&M=DarDeBajaProducto&ID_Producto=<?php echo $producto['ID_Producto']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Dar de Baja</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="?C=ProductosController&M=MostrarFormularioAgregar">Agregar Producto</a>
    <a href="?C=ProductosController&M=ProductosDadosDeBaja">Ver Productos Dados de Baja</a>
</div>
