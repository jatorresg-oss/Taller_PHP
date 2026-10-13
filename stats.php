<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculos Estadísticos</title>
</head>

<body>
    <h1>Calcular Estadisticos Básicos</h1>
    <div>
        <p>Por favor, escriba la cantidad de datos que desea ingresar.</p>
        <p>Los datos deben ser enviados consecutivamente separados por un espacio " ".</p>
        <form action="Model/c_stats.php" method="post">
            <input type="text" name="text" placeholder="1 2 3 4" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
    <?php
    if (!empty($_GET["error"])) {
        echo "<p>El valor ingresado no es valido. Por favor, verifique que este correctamente escrito</p>";
    }
    if (!empty($_GET["a"]) && !empty($_GET["m"])) {
        $avg = $_GET["a"];
        $mode = $_GET["m"];
        echo "<p>Media: $avg</p>";
        echo "<p>Moda: $mode</p>";
    }
    ?>
</body>

</html>