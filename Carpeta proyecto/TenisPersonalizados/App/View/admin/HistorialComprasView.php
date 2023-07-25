<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="App/Css/AdminUsuarios.css">
</head>
<body>
    <!-- Mostrar el historial de compras del usuario -->
    <h1>Historial de Compras</h1>
    <?php if (count($historial) > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>ID de Compra</th>
                    <th>ID de Usuario</th>
                    <th>ID de Producto</th>
                    <th>Fecha de Pedido</th>
                    <th>Estado de Pedido</th>
                    <th>ID de Dirección de Envío</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historial as $compra) { ?>
                    <tr>
                        <td><?php echo $compra['ID_HistorialPedido']; ?></td>
                        <td><?php echo $compra['usuario_id']; ?></td>
                        <td><?php echo $compra['producto_id']; ?></td>
                        <td><?php echo $compra['fecha_pedido']; ?></td>
                        <td><?php echo $compra['estado_pedido']; ?></td>
                        <td><?php echo $compra['direccion_envio_id']; ?></td>
                        <td>
                            <a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=HistorialComprasController&M=EliminarHistorialCompra&historial_id=<?php echo $compra['ID_HistorialPedido']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No se encontraron compras realizadas.</p>
    <?php } ?>
</body>
</html>
