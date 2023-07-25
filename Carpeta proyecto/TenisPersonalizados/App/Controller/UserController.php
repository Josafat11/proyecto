<?php
    session_start();
require_once("App/Model/UserModel.php");
class UserController
{
    private $vista;
    private $modelo;

    public function Index()
    {
            $vista = "App/View/IndexInicioView.php";
            include_once("App/View/PlantillaRegistradoView.php");

    }
    public function IndexNoRegistrado()
    {
            $vista = "App/View/IndexInicioView.php";
            include_once("App/View/PlantillaPublicView.php");

    }



    //creamos el metodo para agregar un usuario
    public function Add()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $datos = array(
            'nombre' => $_POST['nombre'],
            'apellido_paterno' => $_POST['apaterno'],
            'apellido_materno' => $_POST['amaterno'],
            'email' => $_POST['email'],
            'telefono' => $_POST['tel'],
            'usuario' => $_POST['user'],
            'password' => $_POST['password'] // No incluir en la URL
        ); 

        $modelo = new UserModel();
        $modelo->insert($datos);

        // Guardar los datos del usuario en la sesión para usarlos en Login()
        $_SESSION['user_data'] = $datos;

        header("Location: http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=UserController&M=Login");
    }
}



    //creamos el metodo para editar un usuario
    public function Edit()
{
    //verificamos que el metodo de envio de datos sea POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //almacenamos los datos enviados por el formulario en un arreglo
        $datos = array(
            'ID_Usuario' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'apellido_paterno' => $_POST['apaterno'],
            'apellido_materno' => $_POST['amaterno'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono'],
            'usuario' => $_POST['usuario'],
            'password' => $_POST['password']
        );
        //llamamos al metodo del modelo que actualiza los datos del usuario
        $modelo = new UserModel();
        $modelo->update($datos);
        //redireccionamos al index de usuarios
        header("Location: http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=UserController&M=ListaUsuarios");
    }
}


public function Login()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener datos del usuario desde la base de datos
        $this->modelo = new UserModel();
        $usuario = $this->modelo->getCredentials($_POST['username'], $_POST['password']);

        if ($usuario == false) {
            $error = "Usuario no existente";
            $vista = "App/View/IndexInicioView.php";
            include_once("App/View/PlantillaPublicView.php");
        } else {
            $_SESSION['logedin'] = true;
            $_SESSION['Nombre'] = $usuario['nombre'] . ' ' . $usuario['apellido_materno'] . ' ' . $usuario['apellido_paterno'];
            
            if ($usuario['rol'] == 'admin') {
                $_SESSION['admin'] = true;
                
                $vista = "App/View/admin/HolaAdmin.php";
                include_once("App/View/PlantillaAdminView.php");
            } else {
                $vista = "App/View/IndexInicioRegistradoView.php";
                include_once("App/View/PlantillaRegistradoView.php");
            }
        }
    } else {
        // Si hay datos de usuario en la sesión, usarlos para realizar el inicio de sesión automático
        if (isset($_SESSION['user_data'])) {
            $this->modelo = new UserModel();
            $usuario = $this->modelo->getCredentials($_SESSION['user_data']['usuario'], $_SESSION['user_data']['password']);

            if ($usuario == false) {
                $vista = "App/View/IndexInicioView.php";
                include_once("App/View/PlantillaPublicView.php");
            } else {
                $_SESSION['logedin'] = true;
                $_SESSION['Nombre'] = $usuario['nombre'] . ' ' . $usuario['apellido_materno'] . ' ' . $usuario['apellido_paterno'];
                
                if ($usuario['rol'] == 'admin') {
                    $_SESSION['admin'] = true;
                    $vista = "App/View/admin/HolaAdmin.php";
                    
                    include_once("App/View/PlantillaAdminView.php");
                } else {
                    $vista = "App/View/IndexInicioRegistradoView.php";
                    include_once("App/View/PlantillaRegistradoView.php");
                }
            }

            // Una vez que se haya realizado el inicio de sesión automático, elimina los datos del usuario de la sesión
            unset($_SESSION['user_data']);
        }
    }
}


    public function Logout()
    {
        // Iniciar o reanudar la sesión
        session_start();

        // Destruir todas las variables de sesión
        session_unset();

        // Destruir la sesión
        session_destroy();

        // Redirigir a la página de inicio o a donde desees después del cierre de sesión
        header("Location: http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=UserController&M=IndexNoRegistrado");
        exit;
    }
    

public function ListaUsuarios()
{
        $this->modelo = new UserModel();
        $usuarios = $this->modelo->getAll();
        $vista = "App/View/admin/UsuariosAdminView.php";
        include_once("App/View/PlantillaAdminView.php");
}

// ...

public function EditarUsuario()
{
        $idUsuario = $_GET['ID_Usuario']; // Corregir el nombre del parámetro
        $this->modelo = new UserModel();
        $usuario = $this->modelo->getById($idUsuario);
        $vista = "App/View/admin/EditarUsuarioAdminView.php";
        include_once("App/View/PlantillaAdminView.php");
}

public function EliminarUsuario()
{
    session_start();
    if (isset($_SESSION['admin']) && $_SESSION['admin']) {
        $idUsuario = $_GET['ID_Usuario'];
        $this->modelo = new UserModel();
        $eliminado = $this->modelo->delete($idUsuario);
        if ($eliminado) {
            // Mostrar mensaje de éxito de eliminación
            $_SESSION['mensaje'] = "El usuario ha sido eliminado exitosamente.";
            header("Location:http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=UserController&M=ListaUsuarios");
        } else {
            // Mostrar mensaje de error de eliminación
            session_start();
            $_SESSION['mensaje'] = "Error al eliminar el usuario. Inténtalo nuevamente.";
        }
    } else {
        // Si no es un administrador, redirigimos al área pública o mostramos un mensaje de error
        include_once("App/View/PlantillaRegistradoView.php");
    }
}


// ...




}

?>