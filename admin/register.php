<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Register alumne');
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if($_POST){
        if (!$conexion){
            mysqli_connect_error();
        }else{
            $DNI = $_POST['DNI'];
            $nom = $_POST['nom_alum'];
            $cognom = $_POST['cog_alum'];
            $edat = $_POST['edat_alum'];
            $correo = $_POST['correo'];
            $passwd = $_POST['passwd'];
            $md5passwd = md5($passwd);
            if ( $_FILES['foto']['type'] == "image/jpeg" ) {
                if (is_uploaded_file ($_FILES['foto']['tmp_name'])){
                    $nombreDirectorio = "alumimg/";
                    $idUnico = $DNI;
                    $nombreorigen = $_FILES['foto']['name'];
                    $contingutnom = explode(".",$nombreorigen);
                    $extension = $contingutnom[1];
                    $nombreFichero = $nombreDirectorio.$idUnico.".".$extension;
                    move_uploaded_file ($_FILES['foto']['tmp_name'],$nombreFichero);
                    $sql = "INSERT INTO alumnes VALUES ('$DNI', '$nom', '$cognom', '$edat', '$nombreFichero', '$correo', '$md5passwd')";
                    $consulta = mysqli_query($conexion,$sql);
                    if(!$consulta){
                        comprobarConsulta($conexion,$sql,'register.php');
                    }else{
                        redirect('login.php');
                    }
                }
                else{
                    print ("No se ha podido subir el fichero\n");
                    redirect('register.php');
                }
            }
            else{
                print ("<p>Formato de la imagen no correcto</p>");
                redirect('register.php');
            }
        }
    }
    else{
        registeralumne();
    }
closeHtml();