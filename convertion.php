<?php
$title = "<?php?>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión</title>
    <link rel="stylesheet" href="CSS/main_bar.css" />
    <link rel="stylesheet" href="CSS/convertion.css" />
</head>

<body>
    <header class="Main_bar">
        <div class="title">
            <a href="index.php">
                <h1>Taller </h1>
                <div class="php">
                    <?php echo ("<h1>" . htmlspecialchars($title) . "</h1>"); ?>
                </div>
            </a>
        </div>
        <div class="options">
            <ul>
                <li><a href="acronym.php">Acrónimo</a></li>
                <li><a href="math.php">Fibonacci</a></li>
                <li><a href="stats.php">Estadistica</a></li>
                <li><a href="set.php">Conjuntos</a></li>
                <li><a href="convertion.php">Binario</a></li>
                <li><a href="tree.php">Árbol</a></li>
                <li><a href="calculator.php">Calculadora</a></li>
            </ul>
        </div>
    </header>
    
    <div class="app">
        <h1>Conversión</h1>
        <p>Ingrese el número entero que desea convertir a binario</p>
        <form action="Model/c_convertion.php" method="post">
            <input type="number" name="value">
            <button type="submit" class="op">Enviar</button>
        </form>
    </div>

    <?php
    if (!empty($_GET["b"]) && !empty($_GET["v"])) {
        $binary = $_GET["b"];
        $value = $_GET["v"];
        echo "<p class='r'>El número $value en Binario es: </p>";
        echo "<p class='r'>$binary</p>";
    }
    ?>

    <br>
    <a href="index.php" class="back">Volver</a>
</body>

</html>