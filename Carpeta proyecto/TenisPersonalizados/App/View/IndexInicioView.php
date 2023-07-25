<div>
    
  
    <!-- Cabecera -->
    <header class="bg-gray-200 py-12 text-black">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="App/View/plantillapublic.css">

        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold">¡Encuentra los mejores tenis!</h2>
            <p class="mt-4">Explora nuestra amplia selección de tenis de las mejores marcas y encuentra el par perfecto para ti.</p>
            <p class="mt-4">!Registrate ahora¡ y conoce los mejores productos de la app.</p>
            <a href="http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=SignLoginController&M=Registrarse" class="mt-6 inline-block bg-indigo-500 text-white px-6 py-3 rounded-lg hover:bg-indigo-600">Registrarse</a>
        </div>
    </header>

    <!-- Sección de productos destacados -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4" >
            <h2 class="text-3xl font-bold mb-8" >Productos destacados</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                <div class="bg-gray-100 rounded-lg shadow-lg p-4">
                    <img src="App/Src/gato1.jpeg" alt="Tenis 1" class="w-full h-48 object-cover mb-4">
                    <h3 class="text-xl font-bold">Feline Love</h3>
                    <p class="text-gray-700">$500.00 MX</p>
                    <a href="#" class="mt-4 inline-block bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Agregar al carrito</a>
                </div>
                <div class="bg-gray-100 rounded-lg shadow-lg p-4">
                    <img src="App/Src/gato2.jpg" alt="Tenis 2" class="w-full h-48 object-cover mb-4">
                    <h3 class="text-xl font-bold">Mad Kitty</h3>
                    <p class="text-gray-700">$450.00 MX</p>
                    <a href="#" class="mt-4 inline-block bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Agregar al carrito</a>
                </div>
                <div class="bg-gray-100 rounded-lg shadow-lg p-4">
                    <img src="App/Src/llamas.jpg" alt="Tenis 3" class="w-full h-48 object-cover mb-4">
                    <h3 class="text-xl font-bold">Ignition Steps</h3>
                    <p class="text-gray-700">$270.00 MX</p>
                    <a href="#" class="mt-4 inline-block bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Agregar al carrito</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de información adicional -->
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">¿Por qué elegirnos?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                
                <div>
                    <h3 class="text-xl font-bold mb-4">Amplia selección</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor efficitur libero, nec placerat lacus pellentesque nec.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Envío rápido</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor efficitur libero, nec placerat lacus pellentesque nec.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Atención al cliente</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor efficitur libero, nec placerat lacus pellentesque nec.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto px-4">
            <p class="text-center">© <?php echo date('Y'); ?> Venta de Tenis. Todos los derechos reservados.</p>
        </div>
    </footer>

</div>
