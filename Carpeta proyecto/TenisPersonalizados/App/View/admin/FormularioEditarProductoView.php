<!-- Formulario para editar el producto -->
<link rel="stylesheet" href="App/Css/AdminUsuarios.css">
<h1>Editar Producto</h1>
<form action="index.php?C=ProductosController&M=ActualizarProducto" method="POST" enctype="multipart/form-data">
    <!-- Campos del formulario con los valores actuales del producto -->
    <input type="hidden" name="ID_Producto" value="<?php echo $producto['ID_Producto']; ?>">
    <input type="hidden" name="imagen_actual" value="<?php echo $producto['imagen_url']; ?>">
    <label for="categoria_id">Categoría:</label>
    <input type="text" name="categoria_id" value="<?php echo $producto['categoria_id']; ?>" required>
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
    <br>
    <label for="precio">Precio:</label>
    <input type="number" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required>
    <br>
    <label for="tallas_disponibles">Tallas Disponibles:</label>
    <input type="text" name="tallas_disponibles" value="<?php echo $producto['tallas_disponibles']; ?>" required>
    <br>
    <!-- Campo para seleccionar una nueva imagen -->
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen">
    <br>
    <!-- Botón para enviar el formulario -->
    <input type="submit" value="Actualizar Producto">
</form>
<!-- Enlace para volver a la lista de productos -->
<a href="index.php?C=ProductosController&M=ListaProductos">Volver a la lista de productos</a>
 