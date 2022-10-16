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
    echo "
        <h1>No hem pogut obtenir el identificador del curs</h1>
        <p>Redirigint...</p>
        <META HTTP-EQUIV='REFRESH' CONTENT='2;URL=$URL'>";
}

function validat($URL){
    echo "Has d'estar validat per accedir a la pagina!";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=$URL'>";
}

function loginincorrecte($URL){
    echo "
        <script>
            alert('Les credencials no son correctes!')
        </script>
        <META HTTP-EQUIV='REFRESH' CONTENT='0;URL=$URL'>";
}

// Tablas, formularios, menú

function paginaprincipal(){
    echo "
        <div class='header'>
            <img src='img/logo.svg' alt='Logo'>
            <div class='navmenu'>
                <a href='login.php'><p>Iniciar sessió</p></a>
                <a href='logadmin.php'><p>Administració</p></a>
            </div>
        </div>
        <div id='firstpage'>
            <h1>Pagina principal InfoBDN</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius, dui in feugiat pretium, velit justo vulputate enim, id posuere arcu sapien ut ex. Mauris gravida eget dui a ultricies. Maecenas eget molestie neque, a semper metus. Sed dictum viverra iaculis. Suspendisse egestas leo turpis, eu suscipit sem congue vitae. Ut vel ullamcorper ipsum, vel consectetur sem. Nam elit purus, tincidunt id lacus sit amet, molestie convallis mauris. Nullam ac tincidunt turpis. Morbi leo eros, posuere a risus a, eleifend porttitor odio. \nMorbi eu tellus tristique, vulputate elit at, ultricies erat. Quisque porttitor semper tristique. Curabitur orci nisl, auctor nec cursus vel, malesuada quis diam.\nNulla magna sapien, semper et arcu nec, pharetra aliquam ipsum. Nunc venenatis sodales sapien ultricies dapibus. Aliquam id suscipit arcu. Aliquam ac ipsum quam. Integer condimentum sed lectus eget egestas. Proin auctor mauris libero, non luctus eros accumsan non. Praesent tellus arcu, hendrerit non ultrices sed, aliquam vitae dui. Suspendisse varius velit ac dolor pellentesque convallis. Nulla facilisi. Morbi imperdiet metus id quam gravida, imperdiet eleifend leo varius. Vivamus hendrerit iaculis felis, et vulputate purus pretium non. Donec tempor aliquam ipsum convallis pretium. Maecenas est lectus, ornare a volutpat vel, ornare bibendum neque. Donec id libero id est bibendum vestibulum sit amet a nisi.</p>
        </div>";
}

function registeralumne(){
    echo "<div class='header'>
                <img src='img/logo.svg' alt='Logo'>
                <div class='navmenu'>
                    <a href='main.php'><p>Torna enrere ...</p></a>
                </div>
            </div>
            <div class='divformmod'>
                <h1>Login alumne</h1>
                <form action='register.php' method='post' enctype='multipart/form-data'>
                    <div><p>DNI:</p><input type='text' name='DNI' id='DNI'></div>
                    <div><p>Nom:</p><input type='text' name='nom_alum' id='nom_alum'></div>
                    <div><p>Cognom:</p><input type='text' name='cog_alum' id='cog_alum'></div>
                    <div><p>Edat:</p><input type='text' name='edat_alum' id='edat_alum'></input></div>
                    <div><p>Correu:</p><input type='email' name='correo' id='correo'></input></div>
                    <div><p>Password:</p><input type='password' name='passwd' id=passwd'></input></div>
                    <div><p>Foto:</p><input accept=image/jpeg type='file' name='foto' id='foto'></input></div>
                    <div><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></div>
                </form>
            </div>";
}

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
            <p><input type='text' name='user' id='user' placeholder='Usuari' class='campoform'></input></p>
            <p><input type='password' name='passwd' id='passwd' placeholder='Contrasenya' class='campoform'></input></p>
            <p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>
        </form>
        </div>";
}

function login(){
    echo "<div class='header'>
        <img src='img/logo.svg' alt='Logo'>
        <div class='navmenu'>
            <a href='main.php'><p>Torna enrere ...</p></a>   
        </div>
        </div>
        <div id='adminlog'>
        <h1>Login</h1>
        <form action='login.php' method='post'>
            <p><input type='text' name='dni' id='dni' placeholder='DNI' class='campoform'></input></p>
            <p><input type='password' name='passwd' id='passwd' placeholder='Contrasenya' class='campoform'></input></p>
            <p class='campoform'>Alumne<input type='radio' id='Alumnat' name='rango' value='A' required></input></p>
            <p class='campoform'>Professor<input type='radio' id='Professorat' name='rango' value='P'></input></p>
            <p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>
        </form>
        </div>
        <a href='register.php' id='registerlink'><p>Ets alumne? Registrat!</p></a>";
}

