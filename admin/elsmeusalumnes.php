<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Els meus cursos - Professorat');
if($_POST){
    if(isset($_POST['filtre']) && $_POST['filtre'] != "") {
        $conexion = mysqli_connect("localhost","root","","infobdn");
        if (!$conexion){
            mysqli_connect_error();
        }
        else{
            $filtre = $_POST['filtre'];
            $user = $_SESSION["user"];
            $idcurso = $_REQUEST['id'];
            $sql = "SELECT * FROM alumnes AS a INNER JOIN matricula AS m ON a.DNI = m.DNI_alum WHERE m.curso = $idcurso AND nom_curs LIKE '%$filtre%'";
            $consulta = mysqli_query($conexion,$sql);
            if(!$consulta){
                comprobarConsulta($conexion,$sql,'menuprofesor.php');
            }
            else{
                llistatAlumnes($consulta);
            }
        }
    }
}
else{
    if (isset($_SESSION["user"]) && $_SESSION["rango"]!='A'){
        $conexion = mysqli_connect("localhost","root","","infobdn");
        if ($_REQUEST['id']){
            if (!$conexion){
                mysqli_connect_error();
            }
            else{
                $user = $_SESSION["user"];
                $idcurso = $_REQUEST['id'];
                $sql = "SELECT * FROM alumnes AS a INNER JOIN matricula AS m ON a.DNI = m.DNI_alum WHERE m.curso = $idcurso";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'menuprofesor.php');
                }
                else{
                    llistatAlumnes($consulta);
                }
            }
        }
        else{
            identificador('elsmeusalumnes.php');
        }
    }
    else{
        validat('login.php');
    }
}
closeHtml();