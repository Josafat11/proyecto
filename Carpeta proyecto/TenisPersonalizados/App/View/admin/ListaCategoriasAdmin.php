<div>
    <link rel="stylesheet" href="App/Css/AdminUsuarios.css">
    <h1>Lista de Categorías</h1>
    <?php
    if (isset($_SESSION['mensaje'])) {
        echo '<div class="mensaje">' . $_SESSION['mensaje'] . '</div>';
        unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Categorias as $categoria): ?>
                <tr>
                    <td><?php echo $categoria['nombre']; ?></td>
                    <td><?php echo $categoria['descripcion']; ?></td>
                    <td>
                        <a href="?C=CategoriasController&M=EliminarCategoria&ID_Categoria=<?php echo $categoria['ID_Categoria']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="?C=CategoriasController&M=MostrarFormularioAgregarCategoria">Agregar Nueva Categoría</a>
</div>
