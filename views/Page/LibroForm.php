<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php require_once __DIR__ . '/../Parts/Barra.php'; ?>
    </div>
    <div> 
        <form action="index.php?controlador=libros&accion=agregar" method="POST">
            <p> <label>Nombre: <input type="text" name="nombre" require value="<?=  htmlspecialchars($_POST['titulo'] ?? '') ?>" > </label></p>
            <p> <label>Autor: <input type="text" name="autor" require value="<?=  htmlspecialchars($_POST['autor'] ?? '') ?>" > </label></p>
            <p> <label>Año: <input type="number" name="anio" require value="<?=  htmlspecialchars($_POST['anio'] ?? 0) ?>" ></label></p>
            <p> <label>Portada: <input type="text" name="portada" require value="<?=  htmlspecialchars($_POST['Portada'] ?? '') ?>" ></label></p>
            <p> <label>Stock: <input type="number" name="Stock" require value="<?=  htmlspecialchars($_POST['stock'] ?? 0) ?>" ></label></p>
            <p> <label>ISBN: <input type="number" name="isbn" require value="<?=  htmlspecialchars($_POST['isbn'] ?? 0) ?>" ></label></p>
            <p> <label>Precio: <input type="number" step="0.01" name="percio" require value="<?=  htmlspecialchars($_POST['precio'] ?? 0) ?>" ></label></p>
            <p> <label>Precio Oferta: <input type="number" step="0.01" name="perciooferta" require value="<?=  htmlspecialchars($_POST['preciooferta'] ?? 0) ?>" ></label></p>
            <p> <label>Codigo de Barras:<input type="number" name="Codigo_Barras" require value="<?=  htmlspecialchars($_POST['codigo_barras'] ?? 0) ?>" ></label></p>
            <p> <label>Descripcion: <input type="text" name="Descripcion" require value="<?=  htmlspecialchars($_POST['Descripcion'] ?? '') ?>" ></label></p>
            <p>
                <label for="formato_digital">Activo:</label>
                <select name="activo" id="activo" required>
                    <option value="">Seleccioná una opción</option>
                    <option value="1"<?= (($_POST['activo'] ?? '') == '1') ? 'selected' : '' ?>>Sí</option>
                    <option value="0"<?= (($_POST['activo'] ?? '') == '0') ? 'selected' : '' ?>>No</option>
                </select>
            </p>
            <p>
                <label for="formato_digital">Formato Fisico:</label>
                <select name="formato_fisico" id="formato_fisico" required>
                    <option value="">Seleccioná una opción</option>
                    <option value="1"<?= (($_POST['formato_fisico'] ?? '') == '1') ? 'selected' : '' ?>>Sí</option>
                    <option value="0"<?= (($_POST['formato_fisico'] ?? '') == '0') ? 'selected' : '' ?>>No</option>
                </select>
            </p>
            <p>
                <label for="formato_digital">Formato Digital:</label>
                <select name="formato_digital" id="formato_digital" required>
                    <option value="">Seleccioná una opción</option>
                    <option value="1"<?= (($_POST['formato_digital'] ?? '') == '1') ? 'selected' : '' ?>>Sí</option>
                    <option value="0"<?= (($_POST['formato_digital'] ?? '') == '0') ? 'selected' : '' ?>>No</option>
                </select>
            </p>
            <p> <label>Archivo Digital: <input type="select" name="Archivo_Digital" require value="<?=  htmlspecialchars($_POST['Archivo_Digital'] ?? '') ?>" ></label></p>
                <button type="submit">Agregar</buttton>
        </form>
    </div>
</body>
</html>