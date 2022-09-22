<?php

// Alertas , codigo esencial

function openHtml($title){
    echo "
        <!DOCTYPE html>
        <html lang='ca'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>{$title}</title>
            <link rel='stylesheet' href='css/style.css'>
        </head>
        <body>
    ";
}

function closeHtml(){
    echo "
        </body>
    </html>";
}

function comprobarConsulta($conexion,$sql,$URL){
    echo mysqli_error($conexion)."<br>";
    echo "Error querry no valida ".$sql;
    echo "Redirigint..";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=$URL'>";
}

function redirect($URL){
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=$URL'>";
}

function identificador($URL){
    echo "<h1>No hem pogut obtenir el identificador del curs</h1>";
    echo "<p>Redirigint...</p>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=$URL'>";
}

function validat($URL){
    echo "Has d'estar validat per accedir a la pagina!";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=$URL'>";
}

function loginincorrecte(){
    echo "<script>";
        echo "alert('Les credencials no son correctes!')";
    echo "</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=logadmin.php'>";
}

// Tablas, formularios, menú

function loginAdministrador(){
    echo "<div class='header'>
        <img src='img/logo.svg' alt='Logo'>
        <div class='navmenu'>
            <a href='main.php'><p>Torna enrere ...</p></a>
        </div>
        </div>
        <div id='adminlog'>
        <h1>Admin Login</h1>
        <form action='logadmin.php' method='post'>
            <p><input type='text' name='user' id='user' placeholder='Usuari'></input></p>
            <p><input type='password' name='passwd' id='passwd' placeholder='Contrasenya'></input></p>
            <p><button type='submit'>Aceptar</button></p>
        </form>
        </div>";
}

function menuAdministrador(){
    echo "<div class='header'>";
    echo "<img src='img/logo.svg' alt='Logo'>";
    echo "<div class='navmenu'>";
    echo "<a href='logout.php'><p>Tancar sessió</p></a>";
    echo "</div>";
    echo "</div>";
    echo "<div id='adminhub'>";
    echo "<div><a href='profeadmin.php'>Gestió professors</a></div>";
    echo "<div><a href='cursadmin.php'>Gestió cursos</a></div>";
    echo "</div>";
}

function taulaCursos($consulta){
    echo "<div class='header'>";
        echo "<img src='img/logo.svg' alt='Logo'>";
        echo "<div class='navmenu'>";
            echo "<a href='formcursos.php'><p>Afegir curs</p></a>";
            echo "<a href='menuadmin.php'><p>Tornar al menú</p></a>";
            echo "<a href='logout.php'><p>Tancar sessió</p></a>";
        echo "</div>";
    echo "</div>";
    echo "<div id='administracion'>";
        echo "<h1 class='title'>Gestió cursos</h1>";
        $numlinia = mysqli_num_rows($consulta);
        echo "<form action='cursadmin.php' method='post' name='filtre'>";
            echo "Necessites buscar algun professor?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>";
            echo "<button type='submit'>Buscar</button>";
            echo "<a href='cursadmin.php'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>";
        echo "</form>";
        echo "<table>";
            echo "<tr>";
                echo "<th>Codi</th>";
                echo "<th>Nom</th>";
                echo "<th>Descripció</th>";
                echo "<th>Hores</th>";
                echo "<th>Data inici</th>";
                echo "<th>Data final</th>";
                echo "<th>DNI Professor</th>";
                echo "<th>Editar curs</th>";
                echo "<th>Visibilitat</th>";
                echo "<th>Modificar visibilitat</th>";
            echo "</tr>";
            for ($i=0;$i<$numlinia;$i++){
                $curs = mysqli_fetch_array($consulta);
                echo "<tr>";
                echo "<td>".$curs[0]."</td>";
                echo "<td>".$curs[1]."</td>";
                echo "<td>".$curs[2]."</td>";
                echo "<td>".$curs[3]."</td>";
                echo "<td>".$curs[4]."</td>";
                echo "<td>".$curs[5]."</td>";
                echo "<td>".$curs[6]."</td>";
                echo "<td><a href='modcurs.php?id=".$curs[0]."'><img src='img/48/icons8-pencil-48.png' class='emoji'></img></a></td>";
                if($curs[7]==='1'){
                    echo "<td>Actiu</td>";
                    echo "<td><a href='delcursos.php?id=".$curs[0]."'><img src='img/48/icons8-check-mark-48.png' class='emoji'></a></td>";
                }else {
                    echo "<td class='noactiu'>No actiu</td>";
                    echo "<td><a href='actcurs.php?id=".$curs[0]."'><img src='img/48/icons8-cross-mark-48.png' class='emoji'></a></td>";
                }
                echo "</tr>";
            }
        echo "</table>";
    echo "</div>";
}

