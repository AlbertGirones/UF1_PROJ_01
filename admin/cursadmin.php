<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Administració de cursos');
    if($_POST) {
        if (isset($_POST['filtre']) && $_POST['filtre'] != "") {
            $conexion = mysqli_connect("localhost", "root", "", "infobdn");
            if (!$conexion) {
                mysqli_connect_error();
            } else {
                $filtre = $_POST['filtre'];
                $sql = "SELECT * FROM cursos WHERE nom_curs LIKE '%$filtre%'";
                $consulta = mysqli_query($conexion, $sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'cursadmin.php');
                }
                else{
                    taulaCursos($consulta);
                }
            }
        }
    }
    else{
        if (isset($_SESSION["user"])){
            $conexion = mysqli_connect("localhost","root","","infobdn");
            if (!$conexion){
                mysqli_connect_error();
            }
            else{
                $sql = "SELECT * FROM cursos as c INNER JOIN professors as p ON c.DNI_prof=p.DNI WHERE p.visible = true";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'cursadmin.php');
                }
                else{
                    taulaCursos($consulta);
                }
            }
        }
        else{
            validat('logadmin.php');
        }
    }
closeHtml();
