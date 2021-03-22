<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'header.php' ?> 
    
    <?php
        if (empty($_POST) == false) {
            
            // Canvi de nom i de directori de l'arxiu adjuntat
            $nomarxiu = $_FILES["arxiu"]["name"]; // // Nom original de l'arxiu adjuntat
            $rutaTMP = $_FILES["arxiu"]["tmp_name"]; // Ruta temporal de l'arxiu adjuntat
            $extension = substr($nomarxiu, strpos($nomarxiu, ".")); // Agafar l'extensió de l'arxiu
            $numeros = rand(10000,99999); // Generar un número aleatori de 5 dígits 
            $rutaDestino = "files/".date("Ymd").$numeros.$extension;
            
            move_uploaded_file($rutaTMP, $rutaDestino);
            
            if (empty($_POST["nom"] == false)) { // Si el nom
                $nom = $_POST["nom"];
                $missatge = 'Hola <strong>'.$nom.'</strong>, usa este link para compartir tu archivo';
            }
            
            else {
                $missatge = '<p>Oye tu!! Usa éste link para compartir tu archivo</p>';
            }
                
        }
        else {
            header("Location: index.php");
        }
    
    ?>
    <main class="row container-fluid mt-5">
        <div class="col-12 col-lg-4 text-center">
            <img src="successful.png" />
        </div>
        <div class="row col-12 col-lg-8 mt-5 mt-lg-0">
            <div class="col-12 d-flex justify-content-center align-items-end">
                <p class="text-center h2"><?php echo $missatge ?></p>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center mt-5 mt-lg-0">
                <a class="h4" href="<?php echo $rutaDestino ?>"><?php echo $rutaDestino ?></a>
            </div>
        </div>
    </main>
</body>
</html>


