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
        $sql = "INSERT INTO matricula (DNI_alum, curso, nota)VALUES ('$dni', $id, 0)";
        $consulta = mysqli_query($conexion,$sql);
        if (!$consulta){
            comprobarConsulta($conexion,$sql,'inscalumne.php');
        }else{
            redirect('cursosdisp.php');
        }
    }
}else{
    validat('login.php');
}