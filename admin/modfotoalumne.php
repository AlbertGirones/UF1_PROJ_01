<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Modificar curs');
if (isset($_SESSION["user"])){
    $conexion = mysqli_connect("localhost","root","","infobdn");
    if ($_POST) {
        $DNI = $_POST['DNI'];
        $nom = $_POST['nom_alum'];
        $cognom = $_POST['cog_alum'];
        if ( $_FILES['foto']['type'] == "image/jpeg" ) {
            if (is_uploaded_file ($_FILES['foto']['tmp_name'])){
                $nombreDirectorio = "alumimg/";
                $idUnico = $DNI;
                $nombreorigen = $_FILES['foto']['name'];
                $contingutnom = explode(".",$nombreorigen);
                $extension = $contingutnom[1];
                $nombreFichero = $nombreDirectorio.$idUnico.".".$extension;
                move_uploaded_file ($_FILES['foto']['tmp_name'],$nombreFichero);
                $sql = "UPDATE alumnes SET foto_alum='$nombreFichero' WHERE DNI='$DNI'";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'modfotoalumne.php');
                }else{
                    redirect('fitxaalum.php');
                }
            }
            else{
                print ("No se ha podido subir el fichero\n");
            }
        }
        else{
            print ("<p>Formato de la imagen no correcto</p>");
            redirect('modfotoalumne.php');
        }
    }
    else{
        if ($_REQUEST['id']){
            if (!$conexion){
                mysqli_connect_error();
            }
            else{
                $id = $_REQUEST['id'];
                $sql = "SELECT DNI, nom_alum, cog_alum FROM alumnes WHERE DNI='$id'";
                $consulta = mysqli_query($conexion,$sql);
                if(!$consulta){
                    comprobarConsulta($conexion,$sql,'modfotoalumne.php');
                }
                else{
                    modificarFotoAlumne($consulta);
                }
            }
        }
        else{
            identificador('fitxaalum.php');
        }
    }
}
else{
    validat('login.php');
}
closeHtml();