<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Modificar nota');
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if (isset($_SESSION["user"])){
        if ($_POST) {
            $DNI = $_POST['DNI'];
            $idcurs = $_POST['idcurs'];
            $nota = $_POST['nota'];
            $sql = "UPDATE matricula SET nota = $nota WHERE DNI_alum = '$DNI' AND curso = $idcurs";
            $consulta = mysqli_query($conexion,$sql);
            if(!$consulta){
                comprobarConsulta($conexion,$sql,'editnota.php');
            }else{
                redirect("elsmeusalumnes.php?id=".$idcurs."");
            }
        }else{
            if ($_REQUEST['DNI_alum']){
                if (!$conexion){
                    mysqli_connect_error();
                }else{
                    $DNI = $_REQUEST["DNI_alum"];
                    $idcurs = $_REQUEST["idcurs"];
                    $nota = $_REQUEST["nota"];
                    $sql = "SELECT * FROM alumnes AS a INNER JOIN matricula AS m ON a.DNI = m.DNI_alum WHERE m.curso = $idcurs";
                    $consulta = mysqli_query($conexion,$sql);
                    if(!$consulta){
                        comprobarConsulta($conexion,$sql,'editnota.php');
                    }else{
                        modificarNota($consulta,$DNI,$idcurs,$nota);
                    }
                }
            }else{
                identificador('elsmeusalumnes.php');
            }
        }
    }else{
        validat('login.php');
    }
closeHtml();