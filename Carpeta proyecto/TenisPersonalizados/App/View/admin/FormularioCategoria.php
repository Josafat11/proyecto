
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="App/Css/AdminUsuarios.css">
    <meta charset="UTF-8">
    <title>Agregar Categoría</title>
</head>
<body>
    <h1>Agregar Nueva Categoría</h1>
    <form action="?C=CategoriasController&M=AgregarCategoria" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <br>
        <input type="submit" value="Agregar Categoría">
    </form>
    <a href="?C=CategoriasController&M=ListaCategoria">Volver a la lista de categorías</a>
</body>
</html>
