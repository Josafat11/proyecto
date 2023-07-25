<?php
class CategoryModel {
    private $CategoryConnection;

    public function __construct() {
        require_once('App/Config/DBConnection.php');
        $this->CategoryConnection = new DBConnection();
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM vw_get_all_categories";
        $connection = $this->CategoryConnection->getConnection();
        $result = $connection->query($sql);
        $categories = array();
        while ($category = $result->fetch_assoc()) {
            $categories[] = $category;
        }
        $this->CategoryConnection->closeConecction();
        return $categories;
    }

    public function insertCategory($nombre, $descripcion) {
        $nombre = $this->CategoryConnection->escapeString($nombre);
        $descripcion = $this->CategoryConnection->escapeString($descripcion);
        $sql = "CALL sp_insert_category('$nombre', '$descripcion')";
        $connection = $this->CategoryConnection->getConnection();
        $result = $connection->query($sql);
        $success = ($result === true);
        $this->CategoryConnection->closeConecction();
        return $success;
    }
    

    public function delete($id) {
        // Conectar a la base de datos
        $connection = $this->CategoryConnection->getConnection();
        
        // Llamar al procedimiento almacenado
        $sql = "CALL sp_delete_category($id)";
        $result = $connection->query($sql);
        
        // Cerrar la conexión
        $this->CategoryConnection->closeConecction();
        
        // Devolver true si se eliminó correctamente, false si ocurrió un error
        return ($result === true);
    }
    


}
?>
