<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Modificar dades - Alumnat');
$conexion = mysqli_connect("localhost","root","","infobdn");
if (isset($_SESSION["user"])){
    if ($_POST) {
        $DNI = $_POST['DNI'];
        $nom = $_POST['nom_alum'];
        $cognom = $_POST['cog_alum'];
        $edat = $_POST['edat_alum'];
        $correo = $_POST['correo_alum'];
        $sql = "UPDATE alumnes SET nom_alum = '$nom', cog_alum = '$cognom', edat_alum = $edat, correo_alum = '$correo' WHERE DNI = '$DNI'";
        $consulta = mysqli_query($conexion,$sql);
        if(!$consulta){
            comprobarConsulta($conexion,$sql,'fitxaalum.php');
        }else{
            redirect('fitxaalum.php');
        }
    }else{
        if ($_REQUEST['id']){
            if (!$conexion){
                mysqli_connect_error();
            }else{
                $id = $_REQUEST['id'];
                $sql = "SELECT * FROM alumnes WHERE DNI='$id'";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'fitxaalum.php');
                }else{
                    modificarAlumne($consulta);
                }
            }
        }else{
            identificador('fitxaalum.php');
        }
    }
}else{
    validat('login.php');
}
closeHtml();
