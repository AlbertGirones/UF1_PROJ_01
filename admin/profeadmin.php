<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Administració de cursos');
        if($_POST){
            if(isset($_POST['filtre']) && $_POST['filtre'] != "") {
                $conexion = mysqli_connect("localhost","root","","infobdn");
                if (!$conexion){
                    mysqli_connect_error();
                }
                else{
                    $filtre = $_POST['filtre'];
                    $sql = "SELECT * FROM professors WHERE nom_prof LIKE '%$filtre%'";
                    $consulta = mysqli_query($conexion,$sql);
                    if(!$consulta){
                        comprobarConsulta($conexion,$sql,'profeadmin.php');
                    }
                    else{
                        taulaProfessors($consulta);
                    }
                }
            }
        }else{
            if (isset($_SESSION["user"])){
                $conexion = mysqli_connect("localhost","root","","infobdn");
                if (!$conexion){
                    mysqli_connect_error();
                }
                else{
                    $sql = "SELECT * FROM professors";
                    $consulta = mysqli_query($conexion,$sql);
                    if(!$consulta){
                        comprobarConsulta($conexion,$sql,'profeadmin.php');
                    }
                    else{
                        taulaProfessors($consulta);
                    }
                }
            }
            else{
                validat('logadmin.php');
            }
        }
closeHtml();