function menuAdministrador(){
    echo "
        <div class='header'>
            <img src='img/logo.svg' alt='Logo'>
            <div class='navmenu'>
                <a href='logout.php'><p>Tancar sessió</p></a>
            </div>
        </div>
        <div id='adminhub'>
            <div><a href='profeadmin.php'>Gestió professors</a></div>
            <div><a href='cursadmin.php'>Gestió cursos</a></div>
        </div>";
}

function cursosdisponibles($consulta){
    echo "<div class='header'>
        <img src='img/logo.svg' alt='Logo'>
        <div class='navmenu'>
            <div id='minilog'>
                <a href='elmeuscursos.php'>Els meus cursos</a>
                <a href='fitxaalum.php'><div class='grid'>
                    <img src=".$_SESSION['foto']." id='fotominilog'>
                    <p class='textgrid1'>".$_SESSION['nom']."</p>
                    <p class='textgrid2'>".$_SESSION['cog']."</p>
                </div></a>
                <a href='logout.php'><img src='img/logout.svg' id='fotologout'></a>
            </div>
        </div>
    </div>";
    echo "<div class='cursosdisp'>";
        echo "<h1>Cursos disponibles</h1>";
        $numlinia = mysqli_num_rows($consulta);
        echo "<form action='cursosdisp.php' method='post' name='filtre'>";
            echo "Necessites buscar un curs?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>";
            echo "<button type='submit'>Buscar</button>";
            echo "<a href='cursosdisp.php'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>";
        echo "</form>";
        for ($i=0;$i<$numlinia;$i++){
            $curs = mysqli_fetch_array($consulta);
            echo "<div class='cursbox'>";
                echo "<div class='curs'>";
                    echo "<h1 id='titol'>".$curs[1]."</h1>";
                    echo "<p id='desc'>Descripció: ".$curs[2]."</p>";
                    echo "<p id='hores'>Hores totals: ".$curs[3]."</p>";
                    echo "<p id='data'>Inscripció disponible fins: ".$curs[5]."</p>";
                    echo "<p><a id='matricularme' href='inscalumne.php?id=".$curs[0]."'>Matricular-me</a></p>";
                echo "</div>";
            echo "</div>";
        }
    echo "</div>";
}

