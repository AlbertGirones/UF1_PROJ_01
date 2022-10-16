<?php
require_once 'functions/funciones.php';
session_start();
if (isset($_SESSION["user"])){
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if (!$conexion){
        mysqli_connect_error();
    }else{
        $id = $_GET["id"];
        $sql = "UPDATE professors SET visible='0' WHERE DNI='$id'";
        $consulta = mysqli_query($conexion,$sql);
        if (!$consulta){
            comprobarConsulta($conexion,$sql,'delprofe.php');
        }else{
            redirect('profeadmin.php');
        }
    }
}else{
    validat('logadmin.php');
}