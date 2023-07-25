<?php
session_start();
//definimos la clase controlador por default que se invoca al inicio de la app
    class ContactoController{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        
        // definimos el metodo index de nuestro controlador 
        public function Contacto(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="App/View/IndexContactoView.php";
            //incluimos a la plantilla 
            include_once("App/View/PlantillaRegistradoView.php");
        }

        public function ContactoNoRegistrado(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="App/View/IndexContactoView.php";
            //incluimos a la plantilla 
            include_once("App/View/PlantillaPublicView.php");
        }

    }
?>