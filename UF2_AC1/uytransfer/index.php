<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uytransfer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet"> 
</head>

<body>
    <?php include 'header.php' ?> 
    <div class="col-lg-5 col-sm-10 col-12 h-100 mx-auto">
        <form name="upload" class="col-12" action="upload.php" method="post" autocomplete="off">
            <input name="nom" class="col-lg- col-sm-12 col-12 mt-5 border-10" type="text" placeholder="Tu Nombre" />
            <input name="arxiu" class="col-12 mt-3" type="file" placeholder="Selecciona un archivo" />
            <input name="checkbox" class="col-1 mt-4 mb-4" type="checkbox" />
            <label for="checkbox" class="col-10">Quiero enviar el link de descarga por email</label>
            <input name="email" class="col-12" type="email" placeholder="Email del destinatario" />
            <label for="missatge" class="col-12 mt-3">Mensaje</label>
            <textarea class="col-12" name="missatge" form="upload"></textarea>
            <br>
            <button type="submit" form="upload" value="Subir_Archivo" class="btn btn-default border col-3 mt-4" mx-auto>Subir Archivo</button>
        </form>
    </div>
</body>
</html>