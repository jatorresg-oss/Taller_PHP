<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión</title>
</head>

<body>
    <h1>Conversión</h1>
    <div>
        <p>Ingrese el número entero que desea convertir a binario</p>
        <form action="Model/c_convertion.php" method="post">
            <input type="number" name="value">
            <button type="submit">Enviar</button>
        </form>
    </div>

    <?php
    if (!empty($_GET["b"]) && !empty($_GET["v"])) {
        $binary = $_GET["b"];
        $value = $_GET["v"];
        echo "<p>El número $value en Binario es: </p>";
        echo "<p>$binary</p>";
    }
    ?>
    
    <br>
    <a href="index.php">Volver</a>
</body>

</html>