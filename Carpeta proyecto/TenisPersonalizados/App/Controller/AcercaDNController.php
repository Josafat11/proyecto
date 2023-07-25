<?php
session_start();
//definimos la clase controlador por default que se invoca al inicio de la app
    class AcercaDNController{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        
        // definimos el metodo index de nuestro controlador 
        public function Nosotros(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="App/View/IndexAcercaDNView.php";
            //incluimos a la plantilla 
            include_once("App/View/PlantillaRegistradoView.php");
        }

        public function NosotrosNoRegistrado(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="App/View/IndexAcercaDNView.php";
            //incluimos a la plantilla 
            include_once("App/View/PlantillaPublicView.php");
        }

    }
?>