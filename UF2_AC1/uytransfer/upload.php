<body>
    <?php include 'header.php' ?>  
    <?php
        if (empty($_POST) == false) {
            
            // 4. Canvi de nom i de directori de l'arxiu adjuntat
            $nomarxiu = $_FILES["arxiu"]["name"]; // // Nom original de l'arxiu adjuntat
            $rutaTMP = $_FILES["arxiu"]["tmp_name"]; // Ruta temporal de l'arxiu adjuntat
            $extension = substr($nomarxiu, strpos($nomarxiu, ".")); // Agafar l'extensió de l'arxiu
            $numeros = rand(10000,99999); // Generar un número aleatori de 5 dígits 
            $rutaDestino = "files/".date("Ymd").$numeros.$extension;
            $linkAcceso = "<a class=\"h4\" href=\"$rutaDestino\">UyTransfer/$rutaDestino</a>";
            $foto = "successful.png";
            
            move_uploaded_file($rutaTMP, $rutaDestino);
            
            if (empty($_POST["nom"] == false)) { // Si el nom
                $nom = $_POST["nom"];
                $missatge = 'Hola <strong>'.$nom.'</strong>, usa este link para compartir tu archivo';
            }
            else {
                $missatge = 'Oye tu!! Usa éste link para compartir tu archivo';
            }
            
            // 5. Limitar tamany i tipus de fitxer del formulari
            $tamany = $_FILES['arxiu']['size'];
            
            if ($tamany > 10485760) {
                $missatge = "ERROR";
                $linkAcceso = "<p class=\"h4\">El archivo seleccionado supera los 10MB.</p>";
                $foto = "error.png";
            }
            else if ($extension !== 'pdf' || $extension !== 'png' || $extension !== 'jpg' || $extension !== 'rar' || $extension !== 'zip') {
                $missatge = "ERROR";
                $linkAcceso = "<p class=\"h4\">El archivo no es de un tipo permitido.</p>";
                $foto = "error.png";
            }
            
            // 6. Enviar per correu electrònic el link
            
            
            // 7. Emmagatzemar els links en cookies
            
                
        }
        else {
            header("Location: index.php");
        }
    
    ?>
    <main class="row container-fluid mt-5">
        <div class="col-12 col-lg-4 text-center">
            <img class="img-fluid" src="<?php echo $foto ?>" />
        </div>
        <div class="row col-12 col-lg-8 mt-5 mt-lg-0">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <p class="text-center h2"><?php echo $missatge ?></p>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-top mt-5 mt-lg-0">
                <?php echo $linkAcceso ?>
            </div>
        </div>
    </main>
</body>
</html>
