<?php
session_start();
include_once("App/Model/CategoryModel.php");
class CategoriasController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }
    public function ListaCategoria()
    {
        $Categorias = $this->categoryModel->getAllCategories();
        $vista = "App/View/admin/ListaCategoriasAdmin.php";
        include_once("App/View/PlantillaAdminView.php");
    }
    public function MostrarFormularioAgregarCategoria()
    {
            $vista = "App/View/admin/FormularioCategoria.php";
            include_once("App/View/PlantillaAdminView.php");

    }


    public function AgregarCategoria() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario para agregar la nueva categoría
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            // Insertar la nueva categoría en la base de datos
            $success = $this->categoryModel->insertCategory($nombre, $descripcion);

            if ($success) {
                $_SESSION['mensaje'] = "Categoría agregada correctamente";
            } else {
                $_SESSION['mensaje'] = "Error al agregar la categoría";
            }

            // Redirigir a la lista de categorías
            header("Location:http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=CategoriasController&M=ListaCategoria");
            exit;
        } else {
            // Mostrar el formulario para agregar una nueva categoría
            $vista = "ruta/de/la/vista/de/formulario_de_categoria.php";
            include_once("ruta/de/la/vista/de/plantilla_admin.php");
        }
    }

    public function EliminarCategoria()
    {
        session_start();
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            if (isset($_GET['ID_Categoria'])) {
                $idCategoria = $_GET['ID_Categoria'];
                $eliminado = $this->categoryModel->delete($idCategoria);
                if ($eliminado) {
                    // Mostrar mensaje de éxito de eliminación
                    $_SESSION['mensaje'] = "La categoria ha sido eliminado exitosamente.";
                } else {
                    // Mostrar mensaje de error de eliminación
                    $_SESSION['mensaje'] = "Error al eliminar la categoría. Inténtalo nuevamente.";
                }
            } else {
                // Si no se proporciona el ID de la categoría, mostrar mensaje de error
                $_SESSION['mensaje'] = "No se ha proporcionado el ID de la categoría a eliminar.";
            }
        } else {
            // Si no es un administrador, redirigir al área pública o mostrar un mensaje de error
            include_once("App/View/PlantillaRegistradoView.php");
            return;
        }
        // Redirigir a la lista de categorías
        header("Location: http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=CategoriasController&M=ListaCategoria");
        exit;
    }

}


?>