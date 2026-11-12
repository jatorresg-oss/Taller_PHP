<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbol Binario</title>
</head>

<body>


    <h2>Crear Arbol Binario</h2>

    <div>
        <form action="Model/c_tree.php" method="post">
            <label>Preorden:</label><br>
            <input type="text" name="preorden" placeholder="A,B,D,E,C">
            <br>
            <label>Inorden:</label><br>
            <input type="text" name="inorden" placeholder="D,B,E,A,C">
            <br>
            <label>Postorden:</label><br>
            <input type="text" name="postorden" placeholder="D,E,B,C,A">
            <br>
            <button type="submit" name="enviar">Construir arbol</button>
        </form>
    </div>

    

    <br>
    <a href="index.php">Volver</a>
</body>