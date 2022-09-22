<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Login administrador');
    if ($_POST) {
        $conexion = mysqli_connect("localhost","root","","infobdn");
        if (!$conexion){
            mysqli_connect_error();
        }
        else{
            $user = $_POST['user'];
            $passwd = $_POST['passwd'];
            $md5passwd = md5($passwd);
            $sql = "SELECT * FROM admin WHERE user = '$user' AND passwd = '$md5passwd'";
            $consulta = mysqli_query($conexion,$sql);
            if(!$consulta){
                comprobarConsulta($conexion,$sql,'logadmin.php');
            }
            else{
                $linea = mysqli_num_rows($consulta);
                if ($linea == 1){
                    $_SESSION["user"] = $user;
                    redirect('menuadmin.php');
                }
                else{
                    loginincorrecte();
                }
            }
        }
    }
    else{
        loginAdministrador();
    }
closeHtml();





