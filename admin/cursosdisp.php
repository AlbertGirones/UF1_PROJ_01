<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Cursos disponibles - Alumnat');
    if($_POST){
        if(isset($_POST['filtre']) && $_POST['filtre'] != "") {
            $conexion = mysqli_connect("localhost","root","","infobdn");
            if (!$conexion){
                mysqli_connect_error();
            }
            else{
                $filtre = $_POST['filtre'];
                $data = date ( 'Y-m-d' );
                $user = $_SESSION["user"];
                $sql = "SELECT * FROM cursos WHERE nom_curs LIKE '%$filtre%' AND visible LIKE 1 AND ini_curs > '$data' AND codi_curs NOT IN (SELECT curso FROM matricula WHERE DNI_alum = '$user')";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'cursosdisp.php');
                }
                else{
                    cursosdisponibles($consulta);
                }
            }
        }
    }
    else{
        if (isset($_SESSION["user"]) && $_SESSION["rango"]=='A'){
            $conexion = mysqli_connect("localhost","root","","infobdn");
            if (!$conexion){
                mysqli_connect_error();
            }
            else{
                $data = date ( 'Y-m-d' );
                $user = $_SESSION["user"];
                $sql = "SELECT * FROM cursos WHERE visible LIKE 1 AND ini_curs > '$data' AND codi_curs NOT IN (SELECT curso FROM matricula WHERE DNI_alum = '$user')";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'cursosdisp.php');
                }
                else{
                    cursosdisponibles($consulta);
                }
            }
        }
        else{
            validat('login.php');
        }
    }
closeHtml();