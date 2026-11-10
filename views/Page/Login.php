<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/LogIn.css">
    <title>Document</title>
</head>
    <body class="body">
        <div class="CentroLogin">
            <img src="/Pictures/LogoNexora.png" alt="LogoNexora" style="width: 200px;">
            <?php if (!empty($error)): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form method="POST" action="/index.php?controlador=auth&accion=login" class="formulario">
                <p style="margin: 5px;"><label><input class="imputs" type="email" name="email" required value="<?=  htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="Email" ></label></p>
                <p style="margin: 5px;"><label><input class="imputs" type="password" name="clave" required placeholder="Contraseña"></label></p>
                <button type="submit" class="botones"> Iniciar Sesion </button>
            </form>
            <button class="botones" onclick="window.location.href='index.php?controlador=libros&accion=listar'">Volver</button>
        </div>
    </body>
</html>

