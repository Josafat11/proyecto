<!DOCTYPE html>
<html lang="es">
<head>
</head>
<body>
<link rel="stylesheet" href="App/Css/AdminUsuarios.css">
    <h1>Agregar Nuevo Producto</h1>
    <form action="index.php?C=ProductosController&M=GuardarProducto" method="POST" enctype="multipart/form-data">
        <!-- Campos del formulario -->
        <label for="categoria_id">Categoría:</label>
        <input type="text" name="categoria_id" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" required>
        <br>
        <label for="tallas_disponibles">Tallas Disponibles:</label>
        <input type="text" name="tallas_disponibles" required>
        <br>
        <!-- Campo para cargar la imagen -->
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" accept="image/*" required>
        <br>
        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Agregar Producto">
    </form>
    <!-- Enlace para volver a la lista de productos -->
    <a href="index.php?C=ProductosController&M=ListaProductos">Volver a la lista de productos</a>
</body>
</html>
