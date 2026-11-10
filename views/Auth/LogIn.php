<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="/../Pictures/LogoNexora.png" content="width= , initial-scale=1.0">
    <title>Nexora</title>
</head>
    <body>
        <?php require 'Config/Sesion.php' ?>
        <?php require 'views/Parts/NavBar.php' ?>
        <H1>Ingresar</H1>
        <?php if (!empty($error)): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" action="index.php?controlador=auth&accion=login">
            <input type="text" name="email" required <? htmlspecialchars($_POST['email'] ?? '')?>>
            <input type="text" name='clave' required <? htmlspecialchars($_POST['contra'] ?? '') ?>>
            <button type="submit">Iniciar Sesion</button>       
        </form>
    </body>
</html>