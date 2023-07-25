<?php
class ProductModel {
    private $ProductConnection;

    public function __construct() {
        require_once('App/Config/DBConnection.php');
        $this->ProductConnection = new DBConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM v_productos"; 
        $connection = $this->ProductConnection->getConnection();
        $result = $connection->query($sql);
        $products = array();
        while ($product = $result->fetch_assoc()) {
            $products[] = $product;
        }
        $this->ProductConnection->closeConecction();
        return $products;
    }
    
    
    public function getById($id) {
        $connection = $this->ProductConnection->getConnection();
    
        // Llamamos al procedimiento almacenado usando un parámetro
        $sql = "CALL GetProductById(?)";
        
        // Preparamos la consulta
        $stmt = $connection->prepare($sql);
    
        // Asignamos el valor del parámetro
        $stmt->bind_param("i", $id);
    
        // Ejecutamos la consulta preparada
        $stmt->execute();
    
        // Obtenemos el resultado
        $result = $stmt->get_result();
        
        // Obtenemos el producto (si existe)
        $product = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : false;
    
        // Cerramos la consulta y la conexión
        $stmt->close();
        $this->ProductConnection->closeConecction();
    
        return $product;
    }
    

    public function insertProduct($categoria_id, $nombre, $precio, $tallas_disponibles, $imagen_url) {
        // Escapar los datos (opcional si ya se asegura contra inyección SQL de otra forma)
        $nombre = $this->ProductConnection->escapeString($nombre);
        $precio = $this->ProductConnection->escapeString($precio);
        $tallas_disponibles = $this->ProductConnection->escapeString($tallas_disponibles);
        $imagen_url = $this->ProductConnection->escapeString($imagen_url);
    
        // Llamamos al procedimiento almacenado usando parámetros
        $sql = "CALL InsertProduct(?, ?, ?, ?, ?)";
    
        // Obtenemos la conexión
        $connection = $this->ProductConnection->getConnection();
    
        // Preparamos la consulta
        $stmt = $connection->prepare($sql);
    
        // Asignamos los valores de los parámetros
        $stmt->bind_param("isdss", $categoria_id, $nombre, $precio, $tallas_disponibles, $imagen_url);
    
        // Ejecutamos el procedimiento almacenado
        $success = $stmt->execute();
    
        // Cerramos la consulta y la conexión
        $stmt->close();
        $this->ProductConnection->closeConecction();
    
        return $success;
    }
    

    public function updateProduct($id, $categoria_id, $nombre, $precio, $tallas_disponibles, $imagen_url) {
        // Escapar los datos (opcional si ya se asegura contra inyección SQL de otra forma)
        $nombre = $this->ProductConnection->escapeString($nombre);
        $precio = $this->ProductConnection->escapeString($precio);
        $tallas_disponibles = $this->ProductConnection->escapeString($tallas_disponibles);
        $imagen_url = $this->ProductConnection->escapeString($imagen_url);
    
        // Llamamos al procedimiento almacenado usando parámetros
        $sql = "CALL UpdateProduct(?, ?, ?, ?, ?, ?)";
    
        // Obtenemos la conexión
        $connection = $this->ProductConnection->getConnection();
    
        // Preparamos la consulta
        $stmt = $connection->prepare($sql);
    
        // Asignamos los valores de los parámetros
        $stmt->bind_param("iisdds", $id, $categoria_id, $nombre, $precio, $tallas_disponibles, $imagen_url);
    
        // Ejecutamos el procedimiento almacenado
        $success = $stmt->execute();
    
        // Cerramos la consulta y la conexión
        $stmt->close();
        $this->ProductConnection->closeConecction();
    
        return $success;
    }
    

    public function deleteProduct($id) {
        // Llamamos al procedimiento almacenado usando parámetros
        $sql = "CALL DeleteProduct(?)";
    
        // Obtenemos la conexión
        $connection = $this->ProductConnection->getConnection();
    
        // Preparamos la consulta
        $stmt = $connection->prepare($sql);
    
        // Asignamos el valor del parámetro
        $stmt->bind_param("i", $id);
    
        // Ejecutamos el procedimiento almacenado
        $success = $stmt->execute();
    
        // Cerramos la consulta y la conexión
        $stmt->close();
        $this->ProductConnection->closeConecction();
    
        return $success;
    }
    

    public function darDeBajaProducto($id) {
        // Llamamos al procedimiento almacenado usando parámetros
        $sql = "CALL DarDeBajaProducto(?)";
    
        // Obtenemos la conexión
        $connection = $this->ProductConnection->getConnection();
    
        // Preparamos la consulta
        $stmt = $connection->prepare($sql);
    
        // Asignamos el valor del parámetro
        $stmt->bind_param("i", $id);
    
        // Ejecutamos el procedimiento almacenado
        $success = $stmt->execute();
    
        // Cerramos la consulta y la conexión
        $stmt->close();
        $this->ProductConnection->closeConecction();
    
        return $success;
    }
    



    public function getProductosDadosDeBaja() {
        $sql = "SELECT * FROM vw_productos_dados_de_baja";
        $connection = $this->ProductConnection->getConnection();
        $result = $connection->query($sql);
        $productosDadosDeBaja = array();
        while ($producto = $result->fetch_assoc()) {
            $productosDadosDeBaja[] = $producto;
        }
        $this->ProductConnection->closeConecction();
        return $productosDadosDeBaja;
    }
    
    
    public function reactivarProducto($id)
{
    $connection = $this->ProductConnection->getConnection();
    $stmt = $connection->prepare("CALL sp_reactivar_producto(?)");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    $stmt->close();
    $this->ProductConnection->closeConecction();
    return $success;
}




    
    
    
}
?>
