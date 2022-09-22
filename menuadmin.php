<?php
require_once 'functions/funciones.php';
session_start();
openHtml('Menú administrador');
        if (isset($_SESSION["user"])){
            menuAdministrador();
        }
        else{
            validat('logadmin.php');
        }
closeHtml();