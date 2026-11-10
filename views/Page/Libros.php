<?php require_once __DIR__ . '/../../Config/Sesion.php'; ?>
<!DOCTYPE html>
<html lang="es">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Libros.css">
    <title>Nexora</title>
</head>
    <body class="bodycss">
        <div>
            <?php require_once __DIR__ . '/../Parts/Barra.php'; ?>        
        </div>
        <div>
            <div class="bordecategoria">
                <H1 class="titulos"> NOVEDADES </H1>
                <div class="lista-libros">
                    <?php foreach ($SolicitudLibro as $libro): ?>
                        <div class="divlibro">
                            <a href="/index.php?controlador=libros&accion=DetalleLibro&id=<?= $libro->getid() ?>">
                            <div>
                                    <img src="<?= htmlspecialchars($libro->getportada()) ?>"alt="" style="width: 150px; height: 235px">
                                    <p class="tituloslibros"><?= htmlspecialchars($libro->gettitulo()) ?></p>
                                    <p class="precio">$<?= htmlspecialchars((string)$libro->getprecio()) ?></p>
                            </div>
                            </a>
                        </div>  
                    <?php endforeach; ?>       
                </div>
            </div>
        </div>
        <div class="bordecategoria">
            <h1 class="titulos"> Suspenso </h1>
            <div class="lista-libros">
                <?php foreach ($SolicitudCategoria1 as $libro): ?>
                    <div class="divlibro">
                        <a href="/index.php?controlador=libros&accion=DetalleLibro&id=<?= $libro->getid() ?>">
                            <img src="<?= htmlspecialchars($libro->getportada()) ?>"alt=" "style="width: 150px; height: 235px">
                            <p class="tituloslibros"><?= htmlspecialchars($libro->gettitulo()) ?></p>
                            <p class="precio">$<?= htmlspecialchars((string)$libro->getprecio()) ?></p>
                        </a>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="bordecategoria">
            <h1 class="titulos"> Romance </h1>
            <div class="lista-libros">
                <?php foreach ($SolicitudCategoria2 as $libro): ?>
                    <div class="divlibro">
                        <a href="/index.php?controlador=libros&accion=DetalleLibro&id=<?= $libro->getid() ?>">
                            <img src="<?= htmlspecialchars($libro->getportada()) ?>"alt="" style="width: 150px; height: 235px">
                            <p class="tituloslibros"><?= htmlspecialchars($libro->gettitulo()) ?></p>
                            <p class="precio">$<?= htmlspecialchars((string)$libro->getprecio()) ?></p>
                        </a>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="bordecategoria">
            <h1 class="titulos"> Cienca Ficcion </h1>
            <div class="lista-libros">
                <?php foreach ($SolicitudCategoria3 as $libro): ?>
                    <div class="divlibro">
                        <a href="/index.php?controlador=libros&accion=DetalleLibro&id=<?= $libro->getid() ?>">
                            <img src="<?= htmlspecialchars($libro->getportada()) ?>"alt=""style="width: 150px; height: 235px">
                            <p class="tituloslibros"><?= htmlspecialchars($libro->gettitulo()) ?></p>
                            <p class="precio">$<?= htmlspecialchars((string)$libro->getprecio()) ?></p>
                        </a>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="bordecategoria"> 
            <h1 class="titulos"> Aventuras </h1>
            <div class="lista-libros">
                <?php foreach ($SolicitudCategoria4 as $libro): ?>
                    <div class="divlibro"">
                        <a href="/index.php?controlador=libros&accion=DetalleLibro&id=<?= $libro->getid() ?>">
                            <img src="<?= htmlspecialchars($libro->getportada()) ?>"alt=""style="width: 150px; height: 235px">
                            <p class="tituloslibros"><?= htmlspecialchars($libro->gettitulo()) ?></p>
                            <p class="precio">$<?= htmlspecialchars((string)$libro->getprecio()) ?></p>
                        </a>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </body> 
</html>