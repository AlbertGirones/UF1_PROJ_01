<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Menú alumnat');
    if($_POST){
        if(isset($_POST['filtre']) && $_POST['filtre'] != "") {
            $conexion = mysqli_connect("localhost","root","","infobdn");
            if (!$conexion){
                mysqli_connect_error();
            }
            else{
                $filtre = $_POST['filtre'];
                $sql = "SELECT * FROM cursos WHERE nom_curs LIKE '%$filtre%' AND visible LIKE 1";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'menualumne.php');
                }
                else{
                    menualumne($consulta);
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
                $sql = "SELECT * FROM cursos WHERE visible LIKE 1 AND ini_curs > '$data'";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'menualumne.php');
                }
                else{
                    menualumne($consulta);
                }
            }
        }
        else{
            validat('login.php');
        }
    }
closeHtml();