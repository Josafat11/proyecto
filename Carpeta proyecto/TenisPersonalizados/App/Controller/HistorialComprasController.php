<?php
session_start();

include_once("App/Model/HistorialComprasModel.php");

class HistorialComprasController
{
    private $modelo;
    private $vista;

    public function __construct()
    {
        $this->modelo = new HistorialComprasModel();
    }

    public function VerHistorialCompras()
    {
        // Obtener el historial de compras del usuario desde el modelo
        $historial = $this->modelo->getHistorialCompras();

        // Cargar la vista para mostrar el historial de compras
        $vista = "App/View/admin/HistorialComprasView.php";
        include_once("App/View/PlantillaAdminView.php");
    }

    public function EliminarHistorialCompra($historial_id)
{
    // Llama al método del modelo para eliminar el historial de compras por su ID
    $eliminado = $this->modelo->deleteHistorialCompra($historial_id);
    
    // Redirige al historial de compras después de eliminar el registro
    header("Location: http://localhost/Carpeta%20proyecto/TenisPersonalizados/?C=HistorialComprasController&M=VerHistorialCompras");
}

}
?>
