<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Afegir professor');
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if ($_POST) {
        if (!$conexion){
            mysqli_connect_error();
        }else{
            $DNI = $_POST['DNI'];
            $nom = $_POST['nom_prof'];
            $cognom = $_POST['cog_prof'];
            $titol = $_POST['titol_prof'];
            $onoff = $_POST['onoff'];
            $passwd = 123;
            $md5passwd = md5($passwd);
            var_dump($onoff);
            if ( $_FILES['foto']['type'] == "image/jpeg" ) {
                if (is_uploaded_file ($_FILES['foto']['tmp_name'])){
                    $nombreDirectorio = "profesimg/";
                    $idUnico = $DNI;
                    $nombreorigen = $_FILES['foto']['name'];
                    $contingutnom = explode(".",$nombreorigen);
                    $extension = $contingutnom[1];
                    $nombreFichero = $nombreDirectorio.$idUnico.".".$extension;
                    move_uploaded_file ($_FILES['foto']['tmp_name'],$nombreFichero);
                    $sql = "INSERT INTO professors VALUES ('$DNI', '$nom', '$cognom', '$titol', '$nombreFichero', '$onoff', '$md5passwd')";
                    $consulta = mysqli_query($conexion,$sql);
                    if(!$consulta){
                        comprobarConsulta($conexion,$sql,'formprofe.php');
                    }else{
                        redirect('profeadmin.php');
                    }
                }
                else{
                    print ("No se ha podido subir el fichero\n");
                    redirect('formprofe.php');
                }
            }
            else{
                print ("<p>Formato de la imagen no correcto</p>");
                redirect('formprofe.php');
            }


        }
    }else{
        formulariProfessor();
    }
closeHtml();