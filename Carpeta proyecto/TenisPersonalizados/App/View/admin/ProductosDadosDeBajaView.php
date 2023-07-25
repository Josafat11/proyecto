<div>
    <link rel="stylesheet" href="App/Css/AdminUsuarios.css">
    <h1>Productos Dados de Baja</h1>
    <?php if (count($productosDadosDeBaja) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>ID</th>
                    <th>Precio</th>
                    <th>Tallas Disponibles</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productosDadosDeBaja as $producto): ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['ID_Producto']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['tallas_disponibles']; ?></td>
                        <td>
                            <img src="<?php echo $producto['imagen_url']; ?>" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>
                            <!-- Enlace para reactivar el producto -->
                            <a href="index.php?C=ProductosController&M=ReactivarProducto&ID_Producto=<?php echo $producto['ID_Producto']; ?>">Reactivar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron productos dados de baja.</p>
    <?php endif; ?>
</div>