function taulaProfessors($consulta){
    echo "<div class='header'>";
    echo "<img src='img/logo.svg' alt='Logo'>";
    echo "<div class='navmenu'>";
    echo "<a href='formprofe.php'><p>Afegir professor</p></a>";
    echo "<a href='menuadmin.php'><p>Tornar al menú</p></a>";
    echo "<a href='logout.php'><p>Tancar sessió</p></a>";
    echo "</div>";
    echo "</div>";
    echo "<div id='administracion'>";
    echo "<h1>Gestió professors</h1>";
    echo "<form action='profeadmin.php' method='post' name='filtre'>";
    echo "Necessites buscar algun professor?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>";
    echo "<button type='submit'>Buscar</button>";
    echo "<a href='profeadmin.php'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>";
    echo "</form>";
    $numlinia = mysqli_num_rows($consulta);
    echo "<table id='table'>";
    echo "<tr>";
    echo "<th>DNI</th>";
    echo "<th>Nom</th>";
    echo "<th>Cognom</th>";
    echo "<th>Titol</th>";
    echo "<th>Foto</th>";
    echo "<th>Editar dades</th>";
    echo "<th>Editar foto</th>";
    echo "<th>Visibilitat</th>";
    echo "<th>Modificar visibilitat</th>";
    echo "</tr>";
    for ($i=0;$i<$numlinia;$i++){
        $profe = mysqli_fetch_array($consulta);
        echo "<tr>";
        echo "<td>".$profe[0]."</td>";
        echo "<td>".$profe[1]."</td>";
        echo "<td>".$profe[2]."</td>";
        echo "<td>".$profe[3]."</td>";
        echo "<td><img class='fotoprof' src='$profe[4]'></td>";
        echo "<td><a href='modprofe.php?id=".$profe[0]. "'><img src='img/48/icons8-pencil-48.png' class='emoji'></a></td>";
        echo "<td><a href='modfotoprof.php?id=".$profe[0]."'><img src='img/48/icons8-camera-with-flash-48.png' class='emoji'></a></td>";
        if($profe[5]==='1'){
            echo "<td>Actiu</td>";
            echo "<td><a href='delprofe.php?id=".$profe[0]."'><img src='img/48/icons8-check-mark-48.png'src='img/48/icons8-cross-mark-48.png' class='emoji'></a></td>";
        }else {
            echo "<td class='noactiu'>No actiu</td>";
            echo "<td><a href='actprofe.php?id=".$profe[0]."'><img src='img/48/icons8-cross-mark-48.png' class='emoji'></a></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

function formularioCursos($consulta){
    $numlinia = mysqli_num_rows($consulta);
    echo "<div class='header'>";
        echo "<img src='img/logo.svg' alt='Logo'>";
        echo "<div class='navmenu'>";
            echo "<a href='cursadmin.php'><p>Ves enrere ...</p></a>";
        echo "</div>";
    echo "</div>";
    echo "<div class='divformmod'>";
        echo "<h1>Afegir curs</h1>";
        echo "<form action='formcursos.php' method='post'>";
            echo "<p>Nom curs: <input type='text' name='nom_curs' id='nom_curs'></p>";
            echo "<p>Descripció: <input type='text' name='desc_curs' id='desc_curs'></p>";
            echo "<p>Hores totals: <input type='number' name='hores_curs' id='hores_curs'></p>";
            echo "<p>Data d'inici: <input type='date' name='ini_curs' id='ini_curs'></input></p>";
            echo "<p>Data final: <input type='date' name='fin_curs' id='fin_curs'></input></p>";
            echo "<p>DNI del professor: <select name='DNI_prof' id='DNI_prof'>";
            for ($i=0;$i<$numlinia;$i++){
                $dni = mysqli_fetch_assoc($consulta);
                ?>
                <option value='<?php echo $dni["DNI"] ?>'><?php echo $dni["DNI"]." - ".$dni["nom_prof"]." ".$dni["cog_prof"]?></option>
                <?php
            }
            echo "</select></p>";
            echo "<p>Activat <input type='radio' id='activat' name='onoff' value='1' required></input>Descativat <input type='radio' id='noactivat' name='onoff' value='0'></input></p>";
            echo "<p><button type='submit'>Afegir curs</button></p>";
        echo "</form>";
    echo "</div>";
}

function formulariProfessor(){
    echo "<div class='header'>";
    echo "<img src='img/logo.svg' alt='Logo'>";
    echo "<div class='navmenu'>";
    echo "<a href='profeadmin.php'><p>Ves enrere ...</p></a>";
    echo "</div>";
    echo "</div>";
    echo "<div class='divformmod'>";
    echo "<h1>Afegir professor</h1>";
    echo "<form action='formprofe.php' method='post' enctype='multipart/form-data'>";
    echo "<p>DNI: <input type='text' name='DNI' id='DNI'></p>";
    echo "<p>Nom: <input type='text' name='nom_prof' id='nom_prof'></p>";
    echo "<p>Cognom: <input type='text' name='cog_prof' id='cog_prof'></p>";
    echo "<p>Titol: <input type='text' name='titol_prof' id='titol_prof'></input></p>";
    echo "<p>Foto: <input accept=image/jpeg type='file' name='foto' id='foto'></input></p>";
    echo "<p>Activat <input type='radio' id='activat' name='onoff' value='1' required></input>Descativat <input type='radio' id='noactivat' name='onoff' value='0'></input></p>";
    echo "<p><button type='submit'>Afegir professor</button></p>";
    echo "</form>";
    echo "</div>";
}

function modificarCurs($conexion, $consulta){
    $resultat = mysqli_fetch_assoc($consulta);
    $nomdni = "SELECT DNI,nom_prof,cog_prof FROM professors";
    $consultadni = mysqli_query($conexion,$nomdni);
    $numlinia = mysqli_num_rows($consultadni);
    echo "<div class='header'>";
        echo "<img src='img/logo.svg' alt='Logo'>";
        echo "<div class='navmenu'>";
            echo "<a href='cursadmin.php'><p>Ves enrere ...</p></a>";
        echo "</div>";
    echo "</div>";
    echo "<div class='divformmod' >";
        echo "<h1>Modificar curs</h1>";
        echo "<form action='modcurs.php' method='post'>";
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
            echo "<p><button type='submit'>Modificar curs</button></p>";
        echo "</form>";
    echo "</div>";
}

function modificarProfessor($consulta){
    $profe = mysqli_fetch_assoc($consulta);
    echo "<div class='header'>";
        echo "<img src='img/logo.svg' alt='Logo'>";
        echo "<div class='navmenu'>";
            echo "<a href='profeadmin.php'><p>Ves enrere ...</p></a>";
        echo "</div>";
    echo "</div>";
    echo "<div class='divformmod'>";
        echo "<h1>Modificar professor</h1>";
        echo "<form action='modprofe.php' method='post' enctype='multipart/form-data'>";
            echo "<p>DNI: <input type='text' name='DNI' id='DNI' value='$profe[DNI]'></p>";
            echo "<p>Nom: <input type='text' name='nom_prof' id='nom_prof' value='$profe[nom_prof]'></p>";
            echo "<p>Cognom: <input type='text' name='cog_prof' id='cog_prof' value='$profe[cog_prof]'></p>";
            echo "<p>Titol: <input type='text' name='titol_prof' id='titol_prof' value='$profe[titol_prof]'></input></p>";
            echo "<p><button type='submit'>Modificar professor</button></p>";
        echo "</form>";
    echo "</div>";
}

function modificarFoto($consulta){
    $foto = mysqli_fetch_assoc($consulta);
    echo "<div class='header'>";
        echo "<img src='img/logo.svg' alt='Logo'>";
        echo "<div class='navmenu'>";
            echo "<a href='profeadmin.php'><p>Ves enrere ...</p></a>";
        echo "</div>";
    echo "</div>";
    echo "<div class='divformmod'>";
        echo "<h1>Modificar foto</h1>";
        echo "<form action='modfotoprof.php' method='post' enctype='multipart/form-data'>";
            echo "<p>DNI: <input type='text' name='DNI' id='DNI' value='$foto[DNI]' readonly></p>";
            echo "<p>Nom: <input type='text' name='nom_prof' id='nom_prof' value='$foto[nom_prof]' readonly></p>";
            echo "<p>Cognom: <input type='text' name='cog_prof' id='cog_prof' value='$foto[cog_prof]' readonly></p>";
            echo "<p>Seleciona la foto: <input type='file' accept='img/jpg' name='foto' id='foto'></p>";
            echo "<p><button type='submit'>Modificar foto</button></p>";
        echo "</form>";
    echo "</div>";
}
