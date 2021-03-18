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
    <div class="col-lg-5 col-md-8 col-sm-10 col mx-auto">
        <form name="upload" class="col" action="upload.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <input name="nom" class="col-lg col-sm-12 col-12 mt-5 form-control" type="text" placeholder="Tu Nombre" />
            
            <div class="col mt-4 custom-file"> <!-- DIV corresponent al FILE -->
                <input name="arxiu" class="custom-file-input" type="file" placeholder="Selecciona un archivo" />
                <label class="custom-file-label" for="customFile">Selecciona un archivo</label>
            </div>
            
            <div class="col custom-control custom-checkbox mt-4 mb-4"> <!-- DIV corresponent al CHECKBOX -->
                <input name="validacio" id="checkbox" class="custom-control-input" type="checkbox" />
                <label for="checkbox" class="custom-control-label">Quiero enviar el link de descarga por email</label>
            </div>
            
            <input name="mail" class="col-12 form-control" type="email" placeholder="Email del destinatario" />
            
            <label for="missatge" class="col-12 mt-4">Mensaje</label>
            <textarea name="missatge" class="col form-control" id="missatge" form="upload"></textarea>
            
            <div class="mt-5 text-right"> <!-- DIV corresponent al BUTTON -->
                <button type="submit" value="Subir_Archivo" class="btn btn-outline-secondary">Subir Archivo</button>
            </div>
        </form>
    </div>
</body>
</html>