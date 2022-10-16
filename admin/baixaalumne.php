<?php
require_once 'functions/funciones.php';
session_start();
if (isset($_SESSION["user"])){
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if (!$conexion){
        mysqli_connect_error();
    }else{
        $id = $_GET["id"];
        $dni = $_SESSION["user"];
        $sql = "DELETE FROM matricula WHERE DNI_alum = '$dni' AND curso = $id ";
        $consulta = mysqli_query($conexion,$sql);
        if (!$consulta){
            comprobarConsulta($conexion,$sql,'baixaalumne.php');
        }else{
            redirect('elmeuscursos.php');
        }
    }
}else{
    validat('login.php');
}