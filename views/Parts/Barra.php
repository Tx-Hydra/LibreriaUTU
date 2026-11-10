<link rel="stylesheet" href="/css/barra.css">
<div class="contenedor">
    <div class="logo">
        <a href="/../../index.php?controlador=libros&accion=listar"><img src="/Pictures/nexora.jpg" alt="Inicio" style="height: 50px; width: 100px"></a>
    </div>
    <div class="barraBusqueda">
        <form action="/index.php" method="GET" class="barraBusqueda">
            <input type="hidden" name="controlador" value="libros">
            <input type="hidden" name="accion" value="listarbusqueda">
            <input type="text" name="busqueda" class="barraimput" placeholder="Buscar">
            <button type="submit" class="botonbusqueda">
                <img src="/Pictures/Lupa.png" alt="Buscar" class="imagenbusqueda">
            </button>
        </form>
    </div> 
    <div class="zonalogin">
        <div class="menu-usuario">
            <?php if (Sesion::estaLogueado()): ?>
            <details>
                <summary>
                <?= htmlspecialchars(Sesion::usuario()['nombre']) ?>
                </summary>
                    <div class="contenido-menu">
                        <a href="index.php?controlador=perfil&accion=perfil">Mi perfil</a>
                        <?php if (Sesion::usuario()['rol'] == 'Bibliotecario'): ?>
                            <a href="index.php?controlador=libros&accion=agregar">Agregar libro</a>
                        <?php endif; ?>
                        <a href="index.php?controlador=auth&accion=logout">Cerrar sesión</a>
                    </div>
                </div>
            </details>
        <?php else: ?>
            <button class="botonIngresar" onclick="window.location.href='/index.php?controlador=auth&accion=login'">Ingresar</a>
        <?php endif; ?>
    </div>
</div>
            