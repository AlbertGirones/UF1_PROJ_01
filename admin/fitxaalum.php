<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Fitxa - Alumnat');
    if (isset($_SESSION["user"]) && $_SESSION["rango"]=='A'){
        $conexion = mysqli_connect("localhost","root","","infobdn");
        if (!$conexion){
            mysqli_connect_error();
        }
        else{
            $user = $_SESSION["user"];
            $sql = "SELECT * FROM alumnes WHERE DNI = '$user'";
            $consulta = mysqli_query($conexion,$sql);
            if(!$consulta){
                comprobarConsulta($conexion,$sql,'fitxaalum.php');
            }
            else{
                fitxaalumne($consulta);
            }
        }
    }
    else{
        validat('login.php');
    }
closeHtml();