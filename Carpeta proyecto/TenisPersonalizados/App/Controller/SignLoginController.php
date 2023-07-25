<?php
session_start();
    class SignLoginController{
        private $vista;

        public function Registrarse(){
            $vista="App/View/IndexRegistrarseView.php";
            include_once("App/View/PlantillaPublicView.php");
        }

        public function IniciarSesion(){
            $vista="App/View/IndexIniciarSesionView.php";
            include_once("App/View/PlantillaPublicView.php");
        }


        

        
    }
?>