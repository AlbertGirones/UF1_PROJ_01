<?php
require_once 'functions/funciones.php';
session_start();
if (isset($_SESSION["user"])){
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if (!$conexion){
        mysqli_connect_error();
    }else{
        $id = $_GET["id"];
        $sql = "UPDATE cursos SET visible='1' WHERE codi_curs='$id'";
        $consulta = mysqli_query($conexion,$sql);
        if (!$consulta){
            comprobarConsulta($conexion,$sql,'actcurs.php');
        }else{
            redirect('cursadmin.php');
        }
    }
}else{
    validat('logadmin.php');
}