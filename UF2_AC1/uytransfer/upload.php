<body>
    <?php include 'header.php' ?>  
    <?php
    
        if (empty($_POST) == false) {
            
            // 4. Canvi de nom i de directori de l'arxiu adjuntat
            $nomarxiu = $_FILES["arxiu"]["name"]; // // Nom original de l'arxiu adjuntat
            $rutaTMP = $_FILES["arxiu"]["tmp_name"]; // Ruta temporal de l'arxiu adjuntat
            $extension = substr($nomarxiu, strpos($nomarxiu, ".")); // Agafar l'extensió de l'arxiu
            $numeros = rand(10000,99999); // Generar un número aleatori de 5 dígits 
            $rutaDestino = "files/".date("Ymd").$numeros.$extension; // Ruta de destí de l'arxiu pujat
            $linkAcceso = "<a class=\"h4\" href=\"localhost/uytransfer/$rutaDestino\">UyTransfer/$rutaDestino</a>"; // HTML per accedir al link generat
            $foto = "images/successful.png"; // Imatge que indica que la pujada ha estat satisfactoria
            
            move_uploaded_file($rutaTMP, $rutaDestino); // Moure l'arxiu pujat a la carpeta FILES
            
            if (empty($_POST["nom"] == false)) { // Si l'usuari ha indicat un nom
                $nom = $_POST["nom"]; // El guardem en una variable
                $missatge = 'Hola <strong>'.$nom.'</strong>, usa este link para compartir tu archivo'; // El posem al missatge
            }
            else { // Si ha deixat el camp buit
                $missatge = 'Oye tu!! Usa éste link para compartir tu archivo'; // S'utilitza l'altre missatge
            }
            
            // 5. Limitar tamany i tipus de fitxer del formulari
            $tamany = $_FILES['arxiu']['size']; // Guardem el tamany de l'arxiu a la variable
            
            if ($tamany > 10485760) { // Si l'arxiu pesa mes de 10MB
                $missatge = "ERROR"; // Apareix un missatge d'error
                $linkAcceso = "<p class=\"h4\">El archivo seleccionado supera los 10MB.</p>"; // Es canvia el link per una explicació de l'error
                $foto = "images/error.png"; // Es canvia l'imatge per una informant l'error
            }
            
            if ($extension == ".pdf" || $extension == ".png" || $extension == ".jpg" || $extension == ".rar" || $extension == ".zip") { // Si no es del tipus permés
                // No passa res
            } else {
                $missatge = "ERROR";
                $linkAcceso = "<p class=\"h4\">El archivo no es de un tipo permitido.</p>"; // Es canvia el missatge un altre cop
                $foto = "images/error.png";
            }
            
            // 6. Enviar per correu electrònic el link
            if (isset($_POST['validacio'])) { // Si la casella d'enviar correu està marcada
                
                $email = test_input($_POST["mail"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: index.php?error_mail=1");
                }
                
                $destino = $_POST['mail']; // Mail del destinatari
                $asunto = 'Fichero compartido desde uyTransfer'; // Assumpte del mail
                $campmissatge = isset($_POST['missatge']);
                if ($campmissatge == 1) { // Si hi ha un missatge especificat
                    $missatgecorreu = htmlspecialchars($_POST['missatge'])."<p>Link de acceso al archivo</p>".$linkAcceso;
                } else {
                    $missatgecorreu = 'Sorpresa!! Alguien ha compartido contigo un archivo'; // Missatge genèric       
                }
                $headers  = 'MIME-Version: 1.0' . "\r\n"; // Headers per a que es pugui interpretar el HTML del correu
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                mail ($destino,$asunto,$missatgecorreu,$headers); // Funció que envia el correu  
            }
            
            // 7. Emmagatzemar els links en cookies
                // Anar al fitxer last-files.php
                
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


