<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Modificar curs');
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if (isset($_SESSION["user"])){
        if ($_POST) {
            $DNI = $_POST['DNI'];
            $nom = $_POST['nom_prof'];
            $cognom = $_POST['cog_prof'];
            $titol = $_POST['titol_prof'];
            $sql = "UPDATE professors SET nom_prof = '$nom', cog_prof = '$cognom', titol_prof = '$titol' WHERE DNI = '$DNI'";
            $consulta = mysqli_query($conexion,$sql);
            if(!$consulta){
                comprobarConsulta($conexion,$sql,'modprofe.php');
            }else{
                redirect('profeadmin.php');
            }
        }else{
            if ($_REQUEST['id']){
                if (!$conexion){
                    mysqli_connect_error();
                }else{
                    $id = $_REQUEST['id'];
                    $sql = "SELECT * FROM professors WHERE DNI='$id'";
                    $consulta = mysqli_query($conexion,$sql);
                    if(!$consulta){
                        comprobarConsulta($conexion,$sql,'modprofe.php');
                    }else{
                        modificarProfessor($consulta);
                    }
                }
            }else{
                identificador('profeadmin.php');
            }
        }
    }else{
        validat('logadmin.php');
    }
closeHtml();