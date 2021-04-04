<body>
    <?php include 'header.php' ?> 
    
    <?php 
    $directori = 'files/';
    $fitxers = scandir($directori);
    
    foreach ($fitxers as $valor) {
        $link = "/files/".$valor;
        setcookie('url',$link, time() + (60*60*24*7)); 
    }
    ?>
    
    <div class="row">
        <div class="col-12 text-center mt-5"><p class="display-3">Archivos enviados recientemente</p></div>
        <div class="col-12 text-center mt-5"><a class="display-4" href="<?php echo htmlspecialchars($_COOKIE['url']) ?>"><?php echo htmlspecialchars($_COOKIE['url']) ?></a></div>
    </div>
</body>