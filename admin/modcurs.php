<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Modificar curs');
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if (isset($_SESSION["user"])){
        if ($_POST) {
            $id = $_POST['id'];
            $nom = $_POST['nom_curs'];
            $desc = $_POST['desc_curs'];
            $hores = $_POST['hores_curs'];
            $dataini = $_POST['ini_curs'];
            $datafin = $_POST['fin_curs'];
            $DNI = $_POST['DNI_prof'];
            $sql = "UPDATE cursos SET nom_curs = '$nom', desc_curs = '$desc', hores_curs = $hores, ini_curs='$dataini', fin_curs='$datafin', DNI_prof='$DNI' WHERE codi_curs='$id'";
            $consulta = mysqli_query($conexion,$sql);
            if(!$consulta){
                comprobarConsulta($conexion,$sql,'modcurs.php');
            }else{
                redirect('cursadmin.php');
            }
        }else{
            if ($_REQUEST['id']){
                if (!$conexion){
                    mysqli_connect_error();
                }else{
                    $id = $_REQUEST['id'];
                    $sql = "SELECT * FROM cursos WHERE codi_curs = $id";
                    $consulta = mysqli_query($conexion,$sql);
                    if(!$consulta){
                        comprobarConsulta($conexion,$sql,'modcurs.php');
                    }else{
                        modificarCurs($conexion, $consulta);
                    }
                }
            }else{
                identificador('cursadmin.php');
            }
        }
    }else{
        validat('logadmin.php');
    }
closeHtml();








