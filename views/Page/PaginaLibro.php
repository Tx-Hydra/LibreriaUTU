<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/PaginaLibro.css">
    <title>Document</title>
</head>
    <body class="body">
        <div>
            <?php require_once __DIR__ . '/../Parts/Barra.php'; ?>
        </div>
        <div class="pagina">
            <div class="infoLibro">
                <div class="imagen">
                    <img  src="<?= htmlspecialchars($libro->getportada()) ?>" alt="PortadaLibro" style="width: 325px">
                </div>
                <div class="zonaventa">
                    <h1 class="titulo"><?php echo htmlspecialchars($libro->gettitulo()); ?></h3>
                    <div class="divspb">
                        <h3 class="stock">Stock: <?php echo htmlspecialchars($libro->getstock());?></h3>
                        <?php if($libro->getpreciooferta() > 0):?>
                            <h2 class="precioanterior">$<?php echo htmlspecialchars($libro->getprecio()); ?></h2>
                            <h2 class="preciooferta"> OFERTA: <?php echo htmlspecialchars($libro->getpreciooferta()) ?>></h2>
                        <?php else: ?>
                            <h2 class="precio">$<?php echo htmlspecialchars($libro->getprecio()); ?></h2>
                        <?php endif; ?>
                        <div class="zonabotones">
                            <?php  if ($libro->getstock() > 0): ?>
                                <button class="botonventa"> Comprar </button>
                            <?php else: ?>
                                <h3 class="sinstock">Sin Stock</h3>
                            <?php endif; ?>
                            <?php  if (Sesion::usuario()['rol'] == 'Bibliotecario'): ?>
                                <button class="botonventa" method="POST" action="/index.php?controlador=libros&accion=modificarlibro" ><a href="index.php?controlador=libros&accion=editar&id= <?= $libro->getid() ?>"> Editar Libro </a> </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="descripcion">
            <h2>Descripcion</h2>
            <p class="pdescripcion"><?php echo htmlspecialchars($libro->getdescripcion()); ?></p>
        </div>
        <div class="resenias">
            <?php ?>
        </div>
    </body>
</html> 