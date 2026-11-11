<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <div>
            <?php require_once __DIR__ . "/../Parts/Barra.php"?>
        </div>
        <form action="">
            <p>Titulo Actual: <?php echo htmlspecialchars($libro->gettitulo())?></p>
            <p>Titulo Nuevo: <input type="hidden" name="id" value="<?= $libro->getId() ?>">  <input type="text" name="titulo"></p>

            <p>Autor: <?php echo htmlspecialchars($libro->getautor())?></p>
            <p>Cambiar Autor: <input type="text" name="autor"></p>

            <p>Año Actual: <?php echo htmlspecialchars($libro->getanio())?></p>
            <p>Año Nuevo: <input type="hidden" name="id" value="<?= $libro->getId() ?>">  <input type="text" name="titulo"></p>

            <p>Stock: <?php echo htmlspecialchars($libro->getstock())?></p>
            <p>Stock Nuevo: <input type="hidden" name="id" value="<?= $libro->getId() ?>">  <input type="text" name="titulo"></p>

            <p>ISBN Actual: <?php echo htmlspecialchars($libro->getisbn())?></p>
            <p>Cambiar ISBN: <input type="text" name="isbn"></p>

            <p>Precio Actual: $<?php echo htmlspecialchars($libro->getprecio()) ?></p>
            <p>Precio Nuevo: <input type="text" name="precio"></p>

            <p>Precio Oferta: $<?php echo htmlspecialchars($libro->getpreciooferta()) ?></p>
            <p>Nuevo Precio Oferta: <input type="text" name="preciooferta"></p>

            <p>Codigo Barras: <?php echo htmlspecialchars($libro->getcodbarras())?></p>
            <p>Nuevo Codigo Barras: <input type="text" name="codigobarras"></p>

            <p>Activo: <input type="" name="activo"></p>
        </form>
    </body>
</html>

