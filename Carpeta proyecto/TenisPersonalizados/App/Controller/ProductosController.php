<?php
session_start();
include_once("App/Model/ProductModel.php");
include_once("App/Model/CategoryModel.php");

class ProductosController
{
    private $modelo;
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->modelo = new ProductModel();
    }

    public function Productos(){
        // Obtenemos los productos del modelo
        $categorias = $this->categoryModel->getAllCategories();
        $productos = $this->modelo->getAll();
        // Pasamos los productos a la vista
        //inicializamos a vista con lo que vamos a mostrar en la plantilla 
        $vista="App/View/IndexProductosView.php";
        //incluimos a la plantilla 
        include_once("App/View/PlantillaRegistradoView.php");
    }

    public function ListaProductos()
    {
        $productos = $this->modelo->getAll();
        $vista = "App/View/admin/ProductosAdminView.php";
        include_once("App/View/PlantillaAdminView.php");
    }

    public function MostrarFormularioAgregar()
    {
        // Mostrar el formulario para agregar un nuevo producto
        $vista = "App/View/admin/FormularioProductoView.php";
        include_once("App/View/PlantillaAdminView.php");
    }

    public function GuardarProducto()
{
    // Obtener los datos del formulario para guardar el nuevo producto
    $categoria_id = $_POST['categoria_id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tallas_disponibles = $_POST['tallas_disponibles'];

    // Procesar la imagen subida
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen_nombre = $_FILES['imagen']['name'];
        // Generar un nombre único para la imagen para evitar conflictos de nombres
        $imagen_destino = "App/Src/" . uniqid() . '_' . $imagen_nombre;
        // Mover la imagen desde la ubicación temporal al destino final
        if (move_uploaded_file($imagen_tmp, $imagen_destino)) {
            // La imagen se ha cargado correctamente
            $imagen_url = $imagen_destino;
        } else {
            // Hubo un error al cargar la imagen, puedes manejar esto según tus necesidades
        }
    }

    // Guardar el nuevo producto en la base de datos
    $success = $this->modelo->insertProduct($categoria_id, $nombre, $precio, $tallas_disponibles, $imagen_url);

    if ($success) {
        $_SESSION['mensaje'] = "Producto agregado correctamente";
    } else {
        $_SESSION['mensaje'] = "Error al agregar el producto";
    }

    // Redirigir a la lista de productos
    header("Location: index.php?C=ProductosController&M=ListaProductos");
    exit;
}


    public function MostrarFormularioEditar()
    {
        // Obtener el ID del producto desde el parámetro de la URL
        if (isset($_GET['ID_Producto'])) {
            $id_producto = $_GET['ID_Producto'];
            $producto = $this->modelo->getById($id_producto);
            if ($producto) {
                // Mostrar el formulario para editar el producto con los datos recuperados
                $vista = "App/View/admin/FormularioEditarProductoView.php";
                include_once("App/View/PlantillaAdminView.php");
            } else {
                $_SESSION['mensaje'] = "Producto no encontrado";
                // Redirigir a la lista de productos
                header("Location: index.php?C=ProductosController&M=ListaProductos");
                exit;
            }
        } else {
            // Redirigir a la lista de productos si no se proporcionó un ID válido
            header("Location: index.php?C=ProductosController&M=ListaProductos");
            exit;
        }
    }

    public function ActualizarProducto()
{
    // Obtener los datos del formulario para actualizar el producto
    $id_producto = $_POST['ID_Producto'];
    $categoria_id = $_POST['categoria_id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tallas_disponibles = $_POST['tallas_disponibles'];

    // Obtener la URL de la imagen actual almacenada en el campo oculto
    $imagen_url_actual = $_POST['imagen_actual'];

    // Procesar la imagen subida (si se proporcionó una nueva)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen_nombre = $_FILES['imagen']['name'];
        // Generar un nombre único para la imagen para evitar conflictos de nombres
        $imagen_destino = "App/Src/" . uniqid() . '_' . $imagen_nombre;
        // Mover la imagen desde la ubicación temporal al destino final
        if (move_uploaded_file($imagen_tmp, $imagen_destino)) {
            // La imagen se ha cargado correctamente
            $imagen_url_nueva = $imagen_destino;
        } else {
            // Hubo un error al cargar la imagen, puedes manejar esto según tus necesidades
            $imagen_url_nueva = ""; // Dejar la imagen actual sin cambios
        }
    } else {
        // No se proporcionó una nueva imagen, mantener la imagen actual
        $imagen_url_nueva = $imagen_url_actual;
    }

    // Actualizar el producto en la base de datos con la nueva información y la imagen actualizada
    $success = $this->modelo->updateProduct($id_producto, $categoria_id, $nombre, $precio, $tallas_disponibles, $imagen_url_nueva);

    if ($success) {
        $_SESSION['mensaje'] = "Producto actualizado correctamente";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el producto";
    }

    // Redirigir a la lista de productos
    header("Location: index.php?C=ProductosController&M=ListaProductos");
    exit;
}


    public function EliminarProducto()
    {
        // Obtener el ID del producto desde el parámetro de la URL
        if (isset($_GET['ID_Producto'])) {
            $id_producto = $_GET['ID_Producto'];
            $success = $this->modelo->deleteProduct($id_producto);
            if ($success) {
                $_SESSION['mensaje'] = "Producto eliminado correctamente";
            } else {
                $_SESSION['mensaje'] = "Error al eliminar el producto";
            }
        }

        // Redirigir a la lista de productos
        header("Location: index.php?C=ProductosController&M=ListaProductos");
        exit;
    }

    public function DarDeBajaProducto()
{
    // Obtener el ID del producto desde el parámetro de la URL
    if (isset($_GET['ID_Producto'])) {
        $id_producto = $_GET['ID_Producto'];
        $success = $this->modelo->darDeBajaProducto($id_producto);
        if ($success) {
            $_SESSION['mensaje'] = "Producto dado de baja correctamente";
        } else {
            $_SESSION['mensaje'] = "Error al dar de baja el producto";
        }
    }

    // Redirigir a la lista de productos
    header("Location: index.php?C=ProductosController&M=ListaProductos");
    exit;
}



    public function ProductosDadosDeBaja()
{
    $productosDadosDeBaja = $this->modelo->getProductosDadosDeBaja();
    $vista = "App/View/admin/ProductosDadosDeBajaView.php";
    include_once("App/View/PlantillaAdminView.php");
}

public function ReactivarProducto()
{
    // Obtener el ID del producto desde el parámetro de la URL
    if (isset($_GET['ID_Producto'])) {
        $id_producto = $_GET['ID_Producto'];
        $success = $this->modelo->reactivarProducto($id_producto);
        if ($success) {
            $_SESSION['mensaje'] = "Producto reactivado correctamente";
        } else {
            $_SESSION['mensaje'] = "Error al reactivar el producto";
        }
    }

    // Redirigir a la lista de productos dados de baja
    header("Location: index.php?C=ProductosController&M=ProductosDadosDeBaja");
    exit;
}





}
?>
