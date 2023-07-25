<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Tenis Personalizados</title>
</head>
<body id="my-body">
  <div class="container">
    <header>
      <div class="dropdown">
        <button class="dropdown-btn">Categorías de Tenis</button>
        <ul class="dropdown-content">
          <?php foreach ($categorias as $categoria): ?>
            <li><a href="#categoria<?php echo $categoria['ID_Categoria']; ?>"><?php echo $categoria['nombre']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </header>
    <main>
      <?php foreach ($categorias as $categoria): ?>
        <section id="categoria<?php echo $categoria['ID_Categoria']; ?>" class="categoria">
          <div class="categoria-header">
            <h2><?php echo $categoria['nombre']; ?></h2>
            <p><?php echo $categoria['descripcion']; ?></p>
          </div>
          <div class="productos">
            <?php foreach ($productos as $producto): ?>
              <?php if ($producto['categoria_id'] == $categoria['ID_Categoria'] && $producto['tallas_disponibles'] >= 1): ?>
                <div class="producto">
                  <img src="<?php echo $producto['imagen_url']; ?>" alt="<?php echo $producto['nombre']; ?>">
                  <div class="producto-info">
                    <h3><?php echo $producto['nombre']; ?></h3>
                    <p>Tallas disponibles: <?php echo $producto['tallas_disponibles']; ?></p>
                    <p>Precio: $<?php echo $producto['precio']; ?></p>
                    <a href="#">Agregar al carrito</a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endforeach; ?>
    </main>
    <footer>
      <p>&copy; <?php echo date('Y'); ?> Tenis Personalizados. Todos los derechos reservados.</p>
    </footer>
  </div>
  <script>
    // Script para manejar el botón desplegable
    const dropdownBtn = document.querySelector('.dropdown-btn');
    const dropdownContent = document.querySelector('.dropdown-content');

    dropdownBtn.addEventListener('click', function() {
      dropdownContent.classList.toggle('show');
    });
  </script>
</body>
</html>
