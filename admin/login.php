<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Login');
    if ($_POST) {
        $conexion = mysqli_connect("localhost","root","","infobdn");
        if (!$conexion){
            mysqli_connect_error();
        }
        else{
            $user = $_POST['dni'];
            $passwd = $_POST['passwd'];
            $tipo = $_POST['rango'];
            $md5passwd = md5($passwd);
            if($tipo==='A'){
                $sql = "SELECT * FROM alumnes WHERE DNI = '$user' AND passwd_alum = '$md5passwd'";
                $consulta = mysqli_query($conexion,$sql);
                $alumne = mysqli_fetch_assoc($consulta);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'login.php');
                }
                else{
                    $linea = mysqli_num_rows($consulta);
                    if ($linea == 1){
                        $_SESSION["user"] = $user;
                        $_SESSION["rango"] = $tipo;
                        $_SESSION["foto"] = $alumne['foto_alum'];
                        $_SESSION["nom"] = $alumne['nom_alum'];
                        $_SESSION['cog'] = $alumne['cog_alum'];
                        redirect('cursosdisp.php');
                    }
                    else{
                        loginincorrecte('login.php');
                    }
                }
            }
            else{
                $sql = "SELECT * FROM professors WHERE DNI = '$user' AND passwd_prof = '$md5passwd' AND visible = 1";
                $consulta = mysqli_query($conexion,$sql);
                $profe = mysqli_fetch_assoc($consulta);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'login.php');
                }
                else{
                    $linea = mysqli_num_rows($consulta);
                    if ($linea == 1){
                        $_SESSION["user"] = $user;
                        $_SESSION["rango"] = $tipo;
                        $_SESSION["foto"] = $profe['foto_prof'];
                        $_SESSION["nom"] = $profe['nom_prof'];
                        $_SESSION['cog'] = $profe['cog_prof'];
                        redirect('menuprofesor.php');
                    }
                    else{
                        loginincorrecte('login.php');
                    }
                }
            }
        }
    }
    else{
        login();
    }
closeHtml();