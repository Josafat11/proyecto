<?php


class HistorialComprasModel
{
    private $historialConnection;

    public function __construct()
    {
        require_once("App/Config/DBConnection.php");
        $this->historialConnection=new DBConnection();
    }

    public function getHistorialCompras()
{
    // Consulta SQL para obtener el historial de compras del usuario desde la vista
    $sql = "SELECT * FROM vw_historial_compras";

    // Ejecutar la consulta
    $result = $this->historialConnection->getConnection()->query($sql);

    // Verificar si se obtuvieron resultados
    if ($result && $result->num_rows > 0) {
        $historial = array();
        // Convertir los resultados en un arreglo asociativo
        while ($row = $result->fetch_assoc()) {
            $historial[] = $row;
        }
        return $historial;
    } else {
        return array();
    }
}



public function deleteHistorialCompra($historial_id)
{
    // Llamada al procedimiento almacenado para eliminar el historial de compras por su ID
    $sql = "CALL sp_delete_historial_compra(" . $historial_id . ")";

    // Ejecutar la consulta
    $result = $this->historialConnection->getConnection()->query($sql);

    // Verificar si se eliminó correctamente
    if ($result) {
        return true; // Éxito
    } else {
        return false; // Error
    }
}



}
?>
