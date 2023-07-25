<?php
// Nuestra clase para la conexión a la base de datos
class DBConnection {
    // Crear un atributo para manipular la base de datos
    private $connection;

    // Definimos el constructor de la clase y en este conectamos con la base
    public function __construct() {
        // Requerir los datos o credenciales de conexión a la base de datos
        require_once('App/Config/config.php');
        // Creamos la instancia de la conexión a la base de datos
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // Manejo de errores
        if ($this->connection->connect_error) {
            die('Error al conectar con la base de datos: ' . $this->connection->connect_error);
        }
    }

    // Creamos un método para obtener la conexión
    public function getConnection() {
        return $this->connection;
    }

    // Método para escapar cadenas de texto
    public function escapeString($string) {
        return $this->connection->real_escape_string($string);
    }

    // Creamos nuestro método para desconectar la base de datos
    public function closeConecction() {
        $this->connection->close();
    }
}
?>
