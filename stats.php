<?php
$title = "<?php?>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticos</title>
    <link rel="stylesheet" href="CSS/main_bar.css" />
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
        <h1>Calcular Estadisticos Básicos</h1>
        <p>Los datos deben ser enviados consecutivamente separados por un espacio " ".</p>
        <form action="Model/c_stats.php" method="post">
            <input type="text" name="text" placeholder="1 2 3 4" required>
            <button type="submit" class="op">Enviar</button>
        </form>
    </div>
    <?php
    if (!empty($_GET["error"])) {
        echo "<p>El valor ingresado no es valido. Por favor, verifique que este correctamente escrito</p>";
    }
    if (!empty($_GET["a"]) && !empty($_GET["m"])) {
        $avg = $_GET["a"];
        $mode = $_GET["m"];
        echo "<p class='r'>Media: $avg</p>";
        echo "<p class='r'>Moda: $mode</p>";
    }
    ?>

    <br>
    <a href="index.php" class="back">Volver</a>
</body>

</html>