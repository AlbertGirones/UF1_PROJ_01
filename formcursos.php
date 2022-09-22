<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Afegir curs');
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if (isset($_SESSION["user"])){
        if ($_POST) {
            if (!$conexion){
                mysqli_connect_error();
            }else{
                $nom_curs = $_POST['nom_curs'];
                $desc_curs = $_POST['desc_curs'];
                $hores_curs = $_POST['hores_curs'];
                $ini_curs = $_POST['ini_curs'];
                $fin_curs = $_POST['fin_curs'];
                $DNI_prof = $_POST['DNI_prof'];
                $onoff = $_POST['onoff'];
                $sql = "INSERT INTO cursos VALUES ('', '$nom_curs', '$desc_curs', '$hores_curs', '$ini_curs', '$fin_curs', '$DNI_prof', '$onoff')";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'formcursos.php');
                }else{
                    redirect('cursadmin.php');
                }
            }
        }else{
            $sql = "SELECT DNI,nom_prof,cog_prof FROM professors";
            $consulta = mysqli_query($conexion,$sql);
            formularioCursos($consulta);
        }
    }else{
        validat('logadmin.php');
    }
closeHtml();