function elsmeuscursos($consulta){
    echo "<div class='header'>
        <img src='img/logo.svg' alt='Logo'>
        <div class='navmenu'>
            <div id='minilog'>
                <a href='cursosdisp.php'>Cursos disponibles</a>
                <a href='fitxaalum.php'><div class='grid'>
                    <img src=".$_SESSION['foto']." id='fotominilog'>
                    <p class='textgrid1'>".$_SESSION['nom']."</p>
                    <p class='textgrid2'>".$_SESSION['cog']."</p>
                </div></a>
                <a href='logout.php'><img src='img/logout.svg' id='fotologout'></a>
            </div>
        </div>
    </div>";
    echo "<div class='cursosdisp'>";
    echo "<h1>Els meus cursos</h1>";
    $numlinia = mysqli_num_rows($consulta);
    echo "<form action='elmeuscursos.php' method='post' name='filtre'>";
    echo "Necessites buscar un curs?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>";
    echo "<button type='submit'>Buscar</button>";
    echo "<a href='elmeuscursos.php'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>";
    echo "</form>";
    for ($i=0;$i<$numlinia;$i++){
        $curs = mysqli_fetch_array($consulta);
        echo "<div class='cursbox'>";
        echo "<div class='curs'>";
        echo "<h1 id='titol'>".$curs[1]."</h1>";
        echo "<p id='desc'>Descripció: ".$curs[2]."</p>";
        echo "<p id='hores'>Hores totals: ".$curs[3]."</p>";
        echo "<p id='data'>Inscripció disponible fins: ".$curs[5]."</p>";
        echo "<p><a id='matricularme' href='baixaalumne.php?id=".$curs[0]."'>Donar de baixa</a></p>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}

function fitxaalumne($consulta){
    echo "<div class='header'>
        <img src='img/logo.svg' alt='Logo'>
        <div class='navmenu'>
            <div id='minilog'>
                <a href='elmeuscursos.php'>Els meus cursos</a>
                <a href='cursosdisp.php'>Cursos disponibles</a>
                <a href='logout.php'><img src='img/logout.svg' id='fotologout'></a>
            </div>
        </div>
    </div>";
    echo "<div class='cursosdisp'>";
        $dades = mysqli_fetch_array($consulta);
        echo "
            <h1>Nom: ".$dades[1]." ".$dades[2]."</h1>
            <p>DNI: ".$dades[0]."</p>
            <p>Edat: ".$dades[3]." anys</p>
            <p>Correu: ".$dades[5]."</p>
            <a href='modalumne.php?id=".$dades[0]."'>Vols modificar les teves dades?</a>
            <br>
            <br>
            <a href='modfotoalumne.php?id=".$dades[0]."'>Vols modificar la teva foto?</a>
        ";
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
            echo "<p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
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
            echo "<div><p>DNI:</p><input type='text' name='DNI' id='DNI'></div>";
            echo "<div><p>Nom:</p><input type='text' name='nom_prof' id='nom_prof'></div>";
            echo "<div><p>Cognom:</p><input type='text' name='cog_prof' id='cog_prof'></div>";
            echo "<div><p>Titol:</p><input type='text' name='titol_prof' id='titol_prof'></input></div>";
            echo "<div><p>Foto:</p><input accept=image/jpeg type='file' name='foto' id='foto'></input></div>";
            echo "<div><p>Activat</p><input type='radio' id='activat' name='onoff' value='1' required></input>Descativat <input type='radio' id='noactivat' name='onoff' value='0'></input></div>";
            echo "<div><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></div>";
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
            echo "<p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
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
            echo "<p>DNI: <input type='text' name='DNI' id='DNI' value='$profe[DNI]' readonly></p>";
            echo "<p>Nom: <input type='text' name='nom_prof' id='nom_prof' value='$profe[nom_prof]'></p>";
            echo "<p>Cognom: <input type='text' name='cog_prof' id='cog_prof' value='$profe[cog_prof]'></p>";
            echo "<p>Titol: <input type='text' name='titol_prof' id='titol_prof' value='$profe[titol_prof]'></input></p>";
            echo "<p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
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
            echo "<p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
        echo "</form>";
    echo "</div>";
}

function modificarAlumne($consulta){
    $alumne = mysqli_fetch_assoc($consulta);
    echo "<div class='header'>";
    echo "<img src='img/logo.svg' alt='Logo'>";
    echo "<div class='navmenu'>";
    echo "<a href='fitxaalumne.php'><p>Ves enrere ...</p></a>";
    echo "</div>";
    echo "</div>";
    echo "<div class='divformmod'>";
    echo "<h1>Modificar dades</h1>";
    echo "<form action='modalumne.php' method='post' enctype='multipart/form-data'>";
    echo "<p>DNI: <input type='text' name='DNI' id='DNI' value='$alumne[DNI]' readonly></p>";
    echo "<p>Nom: <input type='text' name='nom_alum' id='nom_alum' value='$alumne[nom_alum]'></p>";
    echo "<p>Cognom: <input type='text' name='cog_alum' id='cog_alum' value='$alumne[cog_alum]'></p>";
    echo "<p>Edat: <input type='number' name='edat_alum' id='edat_alum' value='$alumne[edat_alum]'></p>";
    echo "<p>Correu: <input type='email' name='correo_alum' id='correo_alum' value='$alumne[correo_alum]'></p>";
    echo "<p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
    echo "</form>";
    echo "</div>";
}

function modificarFotoAlumne($consulta){
    $foto = mysqli_fetch_assoc($consulta);
    echo "<div class='header'>";
    echo "<img src='img/logo.svg' alt='Logo'>";
    echo "<div class='navmenu'>";
    echo "<a href='fitxaalum.php'><p>Ves enrere ...</p></a>";
    echo "</div>";
    echo "</div>";
    echo "<div class='divformmod'>";
    echo "<h1>Modificar foto</h1>";
    echo "<form action='modfotoalumne.php' method='post' enctype='multipart/form-data'>";
    echo "<p>DNI: <input type='text' name='DNI' id='DNI' value='$foto[DNI]' readonly></p>";
    echo "<p>Nom: <input type='text' name='nom_alum' id='nom_alum' value='$foto[nom_alum]' readonly></p>";
    echo "<p>Cognom: <input type='text' name='cog_alum' id='[cog_alum' value='$foto[cog_alum]' readonly></p>";
    echo "<p>Seleciona la foto: <input type='file' accept='img/jpg' name='foto' id='foto'></p>";
    echo "<p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
    echo "</form>";
    echo "</div>";
}

function menuProfessorat($consulta){
    echo "<div class='header'>
        <img src='img/logo.svg' alt='Logo'>
        <div class='navmenu'>
            <div id='minilog'>
                <div class='grid'>
                    <img src=".$_SESSION['foto']." id='fotominilog'>
                    <p class='textgrid1'>".$_SESSION['nom']."</p>
                    <p class='textgrid2'>".$_SESSION['cog']."</p>
                </div>
                <a href='logout.php'><img src='img/logout.svg' id='fotologout'></a>
            </div>
        </div>
    </div>";
    echo "<div id='administracion'>";
        echo "<h1>Els meus cursos</h1>";
        echo "<form action='menuprofesor.php' method='post' name='filtre'>";
            echo "Necessites buscar algun curs?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>";
            echo "<button type='submit'>Buscar</button>";
            echo "<a href='menuprofesor.php'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>";
        echo "</form>";
        $numlinia = mysqli_num_rows($consulta);
        echo "<table id='table'>";
        echo "<tr>";
            echo "<th>Nom del curs</th>";
            echo "<th>Descripció</th>";
            echo "<th>Numero d'alumnes</th>";
        echo "</tr>";
        for ($i=0;$i<$numlinia;$i++){
            $curs = mysqli_fetch_array($consulta);
            echo "<tr>";
                echo "<td>".$curs[1]."</td>";
                echo "<td>".$curs[2]."</td>";
                echo "<td><a href='elsmeusalumnes.php?id=".$curs[0]."'><img src='img/48/icons8-clipboard-48.svg' class='emoji'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    echo "</div>";
}

function llistatAlumnes($consulta){
    echo "<div class='header'>";
    echo "<img src='img/logo.svg' alt='Logo'>";
    echo "<div class='navmenu'>";
    echo "<a href='menuprofesor.php'><p>Els meus cursos</p></a>";
    echo "<a href='logout.php'><p>Tancar sessió</p></a>";
    echo "</div>";
    echo "</div>";
    echo "<div id='administracion'>";
    echo "<h1>Llistat d'alumnes</h1>";
    echo "<form action='elsmeusalumnes.php' method='post' name='filtre'>";
    echo "Necessites buscar algun professor?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>";
    echo "<button type='submit'>Buscar</button>";
    echo "<a href='elsmeusalumnes.php'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>";
    echo "</form>";
    $numlinia = mysqli_num_rows($consulta);
    echo "<table id='table'>";
    echo "<tr>";
    echo "<th>DNI</th>";
    echo "<th>Nom</th>";
    echo "<th>Cognom</th>";
    echo "<th>Foto</th>";
    echo "<th>Nota</th>";
    echo "<th>Modificar nota</th>";
    echo "</tr>";
    for ($i=0;$i<$numlinia;$i++){
        $alumne = mysqli_fetch_array($consulta);
        echo "<tr>";
        echo "<td>".$alumne[0]."</td>";
        echo "<td>".$alumne[1]."</td>";
        echo "<td>".$alumne[2]."</td>";
        echo "<td><img class='fotoprof' src='$alumne[4]'></td>";
        echo "<td>".$alumne[9]."</td>";
        echo "<td><a href='editnota.php?DNI_alum=$alumne[7]&idcurs=$alumne[8]&nota=$alumne[9]'><img src='img/48/icons8-pencil-48.png' class='emoji'></a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

function modificarNota($consulta,$DNI,$idcurs,$nota){
    $profe = mysqli_fetch_assoc($consulta);
    echo "<div class='header'>";
        echo "<img src='img/logo.svg' alt='Logo'>";
        echo "<div class='navmenu'>";
            echo "<a href='elsmeusalumnes.php'><p>Ves enrere ...</p></a>";
        echo "</div>";
    echo "</div>";
    echo "<div class='divformmod'>";
        echo "<h1>Modificar nota</h1>";
        echo "<form action='editnota.php' method='post' enctype='multipart/form-data'>";
            echo "<p>DNI: <input type='text' name='DNI' id='DNI' value='$DNI' readonly></p>";
            echo "<p>Id curs: <input type='text' name='idcurs' id='idcurs' value='$idcurs' readonly></p>";
            echo "<p>Nota: <input type='number' name='nota' id='nota' value='$nota'></p>";
            echo "<p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
        echo "</form>";
    echo "</div>";
}