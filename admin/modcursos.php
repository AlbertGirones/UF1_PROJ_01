<?php session_start();?>
<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Admin Login</title>
    </head>
    <body>
        <?php 
            if (isset($_SESSION["user"])){
                // Creamos la conexion a la bdd
                $conexion = mysqli_connect("localhost","root","","infobdn");
                if ($_POST) {
                    $id = $_POST['id'];
                    $nom = $_POST['nom_curs'];
                    $desc = $_POST['desc_curs'];
                    $hores = $_POST['hores_curs'];
                    $dataini = $_POST['ini_curs'];
                    $datafin = $_POST['fin_curs'];
                    $DNI = $_POST['DNI_prof'];
                    $sql = "UPDATE cursos SET nom_curs = '$nom', desc_curs = '$desc', hores_curs = '$hores', ini_curs='$dataini', fin_curs='$datafin', DNI_prof='$DNI' WHERE codi_curs='$id'";
                    $consulta = mysqli_query($conexion,$sql);
                    if(!$consulta){
                        echo mysqli_error($conexion)."<br>"; 
                        echo "Error querry no valida ".$sql;    
                    }else{
                        echo "<h1>Curs modificat correctament!</h1>";
                        echo "<p>Redirigint...</p>";
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=cursadmin.php'>";
                    } 
                }else{
                    if ($_REQUEST['id']){
                    // Comprobamos que la conexion sea valida 
                        if ($conexion == false){
                            mysqli_connect_error();
                        }else{
                            $id = $_REQUEST['id'];
                            $sql = "SELECT * FROM cursos WHERE codi_curs = $id";
                            $consulta = mysqli_query($conexion,$sql);
                            if(!$consulta){
                                echo mysqli_error($conexion)."<br>"; 
                                echo "Error querry no valida ".$sql;    
                            }else{
                                $resultat = mysqli_fetch_assoc($consulta);
                                $nomdni = "SELECT DNI,nom_prof,cog_prof FROM professors";
                                $consultadni = mysqli_query($conexion,$nomdni);
                                $numlinia = mysqli_num_rows($consultadni);
                                echo "<h1>Modificar curs</h1>";
                                echo "<div>";
                                    echo "<form action='modcursos.php' method='post'>";
                                        echo "<p>Nom curs: <input type='number' name='id' id='id' value='".$resultat['codi_curs']."' readonly></p>"; 
                                        echo "<p>Nom curs: <input type='text' name='nom_curs' id='nom_curs' value='".$resultat['nom_curs']."'></p>"; 
                                        echo "<p>Descripció: <input type='text' name='desc_curs' id='desc_curs' value='".$resultat['desc_curs']."'></p>";
                                        echo "<p>Hores totals: <input type='number' name='hores_curs' id='hores_curs' value='".$resultat['hores_curs']."'></p>";
                                        echo "<p>Data d'inici: <input type='date' name='ini_curs' id='ini_curs' value='".$resultat['ini_curs']."'></input></p>";
                                        echo "<p>Data final: <input type='date' name='fin_curs' id='fin_curs' value='".$resultat['fin_curs']."'></input></p>";
                                        echo "<p>DNI del professor: <select name='DNI_prof' id='DNI_prof' value='".$resultat['DNI_prof']."'>";
                                        for ($i=0;$i<$numlinia;$i++){
                                            $dninomcomplet = mysqli_fetch_assoc($consultadni);
                                            if($resultat['DNI_prof'] == $dninomcomplet['DNI']){
                                                ?>
                                                <option selected value='<?php echo $dninomcomplet["DNI"]?>'><?php echo $dninomcomplet["DNI"]." - ".$dninomcomplet["nom_prof"]." ".$dninomcomplet["cog_prof"]?></option>
                                            
                                                <?php
                                                echo "\n";
                                            }else{
                                                ?>
                                                <option value='<?php echo $dninomcomplet["DNI"] ?>'><?php echo $dninomcomplet["DNI"]." - ".$dninomcomplet["nom_prof"]." ".$dninomcomplet["cog_prof"]?></option>;
                                                <?php   
                                                 echo "\n"; 
                                            }
                                            
                                        }
                                        echo "</select></p>";
                                        echo "<p><button type='submit'>Modificar professor</button></p>";        
                                    echo "</form>";
                                echo "</div>";
                            }
                        }  
                    }else{
                    echo "<h1>No hem pogut obtenir el identificador del curs</h1>";
                    echo "<p>Redirigint...</p>";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=cursadmin.php'>";
                    }
                }
            }else{
                // Mostrem missatge de seguritat.
                echo "<p>Has d'estar valiat per veure aquesta pàgina</p>";
                echo "Redirigint...";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=logadmin.php'>";
            }
        ?>
    </body>
</html>








