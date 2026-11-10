<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/PaginaBusqueda.css">
    <title>Nexroa</title>
</head>
<body class="body">
    <div>
        <?php require_once __DIR__ . '/../Parts/Barra.php'; ?>
    </div>
    <div>
        <div class="bordebusqueda">
            <?php if(empty($SolicitudLibro)): ?>
                <h1>No hay Resultados</h1>
            <?php else: ?>
                <div class="encabezado-resultados">
                    <h2 class="titulos">Resultados de: "<?= htmlspecialchars($busqueda) ?>"</h2>
                </div>
                    <form action="/index.php" method="GET" class="filtros">
                        <input type="hidden" name="controlador" value="libros">
                        <input type="hidden" name="accion" value="listarbusqueda">
                        <input type="hidden" name="busqueda"
                            value="<?= htmlspecialchars($busqueda) ?>">

                        <select name="orden">
                            <option value="recientes">Más recientes</option>
                            <option value="precio_asc">Precio: menor a mayor</option>
                            <option value="precio_desc">Precio: mayor a menor</option>
                            <option value="autor">Autor: A-Z</option>
                        </select>

                        <button type="submit">Aplicar</button>
                    </form>
                <div>

                </div>
                <div class="lista-libros">
                    <?php foreach ($SolicitudLibro as $libro): ?>
                        <div class="divlibro">
                            <a href="/index.php?controlador=libros&accion=DetalleLibro&id=<?= $libro->getid() ?>">
                                <img src="<?= htmlspecialchars($libro->getportada()) ?>" alt="" style="width: 150px; height: 235px">
                                <p class="tituloslibros"><?= htmlspecialchars($libro->gettitulo()) ?></p>
                                <p class="precio">$<?= htmlspecialchars((string)$libro->getprecio()) ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>
        </div>
    </div>
</body>
</html>