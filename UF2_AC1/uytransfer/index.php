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
